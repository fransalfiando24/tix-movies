<?php
    $sqlmem = mysqli_query($kon, "select * from member where idmember='$_GET[idmem]'");
    $rmem = mysqli_fetch_array($sqlmem);
?>

<div class="loginContainer">
        <form action="" method="post" enctype="multipart/form-data" class="register-form">
        <h1 class="webTitle"><span class="kuning">Tix-</span>Movies</h1><br>
        <div class="fields-register">
            <input type="hidden" name="idmember" value="<?php echo "$rmem[idmember]"?>">
            <input class="text" type="text" name="email" id="email" value="<?php echo "$rmem[email]"?>">
            <input type="text" name="password" placeholder="Password" value="<?php echo "$rmem[password]"?>">
            <input type="text" name="nama" id="nama" placeholder="Nama Lengkap" value="<?php echo "$rmem[nama]"?>"><p>
            <?php
                if($rmem["jk"] === 'L'){
                    $L = " checked";
                } 
                else{
                    $L = "";
                }
                if($rmem["jk"] === 'P'){
                    $P = " checked";
                }
                else{
                    $P = "";
                }
                echo "<input type='radio' name='jk' id='jk' value='L' $L >Laki-Laki";
                echo "<input type='radio' name='jk' id='jk' value='P' $P >Perempuan<p>";
            ?>
            
            <input  type="date" name="tgllahir" id="tgllahir" placeholder="Tanggal Lahir" value="<?php echo "$rmem[tgllahir]"?>">
            <textarea class="textarea" name="alamat" id="alamat" placeholder="Alamat"><?php echo "$rmem[alamat]"?></textarea>
            <input  type="text" name="nohp" id="nohp" placeholder="No Handphone" value="<?php echo "$rmem[nohp]"?>"><br>
            <input class="login-button" type="submit" name="register" id="register" value="SIMPAN PERUBAHAN">
        </div> 
        </form>
        <?php 
    if($_POST["register"]){
        if(!empty($_POST["email"]) and !empty($_POST["password"]) and !empty($_POST["nama"]) and !empty($_POST["jk"]) and !empty($_POST["tgllahir"]) and !empty($_POST["alamat"]) and !empty($_POST["nohp"])){

            $sqlmem = mysqli_query($kon, "update member set email='$_POST[email]', password='$_POST[password]', nama='$_POST[nama]', jk='$_POST[jk]', tgllahir='$_POST[tgllahir]', alamat='$_POST[alamat]', nohp='$_POST[nohp]' where idmember='$_POST[idmember]'");

            if($sqlmem){
                echo "Perubahan Berhasil Disimpan";
            }else{
                echo "Gagal Menyimpan";
            }
            echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=home'>";
        }
        else{
            echo "Isi data dengan Lengkap";
        }
      }
?>

    </div>
</div>
