<?php

$conn = mysqli_connect("localhost", "root", "", "gikonko-tss");

if ($conn) {
   
} else {
    die("Error: " . mysqli_connect_error());
}
?>
