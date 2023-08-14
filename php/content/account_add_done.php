<?php
    // Header部分共通
    require_once(dirname(__FILE__).'/./header/header.php');

    //e()用
    require_once(dirname(__FILE__).'/./common/Encode.php');


    //２重登録の確認
    {
        $errFlag = FALSE;      
        $user = e($_POST['user']);

        //DB検索
        $tblName = "account_tbl";
        $where   = "user='".$user."'";
        $ret = readTbl($tblName, $where, NULL);
        if ($ret != FALSE) {
            $errFlag = TRUE;
            $result = "ユーザー名:".$user." は、既に登録されています。";
        }
    }

    //初期のパスワードはユーザー名とします。
    if ($errFlag == FALSE) {
        //パスワードを暗号化する
        $passwd_hash = password_hash($user, PASSWORD_DEFAULT);
    }

    //登録
    if ($errFlag == FALSE) {
        $tblName = "account_tbl";
        $keyValue = [];
        //DB TABLEの要素名リスト
        $keyName = ['user','passwd','auth'];
    
        //DB TABLEの 要素名:値 になるよう連想配列を作成
        foreach ($keyName as $key) {
            if ($key == 'auth') {
                $keyValue[$key] = (int)e($_POST[$key]);
            } elseif ($key == 'passwd') {
                $keyValue[$key] = $passwd_hash;
            } else {
                $keyValue[$key] = e($_POST[$key]);
            }
        }
        
        //DB TABLEへ書き込み
        if (writeTbl($tblName, $keyValue) == TRUE) {
            $result = "登録しました。";
        } else {
            $result = "登録が失敗しました。";
        }    
    }
?>

<!DOCTYPE html>
<html lang="ja">
<?php include(dirname(__FILE__).'/./header/head_html.php'); ?>
<body>
    <?php echo $strHeader; ?>
    <br>
    <br>
    <div class="block ml-6">
        <p><?php echo $result; ?></p>
    </div>

    <?php include(dirname(__FILE__).'/./header/bulma_burger.js'); ?>
</body>
</html>