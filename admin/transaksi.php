<h2>DATA TRANSAKSI</h2>
<br><br>
<?php
    echo "<table width='100%' border='0' cellspacing='3' cellpadding='10'>
            <tr>
                <th>No</th>
                <th>No Transaksi</th>
                <th>Nama Member</th>
                <th>Cinema</th>
                <th>Judul Movie</th>
                <th>Jam Tayang</th>
                <th>Tanggal Tayang</th>
                <th>No Kursi</th>
                <th>Total Bayar</th>
                <th>Bukti Bayar</th>
                <th>Tanggal Transaksi</th>
            </tr>";

    $sqltrans = mysqli_query($kon, "select * from transaksi order by tgltransaksi desc");
    $no = 1;
    while($rtrans = mysqli_fetch_array($sqltrans)){
        $sqlmem = mysqli_query($kon, "select * from member where idmember='$rtrans[idmember]'");
        $rmem = mysqli_fetch_array($sqlmem);
        $sqlc = mysqli_query($kon, "select * from cinema where idcinema='$rtrans[idcinema]'");
        $rc= mysqli_fetch_array($sqlc);
        $sqlm = mysqli_query($kon, "select * from movie where idmovie='$rtrans[idmovie]'");
        $rm = mysqli_fetch_array($sqlm);
        $sqlj = mysqli_query($kon, "select * from jadwal where idjadwal='$rtrans[idjadwal]'");
        $rj = mysqli_fetch_array($sqlj);

        echo "<tr>
                <td>$no</td>
                <td>$rtrans[notransaksi]</td>
                <td>$rmem[nama]</td>
                <td>$rc[namacinema]</td>
                <td>$rm[judul]</td>
                <td>$rj[jamtayang]</td>
                <td>$rj[tgltayang]</td>
                <td>$rtrans[nokursi]</td>
                <td>$rtrans[totalbayar]</td>
                <td><img src='../buktibayar/$rtrans[buktibayar]' width='70px' height='80px'></td>
                <td>$rtrans[tgltransaksi]</td>
            </tr>";
            $no++;
    }
    echo "</table>";
    // echo "<div class='tambah'><a href='?p=pegawaiadd'>+</a></div>";
?>