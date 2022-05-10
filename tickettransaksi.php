
    <?php
        $sqlj = mysqli_query($kon, "select * from jadwal where idjadwal='$_POST[idjadwal]'");
        
        $rj = mysqli_fetch_array($sqlj);
            $sqlc = mysqli_query($kon, "select * from cinema where idcinema='$rj[idcinema]'");
            $rc = mysqli_fetch_array($sqlc);

            $sqlm = mysqli_query($kon, "select * from movie where idmovie='$rj[idmovie]'");
            $rm = mysqli_fetch_array($sqlm);

            echo "<div class='dh12'>";
            echo "<div class='card transaksi'>";
                echo "<div class='kepalacard'>Transaksi</div>";
                    echo "<div class='isicard' style='text-align:center;'>";
                        echo "<br>";
                        echo "
                            <div class='detailtransaksi'>
                                <big>$rc[namacinema] - $rc[lokasicinema]</big>
                                <br><b>Judul</b>: $rm[judul] 
                                <br> <b>Tanggal Tayang</b> : $rj[tgltayang]
                                <br> <b>Jam Tayang</b> : $rj[jamtayang]";
                               
                            
                         echo"<form action='' method='post' enctype='multipart/form-data'>";           
                            for ($i = 0; $i < sizeof($_POST['seat']); $i++) {
                                list($row,$col) = explode('|', $_POST['seat'][$i]);
                                $rowName = chr(65 + $row - 1);
                                $harga = $rc["harga"];
                                $totalharga = $harga*($i+1);
                                
                            echo"<br> <b>No Kursi </b> <input type='hidden' name='nokursi[]' value='$rowName$col' checked>$rowName$col
                                 <b>Harga Ticket</b> : $harga
                            ";
                            
                            echo"<input type='hidden' name='idjadwal[]' value='$rj[idjadwal]'>";
                            echo"<input type='hidden' name='row[]' value='$row'>";
                            echo"<input type='hidden' name='col[]' value='$col'>";
                            echo"<input type='hidden' name='harga[]' value='$harga'>";

                            // $sqlt = mysqli_query($kon, "insert into ticket(idjadwal,seatrow,seatcol,namamember,hargaticket) values ('$rj[idjadwal]','$row','$col','$rmem[nama]','$harga')");
                          }
        
                             echo "
                                       <br><b>Upload bukti pembayaran</b> 
                                       <br><input type='file' name='bukti' id='bukti'> 
                                    ";
                    echo "</div><br>";
                    echo "</div>";
            echo "</div>";
        echo "</div>";            
        echo "<div class='totalharga'>";
        echo "<big><b>Total</b> : <input type='hidden' name='total' value='$totalharga'>Rp $totalharga</big>";   

        echo "<input type='hidden' name='idcinema' value='$rj[idcinema]'> 
        <input type='hidden' name='idmovie' value='$rj[idmovie]'> 
        <input type='hidden' name='idjadwal' value='$rj[idjadwal]'> ";   
        
        
        echo "<br><br>
        <a href='?p=panduanBayar' target='_blank' rel='noopener noreferrer'><button type='button' class='btn btn-add'>Panduan Pembayaran</button></a>
        <input class='btn btn-add' type='submit' name='konfirmasi' id='konfirmasi' value='Konfirmasi'>
        </form>";
        echo "</div>";
        echo "</div>";
        
        if($_POST["konfirmasi"]){
            if(!empty($_FILES["bukti"]["name"])){
                $sqlt = mysqli_query($kon, $query);

                $sqljadwal = mysqli_query($kon, "select * from jadwal where idjadwal='$_POST[idjadwal]'");
                $rjadwal = mysqli_fetch_array($sqljadwal);
                    $nmbukti = $_FILES["bukti"]["name"];
                    $lokbukti = $_FILES["bukti"]["tmp_name"];
                    if(!empty($lokbukti)){
                        move_uploaded_file($lokbukti, "buktibayar/$nmbukti");
                    }
                    
                    $idjadwal = $_POST['idjadwal'];
                    $col = $_POST['col'];
                    $row = $_POST['row'];
                    $harga = $_POST['harga'];
                    $jml = count($row);

                    for ($i=0; $i<$jml ; $i++) { 
                    $sqlt = mysqli_query($kon, "insert into ticket(idjadwal,seatrow,seatcol,namamember,hargaticket) values ('$_POST[idjadwal]','$row[$i]','$col[$i]','$rmem[nama]','$harga[$i]')"); 
                    }

                    $nokursi = $_POST['nokursi'];
                    $kursi = "";
                    foreach($nokursi as $nokursi1){
                    $kursi .= $nokursi1." ";
                    }

                    // Membuat no Order
                    $tgl = date("d");
                    $bln = date("m");
                    $thn = date("Y");
                    $jam = date("H");
                    $mnt = date("i");
                    $dtk = date("s");

                    $sqltrans = mysqli_query($kon, "insert into transaksi(idmember,idcinema,idmovie,idjadwal,notransaksi,nokursi,totalbayar,buktibayar,tgltransaksi) values ('$rmem[idmember]', '$_POST[idcinema]','$_POST[idmovie]','$_POST[idjadwal]','$thn$bln$tgl$jam$mnt$dtk','$kursi','$_POST[total]', '$nmbukti', NOW())");

                    if($sqltrans){
                        echo "<b>Transaksi Berhasil</b>";
                    }

                    else{
                        echo "<b>Transaksi Gagal</b>";
                    }
                    echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=buktitransaksi&idj=$_POST[idjadwal]&kursi=$kursi'>";
            }
            else{
                echo "<big style='text-align:center; margin: 20%;'> TRANSAKSI GAGAL!!</big>
                <br> <big style='text-align:center; margin-left:15%;'> Bukti pembayaran harus diupload !!</big>";
                echo "<META HTTP-EQUIV='Refresh' Content='3; URL=?p=home'>";
            }
        }
    
?>


