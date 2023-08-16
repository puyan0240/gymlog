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

    <div class="block ml-6">
        <a href="branch.php?account_edit_type=edit&account_idx=<?php echo $account_idx;?>">
            <span class="button has-background-grey-lighter">編集</span>
        </a>
        <a href="branch.php?account_edit_type=passwd_clr&account_idx=<?php echo $account_idx;?>">
            <span class="button has-text-light has-background-danger ml-5">パスワード初期化</span>
        </a> 
        <a href="branch.php?account_edit_type=clr&account_idx=<?php echo $account_idx;?>">
            <span class="button has-text-light has-background-danger ml-5">アカウント削除</span>
        </a> 
    </div>

    <?php include(dirname(__FILE__).'/./header/bulma_burger.js'); ?>
</body>
</html>