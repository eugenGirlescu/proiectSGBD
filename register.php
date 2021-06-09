<html>

<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>

<body>
    <?php
    include("connection.php");

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $pren = $_POST['prename'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $password = password_hash($pass, PASSWORD_DEFAULT);

        if ($pren == "" || $pass == "" || $name == "" || $email == "") {
            echo "All fields should be filled. Either one or many fields are empty.";
            echo "<br/>";
            echo "<a href='register.php'>Go back</a>";
        } else {
            mysqli_query($mysqli, "INSERT INTO membri(nume,prenume,email,parola_membru) VALUES('$name','$pren', '$email', '$password')")
            or die("Could not execute the insert query.");
            
            echo "Registration successfully";
            echo "<br/>";
            echo "<a href='login.php'>Login</a>";
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
        <font size="+2">Register</font>
    </p>
    <form name="form1" method="post" action="">
        <table width="75%" border="0">
            <tr>
                <td width="10%">Nume</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Prenume</td>
                <td><input type="text" name="prename"></td>
            </tr>
            <tr>
                <td>Email</td>
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