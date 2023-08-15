<?php
    // Header部分共通
    require_once(dirname(__FILE__).'/./header/header.php');

    //e()用
    require_once(dirname(__FILE__).'/./common/Encode.php');


    $format = "
    <script>
        setTimeout(function() {
            window.location.href = 'logout.php';
        }, 1*1000);
    </script>";


    $passwd             = e($_POST['passwd']);
    $new_passwd         = e($_POST['new_passwd']);
    $new_passwd_confirm = e($_POST['new_passwd_confirm']);

    $result = "";
    $strAutoText = "";
    $errFlag = true;

    //DB検索:登録しているアカウントか?
    $tblName = "account_tbl";
    $where = "user='".$_SESSION['user']."'";
    $ret = readTbl($tblName, $where, NULL, NULL, NULL);
    if ($ret != FALSE) {
        //ユーザー認証&記録
        foreach ($ret as $value) {
            if (password_verify($passwd, $value['passwd'])) { //パスワードは暗号化しているので
                $errFlag = false;
                $idx = $value['idx'];
            }
            break;
        }   
    }

    //変更するパスワードは大丈夫か?
    if ($errFlag == false) {
        if ($new_passwd != $new_passwd_confirm) {
            $errFlag = TRUE;
            $result = "新しいパスワード が間違っています。";
        }
        else { //パスワードを暗号化する
            $passwd_hash = password_hash($new_passwd, PASSWORD_DEFAULT);
        }
    }
    else {
        $result = "現在のパスワード が間違っています。";
    }

    //DB更新
    if ($errFlag == false) {
        $tblName = "account_tbl";

        //DB TABLEの 要素名:値 になるよう連想配列を作成
        $elementKeyValue = [];
        $elementKeyValue['passwd'] = $passwd_hash;
        $paramKeyValue = [];
        $paramKeyValue['idx'] = $idx;

        if (updateTbl($tblName, $elementKeyValue, $paramKeyValue) == TRUE) {
            $result = "パスワードを変更しました";
            $strAutoText = $format;
        }
        else {
            $result = "パスワードを変更できませんでした。";
        }
    }
?>

<!DOCTYPE html>
<?php include(dirname(__FILE__).'/./header/head_html.php'); ?>
<body>
    <?php echo $strHeader; ?>
    <br>
    <br>
    <div class="block ml-6">
        <p><?php echo $result; ?></p>
    </div>

    <?php echo $strAutoText; ?>

    <?php include(dirname(__FILE__).'/./header/bulma_burger.js'); ?>
</body>
</html>