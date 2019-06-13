<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="bm_list_view.php">アンケート一覧</a>　
            <?php if($_SESSION["kanri_flg"]=="1"){ ?>
            <a class="navbar-brand" href="user_add.php">ユーザー登録</a>　
            <a class="navbar-brand" href="user_list_view.php">ユーザー一覧</a>
            <?php } ?>
            <a class="navbar-brand" href="logout.php">ログアウト</a>
        </div>
    </div>
</nav>