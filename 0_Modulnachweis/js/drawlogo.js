// draw the logo of our cooking book
let c = document.getElementById("canvaslogo");
let ctx = c.getContext("2d");
ctx.beginPath();
    ctx.lineWidth = 2;

    // Border top
    ctx.moveTo(5,5);
    ctx.lineTo(295,5);

    // border bottom
    ctx.moveTo(5,380);
    ctx.lineTo(295,380);

    // border left
    ctx.moveTo(5,5);
    ctx.lineTo(5,380);

    // Border right
    ctx.moveTo(295,5);
    ctx.lineTo(295,380);

    // bottom of head
    ctx.moveTo(65,340);
    ctx.lineTo(240,340);

    ctx.moveTo(65,290);
    ctx.lineTo(240,290);

    ctx.moveTo(65,340);
    ctx.lineTo(65,190);

    ctx.moveTo(240,340);
    ctx.lineTo(240,190);
    ctx.stroke();

// bottom
ctx.beginPath();
    ctx.lineWidth = 2;

    ctx.arc(150, 150, 50, Math.PI*0.83,0.5, true);
    ctx.stroke();
// left
ctx.beginPath();
    ctx.lineWidth = 2;

    ctx.arc(72, 140, 50, Math.PI*1.70,Math.PI/4, true);
    ctx.stroke();
// top
ctx.beginPath();
    ctx.lineWidth = 2;

    ctx.arc(150, 98, 50, 0,Math.PI, true);
    ctx.stroke();
// left
ctx.beginPath();
    ctx.lineWidth = 2;

    ctx.arc(232, 140, 50, Math.PI/1.28,Math.PI*1.28, true);
    ctx.stroke();

ctx.closePath();
