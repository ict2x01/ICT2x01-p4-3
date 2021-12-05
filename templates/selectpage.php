<?php require "../backend_scripts/retrievechallenge.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include "head.html";
    ?>
    <link rel="stylesheet" href="../styles/selectpage.css">
    
    <title>Select Page</title>
</head>
<body>
    <!-- Header area -->
    <header>
      <h1>Select a challenge!</h1>
      <!-- back to play page -->
      <a type="submit" class="primary-button" href="playpage.php"> < Back</a>
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
            <a type="submit" class="primary-button" href="playpage.php?id=<?php echo $row["id"]; ?>">Select</a>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
</body>
</html>