<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include "templates/head.html";
  ?>
  <link rel="stylesheet" href="../styles/index.css">
</head>

<body>
  <div class="card mb-3" style="width: 50rem;">
    <img class="card-img-top" src="images/car.jpg">
    <div class="card-body">
      <h1 class="card-title text-center">Welcome to the carKART project!</h1>
      <a class="btn btn-primary btn-lg" href="templates/playpage.php" role="button">PLAY!</a>
      <a class="btn btn-primary btn-lg" href="templates/dashboard.php" role="button">Dashboard</a>
      <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Trainer Login!</button>
      <?php
      if (isset($_SESSION["error"])) {
        $error = $_SESSION["error"];
        echo "<div><p>$error<p></div>";
      }
      ?>

      <div id="id01" class="modal">

        <form class="modal-content animate" action="scripts/login.php" method="post">
          <div class="text-center">
            <h2>Enter Master Password</h2>
          </div>

          <div class="container">
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <button type="submit">Login</button>
            <input type="hidden" name="submitted" value="1">
          </div>

          <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>
  </main>
</body>

</html>

<?php unset($_SESSION["error"]);
