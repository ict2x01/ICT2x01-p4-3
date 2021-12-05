<?php

// path to database
$db_filepath = "../../challenges.db";
$db = new SQLite3($db_filepath);

$sql_stmt = "INSERT INTO challenges(map)" . "VALUES(:challengeimg)";
if(isset($_POST["img"])){
    $prepared_stmt = $db->prepare($sql_stmt);
    $prepared_stmt->bindParam(":challengeimg", str_replace(" ", "+", $_POST["img"]));
    $prepared_stmt->execute();
    $db->close();
}else{
    http_response_code(400); //error out http 400
    echo "fail";
}
?>
