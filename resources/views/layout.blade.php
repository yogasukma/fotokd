<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="index, follow">

    <meta name="description" content="Website dari fans untuk halaman foto katadata.id">
    <meta name="keywords" content="katadata.id, foto, journalism">
    <meta name="robots" content="index, nofollow">

    <meta property="og:title" content="FotoKD">
    <meta property="og:description" content="Website dari fans untuk halaman foto katadata.id">
    <meta property="og:image" content="{{ config("app.url") }}/images/Penjual_Terompet_di_Pasar_Asemka-2024_12_31-08_08_15_8f35ebcb7649092f4fdb2cf9ba8a110f.jpg">
    <meta property="og:url" content="{{ config("app.url") }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="FotoKD">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="{{ config("app.url") }}/images/Penjual_Terompet_di_Pasar_Asemka-2024_12_31-08_08_15_8f35ebcb7649092f4fdb2cf9ba8a110f.jpg">
    <meta name="twitter:title" content="FotoKD">
    <meta name="twitter:description" content="Website dari fans untuk halaman foto katadata.id">
    <meta name="twitter:image" content="{{ config("app.url") }}/images/Penjual_Terompet_di_Pasar_Asemka-2024_12_31-08_08_15_8f35ebcb7649092f4fdb2cf9ba8a110f.jpg">

    @vite('resources/css/app.css')

    <title>{{ config('app.name') }}</title>
</head>
<body>

    <header class="max-w-3xl text-center" style="margin: 100px auto">
        <h1 class="font-bold mb-5" style="font-size: 2rem">Foto KD</h1>
        <p>Website ini adalah website dari fans untuk halaman <a href="https://katadata.co.id/foto" target="blank" class="underline text-blue-400">https://katadata.co.id/foto</a></p>
        <p><span class="font-bold"> Semua foto adalah hak milik dari katadata dan fotografer terkait</span>, website ini hanya menampilkan foto-foto tersebut karena dirasa foto-foto tersebut layak dapat tempat untuk ditampilkan secara lebih enak dipandang (bisa didebat :))</p>
        <div class="mt-5 text-center" style="margin-top: 50px">
            <a href="https://yogasukma.web.id/kontak" target="_blank" class="bg-black p-3 rounded text-white text-sm">kontak dan kirim pesan</a>
            <a href="https://github.com/yogasukma/fotokd" target="_blank" class="border border-black p-3 rounded text-sm">source code</a>
        </div>
    </header>

    @yield('content')

    <script>
    document.addEventListener('livewire:init', () => {
       Livewire.on('show-popup', (event) => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth' // Smooth scrolling effect
        }); 
       });
    });
    </script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ env("GOOGLE_ANALYTICS_TAG") }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{ env("GOOGLE_ANALYTICS_TAG") }}');
    </script>
</body>
</html>