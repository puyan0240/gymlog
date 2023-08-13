<?php
    include_once(dirname(__FILE__)."/./common/DbManager.php");

    //e()用
    include_once(dirname(__FILE__)."/./common/Encode.php");


    $errFlag = FALSE;

    //パスワードチェック
    {
        $passwd         = e($_POST['passwd']);
        $passwd_confirm = e($_POST['passwd_confirm']);
        if ($passwd != $passwd_confirm) {
            $errFlag = TRUE;
            $result = "パスワードが間違っています。";
        }
        else { //パスワードを暗号化する
            $passwd_hash = password_hash($passwd, PASSWORD_DEFAULT);
        }
    }

    //登録
    if ($errFlag == FALSE) {

        $keyValue = [];
        //DB TABLEの要素名リスト
        $keyName = ['user','passwd','auth'];
    
        //DB TABLEの 要素名:値 になるよう連想配列を作成
        foreach ($keyName as $key) {
            if ($key == 'auth') {
                $keyValue[$key] = 1;
            } elseif ($key == 'passwd') {
                $keyValue[$key] = $passwd_hash;
            } else {
                $keyValue[$key] = e($_POST[$key]);
            }
        }
    
        //DB TABLEへ書き込み
        $tblName = "account_tbl";
        if (writeTbl($tblName, $keyValue) == TRUE) {
            $result = "登録成功しました。";
        } else {
            $result = "登録失敗しました。";
        }
    }
?>

<!DOCTYPE html>
<html lang="ja">
<?php include(dirname(__FILE__).'/./header/head_html.php'); ?>
<body>
<body>
    <header>
        <nav class="navbar">
            <div class="navbar-brand">
                <span class="navbar-item ml-6 is-size-7">ようこそ</span>
            </div>
            <div class="navbar-menu">
        </div>
        </nav>
        <section class="hero is-info is-small">
            <div class="hero-body">
                <h1 class="title ml-6">ジム履歴</h1>
            </div>
        </section>
        <nav class="navbar has-background-info-light">
            <div class="navbar-menu ml-4" id="targetMenu"></div>
        </nav>
    </header>
    <br>
    <br>
    <div class="block ml-6">
        <p><?php echo $result; ?></p>
    </div>
    <br>
    <div class="block ml-6">
        <a href="login.php">ログイン画面に戻る</a>
    </div>
</body>
</html>