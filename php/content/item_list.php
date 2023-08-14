<?php
    // Header部分共通
    require_once(dirname(__FILE__).'/./header/header.php');


    //一覧表示
    {
        $strTbl = "";

        //DB TABLEから読み出し
        $tblName = "item_tbl";
        $ret = readTbl($tblName, NULL, NULL);
        if ($ret != FALSE) {

            $format = "
            <tr>
                <td hidden>%d</td>
                <td>%d</td>
                <td>%s</td>
                <td>%s</td>
            </tr>";
           
            //HTML作成
            $count = 1;
            foreach ($ret as $value) {
                $strTbl .= sprintf($format, (int)$value['idx'], $count, $value['name'], $value['note']);
                $count += 1;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="ja">
<?php include(dirname(__FILE__).'/./header/head_html.php'); ?>
<body>
    <?php echo $strHeader; ?>
    <br>

    <div class="block">
        <a href="item_add.php">
            <span class="button is-success ml-6">マシン登録</span>
        </a>
    </div>

    <div class="block ml-6">
        <table class="table" id="list_table">
            <tr>
                <th hidden></th>
                <th>No.</th>
                <th>マシン名</th>
                <th>説明</th>
            </tr>
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
            location = "item_detail.php?idx="+e.target.id;
        }
    </script>

    <?php include(dirname(__FILE__).'/./header/bulma_burger.js'); ?>
</body>
</html>