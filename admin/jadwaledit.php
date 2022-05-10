<?php
    $sqlj = mysqli_query($kon, "select * from jadwal where idjadwal='$_GET[id]'");
    $rj = mysqli_fetch_array($sqlj);
?>


<h2><a href="<?php echo "?p=jadwal";?>">JADWAL TAYANG</a></h2>
<button type="button" class="tambah btn btn-dis">Ubah Jadwal Tayang</button>
<br>
<div class="card">
    <div class="kepalacard">Ubah Jadwal Tayang</div>
    <div class="isicard" style="text-align: center;">
        <form action="" method="post" enctype="multipart/form-data">
            <input class="text" type="hidden" name="idjadwal" value="<?php echo "$rj[idjadwal]";?>">
            <?php
                $sqlm = mysqli_query($kon, "select * from movie order by judul asc");
                echo "<select name='idmovie'>";
                echo "<option value=''>Pilih Movie</option>";
                while($rm = mysqli_fetch_array($sqlm)){
                    if($rj["idmovie"] == $rm["idmovie"]){
                        $movie = " selected";
                    }
                    else{
                        $movie = "";
                    }
                    echo "<option value='$rm[idmovie]' $movie>$rm[judul]</option>";
                }
                    echo "</select><br>";
            ?>
            <?php
                $sqlc = mysqli_query($kon, "select * from cinema order by namacinema asc");
                echo "<select name='idcinema'>";
                echo "<option value=''>Pilih Cinema</option>";
                while($rc = mysqli_fetch_array($sqlc)){
                    if($rj["idcinema"] == $rc["idcinema"]){
                        $cinema = " selected";
                    }
                    else{
                        $cinema = "";
                    }
                    echo "<option value='$rc[idcinema]' $cinema>$rc[namacinema]</option>";
                }
                    echo "</select><br>";
            ?>
            <input class="text" type="date" name="tgltayang" value="<?php echo "$rj[tgltayang]"?>">
            <br><br>
             
            <input type="radio" name="jamtayang" value="09:00" <?php if($rj["jamtayang"] == "09:00") echo "checked"?>>09:00
            <input type="radio" name="jamtayang" value="11:30" <?php if($rj["jamtayang"] == "11:30") echo "checked"?>>11:30
            <input type="radio" name="jamtayang" value="13:00" <?php if($rj["jamtayang"] == "13:00") echo "checked"?>>13:00
            <input type="radio" name="jamtayang" value="14:30" <?php if($rj["jamtayang"] == "14:30") echo "checked"?>>14:30
            <input type="radio" name="jamtayang" value="16:00" <?php if($rj["jamtayang"] == "16:00") echo "checked"?>>16:00
            <input type="radio" name="jamtayang" value="17:30" <?php if($rj["jamtayang"] == "17:30") echo "checked"?>>17:30
            <input type="radio" name="jamtayang" value="19:00" <?php if($rj["jamtayang"] == "19:00") echo "checked"?>>19:00
            <input type="radio" name="jamtayang" value="21:30" <?php if($rj["jamtayang"] == "21:30") echo "checked"?>>21:30
            <input type="radio" name="jamtayang" value="23:00" <?php if($rj["jamtayang"] == "23:00") echo "checked"?>>23:00
            <br><br><input class="submit" type="submit" name="simpan" id="simpan" value="Simpan">
        </form>
    

<?php 
    if($_POST["simpan"]){
        if(!empty($_POST["idmovie"]) and !empty($_POST["idcinema"]) and !empty($_POST["tgltayang"]) and !empty($_POST["jamtayang"])){
            $sqlj = mysqli_query($kon, "update jadwal set idmovie='$_POST[idmovie]', idcinema='$_POST[idcinema]', tgltayang='$_POST[tgltayang]', jamtayang='$_POST[jamtayang]' where idjadwal=$_POST[idjadwal]");

            if($sqlj){
                echo "Perubahan Jadwal Tayang Berhasil Disimpan";
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