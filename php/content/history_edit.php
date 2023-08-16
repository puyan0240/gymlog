<?php
    // Header部分共通
    require_once(dirname(__FILE__).'/./header/header.php');

    
    $history_idx = $_GET['history_idx'];

    //DB TABLEから読み出し
    {
        $weight_1 = $weight_2 = $weight_3 = "";
        $count_1 = $count_2 = $count_3 = "";
    
        $tblName = "history_tbl";
        $param = 'history_idx ='.$history_idx;
        $tblNameJoin = "item_tbl";
        $on = "history_tbl.item_idx = item_tbl.item_idx";
        $ret = readTbl($tblName, $param, NULL, $tblNameJoin, $on);
        if ($ret != FALSE) {
            foreach ($ret as $value) {
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
    }

    //マシン選択
    {
        $format = "
            <option value=\"%d\">%s</option>";
        $strSelectItem = "";


        //DBから読み出し
        $tblName = "item_tbl";
        $ret = readTbl($tblName, NULL, NULL, NULL, NULL);
        if ($ret != FALSE) {
            foreach ($ret as $value) {
                $item_idx = $value['item_idx'];
                $name     = $value['name'];
                $strSelectItem .= sprintf($format, $item_idx, $name);
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
    <div class="block ml-6 mr-6">
        <form action="history_edit_confirm.php" method="POST">
            <div class="field">
                <label class="label">日付</label>
                <div class="control">
                    <input class="input is-sucess" type="text" name="date" required value="<?php echo $date; ?>">
                </div>
            </div>

            <div class="field">
                <label class="label">マシン名</label>
                <div class="control">
                    <div class="select is-success">
                        <select name="item_idx">
                            <?php echo $strSelectItem; ?>

                        </select>
                    </div>
                </div>
            </div>

            <div class="columns">
                <div class="column is-narrow">
                    <label class="label">1回目</label>
                </div>
                <div class="column is-narrow">
                    <input class="input is-sucess" type="text" name="weight_1" required value="<?php echo $weight_1;?>">
                </div>
                <div class="column is-narrow">kg</div>
                <div class="column is-narrow">
                    <input class="input is-sucess" type="text" name="count_1" required value="<?php echo $count_1;?>">
                </div>
                <div class="column is-narrow">回</div>
            </div>

            <div class="columns">
                <div class="column is-narrow">
                    <label class="label">2回目</label>
                </div>
                <div class="column is-narrow">
                    <input class="input is-sucess" type="text" name="weight_2" value="<?php echo $weight_2;?>">
                </div>
                <div class="column is-narrow">kg</div>
                <div class="column is-narrow">
                    <input class="input is-sucess" type="text" name="count_2" value="<?php echo $count_2;?>">
                </div>
                <div class="column is-narrow">回</div>
            </div>

            <div class="columns">
                <div class="column is-narrow">
                    <label class="label">3回目</label>
                </div>
                <div class="column is-narrow">
                    <input class="input is-sucess" type="text" name="weight_3" value="<?php echo $weight_3;?>">
                </div>
                <div class="column is-narrow">kg</div>
                <div class="column is-narrow">
                    <input class="input is-sucess" type="text" name="count_3" value="<?php echo $count_3;?>">
                </div>
                <div class="column is-narrow">回</div>
            </div>

            <br>
            <div class="field is-grouped">
                <div class="control">
                    <input class="button has-background-grey-lighter" type="reset" value="取消">
                </div>
                <div class="control">
                    <input class="button is-success ml-4" type="submit" value="登録確認">
                </div>
            </div>
        </form> 
    </div>

    <?php include(dirname(__FILE__).'/./header/bulma_burger.js'); ?>
</body>
</html>