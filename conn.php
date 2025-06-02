<?php

$conn = mysqli_connect("localhost", "root", "factorise@123", "gikonko_tss_managment_system");

if ($conn) {
    echo "Connected successfuly";
} else {
    die("Error" . mysqli_connect_error());
}
?>
