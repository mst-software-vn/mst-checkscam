<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <!-- SEO Optimization -->
    {{-- <title>[ CHECKSCAM ] - Hệ thống kiểm tra và tố giác scam uy tín nhất Việt Nam</title> --}}
    @hasSection('title')
        <title>@yield('title')</title>
    @else
        <title>[ CHECKSCAM ] - Hệ thống kiểm tra và tố giác scam uy tín nhất Việt Nam</title>
    @endif
    <meta name="description"
        content="CheckScam - Nền tảng kiểm tra độ tín nhiệm dữ liệu lớn nhất Việt Nam. Tra cứu số điện thoại, số tài khoản, link Facebook lừa đảo để bảo vệ túi tiền của bạn.">
    <meta name="keywords" content="check scam, tố cáo lừa đảo, kiểm tra stk lừa đảo, kiểm tra sdt lừa đảo, quỹ bảo đảm">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Social Media -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="CheckScam - Hệ thống kiểm tra và tố giác scam">
    <meta property="og:description"
        content="Tra cứu thông tin kẻ lừa đảo ngay lập tức. Cùng cộng đồng xây dựng môi trường MMO sạch sẽ.">
    <meta property="og:image" content="https://i.ibb.co/Rkdy02SQ/output-lin-removebg-preview.png">

    <!-- Preconnect để tăng tốc kết nối CDN -->
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="preconnect" href="https://www.google.com" crossorigin>
    <link rel="preconnect" href="https://www.googletagmanager.com" crossorigin>
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="https://www.google.com">


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>



    <link href="/css/tailwind.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="https://i.ibb.co/fV1xYHVS/favicon.png" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <script>
        // Check theme initially
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')

        } else {
            document.documentElement.classList.remove('dark')

        }
    </script>


    <style>
        * {
            transition: background-color 0.3s ease, border-color 0.3s ease, color 0.1s ease;
        }


        :root {
            --text-color: #ff0000;
            --light-color: #f3eded;
            --speed: 3s;

        }

        body {
            color: #333;
            overflow-x: hidden;
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #999;
        }

        /* Mobile fixes */
        @media (max-width: 640px) {
            .hero-title {
                font-size: 1.5rem;
                line-height: 2rem;
            }
        }



        .scanner-title {
            position: relative;
            display: inline-block;
            background: linear-gradient(to bottom, #ff0000 0%, #cc0000 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            padding: 15px 0;
            margin: -15px 0;
            overflow: hidden;
        }

        /* Thanh Laser quét kiểu QR */
        .scanner-title::after {
            content: "";
            position: absolute;
            left: 0;
            width: 100%;
            height: 2px;
            background: #ff0000;
            box-shadow: 0 0 15px 2px rgba(255, 0, 0, 0.7);
            z-index: 10;
            animation: qr-scan 2.5s ease-in-out infinite alternate;
        }

        @keyframes qr-scan {
            0% {
                top: 5%;
                opacity: 0;
            }

            20% {
                opacity: 1;
            }

            80% {
                opacity: 1;
            }

            100% {
                top: 90%;
                opacity: 0;
            }
        }
    </style>



</head>
