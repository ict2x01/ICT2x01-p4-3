<?php 

class challengemanagementTest extends \PHPUnit\Framework\TestCase{
    public function test_symbolname(){
        $challenge = new project\challengemanagement;
        $result = $challenge->validatename("$@#@$$!");

        $this->assertEquals("Invalid challenge name.", $result);
    }

    public function test_emptyname(){
        $challenge = new project\challengemanagement;
        $result = $challenge->validatename("");

        $this->assertEquals("Invalid challenge name.", $result);
    }

    public function test_longname(){
        $challenge = new project\challengemanagement;
        $result = $challenge->validatename("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa");

        $this->assertEquals("Invalid challenge name.", $result);
    }

    public function test_correctname(){
        $challenge = new project\challengemanagement;
        $result = $challenge->validatename("Challenge Maze!");

        $this->assertEquals("", $result);
    }

    public function test_emptyendpoint(){
        $challenge = new project\challengemanagement;
        $result = $challenge->validatepoints("");

        $this->assertEquals("Invalid endpoints input.", $result);
    }

    public function test_symbolinendpoint(){
        $challenge = new project\challengemanagement;
        $result = $challenge->validatepoints("4%");

        $this->assertEquals("Invalid endpoints input.", $result);
    }

    public function test_longendpoint(){
        $challenge = new project\challengemanagement;
        $result = $challenge->validatepoints("444445");

        $this->assertEquals("Invalid endpoints input.", $result);
    }

    public function test_nonnumeralendpoint(){
        $challenge = new project\challengemanagement;
        $result = $challenge->validatepoints("a");

        $this->assertEquals("Invalid endpoints input.", $result);
    }

    public function test_correctendpoints(){
        $challenge = new project\challengemanagement;
        $result = $challenge->validatepoints("5");

        $this->assertEquals("", $result);
    }

}

?>