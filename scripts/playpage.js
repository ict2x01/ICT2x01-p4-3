'use strict';
function setupCanvas() {
  var ctx = canvas.getContext("2d");
  var background = new Image();
  var player = new Image();

  background.onload = function () {
    ctx.drawImage(background, 0, 0, width, height);
    player.src = playericn;
  }
  player.onload = function () {
    ctx.drawImage(player, pos_x, pos_y, block_size, block_size);
  }
  background.src = bgimage;
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

function resetCanvas() {
  var ctx = canvas.getContext("2d");
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  pos_x = 56;
  pos_y = 224;
  setupCanvas();
}

function showCode() {
  // Generate JavaScript code and display it.
  Blockly.JavaScript.INFINITE_LOOP_TRAP = null;
  var code = Blockly.JavaScript.workspaceToCode(workspace);
  if (code) {
    alert(code);
  }
}

function runCode() {
  // Generate JavaScript code and run it.
  window.LoopTrap = 1000;
  Blockly.JavaScript.INFINITE_LOOP_TRAP =
    'if (--window.LoopTrap == 0) throw "Infinite loop.";\n';
  var code = Blockly.JavaScript.workspaceToCode(workspace);
  Blockly.JavaScript.INFINITE_LOOP_TRAP = null;
  try {
    eval(code);
  } catch (e) {
    alert(e);
  }
}

//setTooltip is for hovering overm player can see what the command do 
Blockly.Blocks['forward'] = {
  init: function () {
    this.appendValueInput("VALUE").setCheck("String").appendField("Move Forward");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(255);
    this.setTooltip("Moves the car forward");
    this.setHelpUrl("");
  }
};

Blockly.Blocks['left'] = {
  init: function () {
    this.appendValueInput("VALUE").setCheck("String").appendField("Move Left");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(255);
    this.setTooltip("Moves the car left");
    this.setHelpUrl("");
  }
};

Blockly.Blocks['right'] = {
  init: function () {
    this.appendValueInput("VALUE").setCheck("String").appendField("Move Right");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(255);
    this.setTooltip("Moves the car right");
    this.setHelpUrl("");
  }
};

Blockly.Blocks['down'] = {
  init: function () {
    this.appendValueInput("VALUE").setCheck("String").appendField("Move Down");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(255);
    this.setTooltip("Moves the car right");
    this.setHelpUrl("");
  }
};

Blockly.Blocks['while'] = {
  init: function () {
    this.appendDummyInput()
      .appendField("repeat until")
      .appendField(new Blockly.FieldImage("https://www.gstatic.com/codesite/ph/images/star_on.gif", 15, 15, { alt: "*", flipRtl: "FALSE" }));
    this.appendStatementInput("DO")
      .setCheck(null)
      .appendField("do");
    this.setColour(120);
    this.setTooltip("Move until it reaches the end!");
    this.setHelpUrl("");
  }
};

//Displaying command on screen, used by function [showCode()] 
Blockly.JavaScript['forward'] = function (block) {
  var code = "moveForward()\n";
  return code;
};

// Move left block return
Blockly.JavaScript['left'] = function (block) {
  var code = "moveLeft()\n";
  return code;
};

// Move right block return
Blockly.JavaScript['right'] = function (block) {
  var code = "moveRight()\n";
  return code;
};

// Move right block return
Blockly.JavaScript['down'] = function (block) {
  var code = "moveDown()\n";
  return code;
};

//Move car till the end
Blockly.JavaScript['while'] = function (block) {
  var branch = Blockly.statementToCode(block, 'DO');
  if (Blockly.JavaScript.INFINITE_LOOP_TRAP) {
    branch = Blockly.JavaScript.INFINITE_LOOP_TRAP.replace(/%1/g,
      '\'block_id_' + block.id + '\'') + branch;
  }
  return 'while (notDone()) {\n' + branch + '}\n';
};

