<?php
#veri tabanı bağlantısı
$servername = "db";
$username = "root";
$password = "secret";
$dbName = "APP";

$conn = new mysqli($servername, $username, $password, $dbName);

if (!$conn) {
    die("Bağlantı kurulamadı: " . mysqli_connect_error());
}

$sql = "SELECT id, name FROM student";
$set = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Öğrenci</title>
</head>

<body>
    <p>Veri tabanına otomatik olarak aktarılmış olan bilgiler aşağıda yer almaktadır.</p>

    <table>
        <thead>
            <th>Öğrenci No</th>
            <th>Öğrendi Adı</th>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_array($set)) :
            ?>

                <?php echo '<tr>' ?>

                <?php echo '<td>' . $row['id'] . '</td>' ?>
                <?php echo '<td>' . $row['name'] . '</td>' ?>

                <?php echo '</tr>' ?>

            <?php endwhile; ?>

            <?php mysqli_close($conn); ?>

        </tbody>
    </table>

</body>

</html>