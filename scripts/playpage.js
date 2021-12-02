'use strict';

var x = 56;
var y = 224;
var sizex = 56;
var sizey = 56;

var facing = "north"; 

function setupCanvas(){
  var canvas = document.getElementById("canvas");
  canvas.width = 280;
  canvas.height = 280;

  var ctx = canvas.getContext("2d");

  ctx.drawImage(
      carfront, x, y, sizex, sizey
  )
}

function showCode() {
  // Generate JavaScript code and display it.
  Blockly.JavaScript.INFINITE_LOOP_TRAP = null;
  var code = Blockly.JavaScript.workspaceToCode(workspace);
  if (code){
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
    init: function() {
      this.appendValueInput("VALUE").setCheck("String").appendField("Move Forward");
      this.setPreviousStatement(true, null);
      this.setNextStatement(true, null);
      this.setColour(255);
   this.setTooltip("Moves the car forward"); 
   this.setHelpUrl("");
    }
  };
  
Blockly.Blocks['left'] = {
  init: function() {
    this.appendValueInput("VALUE").setCheck("String").appendField("Turn Left");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(255);
  this.setTooltip("Moves the car left");
  this.setHelpUrl("");
  }
};
  
Blockly.Blocks['right'] = {
  init: function() {
    this.appendValueInput("VALUE").setCheck("String").appendField("Turn Right");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(255);
  this.setTooltip("Moves the car right");
  this.setHelpUrl("");
  }
};

Blockly.Blocks['while'] = {
  init: function() {
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
Blockly.JavaScript['forward'] = function(block) {
  var code = "moveForward()\n";
  return code;
  };

// Move left block return
Blockly.JavaScript['left'] = function(block) {
  var code = "turnLeft()\n";
  return code;
};

// Move right block return
Blockly.JavaScript['right'] = function(block) {
  var code = "turnRight()\n";
  return code;
};

//Move car till the end
Blockly.JavaScript['while'] = function(block) {
  var branch = Blockly.statementToCode(block, 'DO');
  if (Blockly.JavaScript.INFINITE_LOOP_TRAP) {
    branch = Blockly.JavaScript.INFINITE_LOOP_TRAP.replace(/%1/g,
        '\'block_id_' + block.id + '\'') + branch;
  }
  return 'while (notDone()) {\n' + branch + '}\n';
};

function moveForward(){
  var canvas = document.getElementById("canvas");
  var ctx = canvas.getContext("2d");
  ctx.clearRect(0,0, canvas.width, canvas.height);
  
  if (facing == "north"){
    y -= 56;
    ctx.drawImage(carfront, x, y, sizex, sizey);
  }
  else if(facing == "east"){
    x += 56;
    ctx.drawImage(carright, x, y, sizex, sizey);
  }
  else if(facing == "west"){
    x -= 56;
    ctx.drawImage(carleft, x, y, sizex, sizey);
  }
  else{
    y += 56;
    ctx.drawImage(carback, x, y, sizex, sizey);
  }  
} 

function turnRight(){
  var canvas = document.getElementById("canvas");
  var ctx = canvas.getContext("2d");
  ctx.clearRect(0,0, canvas.width, canvas.height);

  if(facing == "north"){
    facing = "east";
    ctx.drawImage(carright, x, y, sizex, sizey);
  }
  else if (facing == "east"){
    facing = "south";
    ctx.drawImage(carback, x, y, sizex, sizey);
  }
  else if (facing == "south"){
    facing = "west";
   ctx.drawImage(carleft, x, y, sizex, sizey);
  }
  else{
    facing = "north";
    ctx.drawImage(carfront, x, y, sizex, sizey);
  }
} 

function turnLeft(){
  var canvas = document.getElementById("canvas");
  var ctx = canvas.getContext("2d");
  ctx.clearRect(0,0, canvas.width, canvas.height);

  if(facing == "north"){
    facing = "west";
    ctx.drawImage(carleft, x, y, sizex, sizey);
  }
  else if (facing == "east"){
    facing = "north";
    ctx.drawImage(carfront, x, y, sizex, sizey);
  }
  else if (facing == "south"){
    facing = "east";
   ctx.drawImage(carright, x, y, sizex, sizey);
  }
  else{
    facing = "south";
    ctx.drawImage(carback, x, y, sizex, sizey);
  }
}

