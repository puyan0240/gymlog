<?php
    // Header部分共通
    require_once(dirname(__FILE__).'/./header/header.php');
    

    $item_idx = $_GET['item_idx'];

    //DB TABLEから読み出し
    $tblName = "item_tbl";
    $param = 'item_idx ='.$item_idx;
    $ret = readTbl($tblName, $param, NULL, NULL, NULL);
    if ($ret != FALSE) {
        foreach ($ret as $value) {
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
        <p>削除しますか？</p>
    </div>

    <div class="block ml-6 mr-6">
        <form action="item_del_done.php" method="post">
            <input type="hidden" name="item_idx" value="<?php echo $item_idx;?>">

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
        <table class="table">
            <tr>
                <td>マシン名</td>
                <td><?php echo $name; ?></td>
            </tr>
            <tr>
                <td>説明</td>
                <td><?php echo $note; ?></td>
            </tr>
        </table>
    </div>

    <?php include(dirname(__FILE__).'/./header/bulma_burger.js'); ?>
</body>
</html>