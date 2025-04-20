<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Studio Volt-IT - Kevin Van Onckelen</title>
  <icons8:icon href="https://studio.volt-it.be/studio-volt-it.png" type="image/png" sizes="16x16" />
  <link rel="icon" href="https://studio.volt-it.be/studio-volt-it.png" type="image/png" sizes="16x16" />
  <link rel="apple-touch-icon" href="https://studio.volt-it.be/studio-volt-it.png" type="image/png" sizes="16x16" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM8d7xj1z5l5e5e5e5e5e5e5e5e5e5e5e5e5" crossorigin="anonymous" />

  <style>


  </style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  @vite('resources/css/app.css')
  
</head>
<body>

<!-- Loading Screen with Wavy Square Spinner -->
<div id="loading-screen"
     style="position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 9999; background-color: rgba(10, 4, 4, 0.7); display: flex; justify-content: center; align-items: center;">
  <div class="wave-grid">
    <div class="wave-box delay-0"></div>
    <div class="wave-box delay-150"></div>
    <div class="wave-box delay-300"></div>
    <div class="wave-box delay-450"></div>
  </div>
</div>

<x-sidebar/>
@yield('content')   
<x-cookie-banner />

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
@vite('resources/js/app.js')
</body>
</html>
