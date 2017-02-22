var canvas = document.getElementById("canvas");

var ctx = canvas.getContext("2d");

var rupeeSym = document.getElementById("rupee");
var arrow=document.getElementById("arrow");
var bookSym = document.getElementById("book");

ctx.drawImage(arrow,100,40,300,70);
ctx.drawImage(bookSym,8,20,100,100);
ctx.drawImage(rupeeSym,375,20,100,100);
ctx.font="30px Arial";
ctx.fillText("Sell Books, Earn Money!", 80,150)

ctx.drawImage(arrow,100,310,300,70);
ctx.drawImage(rupeeSym,8,300,100,100);
ctx.drawImage(bookSym,375,300,100,100);
ctx.fillText("Buy Books, Save Money", 80,440)


