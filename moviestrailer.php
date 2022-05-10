<?php
    $sqlm = mysqli_query($kon, "select * from movie where idmovie='$_GET[id]'");
    $rm = mysqli_fetch_array($sqlm);

    echo "<div class='movieTrailer'>";
        echo "$rm[trailer]";
    echo "</div>";
?>