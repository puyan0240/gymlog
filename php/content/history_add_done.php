<?php
    // Header部分共通
    require_once(dirname(__FILE__).'/./header/header.php');

    //e()用
    require_once(dirname(__FILE__).'/./common/Encode.php');

    //登録
    {
        //DB TABLEの要素名リスト
        $keyName = ['date','account_idx', 'item_idx','weight_1','count_1','weight_2','count_2','weight_3','count_3'];
        $keyValue = [];
    
        //DB TABLEの 要素名:値 になるよう連想配列を作成
        foreach ($keyName as $key) {
            if ($key == 'date') {
                $keyValue[$key] = date(e($_POST[$key]));
            } elseif ($key == 'account_idx') {
                $keyValue[$key] = (int)e($_POST[$key]);
            } elseif ($key == 'weight_1' || $key == 'weight_2' || $key == 'weight_3') {
                $value = e($_POST[$key]);
                if ($value == "-")
                    $value = "";
                $keyValue[$key] = (float)$value;
            } elseif ($key == 'count_1' || $key == 'count_2' || $key == 'count_3') {
                $value = e($_POST[$key]);
                if ($value == "-")
                    $value = "";
                $keyValue[$key] = (int)$value;
            } else {
                $keyValue[$key] = e($_POST[$key]);
            }
        }
        
        //var_dump($keyValue);

        //DB TABLEへ書き込み
        $tblName = "history_tbl";
        if (writeTbl($tblName, $keyValue) == TRUE) {
            $result = "登録しました。";
        } else {
            $result = "登録が失敗しました。";
        }
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
        }, 200*1000);
    </script>

    <?php include(dirname(__FILE__).'/./header/bulma_burger.js'); ?>
</body>
</html>