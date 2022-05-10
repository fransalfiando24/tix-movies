<?php
    $sqlm = mysqli_query($kon, "delete from movie where idmovie = '$_GET[id]'");

    if($sqlm){
        echo "Movie Berhasil dihapus";
    }
    else{
        echo "Gagal menghapus";
    }
    echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=movies'>";
?>