<footer class="bg-[#1a1b2f] text-white py-10">
    <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-6 text-center md:text-center">
        <!-- Branding -->
        <div>
            <h3 class="text-2xl font-bold text-cyan-400 mb-2">Volt-IT.dev</h3>
            <p class="text-gray-400">Building clean, scalable and modern web experiences.</p>
        </div>

        <!-- Quick Links -->
        <div>
            <h4 class="text-lg font-semibold text-cyan-400 mb-2">Quick Links</h4>
            <ul class="space-y-1 text-gray-300">
                <li><a href={{ route("home")}} class="hover:text-cyan-300 transition">Home</a></li>
                <li><a href="#about" class="hover:text-cyan-300 transition">About</a></li>
                <li><a href="#timeline" class="hover:text-cyan-300 transition">Journey</a></li>
                <li><a href="#contact" class="hover:text-cyan-300 transition">Contact</a></li>
            </ul>
        </div>

        <!-- Socials -->
        <div>
            <h4 class="text-lg font-semibold text-cyan-400 mb-2">Connect</h4>
            <div class="flex justify-center md:justify-center space-x-4 text-gray-300">
                <a href="https://github.com/kvanonckelen" target="_blank" class="hover:text-cyan-300 transition">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 .5C5.4.5 0 6 0 12.6c0 5.3 3.4 9.8 8.1 11.4.6.1.9-.2.9-.6v-2c-3.3.7-4-1.6-4-1.6-.5-1.3-1.2-1.6-1.2-1.6-1-.7.1-.7.1-.7 1 .1 1.6 1 1.6 1 .9 1.5 2.3 1 2.9.8.1-.7.4-1 .7-1.3-2.6-.3-5.3-1.3-5.3-6 0-1.3.5-2.3 1.2-3.1-.1-.3-.5-1.5.1-3.2 0 0 1-.3 3.2 1.2a11 11 0 0 1 5.8 0c2.2-1.5 3.2-1.2 3.2-1.2.6 1.7.2 2.9.1 3.2.7.8 1.2 1.8 1.2 3.1 0 4.7-2.7 5.7-5.3 6 .4.3.8 1 .8 2v3c0 .4.3.7.9.6C20.6 22.4 24 17.9 24 12.6 24 6 18.6.5 12 .5z"/>
                    </svg>
                </a>
                <a href="mailto:kevin@volt-it.be" class="hover:text-cyan-300 transition">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 13.5L0 6.75V21h24V6.75L12 13.5zM12 0l12 6.75L12 13.5 0 6.75 12 0z"/>
                    </svg>
                </a>
                <a href="https://linkedin.com/in/kevinvanonckelen" target="_blank" class="text-cyan-400 hover:text-cyan-300">
                    <!-- LinkedIn Icon -->
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34" fill="currentColor">
                        <path d="M34,2.5v29C34,32.3,32.3,34,30.5,34h-27C1.7,34,0,32.3,0,30.5v-27C0,1.7,1.7,0,3.5,0h27C32.3,0,34,1.7,34,2.5z" fill="#0A66C2"/>
                        <path d="M10.1,28.6H5.4V13h4.7V28.6z M7.7,11.1c-1.5,0-2.7-1.2-2.7-2.6c0-1.5,1.2-2.6,2.7-2.6c1.5,0,2.7,1.2,2.7,2.6 C10.4,9.9,9.2,11.1,7.7,11.1z M28.6,28.6h-4.7v-7.5c0-1.8-0.7-3-2.2-3c-1.2,0-1.9,0.8-2.2,1.6c-0.1,0.3-0.1,0.8-0.1,1.2v7.6h-4.7 c0,0,0.1-12.3,0-13.6h4.7v1.9c0.6-0.9,1.7-2.2,4.2-2.2c3.1,0,5.4,2,5.4,6.3V28.6z" fill="#ffffff"/>
                      </svg>
                </a>
            </div>
        </div>
    </div>

    <div class="mt-10 text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} Volt-IT.dev — All rights reserved.
    </div>
</footer>
