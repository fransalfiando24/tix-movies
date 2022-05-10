<h2><a href="<?php echo "?p=jadwal";?>">JADWAL TAYANG</a></h2>
<button type="button" class="tambah btn btn-dis">Tambah Jadwal Tayang</button>
<br>
<div class="card">
    <div class="kepalacard">Tambah Jadwal Tayang</div>
    <div class="isicard" style="text-align: center;">
        <form action="" method="post" enctype="multipart/form-data">
            <?php
                $sqlm = mysqli_query($kon, "select * from movie where status='Now Playing' order by judul asc");
                echo "<select name='idmovie'>";
                echo "<option value=''>Pilih Movie</option>";
                while($rm = mysqli_fetch_array($sqlm)){
                    echo "<option value='$rm[idmovie]'>$rm[judul]</option>";
                }
                    echo "</select><br>";
            ?>
            <?php
                $sqlc = mysqli_query($kon, "select * from cinema order by namacinema asc");
                echo "<select name='idcinema'>";
                echo "<option value=''>Pilih Cinema</option>";
                while($rc = mysqli_fetch_array($sqlc)){
                    echo "<option value='$rc[idcinema]'>$rc[namacinema]</option>";
                }
                    echo "</select><br>";
            ?>
            <input class="text" type="date" name="tgltayang">
            <br><br>
            <input type="radio" name="jamtayang" value="09:00">09:00
            <input type="radio" name="jamtayang" value="11:30">11:30
            <input type="radio" name="jamtayang" value="13:00">13:00
            <input type="radio" name="jamtayang" value="14:30">14:30
            <input type="radio" name="jamtayang" value="16:00">16:00
            <input type="radio" name="jamtayang" value="17:30">17:30
            <input type="radio" name="jamtayang" value="19:00">19:00
            <input type="radio" name="jamtayang" value="21:30">21:30
            <input type="radio" name="jamtayang" value="23:00">23:00
            <br><br><input class="submit" type="submit" name="simpan" id="simpan" value="Simpan">
        </form>
    

<?php 
    if($_POST["simpan"]){
        if(!empty($_POST["idmovie"]) and !empty($_POST["idcinema"]) and !empty($_POST["tgltayang"]) and !empty($_POST["jamtayang"])){
            $sqlj = mysqli_query($kon, "insert into jadwal (idmovie, idcinema, tgltayang, jamtayang, tglsimpan) values ('$_POST[idmovie]', '$_POST[idcinema]','$_POST[tgltayang]','$_POST[jamtayang]', NOW())");

            if($sqlj){
                echo "Jadwal Tayang Berhasil Disimpan";
            }else{
                echo "Gagal Menyimpan";
            }
            echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=jadwal'>";
        }
        else{
            echo "Isi data dengan Lengkap";
        }
    }
?>
    </div>
</div>