<?php
    session_start();
    include "koneksi.php";
    $sqlmem = mysqli_query($kon, "select * from member where email='$_SESSION[usermem]' and password ='$_SESSION[passmem]'");
    $rmem = mysqli_fetch_array($sqlmem);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tix Movies</title>
</head>
<body>
    <?php
        if($_GET["p"] == "login"){
            include "login.php";
        }
        else if($_GET["p"] == "logout"){
            include "logout.php";
        }
        else if($_GET["p"] == "register"){
            include "register.php";
        }
        else if($_GET["p"] == "movies"){
            include "movies.php";
        }
        else if($_GET["p"] == "moviesdetail"){
            include "moviesdetail.php";
        }
        else if($_GET["p"] == "moviestrailer"){
            include "moviestrailer.php";
        }
        else if($_GET["p"] == "moviesticket"){
            include "moviesticket.php";
        }
        else if($_GET["p"] == "moviesbuyticket"){
            include "moviesbuyticket.php";
        }
        else if($_GET["p"] == "tickettransaksi"){
            include "tickettransaksi.php";
        }
        else if($_GET["p"] == "buktitransaksi"){
            include "buktitransaksi.php";
        }
        else if($_GET["p"] == "movieschedule"){
            include "movieschedule.php";
        }
        else if($_GET["p"] == "history"){
            include "history.php";
        }
        else if($_GET["p"] == "aboutus"){
            include "aboutus.php";
        }
        else if($_GET["p"] == "panduanBayar"){
            include "panduanBayar.php";
        }
        else if($_GET["p"] == "profile"){
            include "profile.php";
        }
        else{
            include "home.php";
        }
        
    ?>

        <div class="dh12">
            <div class="footer">
                Copyright &copy Fran's Alfiando, 2020
            </div>
        </div>
    <script src="script.js"></script>
</body>
</html>