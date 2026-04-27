<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Lumière') — Lumière Fashion</title>

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', sans-serif;
            background: #faf9f7;
            color: #1a1a1a;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .serif { font-family: 'Cormorant Garamond', serif; }

        :root {
            --cream: #faf9f7;
            --sand: #e8ddd0;
            --mink: #8b7355;
            --espresso: #3d2b1f;
            --gold: #c9a84c;
        }

        .navbar-wrap {
            position: sticky;
            top: 0;
            z-index: 1000;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            background: rgba(250,249,247,0.88);
            border-bottom: 1px solid var(--sand);
        }

        .navbar-inner {
            max-width: 1200px;
            margin: auto;
            padding: 0 1.5rem;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .nav-brand {
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-brand-dot {
            width: 6px;
            height: 6px;
            background: var(--gold);
            border-radius: 50%;
        }

        .nav-brand-text {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.45rem;
            font-weight: 300;
            letter-spacing: 0.1em;
            color: #1a1a1a;
        }

        .nav-links {
            display: flex;
            gap: 0.25rem;
        }

        .nav-link {
            text-decoration: none;
            font-size: 0.78rem;
            font-weight: 400;
            letter-spacing: 0.06em;
            color: #6b6b6b;
            padding: 0.45rem 0.9rem;
            border-radius: 4px;
            transition: all 0.18s;
        }

        .nav-link:hover {
            color: #1a1a1a;
            background: rgba(61,43,31,0.06);
        }

        .nav-link.aktif {
            color: var(--espresso);
            font-weight: 600;
            background: rgba(61,43,31,0.07);
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .avatar-circle {
            background: var(--espresso);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-weight: 600;
            font-size: 0.85rem;
            width: 34px;
            height: 34px;
            flex-shrink: 0;
        }

        .btn-logout {
            background: none;
            border: 1px solid var(--sand);
            cursor: pointer;
            font-size: 0.72rem;
            color: var(--mink);
            padding: 0.4rem 0.9rem;
            border-radius: 4px;
            font-family: 'Inter', sans-serif;
            letter-spacing: 0.04em;
            transition: all 0.18s;
        }

        .btn-logout:hover {
            background: var(--espresso);
            color: #fff;
            border-color: var(--espresso);
        }

        .main-content {
            max-width: 1200px;
            margin: auto;
            padding: 2.5rem 1.5rem;
            width: 100%;
            flex: 1;
        }

        .card {
            background: #fff;
            border: 1px solid var(--sand);
            border-radius: 10px;
            padding: 1.5rem;
        }

        .stat-card {
            background: #fff;
            border: 1px solid var(--sand);
            border-radius: 10px;
            padding: 1.5rem;
            position: relative;
            overflow: hidden;
            transition: box-shadow 0.2s, transform 0.2s;
        }

        .stat-card:hover {
            box-shadow: 0 4px 20px rgba(61,43,31,0.08);
            transform: translateY(-2px);
        }

        .stat-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--espresso), var(--gold));
            opacity: 0;
            transition: opacity 0.2s;
        }

        .stat-card:hover::after {
            opacity: 1;
        }

        .badge-naik {
            font-size: 0.62rem;
            color: #3d7a3d;
            background: #f0f7f0;
            border: 1px solid #b8d4b8;
            padding: 0.2rem 0.5rem;
            border-radius: 20px;
            letter-spacing: 0.04em;
            font-weight: 500;
        }

        .progress-track {
            height: 3px;
            background: #f5f0e8;
            border-radius: 2px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--espresso), var(--mink));
            border-radius: 2px;
            transition: width 0.6s ease;
        }

        .btn-primary {
            background: var(--espresso);
            color: #fff;
            padding: 0.65rem 1.4rem;
            border-radius: 5px;
            font-size: 0.78rem;
            text-decoration: none;
            display: inline-block;
            font-weight: 500;
            letter-spacing: 0.04em;
            border: none;
            cursor: pointer;
            transition: background 0.18s;
            font-family: 'Inter', sans-serif;
        }

        .btn-primary:hover {
            background: #2a1e15;
        }

        .btn-outline {
            border: 1px solid var(--sand);
            color: var(--mink);
            padding: 0.65rem 1.4rem;
            border-radius: 5px;
            font-size: 0.78rem;
            text-decoration: none;
            display: inline-block;
            background: #fff;
            transition: all 0.18s;
            font-weight: 400;
        }

        .btn-outline:hover {
            border-color: var(--mink);
            color: var(--espresso);
            background: #faf9f7;
        }

        .form-input {
            width: 100%;
            border: 1px solid var(--sand);
            padding: 0.7rem 1rem;
            border-radius: 5px;
            font-family: 'Inter', sans-serif;
            font-size: 0.85rem;
            background: #fff;
            color: #1a1a1a;
            transition: border-color 0.18s;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--mink);
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th {
            font-size: 0.68rem;
            color: var(--mink);
            padding: 0.7rem 1rem;
            background: #f5f0e8;
            text-align: left;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            font-weight: 500;
        }

        .data-table td {
            padding: 0.9rem 1rem;
            border-bottom: 1px solid #f0ebe4;
            font-size: 0.84rem;
        }

        .data-table tr:hover td {
            background: #faf9f7;
        }

        .badge-tersedia {
            font-size: 0.68rem;
            color: #2d6a2d;
            background: #edf7ed;
            border: 1px solid #b8d4b8;
            padding: 0.2rem 0.6rem;
            border-radius: 20px;
        }

        .badge-habis {
            font-size: 0.68rem;
            color: #8b2222;
            background: #fdf0f0;
            border: 1px solid #e8c4c4;
            padding: 0.2rem 0.6rem;
            border-radius: 20px;
        }

        .badge-role {
            font-size: 0.68rem;
            color: var(--espresso);
            background: #f5ede5;
            border: 1px solid #e0cfc0;
            padding: 0.2rem 0.6rem;
            border-radius: 20px;
        }

        .alert-error {
            background: #fdf0f0;
            border: 1px solid #e8c4c4;
            color: #6b2222;
            padding: 0.85rem 1rem;
            border-radius: 6px;
            margin-bottom: 1rem;
            font-size: 0.84rem;
        }

        .alert-success {
            background: #f0f7f0;
            border: 1px solid #b8d4b8;
            color: #2d6a2d;
            padding: 0.85rem 1rem;
            border-radius: 6px;
            margin-bottom: 1rem;
            font-size: 0.84rem;
        }

        .site-footer {
            background: #fff;
            border-top: 1px solid var(--sand);
            margin-top: auto;
        }

        .footer-inner {
            max-width: 1200px;
            margin: auto;
            padding: 2.5rem 1.5rem 1.5rem;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr 1fr;
            gap: 2rem;
            margin-bottom: 2rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid #f0ebe4;
        }

        .footer-brand-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.4rem;
            font-weight: 300;
            letter-spacing: 0.1em;
            color: #1a1a1a;
            margin-bottom: 0.5rem;
        }

        .footer-brand-tagline {
            font-size: 0.78rem;
            color: var(--mink);
            font-style: italic;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .footer-social {
            display: flex;
            gap: 0.6rem;
        }

        .footer-social a {
            width: 32px;
            height: 32px;
            border: 1px solid var(--sand);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: 0.75rem;
            color: var(--mink);
            transition: all 0.18s;
        }

        .footer-social a:hover {
            background: var(--espresso);
            border-color: var(--espresso);
            color: #fff;
        }

        .footer-col-title {
            font-size: 0.65rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--espresso);
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .footer-links {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.6rem;
        }

        .footer-links a {
            text-decoration: none;
            font-size: 0.8rem;
            color: #6b6b6b;
            transition: color 0.15s;
        }

        .footer-links a:hover {
            color: var(--espresso);
        }

        .footer-contact-item {
            display: flex;
            gap: 0.5rem;
            font-size: 0.78rem;
            color: #6b6b6b;
            margin-bottom: 0.5rem;
            align-items: flex-start;
        }

        .footer-contact-item span:first-child {
            flex-shrink: 0;
        }

        .footer-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .footer-bottom-copy {
            font-size: 0.7rem;
            color: #b0a090;
            letter-spacing: 0.04em;
        }

        .footer-bottom-quote {
            font-family: 'Cormorant Garamond', serif;
            font-size: 0.9rem;
            color: #b0a090;
            font-style: italic;
        }
    </style>
</head>

<body>

@if(!request()->is('login') && session()->has('username'))
    @include('components.navbar')
@endif

<div class="main-content">
    @yield('content')
</div>

@if(!request()->is('login') && session()->has('username'))
    @include('components.footer')
@endif

</body>
</html>
