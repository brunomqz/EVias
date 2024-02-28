const canvas = document.getElementById('signatureCanvas');
const ctx = canvas.getContext('2d');

let isDrawing = false;
let lastX = 0;
let lastY = 0;


canvas.addEventListener('mousedown', (e) => {
    isDrawing = true;
    [lastX, lastY] = [e.offsetX, e.offsetY];
    const touch = event.touches[0];
});

canvas.addEventListener('mousemove', (e) => {
    if (!isDrawing) return;
    ctx.beginPath();
    ctx.moveTo(lastX, lastY);
    ctx.lineTo(e.offsetX, e.offsetY);
    ctx.strokeStyle = '#000';
    ctx.lineWidth = 2;
    ctx.lineCap = 'round';
    ctx.lineJoin = 'round';
    ctx.stroke();
    [lastX, lastY] = [e.offsetX, e.offsetY];
});

canvas.addEventListener('mouseup', () => {
    isDrawing = false;
});

canvas.addEventListener('mouseout', () => {
    isDrawing = false;
});


canvas.addEventListener('touchmove', () => {
    event.preventDefault(); // Impede o comportamento padrão de toque
    const touch = event.touches[0];
    const x = touch.clientX;
    const y = touch.clientY;
    draw(x, y);
});

function draw(x, y) {
    context.beginPath();
    context.arc(x, y, 5, 0, 2 * Math.PI);
    context.fillStyle = 'black';
    context.fill();
}

document.getElementById('signatureCanvas').addEventListener('submit', function(event) {
    const imageData = canvas.toDataURL(); // Convert canvas to a data URL
    document.getElementById('signatureSend').value = imageData; // Update the hidden input field value
    console.log(imageData);
});




