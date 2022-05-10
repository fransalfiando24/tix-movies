<h2>CINEMAS</h2>
<a href="<?php echo "?p=cinemasadd"; ?>"><button type="button" class="tambah btn btn-add">Tambah Cinema</button></a>

<br>
<?php 
    $sqlc = mysqli_query($kon, "select * from cinema order by namacinema asc");
    while($rc = mysqli_fetch_array($sqlc)){
        $harga = number_format($rc["harga"]);
        echo "<div class='dh3'>";
         echo "<div class='card'>";
            echo "<div class='kepalacard'>$rc[namacinema] - $rc[lokasicinema]</div>";
            echo "<div class='isicard' style='text-align:center;'>";
                echo "<br>";
                echo "<big>Harga tiket : Rp $harga</big>
                      <hr><small><i>Ditambahkan pada $rc[tglcinema] WIB 
                      <br>Oleh $ra[namalengkap]</i></small>";
            echo "</div>";
            echo "<div class='kakicard'>";
                    echo "<br><a href='?p=cinemasedit&id=$rc[idcinema]'><button type='button' class='btn btn-add'>Ubah Cinema</button></a> ";
                    echo "<a href='?p=cinemasdel&id=$rc[idcinema]'><button type='button' class='btn btn-add'>Hapus Cinema</button></a>";
            echo "</div>";
         echo "</div><br>";
        echo "</div>";
    }
?>