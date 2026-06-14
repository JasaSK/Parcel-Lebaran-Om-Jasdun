<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>@yield('title', 'OM JASDUN - Parcel Lebaran Premium')</title>

    <meta name="description" content="@yield('meta_description', 'OM JASDUN menyediakan parcel Lebaran premium, hampers eksklusif, dan pilihan hadiah terbaik untuk keluarga, sahabat, dan rekan kerja.')">
    <meta name="keywords" content="@yield('meta_keywords', 'parcel lebaran, hampers lebaran, parcel premium, om jasdun, hadiah lebaran')">
    <meta name="robots" content="@yield('robots', 'index, follow')">

    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo-omjasdun1.png') }}">

    <!-- Open Graph -->
    <meta property="og:title" content="@yield('title', 'OM JASDUN - Parcel Lebaran Premium')">
    <meta property="og:description" content="@yield('meta_description', 'Parcel Lebaran premium dari OM JASDUN untuk keluarga, sahabat, dan rekan kerja.')">
    <meta property="og:image" content="@yield('og_image', asset('images/logo-omjasdun1.png'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:site_name" content="OM JASDUN">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'OM JASDUN - Parcel Lebaran Premium')">
    <meta name="twitter:description" content="@yield('meta_description', 'Parcel Lebaran premium dari OM JASDUN.')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/logo-omjasdun1.png'))">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        jasdun: {
                            green: '#003c2c',
                            green2: '#0c503b',
                            gold: '#d4a629',
                            gold2: '#f7d776',
                            cream: '#f8f5ef',
                            soft: '#efe8da'
                        }
                    },
                    fontFamily: {
                        display: ['Georgia', 'serif'],
                        body: ['Inter', 'ui-sans-serif', 'system-ui']
                    },
                    boxShadow: {
                        premium: '0 20px 60px rgba(0, 60, 44, 0.18)'
                    }
                }
            }
        }
    </script>

    <style>
        html {
            scroll-behavior: smooth;
        }

        .luxury-pattern {
            background-image:
                radial-gradient(circle at 20% 20%, rgba(212, 166, 41, .22) 0, transparent 30%),
                radial-gradient(circle at 80% 10%, rgba(255, 255, 255, .08) 0, transparent 26%),
                linear-gradient(135deg, rgba(0, 60, 44, .96), rgba(3, 32, 24, .98));
        }

        .product-art {
            background-image:
                radial-gradient(circle at 25% 25%, rgba(247, 215, 118, .45), transparent 24%),
                radial-gradient(circle at 80% 20%, rgba(255, 255, 255, .22), transparent 18%),
                linear-gradient(135deg, #063f31, #051f19 65%, #d4a629 170%);
        }

        .category-art {
            background-image:
                linear-gradient(to top, rgba(0, 0, 0, .72), rgba(0, 0, 0, .05)),
                radial-gradient(circle at 70% 25%, rgba(247, 215, 118, .4), transparent 20%),
                linear-gradient(135deg, #003c2c, #11251e);
        }

        #omjasdun-map {
            height: 420px;
            width: 100%;
            z-index: 1;
        }

        summary::-webkit-details-marker {
            display: none;
        }
    </style>

    @stack('head')
</head>