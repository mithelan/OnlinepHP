<?php
$connect = mysqli_connect("localhost", "root", "", "book");
$output = '';
$sql = "SELECT * FROM books";
$result = mysqli_query($connect, $sql);
$output .= '
<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th width="10%">Id</th>
            <th width="40%">First Name</th>
            <th width="40%">Last Name</th>
            <th width="10%">Delete</th>
        </tr>';
        if(mysqli_num_rows($result) > 0)
        {
        while($row = mysqli_fetch_array($result))
        {
        $output .= '
        <tr>
            <td>'.$row["ISBN"].'</td>
            <td class="first_name" data-id1="'.$row["ISBN"].'" contenteditable>'.$row["Name"].'</td>
            <td class="last_name" data-id2="'.$row["ISBN"].'" contenteditable>'.$row["Author"].'</td>
            <td><button type="button" name="delete_btn" data-id3="'.$row["ISBN"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>
        </tr>
        ';
        }
        $output .= '


        <tr>
            <td></td>
            <td id="first_name" contenteditable></td>
            <td id="last_name" contenteditable></td>
            <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>
        </tr>
        ';
        }
        else
        {
        $output .= '<tr>
            <td colspan="4">Data not Found</td>
        </tr>';
        }
        $output .= '</table>
</div>';
echo $output;
?>