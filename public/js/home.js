/*
 * Home page JavaScript — hero slider (carousel).
 * Features: prev/next buttons, clickable dots, autoplay (5s), pause on hover/focus,
 * keyboard arrows, touch swipe, pauses when the tab is hidden, honours "reduced motion".
 */
document.addEventListener('DOMContentLoaded', function () {
  var slider = document.getElementById('heroSlider');
  if (!slider) return;                                    // not on this page → do nothing

  var track    = document.getElementById('slidesTrack');
  var slides   = Array.prototype.slice.call(track.children);
  var dotsWrap = document.getElementById('sliderDots');
  var prevBtn  = slider.querySelector('.slider-btn.prev');
  var nextBtn  = slider.querySelector('.slider-btn.next');

  var DELAY = 5000;                                       // ms between automatic slides
  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var index = 0;
  var timer = null;

  // 1) Build one dot per slide
  var dots = slides.map(function (_, i) {
    var dot = document.createElement('button');
    dot.type = 'button';
    dot.className = 'dot';
    dot.setAttribute('aria-label', 'Go to slide ' + (i + 1));
    dot.addEventListener('click', function () { goTo(i); restart(); });
    dotsWrap.appendChild(dot);
    return dot;
  });

  // 2) Show slide number n (wraps around at both ends)
  function goTo(n) {
    index = (n + slides.length) % slides.length;
    track.style.transform = 'translateX(-' + (index * 100) + '%)';
    slides.forEach(function (slide, i) { slide.setAttribute('aria-hidden', i === index ? 'false' : 'true'); });
    dots.forEach(function (dot, i) {
      dot.classList.toggle('active', i === index);
      dot.setAttribute('aria-current', i === index ? 'true' : 'false');
    });
  }

  // 3) Autoplay helpers (start() always stops first so two timers can never run at once)
  function stop()    { clearInterval(timer); timer = null; }
  function start()   { stop(); if (!reduceMotion) timer = setInterval(function () { goTo(index + 1); }, DELAY); }
  function restart() { start(); }

  // 4) Controls
  prevBtn.addEventListener('click', function () { goTo(index - 1); restart(); });
  nextBtn.addEventListener('click', function () { goTo(index + 1); restart(); });

  slider.addEventListener('mouseenter', stop);
  slider.addEventListener('mouseleave', start);
  slider.addEventListener('focusin', stop);
  slider.addEventListener('focusout', start);

  slider.addEventListener('keydown', function (e) {
    if (e.key === 'ArrowLeft')  { goTo(index - 1); restart(); }
    if (e.key === 'ArrowRight') { goTo(index + 1); restart(); }
  });

  var touchStartX = 0;
  slider.addEventListener('touchstart', function (e) { touchStartX = e.changedTouches[0].clientX; }, { passive: true });
  slider.addEventListener('touchend', function (e) {
    var diff = e.changedTouches[0].clientX - touchStartX;
    if (Math.abs(diff) > 50) { goTo(diff < 0 ? index + 1 : index - 1); restart(); }
  });

  document.addEventListener('visibilitychange', function () { document.hidden ? stop() : start(); });

  // 5) Go
  goTo(0);
  start();
});
