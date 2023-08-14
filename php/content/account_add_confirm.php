<?php
    // Header部分共通
    require_once(dirname(__FILE__).'/./header/header.php');

    //e()用
    require_once(dirname(__FILE__).'/./common/Encode.php');


    $user  = e($_POST['user']);
    $auth  = e($_POST['auth']);

    $reason = "";
    if (mb_strlen($user) == 0)
        $reason = "ユーザー名 を入力してください。";
    
    //入力エラー
    if (mb_strlen($reason)) {
        header('Location:input_ng.php?reason='.$reason);
        exit();
    }

    //アカウント権限の表示
    {
        $strDispAuth = "管理者";
        if ($auth == 0)
            $strDispAuth = "一般";
    }
?>

<!DOCTYPE html>
<html lang="ja">
<?php include(dirname(__FILE__).'/./header/head_html.php'); ?>
<body>
    <?php echo $strHeader; ?>
    <br>
    <div class="block ml-6">
        <table class="table">
            <tr>
                <td>ユーザー名</td>
                <td><?php echo $user; ?></td>
            </tr>
            <tr>
                <td>権限</td>
                <td><?php echo $strDispAuth;?></td>
            </tr>
        </table>
    </div>

    <div class="block ml-6">
        <form action="account_add_done.php" method="POST">
            <input type="hidden" name="user" value="<?php echo $user; ?>">
            <input type="hidden" name="auth" value="<?php echo $auth;?>">

            <div class="field is-grouped">
                <div class="control">
                    <input class="button has-background-grey-lighter" type="button" onclick="history.back()" value="戻る">
                </div>
                <div class="control">
                    <input class="button is-success ml-4" type="submit" value="登録">
                </div>
            </div>
        </form>
    </div>

    <?php include(dirname(__FILE__).'/./header/bulma_burger.js'); ?>
</body>
</html>