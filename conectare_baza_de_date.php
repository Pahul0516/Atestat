<?php
    $id_con=@mysqli_connect("localhost", "root", "", "nespresso");
    if(!$id_con)
    {
        die("conexiune imposibila".mysqli_connect_error());
    }
?>
