<?php  
    session_start(); 
    $servername = "localhost";   
    $username = "root";          
    $password = "";   
    $database = "crud-php";                 
    $conn = mysqli_connect($servername, $username, $password, $database);
        if (!$conn) {
        die("Conexion no establecida: " . mysqli_connect_error());
        }
?>