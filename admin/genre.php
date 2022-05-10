<h2>GENRE</h2>
<a href="<?php echo "?p=genreadd"; ?>"><button type="button" class="tambah btn btn-add">Tambah Genre</button></a>

<br>
<?php 
    $sqlg = mysqli_query($kon, "select * from genre order by namagenre asc");
    while($rg = mysqli_fetch_array($sqlg)){
        $sqlm = mysqli_query($kon, "select * from movie where idgenre='$rg[idgenre]'");
        $rowm = mysqli_num_rows($sqlm);

        echo "<div class='dh3'>";
         echo "<div class='card'>";
            echo "<div class='kepalacard'>$rg[namagenre] <div class='badge'>$rowm</div></div>";
            echo "<div class='isicard' style='text-align:center;'>";
                echo "<br>";
                echo "$rg[ketgenre]
                      <hr><small><i>Ditambahkan pada $rg[tglgenre] WIB 
                      <br>Oleh $ra[namalengkap]</i></small>";
            echo "</div>";
            echo "<div class='kakicard'>";
                    echo "<br><a href='?p=genreedit&id=$rg[idgenre]'><button type='button' class='btn btn-add'>Ubah Genre</button></a> ";
                    echo "<a href='?p=genredel&id=$rg[idgenre]'><button type='button' class='btn btn-add'>Hapus Genre</button></a>";
            echo "</div>";
         echo "</div><br>";
        echo "</div>";
    }
?>