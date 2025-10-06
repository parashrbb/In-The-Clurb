<?php
session_start();

// Redirect ke dashboard jika sudah login
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

// Ambil pesan dari query string jika ada
$msg = isset($_GET['msg']) ? $_GET['msg'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi sederhana
    if ($username === 'Paras' && $password === '092') {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Clurb</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background: #f7f7f7;
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-image: url('login.png');
        }
        .login-container {
            background: #fff;
            padding: 32px 28px;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            width: 100%;
            max-width: 340px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .login-container h2 {
            margin-bottom: 24px;
            font-size: 2rem;
            font-weight: 600;
            letter-spacing: 2px;
            color: #222;
        }
        .login-container form {
            width: 100%;
            display: flex;
            flex-direction: column;
        }
        .login-container label {
            font-size: 1rem;
            margin-bottom: 6px;
            color: #333;
            font-weight: 500;
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            padding: 10px 12px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
            background: #fafafa;
            transition: border 0.2s;
        }
        .login-container input[type="text"]:focus,
        .login-container input[type="password"]:focus {
            border-color: #222;
            outline: none;
        }
        .login-container button {
            padding: 10px 0;
            background: #222;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }
        .login-container button:hover {
            background: #444;
        }
        .error-message {
            color: #d32f2f;
            margin-bottom: 16px;
            font-size: 0.98rem;
            text-align: center;
        }
        @media (max-width: 500px) {
            .login-container {
                padding: 20px 8px;
                border-radius: 8px;
            }
            .login-container h2 {
                font-size: 1.4rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login Clurb</h2>
        <?php if (!empty($msg)): ?>
            <div class="error-message"><?php echo htmlspecialchars($msg); ?></div>
        <?php endif; ?>
        <?php if (!empty($error)): ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="post" action="">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required autocomplete="username">

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required autocomplete="current-password">

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
