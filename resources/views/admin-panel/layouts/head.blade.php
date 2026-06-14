<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>@yield('title', 'Admin OM JASDUN')</title>

    {{-- Admin jangan di-index Google --}}
    <meta name="robots" content="noindex, nofollow">

    <link rel="icon" type="image/png" href="{{ asset('images/logo-omjasdun1.png') }}">

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

        summary::-webkit-details-marker {
            display: none;
        }
    </style>

    @stack('head')
</head>