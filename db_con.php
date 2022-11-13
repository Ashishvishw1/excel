<?php

$conn=mysqli_connect('localhost','root','','mydata');
if (!$conn) {
    echo "Not connected to database";
}