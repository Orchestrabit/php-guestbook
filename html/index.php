<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>PHP Guest Book</title>
</head>
<body>

<h1>PHP Guest Book</h1>


<?php
include(dirname(__FILE__) . '/../config/setting.php');

try {
    $pdo = new PDO(
        "mysql:host=$db_host;dbname=$db_name;charset=utf8", 
        $db_user, 
        $db_pass, 
        array(PDO::ATTR_EMULATE_PREPARES => false)
    );


} catch (PDOException $e) {
    exit('データベース接続失敗。'.$e->getMessage());
}

?>

<hr>

<form action="./database.php" method="post">
    <div>
        <label>名前：</label>
        <input name="name" id="say" value="">
    </div>
    <div>
        <label>住所：</label>
        <input name="address" id="say" value="">
    </div>
    <div>
        <label>電話：</label>
        <input name="tel" id="say" value="">
    </div>
    <div>
        <button>登録</button>
    </div>
</form>

<hr>


<?php
$stmt = $pdo->query("SELECT * FROM tbl_guestbook");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

print "<table>";

if (count($rows) > 0) {

    foreach($rows as $row) {
        print "<tr>";
        print "<td style='border-style: none;'>" . $row["id"] . "</td>";
        print "<td style='border-style: none;'>" . $row["name"] . "</td>";
        print "<td style='border-style: none;'>" . $row["address"] . "</td>";
        print "<td style='border-style: none;'>" . $row["tel"] . "</td>";
        print "</tr>";
    }

}

print "</table>";

?>

</body>
</html>




