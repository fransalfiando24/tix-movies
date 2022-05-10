<?php
    $sqlmem = mysqli_query($kon, "delete from member where idmember = '$_GET[id]'");

    if($sqlmem){
        echo "Member Berhasil dihapus";
    }
    else{
        echo "Gagal menghapus";
    }
    echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=member'>";
?>