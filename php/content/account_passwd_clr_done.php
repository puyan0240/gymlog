<?php
    // Header部分共通
    require_once(dirname(__FILE__).'/./header/header.php');

    $idx = $_POST['idx'];
    $result = "パスワードを初期化できませんでした。";
    $passwd_hash = "";


    //DB検索:ユーザー名を取得する
    $tblName = "account_tbl";
    $where = "idx='".$_POST['idx']."'";
    $ret = readTbl($tblName, $where, NULL);
    if ($ret != FALSE) {
        //ユーザー認証&記録
        foreach ($ret as $value) {
            $passwd_hash = password_hash($value['user'], PASSWORD_DEFAULT);
            break;
        }   
    }

    //DB更新
    if ($passwd_hash != "") {
        $tblName = "account_tbl";

        //DB TABLEの 要素名:値 になるよう連想配列を作成
        $elementKeyValue = [];
        $elementKeyValue['passwd'] = $passwd_hash;
        $paramKeyValue = [];
        $paramKeyValue['idx'] = $idx;

        if (updateTbl($tblName, $elementKeyValue, $paramKeyValue) == TRUE) {
            $result = "パスワードを初期化しました。";
        }
    }
?>

<!DOCTYPE html>
<html lang="ja">
<?php include(dirname(__FILE__).'/./header/head_html.php'); ?>
<body>
    <?php echo $strHeader; ?>
    <br>
    <div class="block ml-6">
        <p><?php echo $result; ?></p>
    </div>
    <div class="block ml-6">
        <a href="account_list.php">アカウント管理へ</a>
    </div>
    <script>
        setTimeout(function() {
            window.location.href = "account_list.php";
        }, 2*1000);
    </script>

    <?php include(dirname(__FILE__).'/./header/bulma_burger.js'); ?>
</body>
</html>