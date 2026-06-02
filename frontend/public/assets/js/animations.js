(function () {
  'use strict';

  /* ─────────────────────────────────────────────────────
     1. STAGGER — assign progressive delays to children
        Usage: <div data-stagger="120">
                 <div data-animate="fade-up">…</div>
                 <div data-animate="fade-up">…</div>
               </div>
  ───────────────────────────────────────────────────── */
  function initStagger() {
    document.querySelectorAll('[data-stagger]').forEach(function (group) {
      var base = parseInt(group.getAttribute('data-stagger') || '120', 10);
      Array.from(group.children).forEach(function (child, i) {
        if (child.hasAttribute('data-animate') && !child.hasAttribute('data-animate-delay')) {
          child.setAttribute('data-animate-delay', String(i * base));
        }
      });
    });
  }

  /* ─────────────────────────────────────────────────────
     2. SCROLL ANIMATIONS (IntersectionObserver)
        Add .is-visible → CSS handles the actual transition
  ───────────────────────────────────────────────────── */
  function initScrollAnimations() {
    var els = document.querySelectorAll('[data-animate]');
    if (!els.length) return;

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        var el    = entry.target;
        var delay = parseInt(el.getAttribute('data-animate-delay') || '0', 10);
        setTimeout(function () { el.classList.add('is-visible'); }, delay);
        observer.unobserve(el);
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

    els.forEach(function (el) { observer.observe(el); });
  }

  /* ─────────────────────────────────────────────────────
     3. COUNTER ANIMATION
        Usage: <span data-count="300+">300+</span>
        Supports numeric suffix (+, %, k, etc.)
  ───────────────────────────────────────────────────── */
  function animateCounter(el) {
    var raw    = el.getAttribute('data-count');
    var suffix = raw.replace(/[\d,]/g, '');
    var target = parseFloat(raw.replace(/[^\d.]/g, ''));
    if (isNaN(target)) return;

    var duration  = 2000;
    var startTime = null;

    function easeOutCubic(t) { return 1 - Math.pow(1 - t, 3); }

    function tick(now) {
      if (!startTime) startTime = now;
      var progress = Math.min((now - startTime) / duration, 1);
      var value    = Math.floor(easeOutCubic(progress) * target);
      el.textContent = value.toLocaleString() + suffix;
      if (progress < 1) {
        requestAnimationFrame(tick);
      } else {
        el.textContent = target.toLocaleString() + suffix;
      }
    }

    requestAnimationFrame(tick);
  }

  function initCounters() {
    var counters = document.querySelectorAll('[data-count]');
    if (!counters.length) return;

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        animateCounter(entry.target);
        observer.unobserve(entry.target);
      });
    }, { threshold: 0.5 });

    counters.forEach(function (el) { observer.observe(el); });
  }

  /* ─────────────────────────────────────────────────────
     INIT
  ───────────────────────────────────────────────────── */
  function init() {
    initStagger();          // must run before scroll observer
    initScrollAnimations();
    initCounters();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
