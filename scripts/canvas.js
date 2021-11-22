
function setupCanvas(){
    var canvas = document.getElementById("canvas");
    canvas.width = 280;
    canvas.height = 280;

    var ctx = canvas.getContext("2d");

    ctx.drawImage(
        carfront, 0, 0, 56, 56
    )
}

