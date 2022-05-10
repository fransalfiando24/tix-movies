<?php
    $sqlc = mysqli_query($kon, "select * from cinema where idcinema='$_GET[id]'");
    $rc = mysqli_fetch_array($sqlc);
?>


<h2><a href="<?php echo "?p=cinemas";?>">CINEMAS</a></h2>
<button type="button" class="tambah btn btn-dis">Ubah Cinema</button>
<br>
<div class="card">
    <div class="kepalacard">Ubah Cinema</div>
    <div class="isicard" style="text-align: center;">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="idcinema" value="<?php echo "$rc[idcinema]";?>">
            <input class="text" type="text" name="namacinema" value="<?php echo "$rc[namacinema]";?>">
            <input class="text" type="text" name="lokasicinema" value="<?php echo "$rc[lokasicinema]";?>">
            <input class="text" type="text" name="harga" value="<?php echo "$rc[harga]";?>">
            <input class="text" type="text" name="jmlkursikesamping" value="<?php echo "$rc[jmlkursikesamping]";?>">
            <input class="text" type="text" name="jmlkursikebelakang" value="<?php echo "$rc[jmlkursikebelakang]";?>">
            <input class="submit" type="submit" name="simpan" id="simpan" value="Simpan Cinema">
        </form>
    

<?php 
    if($_POST["simpan"]){
        if(!empty($_POST["namacinema"]) and !empty($_POST["lokasicinema"]) and !empty($_POST["jmlkursikesamping"]) and !empty($_POST["jmlkursikebelakang"])){
            $sqlc = mysqli_query($kon, "update cinema set namacinema='$_POST[namacinema]', lokasicinema='$_POST[lokasicinema]', harga='$_POST[harga]', jmlkursikesamping='$_POST[jmlkursikesamping]', jmlkursikebelakang='$_POST[jmlkursikebelakang]' where idcinema='$_POST[idcinema]'");

            if($sqlc){
                echo " Perubahan Cinema Berhasil Disimpan";
            }else{
                echo "Gagal Menyimpan";
            }
            echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=cinemas'>";
        }
        else{
            echo "Isi data dengan Lengkap";
        }
    }
?>
    </div>
</div>