<?php
    // Header部分共通
    require_once(dirname(__FILE__).'/./header/header.php');


    $date = $_GET['date'];

    //日付
    {
        $week = array('日','月','火','水','木','金','土');
        $strDate = $date." (".$week[date('w', strtotime($date))].")";
    }


    //一覧表示
    {
        $strTbl = "";    
        $format = 
            "<tr>
                <td hidden>%d</td>
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
                $strTbl .= sprintf($format, $value['item_idx'], $value['name'], 
                                            $value['weight_1'], $value['count_1'],
                                            $value['weight_2'], $value['count_2'], 
                                            $value['weight_3'], $value['count_3'],);
            }
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
        <label class="label"><?php echo $strDate; ?></label>
    </div>
    <div class="block ml-6">
        <table class="table" id="list_table">
            <?php echo $strTbl; ?>
        </table>
    </div>

    <div class="block ml-6">
        <div class="control">
            <input class="button has-background-grey-lighter" type="button" onclick="history.back()" value="戻る">
        </div>
    </div>

    <script>
        let table = document.getElementById("list_table");
        for (let i = 0; i < table.rows.length; i ++) {
            for (let j = 0; j < table.rows[i].cells.length; j ++) {
                table.rows[i].cells[j].id = table.rows[i].cells[0].innerHTML;
                table.rows[i].cells[j].onclick = clicked;
            }
        }

        function clicked(e) {
            location = "branch.php?history_edit_type=detail2&item_idx="+e.target.id;
        }
    </script>

    <?php include(dirname(__FILE__).'/./header/bulma_burger.js'); ?>
</body>
</html>