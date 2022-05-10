<h2><a href="<?php echo "?p=movies&st=semua";?>">MOVIES</a></h2>
<a href="<?php echo "?p=moviesadd"; ?>"><button type="button" class="tambah btn btn-dis">Detail Movie</button></a>

<br>
<?php 
    $sqlm = mysqli_query($kon, "select * from movie where idmovie='$_GET[id]'");
    $rm = mysqli_fetch_array($sqlm);
        $sqlg = mysqli_query($kon, "select * from genre where idgenre='$rm[idgenre]'");
        $rg = mysqli_fetch_array($sqlg);

        echo "<div class='dh12'>";
         echo "<div class='card'>";
            echo "<div class='kepalacard'>$rm[judul] </div>";
            echo "<div class='isicard' style='text-align:center;'>";
                echo "<br>";
                echo "<big>$rm[status]</big><br><br>
                      <img src='../poster/$rm[poster]' class='posterdetail'>
                      <div class='detail'>
                        <big>$rg[namagenre]</big>
                        <br> <b>Durasi</b>: $rm[durasi] mins
                        <br> <b>Sutradara</b> : $rm[sutradara]
                        <br> <b>Pemeran</b> : $rm[pemain]
                        <br> <b>Sinopsis</b> : <br> $rm[sinopsis]
                        <br> <b>Rating</b> : $rm[rating]/10
                        <hr><small><i>Ditambahkan pada $rm[tglmovie] WIB 
                        <br>Oleh $ra[namalengkap]</i></small>
                       </div";
            echo "</div>";
            echo "<div class='kakicard'>";
                    echo "<br>
                    <a href='?p=moviesedit&id=$rm[idmovie]'><button type='button' class='btn btn-add'>Ubah Movie</button></a> ";
                    echo "<a href='?p=moviesdel&id=$rm[idmovie]'><button type='button' class='btn btn-add'>Hapus</button></a>";
            echo "</div>";
         echo "</div><br>";
        echo "</div>";
?>