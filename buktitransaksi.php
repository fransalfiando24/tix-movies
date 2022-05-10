<?php
    $sqlt = mysqli_query($kon, "select * from transaksi where idjadwal='$_GET[idj]' and nokursi='$_GET[kursi]'");
    $rt = mysqli_fetch_array($sqlt);

    $sqlc = mysqli_query($kon, "select * from cinema where idcinema='$rt[idcinema]'");
    $rc = mysqli_fetch_array($sqlc);

    $sqlm = mysqli_query($kon, "select * from movie where idmovie='$rt[idmovie]'");
    $rm = mysqli_fetch_array($sqlm);

    $sqlj = mysqli_query($kon, "select * from jadwal where idjadwal='$_GET[idj]'");
    $rj = mysqli_fetch_array($sqlj);

        echo "<div class='dh12'>";
            echo "<div class='card buktitransaksi'>";
                echo "<div class='kepalacard'>No Transaksi $rt[notransaksi] </div>";
                    echo "<div class='isicard' style='text-align:center;'>";
                        echo "<br>";
                        echo "
                            <div class='detailtransaksi'>
                                <big>$rc[namacinema] $rc[lokasicinema]</big>
                                <br><b>Judul</b>: $rm[judul] 
                                <br><b>Tanggal Tayang </b>: $rj[tgltayang]
                                <br><b>Jam Tayang</b> : $rj[jamtayang]
                                <br><b>No Kursi</b> : $rt[nokursi]

                                <br><br><b>Total Bayar</b> : $rt[totalbayar]
                                <br><b>Tanggal Transaksi</b> : $rt[tgltransaksi]
                                <br><br><p><i>Silahkan gunakan No Transaksi diatas untuk mencetak tiket di $rc[namacinema] $rc[lokasicinema]</i></p>
                                <a href='?p=home'><button type='button' class='btn btn-add'>Kembali ke Home</button></a>
                                <a href='javascript:window.print()'><button type='button' class='btn btn-add'>Cetak</button></a>

                                ";  
                        echo "</div><br>";
                    echo "</div>";
            echo "</div>";
        echo "</div>";
    
?>