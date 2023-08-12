<?php
    require_once 'DbManager.php';

    $tblName = "history_book_tbl";


    //ログイン中の判定
    {
        session_start();
        session_regenerate_id(true); //認証IDを変更(乗っ取り対策)
        if (isset($_SESSION['login']) == false)
        {
            header('Location:login.php');
            exit();
        }
    }

    //権限によって表示を切り替える
    {
        $format = "
                    <a class=\"navbar-item has-text-link\" href=\"branch.php?bt_type=%s\">
                        <span>%s</span>
                    </a>";
        $strAdmin = "";
        $strManager = "";
        if ($_SESSION['admin'] == 1) {
            $strAdmin = $strAdmin.sprintf($format, "bt_data", "データ管理");
        }
        if ($_SESSION['manager'] == 1) {
            #$strManager = '<input type="submit" name="bt_account" value="アカウント管理">';
            $strManager = $strManager.sprintf($format, "bt_account", "アカウント管理");
        }
    }

    //Header作成
    {
        ob_start();
        include('header_html.php');
        $strHeader = ob_get_contents();
        ob_end_clean();
    }
?>