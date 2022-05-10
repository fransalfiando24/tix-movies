<?php
    include "menu.php";
?>
<div class="Movies">
        <div class="moviesText">Now Playing</div>
        <div class="nowPlayingMovies">
            <?php
            $sqlmnp = mysqli_query($kon, "select * from movie where status='Now Playing' order by tglmovie desc");

            while($rmnp = mysqli_fetch_array($sqlmnp)){
                echo "<div class='dh4'>
                    <div class='card'>
                        <div class='isicard'>
                            <a href='?p=moviesdetail&id=$rmnp[idmovie]'><img src='poster/$rmnp[poster]' class='poster'></a>
                            <div class=judulPoster>$rmnp[judul]</div>
                        </div>
                    </div>
                </div>";
            }
            ?>
        </div>
        
        <div class="moviesText">Coming Soon</div>
        <div class="comingSoonMovies">
        <?php
            $sqlmcs = mysqli_query($kon, "select * from movie where status='Coming Soon' order by tglmovie desc");

            while($rmcs = mysqli_fetch_array($sqlmcs)){
                echo "<div class='dh4'>
                    <div class='card'>
                        <div class='isicard'>
                            <a href='?p=moviesdetail&id=$rmcs[idmovie]'><img src='poster/$rmcs[poster]' class='poster'></a>
                            <div class=judulPoster>$rmcs[judul]</div>
                        </div>
                    </div>
                </div>";
            }
            ?>
        </div>
    </div>