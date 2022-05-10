<h2>MOVIES</h2>
<a href="<?php echo "?p=moviesadd"; ?>"><button type="button" class="tambah btn btn-add">Tambah Movies</button></a><br><br>
<a href="<?php echo "?p=movies&st=semua"; ?>"><button type="button" class=" tambah btn btn-add">Semua Movies</button></a>
<a href="<?php echo "?p=movies&st=Now Playing"; ?>"><button type="button" class="tambah btn btn-add">Now Playing</button></a>
<a href="<?php echo "?p=movies&st=Coming Soon"; ?>"><button type="button" class="tambah btn btn-add">Coming Soon</button></a>
<br>
<?php 
    if($_GET["st"] == "semua"){
        $status = "";
    }
    else{
        $status = "where status='$_GET[st]'";
    }

    $sqlmo = mysqli_query($kon, "select * from movie $status order by tglmovie desc");
    // while($rm = mysqli_fetch_array($sqlmo)){
        

    // $sqlmo = mysqli_query($kon, "select * from movie order by tglmovie desc");
    while($rm = mysqli_fetch_array($sqlmo)){
        $sqlm = mysqli_query($kon, "select * from movie where idgenre='$rg[idgenre]'");
        $rowm = mysqli_num_rows($sqlm);
        $sqlg = mysqli_query($kon, "select * from genre where idgenre='$rm[idgenre]'");
        $rg = mysqli_fetch_array($sqlg);

        echo "<div class='dh4'>";
         echo "<div class='card'>";
            echo "<div class='kepalacard'>$rm[judul] </div>";
            echo "<div class='isicard' style='text-align:center;'>";
                echo "<br>";
                echo "<big>$rm[status]</big><br><br>
                      <img src='../poster/$rm[poster]' class='poster'><br>
                      <b>$rg[namagenre]</b>
                      <br>Durasi: $rm[durasi] mins
                      <br>Rating : $rm[rating]/10
                      ";
            echo "</div>";
            echo "<div class='kakicard'>";
                    echo "<br><a href='?p=moviesdetail&id=$rm[idmovie]'><button type='button' class='btn btn-add'>Detail Movie</button></a>
                    <a href='?p=moviesedit&id=$rm[idmovie]'><button type='button' class='btn btn-add'>Ubah</button></a> ";
                    echo "<a href='?p=moviesdel&id=$rm[idmovie]'><button type='button' class='btn btn-add'>Hapus</button></a>";
            echo "</div>";
         echo "</div><br>";
        echo "</div>";
    }
?>