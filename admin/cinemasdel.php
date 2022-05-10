<?php
    $sqlc = mysqli_query($kon, "delete from cinema where idcinema = '$_GET[id]'");

    if($sqlc){
        echo "Cinema Berhasil dihapus";
    }
    else{
        echo "Gagal menghapus";
    }
    echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=cinemas'>";
?>