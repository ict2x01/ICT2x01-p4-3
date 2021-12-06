<?php 

namespace project;

class challengeManagement{

    public function validatename($name) {
        $error = "";
    
        if (empty($name)) {
          $error .= "Invalid challenge name.";
        }
    
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $name)){
          $error .= "Invalid challenge name.";
        }
    
        if (strlen($name ) > 40) {
          $error .= "Invalid challenge name.";
        }
        return $error;
      }

    public function validatepoints($x) {
    $error = "";

    if (empty($x)) {
        $error .= "Invalid endpoints input.";
    }

    if (preg_match('/[\'^£$%&*!()}{@#~?><>,|=_+¬-]/', $x)){
        $error .= "Invalid endpoints input.";
    }

    if (strlen($x ) > 5) {
        $error .= "Invalid endpoints input.";
    }

    if(ctype_alpha($x)){
        $error .= "Invalid endpoints input.";
    }

    return $error;
    }
}
?>
