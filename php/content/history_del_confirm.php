<?php
    // Header部分共通
    require_once(dirname(__FILE__).'/./header/header.php');
    

    $history_idx = $_GET['history_idx'];
    $idx = $name = $weight_1 = $count_1 = $weight_2 = $count_2 = $weight_3 = $count_3 = "";

    //DB TABLEから読み出し
    $tblName = "history_tbl";
    $param = 'history_idx ='.$history_idx;
    $tblNameJoin = "item_tbl";
    $on = "history_tbl.item_idx = item_tbl.item_idx";
    $ret = readTbl($tblName, $param, NULL, $tblNameJoin, $on);
    if ($ret != FALSE) {
        foreach ($ret as $value) {
            //var_dump($value);
            $history_idx = $value['history_idx'];
            $date        = $value['date'];
            $name        = $value['name'];
            $weight_1    = $value['weight_1'];
            $count_1     = $value['count_1'];
            $weight_2    = $value['weight_2'];
            $count_2     = $value['count_2'];
            $weight_3    = $value['weight_3'];
            $count_3     = $value['count_3'];
            break;
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
        <p>削除しますか？</p>
    </div>

    <div class="block ml-6 mr-6">
        <form action="history_del_done.php" method="post">
            <input type="hidden" name="history_idx" value="<?php echo $history_idx;?>">

            <div class="field">
                <p>delete と入力してください</p>
                <div class="control">
                    <input class="input is-sucess" type="text" name="key_word">
                </div>
            </div>
            <div class="field is-grouped">
                <a href="<?php echo $strBack; ?>">
                    <span class="button has-background-grey-lighter">戻る</span>
                </a>
                <div class="control ml-6">
                    <input class="button is-danger" type="submit" value="削除実行">
                </div>
            </div>            
        </form>
    </div>

    <br>
    <div class="block ml-6">
        <table class="table" >
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

    <?php include(dirname(__FILE__).'/./header/bulma_burger.js'); ?>
</body>
</html>