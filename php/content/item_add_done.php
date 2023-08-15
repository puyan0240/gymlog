<?php
    // Header部分共通
    require_once(dirname(__FILE__).'/./header/header.php');

    //e()用
    require_once(dirname(__FILE__).'/./common/Encode.php');


    //２重登録の確認
    {
        $errFlag = FALSE;      
        $name = e($_POST['name']);

        //DB検索
        $tblName = "item_tbl";
        $where   = "name='".$name."'";
        $ret = readTbl($tblName, $where, NULL, NULL, NULL);
        if ($ret != FALSE) {
            $errFlag = TRUE;
            $result = "マシン名:".$name." は、既に登録されています。";
        }
    }

    //登録
    if ($errFlag == FALSE) {
        //DB TABLEの要素名リスト
        $keyName = ['name','note'];
        $keyValue = [];
    
        //DB TABLEの 要素名:値 になるよう連想配列を作成
        foreach ($keyName as $key) {
            $keyValue[$key] = e($_POST[$key]);
        }
        
        //DB TABLEへ書き込み
        $tblName = "item_tbl";
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
        <a href="item_list.php">マシン管理へ</a>
    </div>
    <script>
        setTimeout(function() {
            window.location.href = "item_list.php";
        }, 2*1000);
    </script>

    <?php include(dirname(__FILE__).'/./header/bulma_burger.js'); ?>
</body>
</html>