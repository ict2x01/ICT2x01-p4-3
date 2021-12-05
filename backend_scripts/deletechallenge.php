<?php

function retrieveAllChallenges(){
    $db_filepath = "../../challenges.db";
    $db = new SQLite3($db_filepath);
    $sql_stmt = "SELECT * from challenges";
    $prepared_stmt = $db->prepare($sql_stmt);
    $res = $prepared_stmt->execute();

    return $res; //return all in db
}

function deleteChallenge($id){
    $db_filepath = "../../challenges.db";
    $db = new SQLite3($db_filepath);

    $sql_stmt = "DELETE FROM challenges WHERE id=:id";
    $prepared_stmt = $db->prepare($sql_stmt); //prepare the statement
    $prepared_stmt->bindValue(':id', $id);
    $prepared_stmt->execute();//execute statement
    
    $db->close;
}

if($_SERVER["REQUEST_METHOD"]==="POST"){deleteChallenge($_POST["id"]);} 

?>