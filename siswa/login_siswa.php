<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../asset/login.css">

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital@1&display=swap" rel="stylesheet">
</head>

<body>
    <a href="index.php" class="logout">Main menu</a>
    <div class="container">
        <h1>Sign In</h1>
        <form action="proses_siswa.php" method="POST">
            <label for="lname">NIS</label>
            <input type="text" name="nis" class="login-form" placeholder="Masukan NIS">
            <button type="submit" class="logout" value="Login">Login</button>

        </form>
    </div>


</body>

</html>