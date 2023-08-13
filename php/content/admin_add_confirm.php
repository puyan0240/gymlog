<?php
    //e()用
    include_once(dirname(__FILE__)."/./common/Encode.php");

    $user    = e($_POST['user']);
    $passwd  = e($_POST['passwd']);
    $passwd_confirm = e($_POST['passwd_confirm']);
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

    <div class="block ml-6">
        <table class="table">
            <tr>
                <td>管理者名</td>
                <td><?php echo $user; ?></td>
            </tr>
        </table>
    </div>

    <div class="block ml-6">
        <form action="admin_add_done.php" method="POST">
            <input type="hidden" name="user" value="<?php echo $user; ?>">
            <input type="hidden" name="passwd" value="<?php echo $passwd;?>">
            <input type="hidden" name="passwd_confirm" value="<?php echo $passwd_confirm;?>">

            <div class="field is-grouped">
                <div class="control">
                    <input class="button has-background-grey-lighter ml-4" type="button" onclick="history.back()" value="戻る">
                </div>
                <div class="control">
                    <input class="button is-success ml-4" type="submit" value="登録">
                </div>
            </div>
        </form> 
    </div>
</body>
</html>