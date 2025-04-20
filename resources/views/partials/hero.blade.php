
    <style>
.hero-section {
  position: relative;
  height: 100vh;
  //overflow: hidden;
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
}

#bg-canvas {
  position: absolute;
  top: 0; left: 0;
  width: 100%; height: 100%;
  z-index: 0;
    //display: block;
}

.hero-content {
  position: relative;
  z-index: 1;
  max-width: 800px;
  padding: 2rem;
}
.hero-content h1 {
  font-size: 3rem;
  font-weight: 700;
  margin-bottom: 1rem;
}

.hero-content p {
  font-size: 1.2rem;
  line-height: 1.6;
}

.cta {
  margin-top: 2rem;
}

.btn {
  padding: 0.75rem 1.5rem;
  background: #00ffff;
  color: #111;
  border: none;
  border-radius: 9999px;
  margin-right: 1rem;
  font-weight: bold;
  text-decoration: none;
  transition: background 0.3s ease;
}

.btn:hover {
  background: #00cccc;
}

.btn.secondary {
  background: transparent;
  border: 2px solid #00ffff;
  color: #00ffff;
}


#scroll-btn {
  position: absolute;
  bottom: 20px; /* Positioned just above the bottom of the screen */
  left: 50%;
  transform: translateX(-50%);
  cursor: pointer;
  animation: bounce 1.5s ease-in-out infinite; /* Bounce animation */
}

#scroll-btn svg {
  fill: #00FFFF; /* Light cyan, or any color you prefer */
  width: 50px;
  height: 50px;
}

@keyframes bounce {
  0%, 100% {
    transform: translate(-50%, 0);
  }
  50% {
    transform: translate(-50%, -50px); /* Up movement */
  }
}
    </style>
    <section id="hero" class="hero-section">
        <canvas id="bg-canvas" class=""></canvas>
        <div class="hero-content">
            <h1 class="">Hey, I'm <strong>Kevin Van Onckelen</strong></h1>
            <p>I build clean, scalable and modern web applications</p>
            <p>Currently open to freelance & collaboration.</p>
            <div class="cta">
                <a href="#portfolio" class="btn">See My Work</a>
                <a href="#contact" class="btn secondary">Get in Touch</a>
            </div>
        </div>
        <div id="scroll-btn" class="scroll-btn" onClick="window.scrollTo({top: window.innerHeight, behavior: 'smooth'})">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
              <path d="M12 16l4-4h-3V4h-2v8H8z"/>
            </svg>
          </div>
    </section>
    <script>
        let scene = new THREE.Scene();
        let camera = new THREE.PerspectiveCamera(75, window.innerWidth/window.innerHeight, 1, 10000);
        camera.position.z = 1500;
        camera.position.set(0, 400, 200); // Up & back
          camera.lookAt(0, 300, 500);
      
      
        let renderer = new THREE.WebGLRenderer({ canvas: document.getElementById('bg-canvas'), antialias: true });
        renderer.setSize(window.innerWidth, window.innerHeight);
        //renderer.setClearColor(0x20232a);
          renderer.setPixelRatio(window.devicePixelRatio);
          renderer.setSize(window.innerWidth, window.innerHeight);
          renderer.setClearColor(0x1a1b2f); // Transparent background
      
          const SEPARATION = 50;
          const AMOUNTX = Math.floor(window.innerWidth / SEPARATION);
          const AMOUNTY = 40; // You can tweak this to make it shallower or deeper
      
        const positions = new Float32Array(AMOUNTX * AMOUNTY * 3);
      
        let i = 0;
          for (let x = 0; x < AMOUNTX; x++) {
              for (let y = 0; y < AMOUNTY; y++) {
                  positions[i++] = x * SEPARATION - (AMOUNTX * SEPARATION) / 2; // X stays X
                  positions[i++] = 0; // Y becomes constant (flat plane)
                  positions[i++] = y * SEPARATION - (AMOUNTY * SEPARATION) / 2; // Z becomes depth
              }
          }
      
      
        const geometry = new THREE.BufferGeometry();
        geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
        const material = new THREE.PointsMaterial({ color: 0x00ffff, size: 2 });
        const particles = new THREE.Points(geometry, material);
        scene.add(particles);
      
        let count = 0;
      
          function animate() {
          requestAnimationFrame(animate);
      
          const positions = particles.geometry.attributes.position.array;
          let i = 0;
          for (let x = 0; x < AMOUNTX; x++) {
              for (let y = 0; y < AMOUNTY; y++) {
                  positions[i + 1] = Math.sin((x + count) * 0.3) * 20 + Math.sin((y + count) * 0.5) * 20;
                  i += 3;
              }
          
          }
          particles.geometry.attributes.position.needsUpdate = true;
      
      
          particles.geometry.attributes.position.needsUpdate = true;
      
          count += 0.1;
          camera.position.x += (mouseX - camera.position.x) * 0.05;
          camera.position.y += (-mouseY - camera.position.y) * 0.05;
          camera.lookAt(scene.position);
      
          renderer.render(scene, camera);
          }
      
          let mouseX = 0, mouseY = 0;
          let windowHalfX = window.innerWidth / 2;
          let windowHalfY = window.innerHeight / 2;
      
          document.addEventListener('mousemove', function (event) {
          mouseX = event.clientX - windowHalfX;
          mouseY = event.clientY - windowHalfY;
          });
      
      
      
        animate();
      </script>
