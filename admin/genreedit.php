<?php
    $sqlg = mysqli_query($kon, "select * from genre where idgenre='$_GET[id]'");
    $rg = mysqli_fetch_array($sqlg);
?>

<h2><a href="<?php echo "?p=genre";?>">GENRE</a></h2>
<button type="button" class="tambah btn btn-dis">Ubah Genre</button>
<br>
<div class="card">
    <div class="kepalacard">Ubah Genre</div>
    <div class="isicard" style="text-align: center;">
        <form action="" method="post" enctype="multipart/form-data">
            <input class="text" type="hidden" name="idgenre" value="<?php echo "$rg[idgenre]";?>">
            <input class="text" type="text" name="namagenre" id="namagenre" value="<?php echo "$rg[namagenre]";?>">
            <textarea class="textarea" name="ketgenre" id="ketgenre" cols="15" rows="8"><?php echo "$rg[ketgenre]";?></textarea>
            <input class="submit" type="submit" name="simpan" id="simpan" value="Simpan Genre">
        </form>
    

<?php 
    if($_POST["simpan"]){
        if(!empty($_POST["namagenre"]) and !empty($_POST["ketgenre"])){
            $sqlg = mysqli_query($kon, "update genre set namagenre='$_POST[namagenre]', ketgenre='$_POST[ketgenre]' where idgenre='$_POST[idgenre]'");

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