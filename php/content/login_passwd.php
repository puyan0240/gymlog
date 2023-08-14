<?php
    // Header部分共通
    require_once(dirname(__FILE__).'/./header/header.php');
?>

<!DOCTYPE html>
<html lang="ja">
<?php include(dirname(__FILE__).'/./header/head_html.php'); ?>
<body>
    <?php echo $strHeader; ?>
    <br>
    <div class="block ml-6">
        <p>パスワードを変更します。</p>
    </div>
    <br>
    <form action="login_passwd_done.php" method="POST">
        <div class="block ml-6 mr-6">
            <div class="field">
                <label class="label">現在のパスワード</label>
                    <div class="control">
                    <input class="input is-sucess" type="password" name="passwd" required>
                </div>
            </div>
            <div class="field">
                <label class="label">新しいパスワード</label>
                    <div class="control">
                    <input class="input is-sucess" type="password" name="new_passwd" required>
                </div>
            </div>
            <div class="field">
                <label class="label">新しいパスワード (確認用)</label>
                    <div class="control">
                    <input class="input is-sucess" type="password" name="new_passwd_confirm" required>
                </div>
            </div>
        </div>
        <div class="block ml-6 mr-6">
            <div class="field is-grouped">
                <div class="control">
                    <input class="button has-background-grey-lighter" type="reset" value="取消">
                </div>
                <div class="control">
                    <input class="button is-success ml-4" type="submit" value="パスワード変更">
                </div>
            </div>
        </div>
    </form>

    <?php include(dirname(__FILE__).'/./header/bulma_burger.js'); ?>
</body>
</html>