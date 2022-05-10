<h2><a href="<?php echo "?p=cinemas";?>">CINEMAS</a></h2>
<button type="button" class="tambah btn btn-dis">Tambah Cinema</button>
<br>
<div class="card">
    <div class="kepalacard">Tambah Cinema</div>
    <div class="isicard" style="text-align: center;">
        <form action="" method="post" enctype="multipart/form-data">
            <input class="text" type="text" name="namacinema" placeholder="Nama Cinema">
            <input class="text" type="text" name="lokasicinema" placeholder="Lokasi Cinema">
            <input class="text" type="text" name="harga" placeholder="Harga Tiket">
            <input class="text" type="text" name="jmlkursikesamping" placeholder="Jumlah Kursi ke Samping">
            <input class="text" type="text" name="jmlkursikebelakang" placeholder="Jumlah Kursi ke Belakang">
            <input class="submit" type="submit" name="simpan" id="simpan" value="Simpan Cinema">
        </form>
    

<?php 
    if($_POST["simpan"]){
        if(!empty($_POST["namacinema"]) and !empty($_POST["lokasicinema"]) and !empty($_POST["harga"]) and !empty($_POST["jmlkursikesamping"]) and !empty($_POST["jmlkursikebelakang"])){
            $sqlc = mysqli_query($kon, "insert into cinema (idadmin, namacinema, lokasicinema, harga, jmlkursikesamping, jmlkursikebelakang, tglcinema) values ('$ra[idadmin]','$_POST[namacinema]','$_POST[lokasicinema]', '$_POST[harga]', '$_POST[jmlkursikesamping]', '$_POST[jmlkursikebelakang]', NOW())");

            if($sqlc){
                echo "Cinema Berhasil Disimpan";
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