<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./assets/js/script.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/styles.css">
    <title>FAVORITE-MOVIES</title>
</head>

<body>
    <?php include_once("./header.php"); ?>
    <section>
        <h3>Sign up</h3>
        <form action="signup.php" method="post">
            <label for="user">User</label>
            <input type="text" id="user" placeholder="Your name">
            <label for="email">Email</label>
            <input type="text" id="Email" placeholder="Example@mail.com">
            <label for="password">Password</label>
            <input type="password" id="password" placeholder="At least 8 characters">
            <input type="submit" value="Login">
        </form>
    </section>
    <div>
        <p>Don’t have an account?</p>
        <a href="./login.php">Log in</a>
    </div>

    <?php include_once("./footer.php"); ?>