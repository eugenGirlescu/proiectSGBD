<?php session_start(); ?>

<?php
if (!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("connection.php");

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    
    $name = $_POST['name'];
    $categ = $_POST['number'];
    $price = $_POST['price'];
    
    // checking empty fields
    if (empty($name) || empty($categ) || empty($price)) {
        if (empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if (empty($categ)) {
            echo "<font color='red'>Category field is empty.</font><br/>";
        }
        
        if (empty($price)) {
            echo "<font color='red'>Price field is empty.</font><br/>";
        }
    } else {
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE produse SET numeProdus='$name', categorie_id='$categ', pret='$price' WHERE produs_id=$id");
        
        //redirectig to the display page. In our case, it is view.php
        header("Location: view.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM produse WHERE produs_id=$id");

while ($res = mysqli_fetch_array($result)) {
    $name = $res['numeProdus'];
    $categ = $res['categorie_id'];
    $price = $res['pret'];
}
?>
<html>

<head>
    <title>Edit Data</title>
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

    <br /><br />

    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr>
                <td>Category</td>
                <td><input type="text" name="number" value=" <?php echo $categ;?>" /></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="text" name="price" value="<?php echo $price;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>