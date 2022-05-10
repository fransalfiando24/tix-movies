<h2><a href="<?php echo "?p=movies&st=semua";?>">MOVIES</a></h2>
<button type="button" class="tambah btn btn-dis">Tambah Movie</button>
<br>
<div class="card">
    <div class="kepalacard">Tambah Movie</div>
    <div class="isicard" style="text-align: center;">
        <form action="" method="post" enctype="multipart/form-data">
            <select name="status" id="status" style="width: 130px; ">
                <option value="">Status</option>
                <option value="Coming Soon">Coming Soon</option>
                <option value="Now Playing">Now Playing</option>
            </select>
            <input class="text" type="text" name="judul" id="judul" placeholder="Judul Movie"><br>
            <?php
                $sqlg = mysqli_query($kon, "select * from genre order by namagenre asc");
                echo "<select name='idgenre'>";
                echo "<option value=''>Genre</option>";
                while($rg = mysqli_fetch_array($sqlg)){
                    echo "<option value='$rg[idgenre]'>$rg[namagenre]</option>";
                }
                    echo "</select><br>";
            ?>
            <input class="text" type="text" name="durasi" id="durasi" placeholder="Durasi (mins)">
            <input class="text" type="text" name="sutradara" id="sutradara" placeholder="Sutradara">
            <textarea class="textarea" name="pemain" id="pemain" placeholder="Pemain"></textarea>
            <textarea class="textarea" name="sinopsis" id="sinopsis" placeholder="Sinopsis"></textarea>
            <input class="text" type="text" name="rating" id="rating" placeholder="Rating">
            <textarea class="textarea" name="trailer" id="trailer" placeholder="Trailer (Link Embeed)"></textarea>
            <input type="file" name="poster" id="poster">
            <input class="submit" type="submit" name="simpan" id="simpan" value="Simpan Movie">
        </form>
    

<?php 
    if($_POST["simpan"]){
        if(!empty($_POST["idgenre"]) and !empty($_POST["status"]) and !empty($_POST["judul"]) and !empty($_POST["sutradara"]) and !empty($_POST["pemain"]) and !empty($_POST["sinopsis"])){
            $nmposter = $_FILES["poster"]["name"];
            $lokposter = $_FILES["poster"]["tmp_name"];
            if(!empty($lokposter)){
                move_uploaded_file($lokposter, "../poster/$nmposter");
            }

            $sqlm = mysqli_query($kon, "insert into movie (idgenre, idadmin, status, judul, durasi, sutradara, pemain, sinopsis, rating, trailer, poster, tglmovie) values ('$_POST[idgenre]','$ra[idadmin]', '$_POST[status]', '$_POST[judul]', '$_POST[durasi]', '$_POST[sutradara]', '$_POST[pemain]', '$_POST[sinopsis]', '$_POST[rating]', '$_POST[trailer]', '$nmposter', NOW())");

            if($sqlm){
                echo "Movie Berhasil Disimpan";
            }else{
                echo "Gagal Menyimpan";
            }
            echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=movies&st=semua'>";
        }
        else{
            echo "Isi data dengan Lengkap";
        }
    }
?>
    </div>
</div>