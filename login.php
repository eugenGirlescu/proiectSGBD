<?php session_start(); ?>
<html>

<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>

<body>
    <?php
include("connection.php");

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $pass = mysqli_real_escape_string($mysqli, $_POST['password']);
    $dercPass = md5($pass);

    if ($email == "" || $pass == "") {
        echo "Either username or password field is empty.";
        echo "<br/>";
        echo "<a href='login.php'>Go back</a>";
    } else {
        $result = mysqli_query($mysqli, "SELECT * FROM membri WHERE email='$email'")
        or die("Could not execute the select query.");
        $row = mysqli_fetch_assoc($result);
        if (is_array($row) && !empty($row)) {
            $validuser = $row['email'];
            $_SESSION['valid'] = $validuser;
            $_SESSION['nume'] = $row['nume'];
            $_SESSION['membru_id'] = $row['membru_id'];
        } else {
            echo "Invalid email or password.";
            echo "<br/>";
            echo "<a href='login.php'>Go back</a>";
        }

        if (isset($_SESSION['valid'])) {
            header('Location: index.php');
        }
    }
} else {
    ?>
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
    <p>
        <font size="+2">Login</font>
    </p>
    <form name="form1" method="post" action="">
        <table width="75%" border="0">
            <tr>
                <td width="10%">Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
    <?php
}
?>
</body>

</html>