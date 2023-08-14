<?php
    // Header部分共通
    require_once(dirname(__FILE__).'/./header/header.php');

   
    $user = $admin = $manager = "";
    $idx = $_GET['idx'];

    //DB TABLEから読み出し
    $tblName = "item_tbl";
    $param = 'idx ='.$idx;
    $ret = readTbl($tblName, $param, NULL);
    if ($ret != FALSE) {
        foreach ($ret as $value) {
            $idx  = $value['idx'];
            $name = $value['name'];
            $note = $value['note'];
        }
    }

    //戻り先
    $strBack = $_SERVER['HTTP_REFERER'];
?>

<!DOCTYPE html>
<html lang="ja">
<?php include(dirname(__FILE__).'/./header/head_html.php'); ?>
<body>
    <?php echo $strHeader; ?>
    <br>

    <div class="block ml-6 mr-6">
        <form action="item_edit_confirm.php" method="post">
            <input type="hidden" name="idx" value="<?php echo $idx; ?>">

            <div class="field">
                <label class="label">マシン名</label>
                <div class="control">
                    <input class="input is-sucess" type="text" name="name" required value="<?php echo $name;?>">
                </div>
            </div>
            <div class="field">
                <label class="label">説明</label>
                <div class="control">
                    <input class="input is-sucess" type="text" name="note" value="<?php echo $note;?>">
                </div>
            </div>
            <br>
            <div class="field is-grouped">
                <div class="control">
                    <input class="button has-background-grey-lighter" type="button" onclick="location ='<?php echo $strBack; ?>'" value="戻る">
                </div>
                <div class="control">
                    <input class="button is-success ml-4" type="submit" value="更新確認">
                </div>
            </div>
        </form>
    </div>

    <?php include(dirname(__FILE__).'/./header/bulma_burger.js'); ?>
</body>
</html>
