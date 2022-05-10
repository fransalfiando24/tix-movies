<?php
    session_start();
    session_destroy();
    echo "Anda Sudah Logout";

    echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=home'>";
?>