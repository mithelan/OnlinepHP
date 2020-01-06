<?php
$connect = mysqli_connect("localhost", "root", "", "book");
$ISBN = $_POST["ISBN"];
$text = $_POST["text"];
$column_name = $_POST["column_name"];
$sql = "UPDATE books SET ".$column_name."='".$text."' WHERE ISBN='".$ISBN."'";
if(mysqli_query($connect, $sql))
{
    echo 'Data Updated';
}
?>