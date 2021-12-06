<?php require_once "../backend_scripts/retrievechallenge.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "head.html";
    ?>
    <link rel="stylesheet" href="../styles/playpage.css">

    <!-- Scripts for injecting Blockly -->
    <script src="https://unpkg.com/blockly"></script> <!-- have to be first-->
    <script src="../scripts/playpage.js"></script>

    <title></title>

</head>
<header>
    <h1>Play Challenge!</h1>
    <div>
        <!-- back to index page -->
        <a type="submit" class="primary-button" href="../index.php">
            < Back</a>
    </div>
</header>

<body onload="setupCanvas()">
    <div class="container">
        <div class="row mt-5 mb-2" style=height:300px>
            <div class="col-2">
                <div id="instructions" class="col">
                    <!-- go to selectpage -->
                    <button type="button" class="primary-button w-100" onclick="showInstructions()">Instructions</button>
                </div>
            </div>
            <!-- Map columns (size 10)-->
            <div id="mapArea" class="bg border rounded-2 col-8" style="height:300px">
                <!-- Map Area-->
                <canvas class="canvas" width="280" height="280"></canvas>
            </div>
            <!-- End of Map column-->

            <!-- Button column (size 2)-->
            <div class="col-2">
                <div class="row mb-2">
                    <div id="selectButton" class="col">
                        <!-- go to selectpage -->
                        <a type="submit" class="primary-button w-100" href="selectpage.php">Select Challenge</a>
                    </div>
                </div>
                <div class="row mb-2">
                    <div id="clearButton" class="col">
                        <button type="button" class="primary-button w-100" onclick="resetCanvas()">Reset Challenge</button>
                    </div>
                </div>
            </div>
            <!-- End of Button column-->
        </div>
    </div>

    <div class="container">
        <div class="row rounded-2 mt-4">
            <!-- Blockly Area -->
            <div id="blocklyArea" style="height: 430px" class=" border col-9"></div>
            <!-- End of Blockly Area -->

            <!-- Command History Area -->
            <div class="border rounded col-3">
                <div class="row">
                    <div id="commandHistTitle" class="col-12 border-bottom border-3 text-center">
                        <p> Command History </p>
                    </div>
                    <div id="commandHistArea" class="col-12" style=" height:380px; overflow-y: scroll;">
                        <!-- command history area -->
                        <p id="cmds" class="text-break fs-3 text-center"></p>
                    </div>
                </div>
            </div>
            <!-- End of Command History Area -->
        </div>

        <div class="row mt-1 mb-2">
            <button type="button" class="primary-button" onclick="runCode()">Send Commands</button>
        </div>
    </div>

    <div id="modal_succ" class="modal">
        <div class="modal-success">
            <span class="close">&times;</span>
            <h2>Congragulations! You have won the challenge!</h2>
            <!-- go to select page -->
            <a class="primary-button" href="selectpage.php">Select a new challenge</a>
        </div>
    </div>

    <div id="modal_inc" class="modal">
        <div class="modal-success">
            <span class="close2">&times;</span>
            <h2>How to play the game!</h2>
            <hr>
            <p> To start a new game, you have to select a challenge! "Select challenge" </p>
            <p> The "Reset Challenge" button will reset your challenges back to square 1! </p>
            <p> To create a new movement, drag and drop blocks into the whiteboard area!</p>
            <p> To delete a created movement, drag the block into the rubbish bin! </p>
            <p> After you are done creating a movement, select on "Send Command" and watch it appear in your command history!</p>
        </div>
    </div>


    <div id="blocklyDiv" style="position:absolute"></div>

    <!-- Toolbox of blockly (the commands) -->
    <xml id="toolbox" style="display: none">
        <block type="forward"></block>
        <block type="left"></block>
        <block type="right"></block>
        <block type="down"></block>
        <block type="while"></block>
    </xml>


    <!-- Placing the blocklyDiv over the blocklyArea-->
    <script>
        var blocklyArea = document.getElementById('blocklyArea');
        var blocklyDiv = document.getElementById('blocklyDiv');
        var workspace = Blockly.inject(blocklyDiv, {
            toolbox: document.getElementById('toolbox'),
            trashcan: true,
            zoom: {
                pinch: true,
                controls: true
            },
        });
        var onresize = function(e) {
            // Compute the absolute coordinates and dimensions of blocklyArea.
            var element = blocklyArea;
            var x = 0;
            var y = 0;
            do {
                x += element.offsetLeft;
                y += element.offsetTop;
                element = element.offsetParent;
            } while (element);

            // Position blocklyDiv over blocklyArea.
            blocklyDiv.style.left = x + 'px';
            blocklyDiv.style.top = y + 'px';
            blocklyDiv.style.width = blocklyArea.offsetWidth + 'px';
            blocklyDiv.style.height = blocklyArea.offsetHeight + 'px';
            Blockly.svgResize(workspace);
        };
        window.addEventListener('resize', onresize, false);
        onresize();
        Blockly.svgResize(workspace);
    </script>

    <script>
        'use strict';
        var block_size = 56;
        var pos_x = 56;
        var pos_y = 224;
        var width = 280;
        var height = 280;
        var histarr = new Array();

        var bgimage = "<?php echo takeChallenge($_GET["id"]); ?>";
        var playericn = "../images/player.png";

        var win_x = 224;
        var win_y = 0;

        var canvas = document.querySelector("canvas");

        //functions that will execute upon block sending
        function moveForward() {
            if (pos_y == 0) {
                alert("Cant move anymore!");
            } else {
                pos_y -= block_size;
                console.log("move");
                var ctx = canvas.getContext("2d");
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                storehist("Forward");

                setupCanvas();
                gameOver();
            }
        }

        function moveRight() {
            if (pos_x == 224) {
                alert("Cant move anymore!");
            } else {
                pos_x += block_size;
                var ctx = canvas.getContext("2d");
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                storehist("Right");

                setupCanvas();
                gameOver();
            }
        }

        function moveLeft() {
            if (pos_x == 0) {
                alert("Cant move anymore!");
            } else {
                pos_x -= block_size;
                var ctx = canvas.getContext("2d");
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                storehist("Left");

                setupCanvas();
                gameOver();
            }
        }

        function moveDown() {
            if (pos_y == 224) {
                alert("Cant move anymore!");
            } else {
                pos_y += block_size;
                var ctx = canvas.getContext("2d");
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                storehist("Down");

                setupCanvas();
                gameOver();
            }
        }

        function gameOver() {
            console.log("check");
            if (pos_x == win_x && pos_y == win_y) {
                var modal = document.getElementById("modal_succ");
                modal.style.display = "block";
                var span = document.getElementsByClassName("close")[0];
                span.onclick = function() {
                    modal.style.display = "none";
                }
            }
        }

        function showInstructions() {
            var modal_err = document.getElementById("modal_inc");
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

        //Add commands to array
        function storehist(data) {
            histarr.push(data);
            outputhist();
        }

        let text = "";
        //drawing 
        function outputhist() {
            const h_arr = histarr;
            h_arr.forEach(printhist)
            document.getElementById("cmds").innerHTML = text;
            histarr = [];
        }

        function printhist(item) {
            text += item + "<br>";
        }
    </script>
</body>

</html>