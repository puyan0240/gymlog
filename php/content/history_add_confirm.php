<?php
    // Header部分共通
    require_once(dirname(__FILE__).'/./header/header.php');

    //e()用
    require_once(dirname(__FILE__).'/./common/Encode.php');

    $date     = e($_POST['date']);
    $item_idx = e($_POST['item_idx']);
    $weight_1 = e($_POST['weight_1']);
    if ($weight_1 == "")
        $weight_1 = "-";
    $count_1  = e($_POST['count_1']);
    if ($count_1 == "")
        $count_1 = "-";
    $weight_2 = e($_POST['weight_2']);
    if ($weight_2 == "")
        $weight_2 = "-";
    $count_2 = e($_POST['count_2']);
    if ($count_2 == "")
        $count_2 = "-";
    $weight_3 = e($_POST['weight_3']);
    if ($weight_3 == "")
        $weight_3 = "-";
    $count_3  = e($_POST['count_3']);
    if ($count_3 == "")
        $count_3 = "-";


    //DB TABLEから読み出し
    $tblName = "item_tbl";
    $param = 'idx ='.$item_idx;
    $ret = readTbl($tblName, $param, NULL);
    if ($ret != FALSE) {
        foreach ($ret as $value) {
            $name = $value['name'];
            break;
        }
    }
    else {
        $name = "";
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
                <td>日付</td>
                <td colspan="2"><?php echo $date; ?></td>
            </tr>
            <tr>
                <td>マシン名</td>
                <td colspan="2"><?php echo $name; ?></td>
            </tr>
            <tr>
                <td>1 回目</td>
                <td><?php echo $weight_1; ?> kg</td>
                <td><?php echo $count_1; ?> 回</td>
            </tr>
            <tr>
                <td>2 回目</td>
                <td><?php echo $weight_2; ?> kg</td>
                <td><?php echo $count_2; ?> 回</td>
            </tr>
            <tr>
                <td>3 回目</td>
                <td><?php echo $weight_3; ?> kg</td>
                <td><?php echo $count_3; ?> 回</td>
            </tr>
        </table>
    </div>

    <div class="block ml-6">
        <form action="history_add_done.php" method="POST">
            <input type="hidden" name="date" value="<?php echo $date; ?>">
            <input type="hidden" name="account_idx" value="<?php echo $_SESSION['idx']; ?>">
            <input type="hidden" name="item_idx" value="<?php echo $item_idx; ?>">
            <input type="hidden" name="weight_1" value="<?php echo $weight_1; ?>">
            <input type="hidden" name="count_1" value="<?php echo $count_1; ?>">
            <input type="hidden" name="weight_2" value="<?php echo $weight_2; ?>">
            <input type="hidden" name="count_2" value="<?php echo $count_2; ?>">
            <input type="hidden" name="weight_3" value="<?php echo $weight_3; ?>">
            <input type="hidden" name="count_3" value="<?php echo $count_3; ?>">

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

    <?php include(dirname(__FILE__).'/./header/bulma_burger.js'); ?>
</body>
</html>