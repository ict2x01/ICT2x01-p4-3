<?php
    if (!isset( $_POST['submitted'])){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    $credentials = [  
    'password' => 'password1' 
    ]; 

    if ($credentials['password'] !== $_POST['password']) { 
        echo "<script>$(document).ready(function(){ $('#myModal').modal('show'); });</script>
        <div class='modal fade' id='myModal' role='dialog'>
            <div class='modal-dialog modal-lg'>
              <div class='modal-content'>
                <div class='modal-body'>
                  <p>Wrong Password</p>
                </div>
                    <div class='modal-footer'>
                        <a href='../index.php'>
                            <button type='button' class='btn btn-default' data-dismiss='modal'>Leave</button>
                         </a>
                    </div>
                </div>
            </div>
        </div>";
        exit(); 
    }
        
    

    session_start(); 

    // Storing session data 
    $_SESSION["isLogged"] = "1"; 

    // login successful - redirect user to any page you want // replace 'home.php' with your landing page url 

    header('Location:' . '../templates/trainer.php'); 

    exit();
?>