<?php
$connect = mysqli_connect("localhost", "root", "", "book");
$sql = "INSERT INTO books(Name, Author) VALUES('".$_POST["Name"]."', '".$_POST["Author"]."')";
if(mysqli_query($connect, $sql))
{
    echo 'Data Inserted';
}
?>