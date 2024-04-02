// Obtém o elemento canvas pelo ID
var canvas = document.getElementById('signatureCanvas');
var ctx = canvas.getContext('2d');

// Define as propriedades de desenho
ctx.lineWidth = 5;
ctx.strokeStyle = 'black';

var desenhando = false;

// Adiciona listeners para os eventos de mouse
canvas.addEventListener('mousedown', function(e) {
    desenhando = true;
    ctx.beginPath();
    ctx.moveTo(e.clientX - canvas.offsetLeft, e.clientY - canvas.offsetTop);
});

canvas.addEventListener('mousemove', function(e) {
    if (desenhando) {
        ctx.lineTo(e.clientX - canvas.offsetLeft, e.clientY - canvas.offsetTop);
        ctx.stroke();
    }
});

canvas.addEventListener('mouseup', function() {
    desenhando = false;
});

canvas.addEventListener('mouseleave', function() {
    desenhando = false;
});
