'use strict';

var x = 56;
var y = 224;
var sizex = 56;
var sizey = 56;

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
    this.appendValueInput("VALUE").setCheck("String").appendField("Move Left");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(255);
  this.setTooltip("Moves the car left");
  this.setHelpUrl("");
  }
};
  
Blockly.Blocks['right'] = {
  init: function() {
    this.appendValueInput("VALUE").setCheck("String").appendField("Move Right");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(255);
  this.setTooltip("Moves the car right");
  this.setHelpUrl("");
  }
};
  
Blockly.Blocks['backward'] = {
  init: function() {
    this.appendValueInput("VALUE").setCheck("String").appendField("Move Backward");
    this.setPreviousStatement(true, null);
    this.setNextStatement(true, null);
    this.setColour(255);
  this.setTooltip("Moves the car backward");
  this.setHelpUrl("");
  }
};

//Displaying command on screen, used by function [showCode()] 
Blockly.JavaScript['forward'] = function(block) {
  return moveForward();
  };

// Move left block return
Blockly.JavaScript['left'] = function(block) {
  var code = "moveLeft()\n";
  return code;
};

// Move right block return
Blockly.JavaScript['right'] = function(block) {
  var code = "moveRight()\n";
  return code;
};

// Move backward block return
Blockly.JavaScript['backward'] = function(block) {
  var code = "moveBackward()\n";
  return code;
};

function moveForward(){
  y -= 56;
  var canvas = document.getElementById("canvas");
  var ctx = canvas.getContext("2d");

  ctx.drawImage(
      carfront, x, y, sizex, sizey
  )
}