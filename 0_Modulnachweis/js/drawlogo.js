// draw the logo of our cooking book
let c = document.getElementById("canvaslogo");
let ctx = c.getContext("2d");
ctx.beginPath();
    ctx.lineWidth = 5;

    // Border
    ctx.moveTo(60,10);
    ctx.lineTo(450,10);

    ctx.moveTo(60,380);
    ctx.lineTo(450,380);

    ctx.moveTo(60,10);
    ctx.lineTo(60,380);

    ctx.moveTo(450,10);
    ctx.lineTo(450,380);

    // bottom of head
    ctx.moveTo(150,350);
    ctx.lineTo(350,350);

    ctx.moveTo(150,300);
    ctx.lineTo(350,300);

    ctx.moveTo(150,350);
    ctx.lineTo(150,200);

    ctx.moveTo(350,350);
    ctx.lineTo(350,200);
    ctx.stroke();

// cloudy head
ctx.beginPath();
    ctx.lineWidth = 5;

    ctx.arc(250, 150, 60, Math.PI*0.83,0.5, true);
    ctx.stroke();

ctx.beginPath();
    ctx.lineWidth = 5;

    ctx.arc(157, 140, 60, Math.PI*1.70,Math.PI/4, true);
    ctx.stroke();

ctx.beginPath();
    ctx.lineWidth = 5;

    ctx.arc(250, 90, 60, 0,Math.PI, true);
    ctx.stroke();

ctx.beginPath();
    ctx.lineWidth = 5;

    ctx.arc(347, 140, 60, Math.PI/1.28,Math.PI*1.28, true);
    ctx.stroke();

ctx.closePath();
