<?php
  session_start();
  session_destroy();
  echo "<br><br><div align='center'><b class='kuning'>Terima Kasih sudah berkunjung <br> Kami tunggu kedatangan anda kembali</b></div>";
  echo "<META HTTP-EQUIV='Refresh' Content='2; URL=?p=home'>";
?>