<?php
?>

<!DOCTYPE html>
<html lang="ja">
<?php include('./header/head_html.php'); ?>
<body>
    <header>
        <nav class="navbar">
            <div class="navbar-brand">
                <span class="navbar-item ml-6 is-size-7">ようこそ</span>
            </div>
            <div class="navbar-menu">
        </div>
        </nav>
        <section class="hero is-info is-small">
            <div class="hero-body">
                <h1 class="title ml-6">ジム履歴</h1>
            </div>
        </section>
        <nav class="navbar has-background-info-light">
            <div class="navbar-menu ml-4" id="targetMenu"></div>
        </nav>
    </header>
    <br>

    <div class="block ml-6 mr-6">
        <form action="admin_add_confirm.php" method="POST">
            <div class="field">
                <label class="label">管理者名</label>
                <div class="control">
                    <input class="input is-sucess" type="text" name="user" required>
                </div>
            </div>
            <div class="field">
                <label class="label">パスワード</label>
                <div class="control">
                    <input class="input is-sucess" type="password" name="passwd" required>
                </div>
            </div>
            <div class="field">
                <label class="label">パスワード(確認用)</label>
                <div class="control">
                    <input class="input is-sucess" type="password" name="passwd_confirm" required>
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <input class="button has-background-grey-lighter" type="reset" value="取消">
                </div>
                <div class="control">
                    <input class="button is-success ml-4" type="submit" value="登録確認">
                </div>
            </div>
        </form> 
    </div>
</body>
</html>