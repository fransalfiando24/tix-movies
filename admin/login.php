<div class="login">
            <form class="login-form" action="" method="post" enctype="multipart/form-data">
                <img src="../img/avatar.png" width="120px">
                <div class="titleLogin">ADMIN</div>
                <div class="fields">
                <input id="username" type="text" name="username" placeholder="Username">
                <input id="password"  type="password" name="password" placeholder="Password">
                </div>
            <input type="submit" name="login" value="LOGIN" class="login-button">
            

        <?php 
        if($_POST["login"]){
            $sqla = mysqli_query($kon, "select * from admin where username='$_POST[username]' and password='$_POST[password]'");
            $ra = mysqli_fetch_array($sqla);
            $row = mysqli_num_rows($sqla);
            if($row > 0){
                session_start();
                $_SESSION["useradm"] = $ra["username"];
                $_SESSION["passadm"] = $ra["password"];
                echo "<div align='center'>Login Berhasil</div>";
            }
            else{
                echo "<div align='center'>Login Gagal</div>";
            }
            echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=home'>";
        }
    ?>
    </form>
</div>