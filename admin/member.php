<h2>DATA MEMBER</h2>
<br><br>
<?php
    echo "<table width='100%' border='0' cellspacing='3' cellpadding='10'>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>No Hp</th>
                <th>Tanggal Terdaftar</th>
                <th>Aksi</th>
            </tr>";

    $sqlmem = mysqli_query($kon, "select * from member order by tgldaftar desc");
    $no = 1;
    while($rmem = mysqli_fetch_array($sqlmem)){
        if($rmem["jk"] == "L"){
            $jeniskelamin = "Laki-Laki";
        }
        else if($rmem["jk"] == "P"){
            $jeniskelamin = "Perempuan";
        }
        echo "<tr>
                <td>$no</td>
                <td>$rmem[nama]</td>
                <td>$jeniskelamin</td>
                <td>$rmem[tgllahir]</td>
                <td>$rmem[alamat]</td>
                <td>$rmem[email]</td>
                <td>$rmem[nohp]</td>
                <td>$rmem[tgldaftar]</td>
                <td>
                    <div class='hapus'><a href='?p=memberdel&id=$rmem[idmember]'>Hapus</a></div>
                </td>
            </tr>";
            $no++;
    }
    echo "</table>";
    // echo "<div class='tambah'><a href='?p=pegawaiadd'>+</a></div>";
?>