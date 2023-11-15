<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $c = ",";

    /* ユーザー情報を文字列に変換 */
    $user_info = $username.$c.$email.$c.$password;

    // /* data.txtに追記モードで開く */
    $file = fopen("data/users.txt", "a");
    // /* username.txtに書く込む */
    fwrite($file,$user_info."\n");

    // /* ファイルを閉じる */
    fclose($file);

    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録</title>
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

        input[type=text], input[type=email], input[type=password] {
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
    <h2>パーソナルジム<br> ユーザー登録　　　</h2>
    <form action="" method="post">
        ユーザー名：<input type = "text" name="username"><br>
        メールアドレス：<input type = "email" name="email"><br>
        パスワード：<input type = "password" name="password"><br>
        <input type="submit" vallue="登録">
    </form>
</body>
</html>
