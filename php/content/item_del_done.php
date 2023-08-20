<?php
    // Header部分共通
    require_once(dirname(__FILE__).'/./header/header.php');

    //e()用
    require_once(dirname(__FILE__).'/./common/Encode.php');


    //削除キーワードが正しいか?
    {
        if ($_POST['key_word'] == "delete") { //削除用キーワード[delete]
            $deleteFlag = true;
        }
        else {
            $deleteFlag = false;
            $result = "delete 文字が間違っています。";
        }    
    }

    //履歴テーブルで使用されていないか?
    if ($deleteFlag == true) {

        //DB TABLEから読み出し
        $where = "item_idx = ".e($_POST['item_idx']);
        $tblName = "history_tbl";
        $ret = readTbl($tblName, $where, NULL, NULL, NULL);
        if ($ret != FALSE) {
            $deleteFlag = false;
            $result = "削除できません。使用中のマシンです。";
        } 
        else {
            $deleteFlag = true;
        }
    }

    //DBから削除
    if ($deleteFlag == true) {
        //DB TABLEの要素名リスト
        $paramKeyName = ['item_idx'];
        $paramKeyValue = [];

        //DB TABLEの 要素名:値 になるよう連想配列を作成
        foreach ($paramKeyName as $key) {
            $paramKeyValue[$key] = e($_POST[$key]);
        }

        //DB TBLを更新
        $tblName = "item_tbl";
        if (deleteTbl($tblName, $paramKeyValue) == TRUE) {
            $result = "削除しました。";
        } else {
            $result = "削除できませんでした。";
        }
    }
?>

<!DOCTYPE html>
<html lang="ja">
<?php include(dirname(__FILE__).'/./header/head_html.php'); ?>
<body>
    <?php echo $strHeader; ?>
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
        }, 200*1000);
    </script>

    <?php include(dirname(__FILE__).'/./header/bulma_burger.js'); ?>
</body>
</html>