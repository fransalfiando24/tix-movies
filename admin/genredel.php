<?php
    $sqlg = mysqli_query($kon, "delete from genre where idgenre = '$_GET[id]'");

    if($sqlg){
        echo "Genre Berhasil dihapus";
    }
    else{
        echo "Gagal menghapus";
    }
    echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=genre'>";
?>