<<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>チャット</title>
    <style>
        body {
            background-color: #222;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: white;
        }
        .container {
            margin: 2% auto;
            max-width: 800px;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }
        h2 {
            color: #FF9800;
        }
        form {
            display: flex;
            flex-direction: column;
            margin-top: 10px;
        }
        form input[type="text"] {
            padding: 5px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }
        form input[type="submit"],
        a button {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            background-color: #FF9800;
            color: white;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
        }
        form input[type="submit"]:hover,
        a button:hover {
            background-color: #FFB74D;
        }
        hr {
            margin: 20px 0;
            border: none;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        .log-entry {
            padding-left: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>チャット(掲示板型)</h2>
        <form action="input.php" method="post">
            <span>名前 </span>
            <input type="text" size="10" autocomplete="name" name="name" value="<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : ''; ?>">
            <br>
            <span>本文 </span>
            <input type="text" size="30" autocomplete="no" name="maintext">
            <input type="submit" value="送信">
        </form>
        <a href="index.php"><button>メッセージ更新</button></a>
        <a href="upfile.php"><button>ファイルUP</button></a>
        <a href="archive.php"><button>アーカイブ</button></a>
        <hr>
        <br>
        <?php
            $databaseFile = './date/chat.db';
            $db = new SQLite3($databaseFile);

            $query = 'SELECT * FROM posts ORDER BY id DESC';
            $results = $db->query($query);

            while ($row = $results->fetchArray()) {
                $log_entry = '<p>' . htmlspecialchars($row['name']) . ' : ' . htmlspecialchars($row['maintext']) . '　　　' . htmlspecialchars($row['timestamp']) . '</p>';
                echo '<div class="log-entry">' . $log_entry . '</div>';
            }

            $db->close();
        ?>
    </div>
</body>
</html>
