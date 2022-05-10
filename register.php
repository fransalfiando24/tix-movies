<div class="loginContainer">
        <form action="" method="post" enctype="multipart/form-data" class="register-form">
        <h1 class="webTitle"><span class="kuning">Tix-</span>Movies</h1><br>
        <div class="fields-register">
        <input class="text" type="text" name="email" id="email" placeholder="Email">
            <input type="text" name="password" placeholder="Password">
            <input type="text" name="nama" id="nama" placeholder="Nama Lengkap"><p>
            <input type="radio" name="jk" id="jk" value="L">Laki-Laki
            <input type="radio" name="jk" id="jk" value="P">Perempuan<p>
            <input  type="date" name="tgllahir" id="tgllahir" placeholder="Tanggal Lahir">
            <textarea class="textarea" name="alamat" id="alamat" placeholder="Alamat"></textarea>
            <input  type="text" name="nohp" id="nohp" placeholder="No Handphone"><br>
            <input class="login-button" type="submit" name="register" id="register" value="REGISTER">
        </div> 
        </form>
        <?php 
    if($_POST["register"]){
        if(!empty($_POST["email"]) and !empty($_POST["password"]) and !empty($_POST["nama"]) and !empty($_POST["jk"]) and !empty($_POST["tgllahir"]) and !empty($_POST["alamat"]) and !empty($_POST["nohp"])){

            $sqlmem = mysqli_query($kon, "insert into member (email, password, nama, jk, tgllahir, alamat, nohp, tgldaftar) values ('$_POST[email]', '$_POST[password]', '$_POST[nama]', '$_POST[jk]', '$_POST[tgllahir]', '$_POST[alamat]', '$_POST[nohp]', NOW())");

            if($sqlmem){
                echo "Berhasil Register";
            }else{
                echo "Gagal Menyimpan";
            }
            echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=login'>";
        }
        else{
            echo "Isi data dengan Lengkap";
        }
      }
?>

    </div>
</div>
