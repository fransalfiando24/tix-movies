<h2>JADWAL TAYANG</h2>
<a href="<?php echo "?p=jadwaladd"; ?>"><button type="button" class="tambah btn btn-add">Tambah Jadwal</button></a>

<br><br>
<?php
    echo "<table width='100%' border='0' cellspacing='3' cellpadding='10'>
            <tr>
                <th>No</th>
                <th>Movie</th>
                <th>Cinema</th>
                <th>Tanggal Tayang</th>
                <th>Jam Tayang</th>
                <th>Aksi</th>
            </tr>";

    $sqlj = mysqli_query($kon, "select * from jadwal order by tglsimpan desc");
    $no = 1;
    while($rj = mysqli_fetch_array($sqlj)){
        $sqlm = mysqli_query($kon, "select * from movie where idmovie='$rj[idmovie]'");
        $rm = mysqli_fetch_array($sqlm);
        $sqlc = mysqli_query($kon, "select * from cinema where idcinema='$rj[idcinema]'");
        $rc = mysqli_fetch_array($sqlc);

        echo "<tr>
                <td>$no</td>
                <td>$rm[judul]</td>
                <td>$rc[namacinema]</td>
                <td>$rj[tgltayang]</td>
                <td>$rj[jamtayang]</td>
                <td>
                    <div class='ubah'><a href='?p=jadwaledit&id=$rj[idjadwal]'>Ubah</a></div>
                    <div class='hapus'><a href='?p=jadwaldel&id=$rj[idjadwal]'>Hapus</a></div>
                </td>
            </tr>";
            $no++;
    }
    echo "</table>";
    // echo "<div class='tambah'><a href='?p=pegawaiadd'>+</a></div>";
?>