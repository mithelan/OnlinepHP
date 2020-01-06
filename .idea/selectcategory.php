<?php

require_once('connection.php');


if(isset($_POST['insert'])){


    $category=$_POST['category'];




    $query="INSERT INTO 'category'('category') values ('$category')";
$query_run=$mysqli_query($con,$query);

   if($query_run){

       echo 'mass';
   }
   else{
       echo 'Thamass';
   }


}