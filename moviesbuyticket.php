<?php
    include "menu.php";    
?>
    <?php
        $sqlj = mysqli_query($kon, "select * from jadwal where idjadwal='$_POST[idjadwal]'");
        
        while($rj = mysqli_fetch_array($sqlj)){
            $sqlc = mysqli_query($kon, "select * from cinema where idcinema='$rj[idcinema]'");
            $rc = mysqli_fetch_array($sqlc);

            $sqlm = mysqli_query($kon, "select * from movie where idmovie='$rj[idmovie]'");
            $rm = mysqli_fetch_array($sqlm);

            
            for ($i = 0; $i < sizeof($_POST['seat']); $i++) {
                list($row,$col) = explode('|', $_POST['seat'][$i]);
                $rowName = chr(65 + $row - 1);
                $harga = $rc["harga"];
            echo "<div class='dh4'>";
            echo "<div class='card ticket'>";
                echo "<div class='kepalacard'>Ticket</div>";
                    echo "<div class='isicard' style='text-align:center;'>";
                        echo "<br>";
                        echo "
                            <div class='detailticket'>
                                <big>$rc[namacinema]</big>
                                <br> <b>Judul</b>: $rm[judul] 
                                <br> <b>Tanggal Tayang</b> : $rj[tgltayang]
                                <br> <b>Jam Tayang</b> : $rj[jamtayang]";
                               
                                    
                                    $totalharga = $harga*($i+1);
                            echo"<br> <b>No Kursi </b> : $rowName$col
                                 <br><b>Harga Ticket</b> : $harga
                            ";
            
                            
                                
                    echo "</div><br>";
                    echo "</div>";

 
            echo "</div>";
        echo "</div>";

            $sqlt = mysqli_query($kon, "insert into ticket(idjadwal,seatrow,seatcol,namamember,hargaticket) values ('$rj[idjadwal]','$row','$col','$rmem[nama]','$harga')");

            }
        }
        echo "<div class='totalharga'>";
        echo "<big><b>Total</b> : $totalharga </big>";        
        echo "<br><br><input class='btn btn-add' type='submit' name='beli' id='simpan' value='Beli Tiket'>";
        echo "</div>";
        echo "</div>";
    ?>


