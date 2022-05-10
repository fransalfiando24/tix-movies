<?php
    include "menu.php"; 
    if(!empty($_SESSION["usermem"]) and !empty($_SESSION["passmem"])){
?>
<?php 
    $sqlm = mysqli_query($kon, "select * from movie where idmovie='$_GET[id]'");
    $rm = mysqli_fetch_array($sqlm);

    $sqlj = mysqli_query($kon,"select * from jadwal where idjadwal='$_GET[idj]'");
    $rj = mysqli_fetch_array($sqlj);
    
        echo "<div class='dh12'>";
            echo "<div class='card movieDetail'>";
                echo "<div class='kepalacard'>$rm[judul]</div>";
                    echo "<div class='isicard' style='text-align:center;'>";
                        echo "<br>";
                        echo "<img src='poster/$rm[poster]' class='posterticket'>";
                        echo "<div class='seat'>";
                         echo "<form method='post' action='?p=tickettransaksi' onsubmit='return check()'>";
                                $sqlc = mysqli_query($kon, "select * from cinema where idcinema='$rj[idcinema]'");
                                $rc = mysqli_fetch_array($sqlc);
                                
                                $sqlt = mysqli_query($kon, "select * from ticket where idjadwal = '$_GET[idj]'");
                                

                                $kursiOccupied;
                                $nokursiOccupied = 0;

                                while($row = mysqli_fetch_array($sqlt)){
                                    $kursiOccupied[$nokursiOccupied][0] = $row['seatrow'];
                                    $kursiOccupied[$nokursiOccupied][1] = $row['seatcol'];
                                    $nokursiOccupied++;
                                }


                                while($rc['jmlkursikebelakang']){
                                    $rowName = chr(65 + $rc['jmlkursikebelakang'] - 1);

                                echo "<div class='ticketing-row'>";
                                    for($i = 1; $i <= $rc['jmlkursikesamping']; $i++){
                                        $isReserved = 0;
                                        for ($it = 0; $it < $nokursiOccupied; $it++) {
                                            if ($kursiOccupied[$it][0] == $rc['jmlkursikebelakang'] && $kursiOccupied[$it][1] == $i)
                                              $isReserved = 1;
                                          }
                                    

                                    if ($isReserved) {
                                        echo "<div class='ticketing-col reserved'>";
                                        print "Sold " . $rowName . $i;
                                      }
                                      else {
                                        echo "<div class='ticketing-col available'>";
                                        print "<input type='checkbox' class='checkbox' name='seat[]' value='" . $rc['jmlkursikebelakang'] . "|" . $i . "'>";
                                        print $rowName . $i;
                                      }
                                      echo "</div>";

                                    }
                                        $rc['jmlkursikebelakang']--;
                                        echo "</div>"; // Ticketng-row end
                                    }
                                      echo "<div class='ticketing-row'>";
                                      echo  "<div class='ticketing-col screen'>
                                        Screen
                                      </div>";
                                    echo "</div>";
                                    echo "<br><a href='?p=moviesbuyticket'><button type='submit' name='submit' id='submit' class='btn btn-add'>Select Seat(s)</button></a>";
                                    echo "<a href='?p=moviesdetail&id=$rj[idmovie]'><button type='button' name='cancel' class='btn btn-add'>Cancel</button></a>";
                                    echo "<input type='hidden' name='idjadwal' value='$rj[idjadwal]'>";
                                    echo "</form>";
                        echo "</div>";
                    echo "</div>";
                    
            echo "</div>";
        echo "</div>";
        echo "</div>";

?>

<script type="text/javascript">
      function check() {
        var flag = -1;
        var listOfCheckboxes = document.getElementsByClassName('checkbox');
        for (var i = 0; i < listOfCheckboxes.length; i++) {
          if (listOfCheckboxes[i].checked)
            flag = 1;
        }
        if (flag == -1) {
          alert("Please choose at least one seat.");
          return false;
        }
      }
</script>
<?php 
        }
        else{
            include "login.php";
        }
?>