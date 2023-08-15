<?php
    // Header部分共通
    require_once(dirname(__FILE__).'/./header/header.php');

    //「年」選択肢
    {
        $latestYear = 2023; //一番古い年

        if (isset($_POST['sel_year']))
            $selectedYear = $_POST['sel_year'];
        else
            $selectedYear = date('Y');

        $format = "<option value=\"%s\" %s>%s</option>";
        $strSelYear = "";
        $strSelected = "";
    
        $year = date('Y');
        while ($year >= $latestYear) {
            if ($year == $selectedYear)
                $strSelected = "selected";  //初期値の選択は現在の年
            else
                $strSelected = "";

            $strSelYear = $strSelYear.sprintf($format, $year, $strSelected, $year);
            $year --;
        }    
    }


    //一覧表示
    {
        $format = "
            <tr>
                <td>%s</td>
                <td>(%s)</td>
            </tr>";
        $week = array('日','月','火','水','木','金','土');
        $strTbl = "";
        $last_date = "";

        //DB TABLEから読み出し
        $where = "date like '%".$selectedYear."%'";
        $tblName = "history_tbl";
        $ret = readTbl($tblName, $where, 'ORDER BY date DESC');
        if ($ret != FALSE) {
            //HTML作成
            foreach ($ret as $value) {
                if ($last_date != $value['date']) {
                    $strTbl .= sprintf($format, $value['date'], $week[date('w', strtotime($value['date']))]);
                    $last_date = $value['date'];
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="ja">
<?php require_once(dirname(__FILE__).'/./header/head_html.php'); ?>
<body>
    <?php echo $strHeader; ?>
    <br>

    <div class="block ml-6">
        <a href="history_add.php">
            <span class="button is-success">新規登録</span>
        </a>
    </div>
    <br>

    <div class="block ml-6">
        <form action="" method="post">
            <div class="control">
                <div class="select is-success is-small">
                    <select name="sel_year">
                        <?php echo $strSelYear; ?>
                    </select>
                </div>
                <button type="submit" class="button is-small has-background-grey-lighter">選択</button>
            </div>
        </form>
    </div>

    <div class="block ml-6 mr-6">
        <table class="table", id="list_table">
            <?php echo $strTbl; ?>

        </table>
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
            location = "branch.php?history_edit_type=detail&date="+e.target.id;
        }
    </script>

    <?php require_once(dirname(__FILE__).'/./header/bulma_burger.js'); ?>
</body>
</html>