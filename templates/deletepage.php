<?php require "../backend_scripts/deleteChallenge.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
    include "head.html";
  ?>
  <link rel="stylesheet" href="../styles/deletepage.css">
  <script src="../scripts/deletepage.js"></script>

    <title>Delete Page</title>
</head>
<body>
    <!-- Header area -->
    <header>
      <h1>Delete a challenge!</h1>
      <!-- back to trainer page -->
      <a type="submit" class="primary-button" href=""> < Back</a>
   </header>
   <!-- End of Header area-->
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php
        $res = retrieveAllChallenges();
        while ($row = $res->fetchArray()) {
      ?>
      <div class="col text-center">
        <div class="card text-center h-100" style="width:18rem:;">
          <img src="<?php echo $row["map"]; ?>" alt="Avatar" style="width:100%">
          <div class="card-body">
            <button type="submit" class="danger-button" onclick="deleteImage(<?php echo $row['id']; ?>)">Delete</button>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
    <div id="modal_succ" class="modal">
      <div class="modal-success clearfix">
          <h2>Challenge Deleted Successfully!</h2>
          <a class="btn btn-primary btn-lg float-right" href="deletepage.php">OK!</a>
      </div>
    </div>
</body>
</html>