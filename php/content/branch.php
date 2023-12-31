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

//一覧表示分岐
if (isset($_GET['history_edit_type'])) {
    $type = $_GET['history_edit_type'];

    if ($type == 'result')
        header('Location:history_result.php?date='.$_GET['date']);
    elseif ($type == 'detail')
        header('Location:history_detail.php?history_idx='.$_GET['history_idx']);
    elseif ($type == "edit")
        header('Location:history_edit.php?history_idx='.$_GET['history_idx']);
    else if ($type == "clr")
        header('Location:history_del_confirm.php?history_idx='.$_GET['history_idx']);
    exit();
}

//マシン管理分岐
if (isset($_GET['item_edit_type'])) {
    $edit_type = $_GET['item_edit_type'];

    if ($edit_type == "edit")
        header('Location:item_edit.php?item_idx='.$_GET['item_idx']);
    else if ($edit_type == "clr")
        header('Location:item_del_confirm.php?item_idx='.$_GET['item_idx']);
    exit();
}

//アカウント管理分岐
if (isset($_GET['account_edit_type'])) {
    $type = $_GET['account_edit_type'];

    if ($type == "edit")
        header('Location:account_edit.php?account_idx='.$_GET['account_idx']);
    else if ($type == "clr")
        header('Location:account_del_confirm.php?account_idx='.$_GET['account_idx']);
    else if ($type == "passwd_clr")
        header('Location:account_passwd_clr_confirm.php?account_idx='.$_GET['account_idx']);

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



?>