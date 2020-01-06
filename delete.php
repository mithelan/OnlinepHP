<?php

$connect = mysqli_connect("localhost", "root", "", "book");
$sql = "DELETE FROM books WHERE ISBN = '" . $_POST["ISBN"] . "'";
if (mysqli_query($connect, $sql)) {
    echo 'Data Deleted';
}
 ?>