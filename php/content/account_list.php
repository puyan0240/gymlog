<?php
    // Header部分共通
    require_once(dirname(__FILE__).'/./header/header.php');


    //一覧表示
    {
        //DB TABLEから読み出し
        $tblName = "account_tbl";
        $ret = readTbl($tblName, NULL, NULL, NULL, NULL);
        if ($ret != FALSE) {

            $format = "
            <tr>
                <td hidden>%d</td>
                <td>%d</td>
                <td>%s</td>
                <td>%s</td>
            </tr>";
            $strTbl = "";


            //HTML作成
            $count = 1;
            foreach ($ret as $value) {
                $strTbl .= sprintf($format, (int)$value['account_idx'], $count, $value['user'], 
                                            $value['auth']==0 ? "一般":"管理者");
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
        <a href="account_add.php">
            <span class="button is-success ml-6">アカウント登録</span>
        </a>
    </div>

    <div class="block ml-6">
        <table class="table" id="list_table">
            <tr>
                <th hidden></th>
                <th>No.</th>
                <th>ユーザー名</th>
                <th>権限</th>
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
            location = "account_detail.php?account_idx="+e.target.id;
        }
    </script>

    <?php include(dirname(__FILE__).'/./header/bulma_burger.js'); ?>
</body>
</html>