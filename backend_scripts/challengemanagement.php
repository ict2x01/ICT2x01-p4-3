<?php 
class challengeManagement{

    public function db_connection($db_filepath){
        $db = new SQLite3($db_filepath);
        return $db;
    }

    public function retrieveAllChallenges($db_filepath){
        $db_con = $this->db_connection($db_filepath);
        
        $sql_stmt = "SELECT * from challenges";
        $prepared_stmt = $db->prepare($sql_stmt);
        $res = $prepared_stmt->execute();

        return $res; //return all in db
    }

    public function deleteChallenges($db_filepath, $id){
        $db_con = $this->db_connection(db_filepath);

        $sql_stmt = "DELETE FROM challenges WHERE id=:id";
        $prepared_stmt = $db->prepare($sql_stmt); //prepare the statement
        $prepared_stmt->bindValue(':id', $id);
        $prepared_stmt->execute();//execute statement
        
        $db->close;
    }

    public function takeChallenge($db_filepath, $id){
        $db_con = $this->db_connection(db_filepath);

        $sql_stmt = "SELECT * from challenges WHERE id=:id";
        $prepared_stmt = $db->prepare($sql_stmt); //prepare the statement
        $prepared_stmt->bindParam(":id", $id);
        $res = $prepared_stmt->execute();//execute statement
        
        return $res->fetchArray(SQLITE3_ASSOC)["map"]; //return one row based on id
    }

    public function insertChallenge($db_filepath){
        $db_con = db_connection(db_filepath);

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
    }
}

?>