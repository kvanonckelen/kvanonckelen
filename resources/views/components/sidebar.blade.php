<div x-data="{ open: false }" class="fixed top-0 right-0 h-full z-50 flex flex-col items-end">

    <!-- Toggle Button + Dynamic Label -->
    <div class="m-4 flex items-center justify-center space-x-2 z-50">
        <span x-show="open" x-transition class="text-white font-semibold text-lg mr-4">Menu</span>
        <button @click="open = !open"
            class="w-12 h-12 flex items-center justify-center bg-cyan-500 text-white rounded-full hover:bg-cyan-600 transition">
            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        
    </div>

    <!-- Sidebar -->
    <div
        :class="{
            'hidden': !open && window.innerWidth < 768,
            'w-16 items-center text-center': !open && window.innerWidth >= 768,
            'w-64 items-start justify-start': open
        }"
        x-show="open || window.innerWidth >= 768"
        x-transition
        class="bg-[#1a1b2f] h-full p-4 flex flex-col space-y-6 shadow-xl overflow-hidden transition-all duration-300 md:flex"
    >

        <!-- Navigation Items -->
        <nav class="flex flex-col space-y-6 w-full items-center justify-center mx-4 px-4">
            <!-- Home -->
            <a href={{route('home')}} class="group flex items-center space-x-3 text-white hover:text-cyan-400 transition">
                <svg class="w-6 h-6 text-cyan-400" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 12l9-9 9 9M4 10v10h5v-6h6v6h5V10" />
                </svg>
                <span x-show="open" class="transition-all duration-300">Home</span>
            </a>

            <!-- My Journey -->
            <a href="#timeline" class="group flex items-center space-x-3 text-white hover:text-cyan-400 transition">
                <svg class="w-6 h-6 text-cyan-400" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 8c-1.657 0-3 1.343-3 3v9m6-9a3 3 0 00-3-3zm0 0V5a3 3 0 00-3-3 3 3 0 00-3 3v3" />
                </svg>
                <span x-show="open" class="transition-all duration-300">My Journey</span>
            </a>

            <!-- Portfolio -->
            <a href="#portfolio" class="group flex items-center space-x-3 text-white hover:text-cyan-400 transition">
                <svg class="w-6 h-6 text-cyan-400" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path d="M12 4v16m8-8H4" />
                </svg>
                <span x-show="open" class="transition-all duration-300">Portfolio</span>
            </a>

            <!-- GitHub -->
            <a href="https://github.com/kvanonckelen?tab=repositories" target="_blank"
               class="group flex items-center space-x-3 text-white hover:text-cyan-400 transition">
                <svg class="w-6 h-6 text-cyan-400" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M12 0a12 12 0 00-3.79 23.39c.6.11.82-.26.82-.58v-2.16c-3.34.72-4.04-1.61-4.04-1.61-.55-1.39-1.34-1.76-1.34-1.76-1.1-.75.08-.74.08-.74 1.22.08 1.86 1.25 1.86 1.25 1.08 1.85 2.83 1.32 3.52 1 .11-.78.42-1.32.76-1.63-2.67-.3-5.47-1.34-5.47-5.94 0-1.31.47-2.38 1.24-3.22-.13-.3-.54-1.52.12-3.17 0 0 1.01-.32 3.3 1.23A11.45 11.45 0 0112 6.8a11.42 11.42 0 012.99.4c2.28-1.55 3.29-1.23 3.29-1.23.66 1.65.25 2.87.12 3.17.77.84 1.23 1.91 1.23 3.22 0 4.61-2.81 5.63-5.49 5.93.43.37.81 1.1.81 2.22v3.29c0 .32.21.7.82.58A12 12 0 0012 0z" />
                </svg>
                <span x-show="open" class="transition-all duration-300">GitHub</span>
            </a>

            <!-- Contact -->
            <a href="#contact" class="group flex items-center space-x-3 text-white hover:text-cyan-400 transition">
                <svg class="w-6 h-6 text-cyan-400" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path d="M21 10a9 9 0 01-18 0V5a2 2 0 012-2h14a2 2 0 012 2v5z" />
                </svg>
                <span x-show="open" class="transition-all duration-300">Contact</span>
            </a>
        </nav>

        <!-- Social Icons -->
        <div class="mt-auto flex space-x-4" x-show="open">
            <a href="https://twitter.com/yourusername" target="_blank" class="text-cyan-400 hover:text-cyan-300">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M23 3a10.9 10.9 0 01-3.14 1.53A4.48 4.48 0 0016.5 3c-2.47 0-4.48 2-4.48 4.48 0 .35.04.7.11 1.03C8.28 8.34 5.1 6.75 3 4.18a4.48 4.48 0 00-.61 2.25 4.48 4.48 0 001.99 3.74 4.48 4.48 0 01-2.03-.56v.06c0 2.24 1.6 4.11 3.72 4.54a4.52 4.52 0 01-2.02.08 4.48 4.48 0 004.18 3.1A9.03 9.03 0 013 19.54a12.79 12.79 0 006.92 2.03c8.3 0 12.84-6.88 12.84-12.84 0-.2 0-.4-.01-.59A9.22 9.22 0 0023 3z" />
                </svg>
            </a>
            <a href="https://linkedin.com/in/kevinvanonckelen" target="_blank" class="text-cyan-400 hover:text-cyan-300">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 34" fill="currentColor">
                    <path d="M34,2.5v29C34,32.3,32.3,34,30.5,34h-27C1.7,34,0,32.3,0,30.5v-27C0,1.7,1.7,0,3.5,0h27C32.3,0,34,1.7,34,2.5z" fill="#0A66C2"/>
                    <path d="M10.1,28.6H5.4V13h4.7V28.6z M7.7,11.1c-1.5,0-2.7-1.2-2.7-2.6c0-1.5,1.2-2.6,2.7-2.6c1.5,0,2.7,1.2,2.7,2.6 C10.4,9.9,9.2,11.1,7.7,11.1z M28.6,28.6h-4.7v-7.5c0-1.8-0.7-3-2.2-3c-1.2,0-1.9,0.8-2.2,1.6c-0.1,0.3-0.1,0.8-0.1,1.2v7.6h-4.7 c0,0,0.1-12.3,0-13.6h4.7v1.9c0.6-0.9,1.7-2.2,4.2-2.2c3.1,0,5.4,2,5.4,6.3V28.6z" fill="#ffffff"/>
                </svg>
            </a>
        </div>
    </div>
</div>
