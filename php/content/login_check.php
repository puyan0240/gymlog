<?php
    require_once(dirname(__FILE__).'/./common/Encode.php');
    require_once(dirname(__FILE__).'/./common/DbManager.php');
  
    $result = "失敗しました。";
    $tblName = "account_tbl";

    $user   = e($_POST['user']);
    $passwd = e($_POST['passwd']);

    //DB検索
    $where = "user='".$user."'";
    $ret = readTbl($tblName, $where, NULL);
    if ($ret != FALSE) {

        //ユーザー認証&記録
        foreach ($ret as $value) {
            if (password_verify($passwd, $value['passwd'])) { //パスワードは暗号化しているので
                session_start();
                $_SESSION['login'] = 1;
                $_SESSION['user']  = $user;
                $_SESSION['auth']   = $value['auth'];
            }
            break;
        }

        header('Location:index.php');
        exit();
    }
    else
    {
        $result = "ユーザー名かパスワードが間違っています。";
    }
?>

<!DOCTYPE html>
<html lang="ja">
<?php include(dirname(__FILE__).'/./header/head_html.php'); ?>
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
        <a href="login.php">ログイン画面へ</a>
    </div>

    <script>
        setTimeout(function() {
            window.location.href = "login.php";
        }, 2*1000);
    </script>

    <?php include('./header/bulma_burger.js'); ?>
</body>
</html>