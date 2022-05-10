<?php
    include "menu.php";    
?>

<?php 
    $sqlm = mysqli_query($kon, "select * from movie where idmovie='$_GET[id]'");
    $rm = mysqli_fetch_array($sqlm);
        $sqlg = mysqli_query($kon, "select * from genre where idgenre='$rm[idgenre]'");
        $rg = mysqli_fetch_array($sqlg);

        $sqlj = mysqli_query($kon, "select * from jadwal where idmovie='$_GET[id]' order by idcinema asc");

        echo "<div class='dh12'>";
            echo "<div class='card movieDetail'>";
                echo "<div class='kepalacard'>$rm[judul]</div>";
                    echo "<div class='isicard' style='text-align:center;'>";
                        echo "<br>";
                        echo "<img src='poster/$rm[poster]' class='posterdetail'>
                            <div class='detail'>
                                <big>$rg[namagenre]</big>
                                <br> <b>Durasi</b>: $rm[durasi] mins
                                <br> <b>Sutradara</b> : $rm[sutradara]
                                <br> <b>Pemeran</b> : $rm[pemain]
                                <br> <b>Sinopsis</b> : <br> $rm[sinopsis]
                                <br> <b>Rating</b> : $rm[rating]/10
                            </div>";
                            if($rm["status"] == 'Now Playing'){
                            echo "<form method='post' action='?p=movieschedule&id=$rm[idmovie]'>";
                            echo "<select name='idcinema' class='pilihCinema'>";
                            echo "<option value=''>Pilih Cinema</option>";
                            $idc =  mysqli_query($kon, "SELECT DISTINCT idcinema from jadwal where idmovie = '$_GET[id]'");
                            while($ridc = mysqli_fetch_array($idc)){
                                $sqlc = mysqli_query($kon, "select * from cinema where idcinema='$ridc[idcinema]' order by idcinema");
                                while($rc =mysqli_fetch_array($sqlc)){
                                    echo "<option value='$rc[idcinema]'> $rc[namacinema] - $rc[lokasicinema]</option>";
                                }
                                // $rc = mysqli_fetch_array($sqlc);
                                    
                                    
                                    
                                    // echo "<big> $rj[tgltayang]</big> <br>";
                                    // echo "$rc[namacinema]";
                                    // echo "<a href='?p=moviesticket&id=$rm[idmovie]&idj=$rj[idjadwal]'><button type='button' class='btn btn-add'>$rj[jamtayang]</button></a> <br><br>";
                            
                            }
                            echo "</select><br>";




                            // $sqlc = mysqli_query($kon, "select * from cinema order by idcinema");
                            // while($rc = mysqli_fetch_array($sqlc)){
                                
                            //     // $rc = mysqli_fetch_array($sqlc);
                            //         echo "<option value='$rc[idcinema]'> $rc[namacinema] - $rc[lokasicinema]</option>";
                                    
                                    
                            //         // echo "<big> $rj[tgltayang]</big> <br>";
                            //         // echo "$rc[namacinema]";
                            //         // echo "<a href='?p=moviesticket&id=$rm[idmovie]&idj=$rj[idjadwal]'><button type='button' class='btn btn-add'>$rj[jamtayang]</button></a> <br><br>";
                            
                            // }
                            // echo "</select><br>";



                            // echo "<form method='post' action='?p=moviesticket&id=$rm[idmovie]'>";
                            // echo "<select name='idjadwal'>";
                            // echo "<option value=''>Jadwal Tayang</option>";
                            // while($rj = mysqli_fetch_array($sqlj)){
                            //     $sqlc = mysqli_query($kon, "select * from cinema where idcinema='$rj[idcinema]' order by idcinema");
                            //     $rc = mysqli_fetch_array($sqlc);
                            //         echo "<option value='$rj[idjadwal]'>$rj[tgltayang] $rc[namacinema] - $rc[lokasicinema] $rj[jamtayang]</option>";
                                    
                                    
                            //         // echo "<big> $rj[tgltayang]</big> <br>";
                            //         // echo "$rc[namacinema]";
                            //         // echo "<a href='?p=moviesticket&id=$rm[idmovie]&idj=$rj[idjadwal]'><button type='button' class='btn btn-add'>$rj[jamtayang]</button></a> <br><br>";
                            
                            // }
                            // echo "</select><br>";
                            
                            
                            // while($rj = mysqli_fetch_array($sqlj)){
                            //     $sqlc = mysqli_query($kon, "select * from cinema where idcinema='$rj[idcinema]' order by idcinema");
                            //     $rc = mysqli_fetch_array($sqlc);

                            //     echo "$rc[namacinema] <br>";
                            // }

                            
                    echo "</div>";
                    echo "<div class='kakicard'>";
                           
                                echo "<br>
                            <a href='?p=moviestrailer&id=$rm[idmovie]'><button type='button' class='btn btn-add'>Trailer</button></a> ";
                            echo "<a href='?p=moviesticket&id=$rm[idmovie]'><button type='submit' name='submit' id='submit' class='btn btn-add'>Buy Ticket</button></a> <br>";
                            }
                            else{
                                echo "<br>
                                <big>$rm[status]</big><br><br>
                            <a href='?p=moviestrailer&id=$rm[idmovie]'><button type='button' class='btn btn-add'>Trailer</button></a> ";
                            }
                            echo "</form>";
                    echo "</div>";
            echo "</div>";
        echo "</div>";

?>