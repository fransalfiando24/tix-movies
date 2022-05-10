<?php
    session_start();
    include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Administrator Tix-Movies</title>
</head>
<body>
<?php
    if(!empty($_SESSION["useradm"]) and !empty($_SESSION["passadm"])){
        $sqla = mysqli_query($kon, "select * from admin where username='$_SESSION[useradm]' and password='$_SESSION[passadm]'");
        $ra = mysqli_fetch_array($sqla);
?>

    <div class="grid">
        <div class="dh12">
            <div class="container1">
                <span class="opennav" style="font-size: 20px; cursor:pointer; padding-right:15px" onclick="openNav()">&#9776;</span>
                <a href="<?php echo "?p=home"; ?>"><span class="kuning">Tix-</span>Movies</a>
            </div>
        </div>
    </div>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <img src="../img/avatar.png" width="100px">
        <p>Selamat Datang</p>
        <h3><?php echo "$ra[namalengkap]";?></h3>
        <a href="<?php echo "?p=home";?>">Home</a>
        <a href="<?php echo "?p=cinemas";?>">Cinemas</a>
        <a href="<?php echo "?p=movies&st=semua";?>">Movies</a>
        <a href="<?php echo "?p=genre";?>">Genre</a>
        <a href="<?php echo "?p=jadwal";?>">Jadwal Tayang</a>
        <a href="<?php echo "?p=member";?>">Member</a>
        <a href="<?php echo "?p=transaksi";?>">Transaksi</a>
        <a href="<?php echo "?p=logout";?>">Logout</a>
    </div>

    <script>
        function openNav(){
            document.getElementById('mySidenav').style.width = "350px";
        }
        function closeNav(){
            document.getElementById('mySidenav').style.width = "0px";
        }
    </script>

    <div class="grid">
        <div class="dh12">
            <div class="container2">
                <?php 
                    if($_GET["p"] == "logout"){
                        include "logout.php";
                    }
                    else if($_GET["p"] == "cinemas"){
                        include "cinemas.php";
                    }
                    else if($_GET["p"] == "cinemasadd"){
                        include "cinemasadd.php";
                    }
                    else if($_GET["p"] == "cinemasedit"){
                        include "cinemasedit.php";
                    }
                    else if($_GET["p"] == "cinemasdel"){
                        include "cinemasdel.php";
                    }
                    else if($_GET["p"] == "movies"){
                        include "movies.php";
                    }
                    else if($_GET["p"] == "moviesadd"){
                        include "moviesadd.php";
                    }
                    else if($_GET["p"] == "moviesedit"){
                        include "moviesedit.php";
                    }
                    else if($_GET["p"] == "moviesdel"){
                        include "moviesdel.php";
                    }
                    else if($_GET["p"] == "moviesdetail"){
                        include "moviesdetail.php";
                    }
                    else if($_GET["p"] == "genre"){
                        include "genre.php";
                    }
                    else if($_GET["p"] == "genreadd"){
                        include "genreadd.php";
                    }
                    else if($_GET["p"] == "genreedit"){
                        include "genreedit.php";
                    }
                    else if($_GET["p"] == "genredel"){
                        include "genredel.php";
                    }
                    else if($_GET["p"] == "jadwal"){
                        include "jadwal.php";
                    }
                    else if($_GET["p"] == "jadwaladd"){
                        include "jadwaladd.php";
                    }
                    else if($_GET["p"] == "jadwaledit"){
                        include "jadwaledit.php";
                    }
                    else if($_GET["p"] == "jadwaldel"){
                        include "jadwaldel.php";
                    }
                    else if($_GET["p"] == "member"){
                        include "member.php";
                    }
                    else if($_GET["p"] == "memberdel"){
                        include "memberdel.php";
                    }
                    else if($_GET["p"] == "transaksi"){
                        include "transaksi.php";
                    }
                    else if($_GET["p"] == "transaksidetail"){
                        include "transaksidetail.php";
                    }
                    else{
                        include "home.php";
                    }
                ?>
            </div>
        </div>
    </div>

    <div class="grid">
        <div class="dh12">
            <div class="container3">
                Copyright &copy Fran's Alfiando, 2020
            </div>
        </div>
    </div>

    <?php 
        }
        else{
            include "login.php";
        }
    ?>
</body>
</html>