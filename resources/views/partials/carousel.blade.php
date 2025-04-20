@php
    $techStacks = [
        'Laravel',
        'React.JS',
        'TailwindCSS',
        'JavaScript',
        'Docker',
        'Kubernetes',
        'MySQL',
        'GitHub',
        'CI/CD',
        'Google Cloud',
        'REST APIs',
        'Node.js',
        'PHP',
        'Redis',
        'NGINX',
        'MQTT',
        'WebSockets',
        'Ubuntu',
        'Debian',
        'HTML5',
        'Python'
    ];
@endphp

<style>
    .marquee-wrapper {
        overflow: hidden;
        position: relative;
        background-color: #1a1b2f;
    }

    .marquee-inner {
        max-width: 768px; /* or use Tailwind classes like max-w-2xl */
        margin: 0 auto;
    }

    .marquee-track {
        display: flex;
        width: max-content;
        animation: scroll-left 30s linear infinite;
    }

    @keyframes scroll-left {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }

    .tech-pill {
        background-color: #00ffff;
        color: #1a1b2f;
        border-radius: 9999px;
        padding: 0.5rem 1rem;
        font-weight: 600;
        margin-right: 1rem;
        white-space: nowrap;
        box-shadow: 0 0 10px rgba(0,255,255,0.3);
    }
</style>
<section id="techstack" class="bg-[#1a1b2f] text-white py-24 px-6">
  <h2 class="text-3xl md:text-4xl font-bold text-center mb-16 text-cyan-400" data-aos="fade-up">
    My Tech Stack
  </h2>
<div class="marquee-wrapper py-10">
    <div class="marquee-inner">
        <div class="marquee-track">
            @foreach (array_merge($techStacks, $techStacks) as $tech)
                <div class="tech-pill">{{ $tech }}</div>
            @endforeach
        </div>
    </div>
</div>
</section>
