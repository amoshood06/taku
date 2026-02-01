<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TAKU – Coming Soon</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            primary: '#005C48',
            pink: '#F30E49',
            yellow: '#FAD103',
            amber: '#F4A103',
            orange: '#F38806',
          },
          animation: {
            spinSlow: 'spin 10s linear infinite',
            spinSlower: 'spin 14s linear infinite',
            spinSlowest: 'spin 18s linear infinite'
          }
        }
      }
    }
  </script>
</head>
<body class="min-h-screen bg-gradient-to-br from-primary via-primary/90 to-gray-900 dark:from-gray-900 dark:to-black flex items-center justify-center px-6 transition-colors duration-300">

  <!-- Glassmorphism background blur -->
  <div class="absolute inset-0 bg-white/10 dark:bg-black/20 backdrop-blur-2xl"></div>

  <div class="relative text-center max-w-xl bg-white/20 dark:bg-white/10 backdrop-blur-xl rounded-3xl p-10 shadow-2xl">
    <!-- Dark/Light Toggle -->
    <button id="themeToggle" class="absolute top-0 right-0 bg-white/20 dark:bg-white/10 text-white px-4 py-2 rounded-full text-sm backdrop-blur">
      🌙 / ☀️
    </button>

    <!-- Rotating Food SVG Icons -->
    <div class="absolute -top-20 left-1/2 -translate-x-1/2 flex gap-8">
      <!-- Bowl -->
      <svg class="w-10 h-10 text-orange animate-spinSlow" viewBox="0 0 24 24" fill="currentColor"><path d="M2 12c0 5.5 4.5 10 10 10s10-4.5 10-10H2zm2-2h16a8 8 0 10-16 0z"/></svg>
      <!-- Burger -->
      <svg class="w-10 h-10 text-yellow animate-spinSlower" viewBox="0 0 24 24" fill="currentColor"><path d="M3 11h18v2H3v-2zm2 4h14a2 2 0 012 2v1H3v-1a2 2 0 012-2zm0-8h14a7 7 0 00-14 0z"/></svg>
      <!-- Pizza -->
      <svg class="w-10 h-10 text-pink animate-spinSlowest" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L2 22h20L12 2zm0 6a2 2 0 110 4 2 2 0 010-4zm-3 7a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zm6 0a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z"/></svg>
    </div>

    <!-- Logo -->
    <img src="assets/image/taku.png" alt="TAKU Logo" class="mx-auto w-40 mb-8" />

    <!-- Heading -->
    <h1 class="text-white text-4xl md:text-5xl font-bold mb-4">
      Something Delicious is Coming 🍲
    </h1>

    <p class="text-white/80 dark:text-white/70 text-lg mb-8">
      TAKU is cooking a smarter way to order food. Stay tuned!
    </p>

    <!-- Countdown -->
    <div id="countdown" class="flex justify-center gap-4 mb-10">
      <div class="bg-white dark:bg-gray-800 rounded-xl px-5 py-4">
        <p id="days" class="text-2xl font-bold text-primary">00</p>
        <span class="text-sm text-gray-500 dark:text-gray-400">Days</span>
      </div>
      <div class="bg-white dark:bg-gray-800 rounded-xl px-5 py-4">
        <p id="hours" class="text-2xl font-bold text-primary">00</p>
        <span class="text-sm text-gray-500 dark:text-gray-400">Hours</span>
      </div>
      <div class="bg-white dark:bg-gray-800 rounded-xl px-5 py-4">
        <p id="minutes" class="text-2xl font-bold text-primary">00</p>
        <span class="text-sm text-gray-500 dark:text-gray-400">Minutes</span>
      </div>
      <div class="bg-white dark:bg-gray-800 rounded-xl px-5 py-4">
        <p id="seconds" class="text-2xl font-bold text-primary">00</p>
        <span class="text-sm text-gray-500 dark:text-gray-400">Seconds</span>
      </div>
    </div>

    <!-- CTA -->
    <button class="bg-orange hover:bg-amber text-white px-8 py-3 rounded-full font-semibold transition">
      Notify Me
    </button>
  </div>

  <!-- Countdown Script -->
  <script>
    const launchDate = new Date("2026-03-01T00:00:00").getTime();

    const timer = setInterval(() => {
      const now = new Date().getTime();
      const distance = launchDate - now;

      if (distance < 0) {
        clearInterval(timer);
        document.getElementById('countdown').innerHTML = '<p class="text-white text-xl">We are live!</p>';
        return;
      }

      document.getElementById('days').innerText = Math.floor(distance / (1000 * 60 * 60 * 24));
      document.getElementById('hours').innerText = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      document.getElementById('minutes').innerText = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      document.getElementById('seconds').innerText = Math.floor((distance % (1000 * 60)) / 1000);
    }, 1000);
  </script>

  <!-- Theme Toggle Script -->
  <script>
    const toggleBtn = document.getElementById('themeToggle');
    const root = document.documentElement;

    // Load saved theme
    if (localStorage.getItem('theme') === 'dark') {
      root.classList.add('dark');
    }

    toggleBtn.addEventListener('click', () => {
      root.classList.toggle('dark');
      localStorage.setItem('theme', root.classList.contains('dark') ? 'dark' : 'light');
    });
  </script>

</body>
</html>
