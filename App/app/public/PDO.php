<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDO Örnek</title>
</head>

<body>

    <?php
    $host = 'db';
    $db_name = 'APP';
    $user = 'root';
    $pass = 'secret';
    $charset = 'utf8mb4';
    $port = '3306';

    $dsn = "mysql:host=$host;dbname=$db_name;port=$port;charset=$charset";

    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false
    ];
    try {
        $dbh = new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }

    if (isset($_POST['btn'])) {
        $name = $_FILES['myfile']['name'];
        $type = $_FILES['myfile']['type'];
        $data = file_get_contents($_FILES['myfile']['tmp_name']);
        $stmt = $dbh->prepare("insert into myblob values(null,?,?,?)");
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $type);
        $stmt->bindParam(3, $data);
        $stmt->execute();
    }

    ?>

    <form method="post" enctype="multipart/form-data">
        <input type="file" name="myfile" />
        <input type="hidden" name="MAX_FILE_SIZE" value="20971520" />
        <button name="btn">Gönder</button>
    </form>
    <br>
    <ol>
        <?php
        $stat = $dbh->prepare("select * from myblob");
        $stat->execute();
        while ($row = $stat->fetch()) {
            echo "<li>" . $row['name'] . "</li>";
        }
        ?>
    </ol>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>