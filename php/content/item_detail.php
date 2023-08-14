<?php
    // Header部分共通
    require_once(dirname(__FILE__).'/./header/header.php');

   
    $name = $note = "";
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
    <div class="block ml-6">
        <table class="table" >
            <tr>
                <td>マシン名:</td>
                <td><?php echo $name; ?></td>
            </tr>
            <tr>
                <td>説明:</td>
                <td><?php echo $note;?></td>
            </tr>
        </table>
    </div>

    <div class="block ml-6">
        <a href="branch.php?item_edit_type=edit&idx=<?php echo $idx;?>">
            <span class="button has-background-grey-lighter">編集</span>
        </a>
        <a href="branch.php?item_edit_type=clr&idx=<?php echo $idx;?>">
            <span class="button has-text-light has-background-danger ml-5">削除</span>
        </a> 
    </div>

    <?php include(dirname(__FILE__).'/./header/bulma_burger.js'); ?>
</body>
</html>