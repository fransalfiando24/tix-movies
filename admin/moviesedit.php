<?php
    $sqlm = mysqli_query($kon, "select * from movie where idmovie='$_GET[id]'");
    $rm = mysqli_fetch_array($sqlm);
?>

<h2><a href="<?php echo "?p=movies&st=semua";?>">MOVIES</a></h2>
<button type="button" class="tambah btn btn-dis">Ubah Movie</button>
<br>
<div class="card">
    <div class="kepalacard">Ubah Movie</div>
    <div class="isicard" style="text-align: center;">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="idmovie" value="<?php echo "$rm[idmovie]"; ?>">
            <select name="status" id="status" style="width: 130px; ">
                <?php
                    if($rm["status"] == "Coming Soon"){
                        $CS = " selected";
                    }
                    else{
                        $CS = "";
                    }

                    if($rm["status"] == "Now Playing"){
                        $NP = " selected";
                    }
                    else{
                        $NP = "";
                    }

                    echo "<option value='Coming Soon' $CS>Coming Soon</option>
                    <option value='Now Playing' $NP>Now Playing</option>";
                ?>
                
            </select>

            <input class="text" type="text" name="judul" id="judul" value="<?php echo "$rm[judul]"; ?>"><br>
            <?php
                $sqlg = mysqli_query($kon, "select * from genre where idgenre='$rm[idgenre]'");
                $rg = mysqli_fetch_array($sqlg);
            ?>
            <br>
            <input class="text" type="text" name="genre" disabled value="<?php echo "$rg[namagenre]"; ?>">
            <input class="text" type="text" name="durasi" id="durasi" value="<?php echo "$rm[durasi]"; ?>">
            <input class="text" type="text" name="sutradara" id="sutradara" value="<?php echo "$rm[sutradara]"; ?>">
            <textarea class="textarea" name="pemain" id="pemain"><?php echo "$rm[pemain]"; ?></textarea>
            <textarea class="textarea" name="sinopsis" id="sinopsis"><?php echo "$rm[sinopsis]"; ?></textarea>
            <input class="text" type="text" name="rating" id="rating" value="<?php echo "$rm[rating]"; ?>">
            <textarea class="textarea" name="trailer" id="trailer" ><?php echo "$rm[trailer]"; ?></textarea>
            <img src="<?php echo "../poster/$rm[poster]"?>" alt="" width="100px">
            <input type="file" name="poster" id="poster">
            <input class="submit" type="submit" name="simpan" id="simpan" value="Simpan Movie">
        </form>
    

<?php 
    if($_POST["simpan"]){
        if(!empty($_POST["status"]) and !empty($_POST["judul"]) and !empty($_POST["sutradara"]) and !empty($_POST["pemain"]) and !empty($_POST["sinopsis"])){
            $nmposter = $_FILES["poster"]["name"];
            $lokposter = $_FILES["poster"]["tmp_name"];
            if(!empty($lokposter)){
                move_uploaded_file($lokposter, "../poster/$nmposter");
                $poster = ", poster='$nmposter'";
            }
            else{
                $poster = "";
            }

            $sqlm = mysqli_query($kon, "update movie set status='$_POST[status]', judul='$_POST[judul]', durasi='$_POST[durasi]', sutradara = '$_POST[sutradara]', pemain = '$_POST[pemain]', sinopsis = '$_POST[sinopsis]', rating = '$_POST[rating]', trailer = '$_POST[trailer]'$poster where idmovie='$_POST[idmovie]'");

            if($sqlm){
                echo "Perubahan Movie Berhasil Disimpan";
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