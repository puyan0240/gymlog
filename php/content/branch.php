<?php
//ヘッダーメニューからの移動先
if (isset($_GET['menu'])) {
    $bt_type = $_GET['menu'];

    if ($bt_type == 'history_list')
        header('Location:history_list.php');
    elseif ($bt_type == 'search')
        header('Location:search.php');
    elseif ($bt_type == 'item_list')
        header('Location:item_list.php');
    elseif ($bt_type == 'account_list')
        header('Location:account_list.php');

    exit();
}

if (isset($_GET['edit_type'])) {
    $edit_type = $_GET['edit_type'];

    if ($edit_type == "disp")
        header('Location:disp.php?idx='.$_GET['idx']);
    else if ($edit_type == "edit")
        header('Location:edit.php?idx='.$_GET['idx']);
    else if ($edit_type == "clr")
        header('Location:del_confirm.php?idx='.$_GET['idx']);
    exit();
}
//
if (isset($_POST['bt_add_account'])) {
    header('Location:account_add.php');
    exit();
}
if (isset($_GET['account_edit_type'])) {
    $edit_type = $_GET['account_edit_type'];

    if ($edit_type == "edit")
        header('Location:account_edit.php?idx='.$_GET['idx']);
    else if ($edit_type == "clr")
        header('Location:account_del_confirm.php?idx='.$_GET['idx']);
    else if ($edit_type == "passwd_clr")
        header('Location:account_passwd_clr_confirm.php?idx='.$_GET['idx']);

    exit();
}


?>