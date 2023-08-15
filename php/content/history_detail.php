<?php
    // Header部分共通
    require_once(dirname(__FILE__).'/./header/header.php');

   
    $strTbl = "";
    $date = $_GET['date'];

    $format = 
        "<tr>
            <td>%s</td>
            <td>%s kg</td>
            <td>%s 回</td>
            <td>%s kg</td>
            <td>%s 回</td>
            <td>%s kg</td>
            <td>%s 回</td>
        </tr>";

    //DB TABLEから読み出し
    $tblName = "history_tbl";
    $param = 'date ="'.$date.'"';
    $tblNameJoin = "item_tbl";
    $on = "history_tbl.item_idx = item_tbl.idx";
    $ret = readTbl($tblName, $param, NULL, $tblNameJoin, $on);
    if ($ret != FALSE) {
        foreach ($ret as $value) {
            $strTbl .= sprintf($format, $value['name'], 
                                        $value['weight_1'], $value['count_1'],
                                        $value['weight_2'], $value['count_2'], 
                                        $value['weight_3'], $value['count_3'],);
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
    <div class="block ml-6">
        <table class="table" >
            <tr>
                <td>日付</td>
                <td colspan="7"><?php echo $date; ?></td>
            </tr>
            <?php echo $strTbl; ?>
        </table>
    </div>

    <div class="block ml-6">
        <div class="control">
            <input class="button has-background-grey-lighter" type="button" onclick="history.back()" value="戻る">
        </div>
    </div>

    <?php include(dirname(__FILE__).'/./header/bulma_burger.js'); ?>
</body>
</html>