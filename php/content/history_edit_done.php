<?php
    // Header部分共通
    require_once(dirname(__FILE__).'/./header/header.php');

    //e()用
    require_once(dirname(__FILE__).'/./common/Encode.php');


    $result = "失敗しました。";

    //DB TABLEの要素名リスト
    $elementKeyName = ['date','item_idx', 'weight_1', 'count_1', 'weight_2', 'count_2', 'weight_3', 'count_3'];
    $elementKeyValue = [];
    $paramKeyName = ['history_idx'];
    $paramKeyValue = [];

    //DB TABLEの 要素名:値 になるよう連想配列を作成
    foreach ($elementKeyName as $key) {
        $elementKeyValue[$key] = e($_POST[$key]);
    }
    foreach ($paramKeyName as $key) {
        $paramKeyValue[$key] = e($_POST[$key]);
    }

    //DB TBLを更新
    $tblName = "history_tbl";
    if (updateTbl($tblName, $elementKeyValue, $paramKeyValue) == TRUE) {
        $result = "更新しました。";
    }
?>

<!DOCTYPE html>
<html lang="ja">
<?php include(dirname(__FILE__).'/./header/head_html.php'); ?>
<body>
    <?php echo $strHeader; ?>
    <br>
    <br>
    <div class="block ml-6">
        <p><?php echo $result; ?></p>
    </div>
    <div class="block ml-6">
        <a href="history_list.php">一覧表示へ</a>
    </div>
    <script>
        setTimeout(function() {
            window.location.href = "history_list.php";
        }, 2*1000);
    </script>

    <?php include(dirname(__FILE__).'/./header/bulma_burger.js'); ?>
</body>
</html>