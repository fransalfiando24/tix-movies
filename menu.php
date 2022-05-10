<nav>
    <h1><a href="<?php echo "?p=home";?>"  class="webTitle"><span class="kuning">Tix-</span>Movies</a></h1>
        <?php
            if(!empty($_SESSION["usermem"]) and !empty($_SESSION["passmem"])){
                echo"
                <ul>
                    <li><a class='nav-link kuning' href='?p=profile&idmem=$rmem[idmember]'>$rmem[nama]</a></li>
                    <li><a href='?p=home' class='nav-link'>Home</a></li>
                    <li><a href='?p=movies' class='nav-link'>Movies</a></li>
                    <li><a href='?p=history&idmem=$rmem[idmember]' class='nav-link'>History</a></li>
                    <li><a href='?p=logout' class='login'>Logout</a></li>
                </ul>
                ";
            }
            else{
                echo"
                <ul>
                    <li><a href='?p=home' class='nav-link'>Home</a></li>
                    <li><a href='?p=movies' class='nav-link'>Movies</a></li>
                    <li><a href='?p=aboutus' class='nav-link'>About Us</a></li>
                    <li><a href='?p=login' class='login'>Login</a></li>
                </ul>
                ";
            } 
        ?>
        <div class="menu">
            <input type="checkbox">
            <span></span>
            <span></span>
            <span></span>
        </div>
</nav><br>