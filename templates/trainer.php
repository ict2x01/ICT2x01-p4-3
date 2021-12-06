<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "head.html";
    ?>
    <link rel="stylesheet" href="../styles/trainer.css">
</head>

<body>
    <div class="card" style="width: 200rem;">
        <!-- Header area -->
        <header>
            <h1>Welcome Trainer!</h1>
            <div>
                <!-- back to trianer page -->
                <a type="submit" class="btn btn-primary btn-lg" href="../index.php">
                    < LogOut!</a>
            </div>
        </header>
        <!-- End of Header area-->

        <div class="card-body">
            <h5 class="card-title">To create a new challenge please select on "Create challenge" button below!</h5>
            <h5 class="card-title">To delete a challenge please select on "Delete challenge" button below!</h5>
            <a href="createpage.php" class="card-link">Create Challenge</a>
            <a href="deletepage.php" class="card-link">Delete Challenge</a>
        </div>
    </div>
</body>

</html>