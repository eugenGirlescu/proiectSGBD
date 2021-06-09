<?php session_start(); ?>

<?php
if (!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM produse  ORDER BY numeProdus DESC");
?>

<html>

<head>
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">EATZZ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="index.php">Home</a>
                <a class="nav-item nav-link" href="view.php">View products</a>
                <a class="nav-item nav-link" href="login.php">Login</a>
                <a class="nav-item nav-link" href="register.php">Register</a>
                <a class="nav-item nav-link" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>
    <a href="add.html">Add New Data</a>
    <br /><br />

    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>Nume</td>
            <td>Categorie</td>
            <td>Pret (lei)</td>
        </tr>
        <?php
    while ($res = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>".$res['numeProdus']."</td>";
        echo "<td>".$res['categorie_id']."</td>";
        echo "<td>".$res['pret']."</td>";
        echo "<td><a href=\"edit.php?id=$res[produs_id]\">Edit</a> | <a href=\"delete.php?id=$res[produs_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
    }
    ?>
    </table>
</body>

</html>