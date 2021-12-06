<?php

function retrieveAllChallenges(){
    $db_filepath = "../challenges.db";
    $db = new SQLite3($db_filepath);
    $sql_stmt = "SELECT * from challenges";
    $prepared_stmt = $db->prepare($sql_stmt);
    $res = $prepared_stmt->execute();

    return $res; //return all in db
}

function takeChallenge($id){
    $db_filepath = "../challenges.db";
    $db = new SQLite3($db_filepath);

    $sql_stmt = "SELECT * from challenges WHERE id=:id";
    $prepared_stmt = $db->prepare($sql_stmt); //prepare the statement
    $prepared_stmt->bindParam(":id", $id);
    $res = $prepared_stmt->execute();//execute statement
    
    return $res->fetchArray(SQLITE3_ASSOC)["map"]; //return one row based on id
}
?>