var canvas = document.querySelector("canvas");
var tilesetContainer = document.querySelector(".tileset-container");
var tilesetSelection = document.querySelector(".tileset-container_selection");
var tilesetImage = document.querySelector("#tileset-source");

var selection = [0, 0]; //Which tile we will paint from the menu

var isMouseDown = false;
var currentLayer = 0;
var layers = [{}];

//Select tile from the Tiles grid
tilesetContainer.addEventListener("mousedown", (event) => {
   selection = getCoords(event);
   tilesetSelection.style.left = selection[0] * 100 + "px";
   tilesetSelection.style.top = selection[1] * 100 + "px";
});

//Handler for placing new tiles on the map
function addTile(mouseEvent) {
   var clicked = getCoords(event);
   var key = clicked[0] + "-" + clicked[1];

   if (mouseEvent.shiftKey) {
      delete layers[currentLayer][key];
   } else {
      layers[currentLayer][key] = [selection[0], selection[1]];
   }
   draw();
}

//Bind mouse events for painting (or removing) tiles on click/drag
canvas.addEventListener("mousedown", () => {
   isMouseDown = true;
});
canvas.addEventListener("mouseup", () => {
   isMouseDown = false;
});
canvas.addEventListener("mouseleave", () => {
   isMouseDown = false;
});
canvas.addEventListener("mousedown", addTile);
canvas.addEventListener("mousemove", (event) => {
   if (isMouseDown) {
      addTile(event);
   }
});

//Utility for getting coordinates of mouse click
function getCoords(e) {
   const { x, y } = e.target.getBoundingClientRect();
   const mouseX = e.clientX - x;
   const mouseY = e.clientY - y;
   return [Math.floor(mouseX / 100), Math.floor(mouseY / 100)];
}

// Save image to database
function saveImage() {
   var data = canvas.toDataURL();

   if(isCanvasBlank(canvas)){
      var modal_err = document.getElementById("modal_fail");
            var span_err = document.getElementsByClassName("close2")[0];
            modal_err.style.display = "block";
            span_err.onclick = function() {
               modal_err.style.display = "none";
            }
            window.onclick = function(event) {
               if (event.target == modal) {
                  modal_err.style.display = "none";
               }
            }
         }
   else{
      $.ajax({
         type: "POST",
         //from where the root file is at (ask daniel if dont know)
         url: "/backend_scripts/challengemanagement.php",
         data: "img=" + data,
         success: function(response){
            var modal = document.getElementById("modal_succ");
            var span = document.getElementsByClassName("close")[0];
            modal.style.display = "block";
            span.onclick = function() {
               modal.style.display = "none";
            }
            window.onclick = function(event) {
               if (event.target == modal) {
                  modal.style.display = "none";
               }
            }
            clearCanvas();
         }
      });
   }
}
   

//Reset state to empty
function clearCanvas() {
   layers = [{}];
   draw();
}

//Checking canvas if its empty
function isCanvasBlank(canvas){
   var ctx = canvas.getContext("2d");

   const pixelBuffer = new Uint32Array(ctx.getImageData(0, 0, canvas.width, canvas.height).data.buffer);

   return !pixelBuffer.some(color => color!=0);
}

//Drawing tiles into canvas
function draw() {
   var ctx = canvas.getContext("2d");
   ctx.clearRect(0, 0, canvas.width, canvas.height);

   var size_of_crop = 100;
   
   layers.forEach((layer) => {
      Object.keys(layer).forEach((key) => {
         //Determine x/y position of this placement from key ("3-4" -> x=3, y=4)
         var positionX = Number(key.split("-")[0]);
         var positionY = Number(key.split("-")[1]);
         var [tilesheetX, tilesheetY] = layer[key];

         ctx.drawImage(
            tilesetImage,
            tilesheetX * 100,
            tilesheetY * 100,
            size_of_crop,
            size_of_crop,
            positionX * 100,
            positionY * 100,
            size_of_crop,
            size_of_crop
         );
      });
   });
}

//Initialize app when tileset source is done loading
tilesetImage.onload = function() {
   draw();
}

//image source in base64 encode if not canvas dont let me save to database 
tilesetImage.src = "../images/spritesheet.png"