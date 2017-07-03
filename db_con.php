<?php

$link = new mysqli("localhost", "root", "", "obs");
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>