@php
        $projects = [
        [
            'title' => 'Bertvanonckelen.be',
            'description' => 'Building a website for my fathers business in gardening.',
            'image' => asset('images/logo_bert.png'),
            'link' => 'https://bertvanonckelen.be',
        ],
        [
            'title' => 'Duikschool Aphrodite',
            'description' => 'Building a website for a local diving school where i am an active member',
            'image' => asset('images/aphrodite.png'),   
            'link' => 'https://duikschoolaphrodite.be',
        ],
        [
            'title' => 'Studio Volt-IT',
            'description' => 'Building a website for my own company where i build websites and applications.',
            'image' => asset('images/studio-volt-it.png'),
            'link' => 'https://studio.volt-it.be',
        ],
]
@endphp
<section id="portfolio" class="bg-[#1a1b2f] py-20 text-white">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl md:text-4xl font-bold text-center text-cyan-400 mb-12" data-aos="fade-up">My Work</h2>

        <div class="grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-8">
            @foreach ($projects as $project)
                <div class="bg-[#2a2c41] rounded-2xl overflow-hidden shadow-lg hover:shadow-cyan-400/20 transition-all duration-300" data-aos="fade-left">
                    <div class="h-40 bg-cover bg-center" style="background-image: url('{{ $project['image'] }}');"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2 text-cyan-300">{{ $project['title'] }}</h3>
                        <p class="text-gray-300 text-sm mb-4">{{ $project['description'] }}</p>
                        <a href="{{ $project['link'] }}" target="_blank" class="text-cyan-400 hover:underline text-sm">View Project →</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
