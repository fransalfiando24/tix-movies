<h2><a href="<?php echo "?p=genre";?>">GENRE</a></h2>
<button type="button" class="tambah btn btn-dis">Tambah Genre</button>
<br>
<div class="card">
    <div class="kepalacard">Tambah Genre</div>
    <div class="isicard" style="text-align: center;">
        <form action="" method="post" enctype="multipart/form-data">
            <input class="text" type="text" name="namagenre" id="namagenre" placeholder="Nama Genre">
            <textarea class="textarea" name="ketgenre" id="ketgenre" cols="15" rows="8" placeholder="Keterangan Genre"></textarea>
            <input class="submit" type="submit" name="simpan" id="simpan" value="Simpan Genre">
        </form>
    

<?php 
    if($_POST["simpan"]){
        if(!empty($_POST["namagenre"]) and !empty($_POST["ketgenre"])){
            $sqlg = mysqli_query($kon, "insert into genre (idadmin, namagenre, ketgenre, tglgenre) values ('$ra[idadmin]','$_POST[namagenre]','$_POST[ketgenre]', NOW())");

            if($sqlg){
                echo "Genre Berhasil Disimpan";
            }else{
                echo "Gagal Menyimpan";
            }
            echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=genre'>";
        }
        else{
            echo "Isi data dengan Lengkap";
        }
    }
?>
    </div>
</div>