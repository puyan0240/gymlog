<?php
    // Header部分共通
    include_once("./header/header.php");

?>

<!DOCTYPE html>
<html lang="ja">
<?php include('./common/head_html.php'); ?>
<body>
    <?php echo $strHeader; ?>
    <br>

    <div class="block ml-6">
        <a href="add.php">
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
            <tr>
                <th hidden></th>
                <th>No.</th>
                <th>日付</th>
                <th>タイトル</th>
                <th>著者</th>
                <th>出版社</th>
                <th>評価</th>
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
            location = "branch.php?edit_type=disp&idx="+e.target.id;
        }
    </script>

    <?php include('./common/bulma_burger.js'); ?>
</body>
</html>