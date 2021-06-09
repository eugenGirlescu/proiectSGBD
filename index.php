<?php session_start(); ?>
<html>

<head>
    <title>Homepage</title>
    <link href="style.css" rel="stylesheet" type="text/css">
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
    <div id="header">
        Welcome to my page!
    </div>
    <?php
    if (isset($_SESSION['valid'])) {
        include("connection.php");
        $result = mysqli_query($mysqli, "SELECT * FROM membri"); ?>
    Welcome <?php echo $_SESSION['nume'] ?> ! <a href='logout.php'>Logout</a><br />
    <br />
    <a href='view.php'>View and Add Products</a>
    <br /><br />
    <?php
    } else {
        echo "You must be logged in to view this page.<br/><br/>";
        echo "<a href='login.php'>Login</a> | <a href='register.php'>Register</a>";
    }
    ?>

</body>

</html>