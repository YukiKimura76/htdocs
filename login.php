<?php
session_start();

$loginError = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $users = file("data/users.txt");
    foreach ($users as $user) {
        list($savedUsername, $savedEmail, $savedPassword) = explode(",", trim($user));
        if ($email == $savedEmail && $password == $savedPassword) {
            // ログイン成功
            $_SESSION['user'] = $savedUsername; // セッションにユーザー情報を保存
            header("Location: sessions.php"); // sessions.phpにリダイレクト
            exit;
        }
    }
    $loginError = "ユーザー名またはパスワードが間違っています。";
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type=email], input[type=password] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #5cb85c;
            color: white;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <h2>ログイン　　　</h2>
    <form method="POST">
        メール: <input type="email" name="email"><br>
        パスワード: <input type="password" name="password"><br>
        <input type="submit" value="ログイン">
    </form>
    <?php if ($loginError): ?>
        <p><?php echo $loginError; ?></p>
    <?php endif; ?>
</body>
</html>
