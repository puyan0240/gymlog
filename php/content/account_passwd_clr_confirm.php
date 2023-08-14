<?php
    // Header部分共通
    require_once(dirname(__FILE__).'/./header/header.php');


    $idx = $_GET['idx'];

    //戻り先
    $strBack = $_SERVER['HTTP_REFERER'];
?>

<!DOCTYPE html>
<html lang="ja">
<?php include(dirname(__FILE__).'/./header/head_html.php'); ?>
<body>
    <?php echo $strHeader; ?>
    <br>
    <div class="block ml-6">
        <p>パスワードを初期化しますか？ ※初期値はユーザー名と同じとなります。</p>
    </div>
    <div class="block ml-6">
        <form action="account_passwd_clr_done.php" method="post">
            <input type="hidden" name="idx" value="<?php echo $idx;?>">

            <div class="field is-grouped">
                <a href="<?php echo $strBack; ?>">
                    <span class="button has-background-grey-lighter">戻る</span>
                </a>
                <div class="control ml-6">
                    <input class="button is-danger" type="submit" value="初期化">
                </div>
            </div>            
        </form>
    </div>

    <?php include(dirname(__FILE__).'/./header/bulma_burger.js'); ?>
</body>
</html>