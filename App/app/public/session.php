<?php
session_name('USER1');
session_start();
echo $_SESSION['db'];

echo " index.php'de görülen sistem değişkenidir, bu değişken redisten gelmektedir.";