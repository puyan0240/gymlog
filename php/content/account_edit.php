<?php
    // Header部分共通
    require_once(dirname(__FILE__).'/./header/header.php');

   
    $user = $admin = $manager = "";
    $idx = $_GET['idx'];

    //DB TABLEから読み出し
    $tblName = "account_tbl";
    $param = 'idx ='.$idx;
    $ret = readTbl($tblName, $param, NULL, NULL, NULL);
    if ($ret != FALSE) {
        foreach ($ret as $value) {
            $idx  = $value['idx'];
            $user = $value['user'];
            $auth = $value['auth'];
        }
    }
    //select option の初期値
    $selectedTbl = ["",""];
    $selectedTbl[$auth] = "selected";
    //var_dump($selectedTbl);

    //戻り先
    $strBack = $_SERVER['HTTP_REFERER'];
?>

<!DOCTYPE html>
<html lang="ja">
<?php include(dirname(__FILE__).'/./header/head_html.php'); ?>
<body>
    <?php echo $strHeader; ?>
    <br>

    <form action="account_edit_confirm.php" method="post">
        <input type="hidden" name="idx" value="<?php echo $idx; ?>">

        <div class="field ml-6 mr-6">
            <label class="label">ユーザー名:</label>
            <div class="control">
                <input class="input is-sucess" type="text" name="user" required value="<?php echo $user;?>">
            </div>
        </div>
        <div class="field ml-6 mr-6">
            <label class="label">権限:</label>
            <div class="control">
                <div class="select is-success">
                    <select name="auth">
                        <option value="0" <?php echo $selectedTbl[0];?>>一般</option>
                        <option value="1" <?php echo $selectedTbl[1];?>>管理者</option>
                    </select>
                </div>
            </div>
        </div>
        <br>
        <div class="field is-grouped ml-6">
            <div class="control">
                <input class="button has-background-grey-lighter" type="button" onclick="location ='<?php echo $strBack; ?>'" value="戻る">
            </div>
            <div class="control">
                <input class="button is-success ml-4" type="submit" value="更新確認">
            </div>
        </div>
    </form>

    <?php include(dirname(__FILE__).'/./header/bulma_burger.js'); ?>
</body>
</html>
