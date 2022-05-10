<?php
    include "menu.php";    
?>
<?php 
    $sqlm = mysqli_query($kon, "select * from movie where idmovie='$_GET[id]'");
    $rm = mysqli_fetch_array($sqlm);
        $sqlg = mysqli_query($kon, "select * from genre where idgenre='$rm[idgenre]'");
        $rg = mysqli_fetch_array($sqlg);

        $sqlj = mysqli_query($kon, "select * from jadwal where idcinema='$_POST[idcinema]' and idmovie='[$_GET[id]]' order by tgltayang asc");

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
                            ";

                            echo "<div class='tayang'>";
                            $sqlc = mysqli_query($kon, "select * from cinema where idcinema='$_POST[idcinema]'");
                            $rc = mysqli_fetch_array($sqlc);
                            echo "<big>$rc[namacinema] - $rc[lokasicinema]</big>";
                            
                            $tgl = mysqli_query($kon, "SELECT DISTINCT tgltayang from jadwal where idcinema = '$_POST[idcinema]' and idmovie='$_GET[id]'");
                            while($rtgl = mysqli_fetch_array($tgl)){
                                $rj = mysqli_fetch_array($sqlj);
                                echo "<br><b>$rtgl[tgltayang]</b><br>";
                                $sqltgl = mysqli_query($kon, "select * from jadwal where tgltayang = '$rtgl[tgltayang]' and idmovie='$_GET[id]' and idcinema='$_POST[idcinema]'");
                                while($rtgl = mysqli_fetch_array($sqltgl)){
                                    // echo "$rtgl[jamtayang]<br><br>"; 
                                    echo "<a href='?p=moviesticket&id=$rm[idmovie]&idj=$rtgl[idjadwal]'><button type='button' class='btn btn-add jamtayang'>$rtgl[jamtayang]</button></a>";
                                }
                                
                            }
                            echo "</div>";
                            echo "</div>";
                            



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
                            echo "<br>";
                            // echo "<a href='?p=moviesticket&id=$rm[idmovie]'><button type='submit' name='submit' id='submit' class='btn btn-add'>Buy Ticket</button></a>";
                            echo "<a href='?p=moviesdetail&id=$rm[idmovie]'><button type='button' name='cancel' class='btn btn-add'>Cancel</button></a><br>";
                            echo "</form>";
                        
                    echo "</div>";
            echo "</div>";
        echo "</div>";

?>