const canvas = document.createElement('canvas');
const ctx = canvas.getContext('2d');
const particles = [];
const maxDistance = 50;
const acceleration = 0.03;
function setupCanvas() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    canvas.style.position = 'fixed';
    document.body.style.overflow = 'hidden';
    document.body.appendChild(canvas);
}

function createParticles() {
    for (let i = 0; i < 100; i++) {
        particles.push({
            x: Math.random() * canvas.width,
            y: Math.random() * canvas.height,
            size: Math.random() * 8.5, // Adjusted size range to be larger
            speedX: Math.random() * 3 - 1.5,
            speedY: Math.random() * 3 - 1.5,
            color: `hsl(${Math.random() * 360}, 50%, 50%)`
        });
    }
}

function animate() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    particles.forEach(particle => {
        particle.x += particle.speedX;
        particle.y += particle.speedY;
        ctx.fillStyle = particle.color;
        ctx.beginPath();
        ctx.arc(particle.x, particle.y, particle.size, 0, Math.PI * 2);
        ctx.fill();

        if (particle.x < 0 || particle.x > canvas.width ||
            particle.y < 0 || particle.y > canvas.height) {
            particle.x = Math.random() * canvas.width;
            particle.y = Math.random() * canvas.height;
        }
    });
    requestAnimationFrame(animate);
}

window.addEventListener('resize', () => {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
});

canvas.addEventListener('mousemove', (event) => {
    particles.forEach(particle => {
        const dx = event.clientX - particle.x;
        const dy = event.clientY - particle.y;
        const distance = Math.sqrt(dx * dx + dy * dy);

        if (distance < maxDistance) {
            particle.speedX += dx * acceleration;
            particle.speedY += dy * acceleration;
        }
    });
});

setupCanvas();
createParticles();
animate();
