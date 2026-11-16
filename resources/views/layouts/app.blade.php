{{--
    MASTER LAYOUT — every page does @extends('layouts.app').
    Child pages fill in:
      @section('title')    → text in the browser tab
      @section('content')  → the page body
      @push('styles')      → that page's own <link> to public/css/<page>.css
      @push('scripts')     → that page's own <script> from public/js/<page>.js
--}}
@php
    // EDIT THESE: the footer must show the group members' names.
    $members = [
        'Rollymar [Surname] — Member 1',
        '[Member 2 Name] — Member 2',
        '[Member 3 Name] — Member 3',
    ];

    // url() instead of route(): the About/Contact routes belong to Members 2 & 3.
    // route('about') would crash this layout until their branches are merged; url('/about') just 404s.
    $links = [
        ['label' => 'Home',    'path' => '/',        'match' => '/'],
        ['label' => 'About',   'path' => '/about',   'match' => 'about'],
        ['label' => 'Contact', 'path' => '/contact', 'match' => 'contact'],
    ];
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Home') · CEMS — Caraga State University</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Shared styles for the layout (nav, footer, buttons) --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- Each page injects its own CSS here --}}
    @stack('styles')
</head>
<body>

<header class="site-header">
    <nav class="nav container" aria-label="Main navigation">
        <a href="{{ url('/') }}" class="brand">
            <span class="brand-mark" aria-hidden="true">🎓</span>
            <span class="brand-text"><strong>CEMS</strong><small>Caraga State University</small></span>
        </a>

        <button class="nav-toggle" id="navToggle" type="button" aria-expanded="false" aria-controls="navLinks" aria-label="Toggle menu">☰</button>

        <ul class="nav-links" id="navLinks">
            @foreach ($links as $link)
                <li>
                    <a href="{{ url($link['path']) }}"
                       class="{{ request()->is($link['match']) ? 'active' : '' }}"
                       @if (request()->is($link['match'])) aria-current="page" @endif>
                        {{ $link['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer class="site-footer">
    <div class="container footer-grid">
        <div>
            <div class="footer-brand">🎓 CEMS</div>
            <p>Campus Event Management System of Caraga State University.</p>
        </div>
        <div>
            <h4>Pages</h4>
            <ul>
                @foreach ($links as $link)
                    <li><a href="{{ url($link['path']) }}">{{ $link['label'] }}</a></li>
                @endforeach
            </ul>
        </div>
        <div>
            <h4>Group Members</h4>
            <ul>
                @foreach ($members as $member)
                    <li>{{ $member }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="footer-bottom container">
        <span>© {{ date('Y') }} CEMS · Caraga State University</span>
        <span>Laravel group activity</span>
    </div>
</footer>

{{-- Shared script (mobile menu), then each page's own JS --}}
<script src="{{ asset('js/app.js') }}" defer></script>
@stack('scripts')
</body>
</html>
