<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      include "head.html";
   ?>
    <link rel="stylesheet" href="../styles/createpage.css">
    <script src="../scripts/createpage.js"></script>
    
    <title>Creation Page</title>
</head>
<body>
    <div class="card">
        <!-- Header area -->
        <header>
           <h1>Challenge Creation</h1>
           <div>
              <!-- back to trianer page -->
            <a type="submit" class="primary-button" href="trainer.php"> < Back</a>
           </div>
        </header>
        <!-- End of Header area-->

        <div class="card_body">
            <!-- Sidebar where all the tiles to be chosen goes-->
           <aside>
              <label>Tiles</label>
              <div class="tileset-container">
                 <img id="tileset-source" crossorigin="anonymous"/>
                 <div class="tileset-container_selection"></div>
              </div>
           </aside>

           <div>

           </div>

           <div class="card_right-column">
              <!-- The main canvas -->
              <canvas width="500" height="500"></canvas>

              <p class="instructions">
                 <strong>Click</strong> to paint.
                 <strong>Shift+Click</strong> to remove.
              </p>
              <button id="btn" class="primary-button" onclick="saveImage()">Complete!</button>
              <button class="button-as-link" onclick="clearCanvas()">Clear Canvas</button>
           </div>

           <div id="modal_succ" class="modal">
               <div class="modal-success">
                  <span class="close">&times;</span>
                  <h2>Challenge Successfully Added! Thank you!</h2>
               </div>
            </div>
            <div id="modal_fail" class="modal">
               <div class="modal-failure">
                  <span class="close2">&times;</span>
                  <h2>ERROR: Canvas is empty! Please draw something before submitting</h2>
               </div>
           </div>
        </div>
     </div>
     <script src="../scripts/createpage.js"></script>
</body>
</html>