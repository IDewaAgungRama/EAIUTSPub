<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased flex items-center gap-x-20 p-10">
    <div class="flex flex-col items-center justify-center gap-10 w-1/2">
        <img src="{{ asset('assets/logo.png') }}" alt="Logo">
        <p class="text-center text-lg font-medium">
            Selamat datang di E-Commerce, tempatnya bagi para pencinta belanja daring! Di sini, kami menyajikan
            pengalaman belanja online yang menyenangkan dan mudah bagi Anda. Temukan berbagai macam produk dari berbagai
            kategori mulai dari fashion, elektronik, kecantikan, hingga perlengkapan rumah tangga, semua dalam genggaman
            Anda.
        </p>
    </div>
    <div class="w-1/2 text-center text-lg font-semibold">
        <div>
            Dengan antarmuka yang ramah pengguna dan fitur pencarian yang canggih, Anda dapat dengan mudah menjelajahi
            koleksi produk kami yang luas. Nikmati kemudahan berbelanja dengan beberapa metode pembayaran yang aman dan
            fleksibel, serta pilihan pengiriman yang cepat dan dapat diandalkan.
        </div>
        <div class="mt-5">
            Tidak hanya itu, E-Commerce juga menawarkan berbagai promo menarik dan diskon eksklusif untuk member
            setia kami. Bergabunglah dengan komunitas belanja online kami dan nikmati pengalaman belanja yang tiada
            duanya di E-Commerce!
        </div>
        <div class="flex justify-center mt-10">
            <a href="{{ route('register') }}" class="bg-green-600 text-white px-5 py-2 rounded-md">Mulai Berbelanja</a>
        </div>
    </div>
</body>

</html>
