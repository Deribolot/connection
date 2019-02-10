<?php
/**
 * Created by PhpStorm.
 * User: Julia
 * Date: 12.12.2018
 * Time: 20:29
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

<?php

$dsn = 'oci:dbname=//localhost:1521/ORCL;charset=utf8';
$user = 'julia';
$password = 'julia';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
}

$stmt = $dbh->prepare("select * from test");
$stmt->execute();
$result = $stmt->fetchAll();
print_r($result);

if ($result = $dbh->query("select * from test")) {
    foreach ($result as $row) {
        print_r($row);
    }
} else {
    echo "Ошибка в запросе";
    var_dump($dbh->errorInfo());
}


phpinfo();
?>
</body>
</html>
