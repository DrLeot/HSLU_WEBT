// draw the logo of our cooking book
let c = document.getElementById("canvaslogo");
let ctx = c.getContext("2d");
ctx.beginPath();
    ctx.lineWidth = 5;

    ctx.moveTo(150,450);
    ctx.lineTo(350,450);

    ctx.moveTo(150,400);
    ctx.lineTo(350,400);

    ctx.moveTo(150,450);
    ctx.lineTo(150,300);

    ctx.moveTo(350,450);
    ctx.lineTo(350,300);
    ctx.stroke();

ctx.beginPath();
    ctx.lineWidth = 5;

    ctx.arc(250, 250, 60, Math.PI*0.83,0.5, true);
    ctx.stroke();

ctx.beginPath();
    ctx.lineWidth = 5;

    ctx.arc(157, 240, 60, Math.PI*1.70,Math.PI/4, true);
    ctx.stroke();

ctx.beginPath();
    ctx.lineWidth = 5;

    ctx.arc(250, 190, 60, 0,Math.PI, true);
    ctx.stroke();

ctx.beginPath();
    ctx.lineWidth = 5;

    ctx.arc(347, 240, 60, Math.PI/1.28,Math.PI*1.28, true);
    ctx.stroke();

ctx.closePath();
