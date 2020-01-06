<?php
session_start();


if(isset($_SESSION['User']))
{
    echo ' Wel Come ' . $_SESSION['User'].'<br/>';
    echo '<a href="Logout.php?logout">Logout</a>';
}
else
{
    header("location:index.php");
}

?>
<h3 xmlns="">Select the category</h3>

<form name="selectcategory" action="post">


    <input type="radio" name="category" value="Science"> Science<br>
    <input type="radio" name="category" value="Classic"> Classic<br>
    <input type="radio" name="category" value="Short Stories"> Short Stories
<br>

    <button class="btn btn-success mt-3" name="insert">View</button>




</form>
<body onload="viewData()">
<style>
    table {
        border-collapse: collapse;
        width: 100%;
        color: #588c7e;
        font-family: monospace;
        font-size: 25px;
        text-align: left;
    }
    th {
        background-color: #588c7e;
        color: white;
    }
    tr:nth-child(even) {background-color: #f2f2f2}
</style>


<table>
    <tr>
        <th>Book Title</th>
        <th>Book Author</th>
        <th>Book Price</th>
        <th>Book Image</th>
        <th>Action</th>
    </tr>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "book");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT Name,Author,Price,Image FROM books";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
// output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["Name"]. "</td><td>" . $row["Author"] . "</td><td>". $row["Price"] . "</td><td>". $row["Image"] . "</td><td>".
                "</td></tr>";
        }
        echo "</table>";
    } else { echo "0 results"; }
    $conn->close();
    ?>
</table>
<form action="Firstpage.php" method="post">


    <h3>Add Books</h3>

    <input type="text" name="Name" required placeholder="Name"><br><br>

    <input type="text" name="Author" required placeholder="Author"><br><br>

    <input type="number" name="Year" required placeholder="Year" min="10" max="100">




    <br><br>

    <input type="submit" name="insert" value="Add ">

</form>

<?php

// php code to Insert data into mysql database from input text
if(isset($_POST['insert']))
{
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "book";

    // get values form input text and number

    $fname = $_POST['Name'];
    $lname = $_POST['Author'];
    $age = $_POST['Year'];

    // connect to mysql database using mysqli

    $connect = mysqli_connect($hostname, $username, $password, $databaseName);

    // mysql query to insert data

    $query = "INSERT INTO 'books'('Name', 'Author', 'Year') VALUES ('$Name','$Author','$Year')";

    $result = mysqli_query($connect,$query);

    // check if mysql query successful

    if($result)
    {
        echo 'Data Inserted';
    }

    else{
        echo 'Data Not Inserted';
    }

    mysqli_free_result($result);
    mysqli_close($connect);
}

?>


<form action="search.php" method="post">

    <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
    <input type="submit" name="search" value="Filter"><br><br>

    <table>
        <tr>
            <th>Name</th>
            <th>Author</th>
            <th>Year</th>
            <th>Price</th>
        </tr>
        <?php while($row = mysqli_fetch_array($search_result)):?>
            <tr>
                <td><?php echo $row['Name'];?></td>
                <td><?php echo $row['Author'];?></td>
                <td><?php echo $row['Year'];?></td>
                <td><?php echo $row['Price'];?></td>
            </tr>
        <?php endwhile;?>
    </table>
</form>

</body>
</html>




