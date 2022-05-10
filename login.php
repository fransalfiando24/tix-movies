<div class="loginContainer">
            <form class="login-form" action="" method="post" enctype="multipart/form-data">
            <h1 class="webTitle"><span class="kuning">Tix-</span>Movies</h1><br>
            <img src="img/avatar.png" width="120px">
                <div class="fields">
                <input id="username" type="text" name="email" placeholder="Email">
                <input id="password"  type="password" name="password" placeholder="Password">
                </div>
            <input type="submit" name="login" value="LOGIN" class="login-button"><br>
            <p>Belum terdaftar? <a href="?p=register">Register</a> Disini</p>

        <?php 
        if($_POST["login"]){
            $sqla = mysqli_query($kon, "select * from member where email='$_POST[email]' and password='$_POST[password]'");
            $ra = mysqli_fetch_array($sqla);
            $row = mysqli_num_rows($sqla);
            if($row > 0){
                session_start();
                $_SESSION["usermem"] = $ra["email"];
                $_SESSION["passmem"] = $ra["password"];
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