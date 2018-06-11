<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>HTML5サンプル</title>
</head>
<body>

<?php
include(dirname(__FILE__) . '/../config/setting.php');

if ($_POST['name'] == '') {

    print "<p>名前が設定されていません</p>";

} else {

    try {
        $pdo = new PDO(
            "mysql:host=$db_host;dbname=$db_name;charset=utf8", 
            $db_user, 
            $db_pass, 
            array(PDO::ATTR_EMULATE_PREPARES => false)
        );

        $stmt = $pdo -> prepare("INSERT INTO tbl_guestbook (name, address, tel) VALUES (:name, :address, :tel)");
        $stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
        $stmt->bindParam(':address', $_POST['address'], PDO::PARAM_STR);
        $stmt->bindParam(':tel',  $_POST['tel'], PDO::PARAM_STR);

        $stmt->execute();

        print "<p>データベースに登録しました</p>";

    } catch (Exception $e) {
        exit('データベースエラー'.$e->getMessage());
    }

}

?>

<a href="./">戻る</a>

</body>
</html>