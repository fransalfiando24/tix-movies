
    <?php
        include "menu.php";
    ?>
    <div class="jumbotron">
        <div class="mainText">
            <h1 class="text">Pesan tiket bioskopmu di <span class="kuning">Tix-</span><span>Movies</span></h1>
            <p><span class="kuning">Kapan</span> Saja <span class="kuning">Dimana</span> Saja</p>
            <div class="jumbotron-btn">
                <a href="<?php echo "?p=movies";?>">Pesan tiket</a>
            </div>
        </div>
    </div>
    <div class="movies">
        <div class="movieText">Now Playing</div>
        <div class="nowPlayingMovies">
            <div class="effect">
            <?php
            $sqlmnp = mysqli_query($kon, "select * from movie where status='Now Playing' order by tglmovie desc limit 6");

            while($rmnp = mysqli_fetch_array($sqlmnp)){
                echo "<div class='dh4'>
                    <div class='card effect'>
                        <div class='isicard'>
                            <a href='?p=moviesdetail&id=$rmnp[idmovie]'><img src='poster/$rmnp[poster]' class='poster'></a>
                            <div class=judulPoster>$rmnp[judul]</div>
                        </div>
                    </div>
                </div>";
            }
            ?>
            </div>
            <div class="showmore"><a href="?p=movies">Show More &raquo;</a></div>
        </div>
        
        <div class="movieText">Coming Soon</div>
        <div class="comingSoonMovies">
            <div class="effect2">
        <?php
            $sqlmcs = mysqli_query($kon, "select * from movie where status='Coming Soon' order by tglmovie desc limit 3");

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
    </div>
    <div class="cinemaslogo">
            <img src="img/cinemaxxi.png" alt="" width="78%">
            <img src="img/cgv.png" alt="" width="13%">
    </div>
            
