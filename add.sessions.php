<?php
ini_set('display_errors', "On");

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    /* 既存のセッションデータを読み込む */
    $sessions = file("sessions.text");
    $maxId = 0;
    foreach ($sessions as $session){
        list($id) = explode(",", trim($sessions));
        if ($id > $maxId){
            $maxId = $id;
        }
    }
    var_dump($maxId);

    /* 新しいセッションID */
    $newId = $maxId +1;

    /* 新しいセッションデータを文字列に変換し変数に代入 */
    $c = ",";
    $sessionData = $_POST["newId"].$c.$_POST["date"].$c.$_POST["name"].$c.$_POST["startTime"].$c.$_POST["endTime"]."\n";

    // //sessions.txtにセッションを追加
    $file = fopen("data/sessions.txt","a");
    fwrite ($file,$sessionData);
    fclose ($file);

    echo "レッスンが追加されました";
};

?>

<!DOCTYPE html>
<html>
<head>
    <title>セッション追加</title>
</head>
<body>
    <h2>新しいトレーニングセッションを追加</h2>
    <form method="post">
        日付: <input type="date" name="date" required><br>
        セッション名: <input type="text" name="name" required><br>
        開始時間: <input type="time" name="startTime" required><br>
        終了時間: <input type="time" name="endTime" required><br>
        <input type="submit" value="追加">
    </form>
</body>
</html>