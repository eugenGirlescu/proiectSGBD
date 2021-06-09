<?php session_start(); ?>

<?php
if (!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<html>

<head>
    <title>Add Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>

<body>
    <?php
//including the database connection file
include_once("connection.php");

if (isset($_POST['Submit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $categId = $_POST['number'];
        
    // checking empty fields
    if (empty($name) || empty($categId) || empty($price)) {
        if (empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if (empty($categId)) {
            echo "<font color='red'>Category field is empty.</font><br/>";
        }
        
        if (empty($price)) {
            echo "<font color='red'>Price field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // if all the fields are filled (not empty)
            
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO produse(categorie_id,numeProdus,pret) VALUES('$categId','$name','$price')");
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='view.php'>View Result</a>";
    }
}
?>
</body>

</html>