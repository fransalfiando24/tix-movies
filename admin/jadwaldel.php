<?php
    $sqlj = mysqli_query($kon, "delete from jadwal where idjadwal = '$_GET[id]'");

    if($sqlj){
        echo "Jadwal Berhasil dihapus";
    }
    else{
        echo "Gagal menghapus";
    }
    echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=jadwal'>";
?>