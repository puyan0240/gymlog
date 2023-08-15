<?php
    // Header部分共通
    require_once(dirname(__FILE__).'/./header/header.php');

    //e()用
    require_once(dirname(__FILE__).'/./common/Encode.php');


    $name = e($_POST['name']);
    $note = e($_POST['note']);
?>

<!DOCTYPE html>
<html lang="ja">
<?php include(dirname(__FILE__).'/./header/head_html.php'); ?>
<body>
    <?php echo $strHeader; ?>
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

    <div class="block ml-6">
        <form action="item_add_done.php" method="POST">
            <input type="hidden" name="name" value="<?php echo $name; ?>">
            <input type="hidden" name="note" value="<?php echo $note;?>">

            <div class="field is-grouped">
                <div class="control">
                    <input class="button has-background-grey-lighter ml-4" type="button" onclick="history.back()" value="戻る">
                </div>
                <div class="control">
                    <input class="button is-success ml-4" type="submit" value="登録">
                </div>
            </div>
        </form>
    </div>

    <?php include(dirname(__FILE__).'/./header/bulma_burger.js'); ?>
</body>
</html>