<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 13px;
            background-color: #7434ac;
        }

        .container {
            display: flex;
            width: 700px; /* Memperkecil lebar container */
            height: 400px; /* Memperkecil tinggi container */
            box-shadow: 0 0 50px rgba(0, 0, 0, 0.2); /* Sedikit mempertegas bayangan */
            background-color: rgb(255, 255, 255);
            border-radius: 10px; /* Membulatkan sudut container */
        }

        .form-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px; /* Mengurangi padding */
        }

        .logo-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ffffff;
            border-top-right-radius: 15px; /* Membulatkan sudut kanan atas */
            border-bottom-right-radius: 15px; /* Membulatkan sudut kanan bawah */
        }

        .logo-container img {
            max-width: 70%;
            max-height: 70%;
            width: auto;
            height: auto;
        }

        h1 {
            margin-bottom: 20px; /* Mengurangi jarak margin bawah heading */
            text-align: center;
            font-size: 25px; /* Mengurangi ukuran font heading */
        }

        form {
            width: 100%;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px; /* Memperkecil padding input */
            margin: 8px 0; /* Mengurangi margin input */
            border: 1px solid #ccc;
            border-radius: 4px; /* Membulatkan sudut input */
        }

        .remember-me {
            display: flex;
            align-items: center;
        }

        .remember-me input {
            margin-right: 5px;
        }

        .forgot-password {
            text-align: right;
        }

        button {
            width: 100%;
            padding: 8px; /* Memperkecil padding tombol */
            background-color: #fc9c04;
            color: #ffffff;
            border: none;
            border-radius: 8px; /* Membulatkan sudut tombol */
            cursor: pointer;
            margin: 15px 0; /* Mengurangi margin tombol */
        }

        .toggle {
            text-align: center;
            margin-top: 10px; /* Mengurangi jarak margin atas toggle */
        }

        a {
            color:rgb(4, 111, 252);
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h1>Sign In</h1>
            <form action="<?= site_url('auth/login') ?>" method="post">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan Username" required>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan Password Anda" required>
                <div class="remember-me">
                    <input type="checkbox" id="rememberMe" name="rememberMe">
                    <label for="rememberMe">Remember me</label>
                </div>
                <div class="forgot-password">
                    <a href="#">Forgot password?</a>
                </div>
                <button type="submit">Sign in</button>
            </form>
            <div class="toggle">
                <p>Not have an account? <a href="./singup1.php">Sign up here</a></p>
            </div>
        </div>
        <div class="logo-container">
            <img src="<?= base_url('img/logo1.png'); ?>" alt="Logo">
        </div>
    </div>
</body>

</html>