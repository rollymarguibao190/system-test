@extends('layouts.app')

@section('title', 'Home')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')

{{-- ============ HERO + SLIDER ============ --}}
<section class="hero">
    <div class="container hero-inner">
        <div class="hero-copy">
            <span class="hero-tag">Caraga State University</span>
            <h1>Where <span class="gold">Golden Paddlers</span> create unforgettable moments.</h1>
            <p class="lead">
                CEMS is the event hub of Caraga State University. Discover what's happening on campus,
                register in a few clicks, and help organizers run better events.
            </p>
            <div class="hero-cta">
                <a href="{{ url('/about') }}" class="btn btn-gold">Learn About CEMS</a>
                <a href="{{ url('/contact') }}" class="btn btn-ghost-light">Contact Us</a>
            </div>
        </div>

        {{-- Image slider: controlled by public/js/home.js --}}
        <div class="slider" id="heroSlider" tabindex="0"
             role="region" aria-roledescription="carousel" aria-label="Types of campus events">
            <div class="slides" id="slidesTrack">
                <article class="slide slide--academic">
                    <span class="slide-emoji" aria-hidden="true">🎓</span>
                    <h3>Academic Forums</h3>
                    <p>Seminars, talks and workshops that go beyond the classroom.</p>
                </article>
                <article class="slide slide--cultural">
                    <span class="slide-emoji" aria-hidden="true">🎭</span>
                    <h3>Cultural Nights</h3>
                    <p>Celebrate Caraga's arts, music and traditions with the whole campus.</p>
                </article>
                <article class="slide slide--sports">
                    <span class="slide-emoji" aria-hidden="true">⚽</span>
                    <h3>Sports Fest</h3>
                    <p>Inter-college games and tournaments that bring out the school spirit.</p>
                </article>
                <article class="slide slide--community">
                    <span class="slide-emoji" aria-hidden="true">🤝</span>
                    <h3>Community Outreach</h3>
                    <p>Volunteer drives and projects that give back to the community.</p>
                </article>
            </div>

            <button class="slider-btn prev" type="button" aria-label="Previous slide">‹</button>
            <button class="slider-btn next" type="button" aria-label="Next slide">›</button>
            <div class="slider-dots" id="sliderDots"></div>
        </div>
    </div>
</section>

{{-- ============ ABOUT THE THEME ============ --}}
<section class="section">
    <div class="container intro">
        <div>
            <div class="eyebrow">Our theme</div>
            <h2 class="section-title">One place for every campus event</h2>
        </div>
        <div>
            <p>
                Our group built this website around <strong>CEMS</strong>, the Campus Event Management System
                of Caraga State University. Instead of finding out about events through scattered posts and
                group chats, students can see them in one place, while organizers can publish events and
                administrators can approve them.
            </p>
            <div class="chips" aria-label="Event categories">
                <span class="chip">Academic</span><span class="chip">Cultural</span><span class="chip">Sports</span>
                <span class="chip">Seminar</span><span class="chip">Workshop</span><span class="chip">Community</span>
            </div>
        </div>
    </div>
</section>

{{-- ============ FEATURES ============ --}}
<section class="section section-alt">
    <div class="container">
        <div class="section-head">
            <div class="eyebrow">What CEMS does</div>
            <h2 class="section-title">Built for students, organizers and admins</h2>
        </div>
        <div class="cards">
            <article class="card"><div class="card-icon">🔎</div><h3>Discover</h3><p>Browse upcoming events and filter them by category.</p></article>
            <article class="card"><div class="card-icon">🎟️</div><h3>Register</h3><p>Sign up for an event and keep track of your registrations.</p></article>
            <article class="card"><div class="card-icon">📅</div><h3>Organize</h3><p>Organizers create events and see who is attending.</p></article>
            <article class="card"><div class="card-icon">✅</div><h3>Approve</h3><p>Admins review events before they go public.</p></article>
        </div>
    </div>
</section>

{{-- ============ CALL TO ACTION ============ --}}
<section class="cta">
    <div class="container cta-inner">
        <h2>Have a question about CEMS?</h2>
        <p>Reach out to our team. We'd love to hear from you.</p>
        <a href="{{ url('/contact') }}" class="btn btn-gold">Get in touch</a>
    </div>
</section>

@endsection

@push('scripts')
    <script src="{{ asset('js/home.js') }}" defer></script>
@endpush
