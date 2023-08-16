<?php
    // Header部分共通
    require_once(dirname(__FILE__).'/./header/header.php');
    

    $user = $passwd = $admin = $manager = "";
    $account_idx = $_GET['account_idx'];

    //DB TABLEから読み出し
    $tblName = "account_tbl";
    $param = 'account_idx ='.$account_idx;
    $ret = readTbl($tblName, $param, NULL, NULL, NULL);
    if ($ret != FALSE) {
        foreach ($ret as $value) {
            $user = $value['user'];
            $auth = $value['auth'];
        }
    }

    //アカウント権限の表示
    if ($auth == 0)
        $auth = "一般";
    else
        $auth = "管理者";


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
        <p>削除しますか？</p>
    </div>

    <div class="block ml-6 mr-6">
        <form action="account_del_done.php" method="post">
            <input type="hidden" name="account_idx" value="<?php echo $account_idx;?>">

            <div class="field">
                <p>delete と入力してください</p>
                <div class="control">
                    <input class="input is-sucess" type="text" name="key_word">
                </div>
            </div>
            <div class="field is-grouped">
                <a href="<?php echo $strBack; ?>">
                    <span class="button has-background-grey-lighter">戻る</span>
                </a>
                <div class="control ml-6">
                    <input class="button is-danger" type="submit" value="削除実行">
                </div>
            </div>            
        </form>
    </div>

    <br>
    <div class="block ml-6">
        <table class="table" >
            <tr>
                <td>ユーザー名</td>
                <td><?php echo $user; ?></td>
            </tr>
            <tr>
                <td>権限:</td>
                <td><?php echo $auth;?></td>
            </tr>
        </table>
    </div>

    <?php include(dirname(__FILE__).'/./header/bulma_burger.js'); ?>
</body>
</html>