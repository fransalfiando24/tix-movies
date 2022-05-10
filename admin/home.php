<div class="grid">
    <!-- Untuk Cinemas -->
    <?php
        $sqlc = mysqli_query($kon, "select * from cinema");
        $rowc = mysqli_num_rows($sqlc);
        $sqlcl = mysqli_query($kon, "select * from cinema order by tglcinema desc limit 2");
    ?>
    <div class="dh4">
        <div id="boxval">
            <img src="../img/movie.png" alt="" class="icon">
            <p style="margin-left: -5px;">Cinemas</p>
            <h3><?php echo "$rowc"; ?></h3>
        </div>
        <div class="card">
            <div class="kepalacard">Cinema Terbaru</div>
            <div class="isicard">
                <?php
                    if($rowc == 0){
                        echo "Belum ada cinema ditambahkan";
                    }
                    else{
                        echo "<br>";
                        while($rcl = mysqli_fetch_array($sqlcl)){
                            echo "<big>$rcl[namacinema]</big>
                                <br>$rcl[lokasicinema]        
                                <hr>";
                        }
                    }
                ?>
            </div>
            <div class="kakicard">
                <a href="<?php echo "?p=cinemas";?>"><button type="button" class="btn btn-add">Lihat Semua Cinemas &raquo;</button></a>
            </div>
        </div>
        <br>
    </div>

    <!-- Untuk Movies -->
    <?php
        $sqlm = mysqli_query($kon, "select * from movie");
        $rowm = mysqli_num_rows($sqlm);
        $sqlml = mysqli_query($kon, "select * from movie order by tglmovie desc limit 1");
    ?>
    <div class="dh4">
        <div id="boxval">
            <img src="../img/movie2.png" alt="" class="icon">
            <p style="margin-left: -5px;">Movies</p>
            <h3><?php echo "$rowm"; ?></h3>
        </div>
        <div class="card">
            <div class="kepalacard">Movie Terbaru</div>
            <div class="isicard " style="text-align: center;">
                <?php
                    if($rowm == 0){
                        echo "<div align='center'>Belum ada movie ditambahkan</div>";
                    }
                    else{
                        while($rml = mysqli_fetch_array($sqlml)){
                            $sqlgm = mysqli_query($kon, "select * from genre where idgenre = $rml[idgenre]");
                            $rgm = mysqli_fetch_array($sqlgm);

                            echo "<br>";
                            echo "<img src='../poster/$rml[poster]' width='50px'> ";
                            echo "<br>";
                            echo "<b>$rml[judul]</b>";
                            echo "<br>$rgm[namagenre]";
                            echo "<hr><br>";
                        }
                    }
                ?>
            </div>
            <div class="kakicard">
                <a href="<?php echo "?p=movies&st=semua";?>"><button type="button" class="btn btn-add">Lihat Semua Movie &raquo;</button></a>
            </div>
        </div>
        <br>
    </div>
    
    <!-- Untuk Genre -->
    <?php
        $sqlg = mysqli_query($kon, "select * from genre");
        $rowg = mysqli_num_rows($sqlg);
        $sqlgl = mysqli_query($kon, "select * from genre order by tglgenre desc limit 4");
    ?>
    <div class="dh4">
        <div id="boxval">
            <img src="../img/movie3.png" alt="" class="icon">
            <p style="margin-left: -5px;">Genre</p>
            <h3><?php echo "$rowg"; ?></h3>
        </div>
        <div class="card">
            <div class="kepalacard">Genre Terbaru</div>
            <div class="isicard">
                <?php
                    if($rowg == 0){
                        echo "<hr>";
                        echo "<div align='center'>Belum ada genre ditambahkan</div>";
                        echo "<hr>";
                    }
                    else{
                        echo "<br>";
                        while($rgl = mysqli_fetch_array($sqlgl)){
                            echo "<b>$rgl[namagenre]</b>";
                            echo "<hr>";
                        }
                    }
                ?>
            </div>
            <div class="kakicard">
                <a href="<?php echo "?p=genre";?>"><button type="button" class="btn btn-add">Lihat Semua Genre &raquo;</button></a>
            </div>
        </div>
        <br>
    </div>

    <!-- Untuk Jadwal Tayang -->
    <?php
        $sqlj = mysqli_query($kon, "select * from jadwal");
        $rowj = mysqli_num_rows($sqlj);
        $sqljl = mysqli_query($kon, "select * from jadwal order by tglsimpan desc limit 1");
    ?>
    <div class="dh4">
        <div id="boxval">
            <img src="../img/movie4.png" alt="" class="icon">
            <p style="margin-left: -5px;">Jadwal</p>
            <h3><?php echo "$rowj"; ?></h3>
        </div>
        <div class="card">
            <div class="kepalacard">Jadwal Tayang Terbaru</div>
            <div class="isicard">
                <?php
                    if($rowj == 0){
                        echo "<hr>";
                        echo "<div align='center'>Belum ada jadwal tayang yang masuk</div>";
                        echo "<hr>";
                    }
                    else{
                        echo "<hr>";
                        while($rjl = mysqli_fetch_array($sqljl)){
                            $sqlmj = mysqli_query($kon, "select * from movie where idmovie=$rjl[idmovie]");
                            $rmj = mysqli_fetch_array($sqlmj);
                            $sqlcj = mysqli_query($kon, "select * from cinema where idcinema=$rjl[idcinema]");
                            $rcj = mysqli_fetch_array($sqlcj);

                            
                            echo "<big>$rmj[judul] - $rcj[namacinema] &raquo '$rjl[jamtayang]' </big>";
                            echo "<br>$rjl[tgltayang]";
                            echo "<hr>";
                        }
                        echo "<br>";
                    }
                ?>
            </div>
            <div class="kakicard">
                <a href="<?php echo "?p=jadwal";?>"><button type="button" class="btn btn-add">Lihat Semua Jadwal Tayang &raquo;</button></a>
            </div>
        </div>
        <br>
    </div>

    <!-- Untuk Member -->
    <?php
        $sqlmem = mysqli_query($kon, "select * from member");
        $rowmem = mysqli_num_rows($sqlmem);
        $sqlmeml = mysqli_query($kon, "select * from member order by tgldaftar desc limit 2");
    ?>
    <div class="dh4">
        <div id="boxval">
            <img src="../img/member.png" alt="" class="icon">
            <p style="margin-left: -5px;">Member</p>
            <h3><?php echo "$rowmem"; ?></h3>
        </div>
        <div class="card">
            <div class="kepalacard">Member Baru</div>
            <div class="isicard">
                <?php
                    if($rowmem == 0){
                        echo "<hr>";
                        echo "<div align='center'>Belum ada member yang mendaftar</div>";
                        echo "<hr>";
                    }
                    else{
                        echo "<hr>";
                        while($rmeml = mysqli_fetch_array($sqlmeml)){
                            echo "<big>$rmeml[nama] - $rmeml[email]</big>";
                            echo "<br>Tanggl Terdaftar : $rmeml[tgldaftar]";
                            echo "<hr>";
                        }
                        echo "<br>";
                    }
                ?>
            </div>
            <div class="kakicard">
                <a href="<?php echo "?p=member";?>"><button type="button" class="btn btn-add">Lihat Semua Member &raquo;</button></a>
            </div>
        </div>
        <br>
    </div>

    <!-- Untuk Transaksi -->
    <?php
        $sqltrans = mysqli_query($kon, "select * from transaksi");
        $rowtrans = mysqli_num_rows($sqltrans);
        $sqltransl = mysqli_query($kon, "select * from transaksi order by tgltransaksi desc limit 1");
    ?>
    <div class="dh4">
        <div id="boxval">
            <img src="../img/transaksi.png" alt="" class="icon">
            <p style="margin-left: -5px;">Transaksi</p>
            <h3><?php echo "$rowtrans"; ?></h3>
        </div>
        <div class="card">
            <div class="kepalacard">Transaksi Terbaru</div>
            <div class="isicard">
                <?php
                    if($rowtrans == 0){
                        echo "<hr>";
                        echo "<div align='center'>Belum ada transaksi yang dilakukan</div>";
                        echo "<hr>";
                    }
                    else{
                        echo "<hr>";
                        while($rtransl = mysqli_fetch_array($sqltransl)){
                            $sqlmem = mysqli_query($kon, "select * from member where idmember='$rtransl[idmember]'");
                            $rmem = mysqli_fetch_array($sqlmem);
                            $sqlc = mysqli_query($kon, "select * from cinema where idcinema='$rtransl[idcinema]'");
                            $rc= mysqli_fetch_array($sqlc);
                            $sqlm = mysqli_query($kon, "select * from movie where idmovie='$rtransl[idmovie]'");
                            $rm = mysqli_fetch_array($sqlm);
                            $sqlj = mysqli_query($kon, "select * from jadwal where idjadwal='$rtransl[idjadwal]'");
                            $rj = mysqli_fetch_array($sqlj);

                            echo "<big>$rm[judul] - $rc[namacinema]</big><br>";
                            echo "<big>$rj[jamtayang] - $rj[tgltayang]</big>";
                            echo "<br>No Kursi : $rtransl[nokursi]";
                            echo "<br>$rmem[nama]";
                            echo "<br>Tanggal Transaksi : $rtransl[tgltransaksi]";
                            echo "<hr>";
                        }
                        echo "<br>";
                    }
                ?>
            </div>
            <div class="kakicard">
                <a href="<?php echo "?p=transaksi";?>"><button type="button" class="btn btn-add">Lihat Semua Transaksi &raquo;</button></a>
            </div>
        </div>
        <br>
    </div>

</div>