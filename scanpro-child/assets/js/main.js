/**
 * Scan Pro Child — main.js
 * Header sticky, menu mobile hamburger, tabs do produto, animações de entrada.
 */

document.addEventListener('DOMContentLoaded', function () {

  // ---------------------------------------------------------------
  // Header: transparente em páginas com hero, branco nas demais
  // ---------------------------------------------------------------
  var header = document.getElementById('site-header');
  if (header) {
    var hasHero = !!document.querySelector('section.hero');

    if (!hasHero) {
      // Páginas sem hero (internas): marca o body para o CSS
      // aplicar header branco via body.no-hero #site-header
      document.body.classList.add('no-hero');
    }

    window.addEventListener('scroll', function () {
      header.classList.toggle('scrolled', window.scrollY > 50);
    }, { passive: true });
  }

  // ---------------------------------------------------------------
  // Menu mobile — hamburger toggle
  // ---------------------------------------------------------------
  var hamburger = document.getElementById('hamburger');
  var nav = document.getElementById('primary-nav');

  if (hamburger && nav) {
    hamburger.addEventListener('click', function () {
      var isOpen = nav.classList.toggle('open');
      hamburger.classList.toggle('active', isOpen);
      hamburger.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    });

    // Fechar menu ao clicar em link (mobile)
    nav.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        nav.classList.remove('open');
        hamburger.classList.remove('active');
        hamburger.setAttribute('aria-expanded', 'false');
      });
    });

    // Dropdown mobile: toggle ao clicar em item pai
    nav.querySelectorAll('.has-dropdown > a').forEach(function (link) {
      link.addEventListener('click', function (e) {
        // Em mobile, prevenir navegação e abrir dropdown
        if (window.innerWidth <= 900) {
          e.preventDefault();
          var li = this.closest('.has-dropdown');
          li.classList.toggle('open');
        }
      });
    });

    // Fechar menu ao pressionar Escape
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && nav.classList.contains('open')) {
        nav.classList.remove('open');
        hamburger.classList.remove('active');
        hamburger.setAttribute('aria-expanded', 'false');
        hamburger.focus();
      }
    });

    // Fechar menu ao clicar fora
    document.addEventListener('click', function (e) {
      if (nav.classList.contains('open') &&
          !nav.contains(e.target) &&
          !hamburger.contains(e.target)) {
        nav.classList.remove('open');
        hamburger.classList.remove('active');
        hamburger.setAttribute('aria-expanded', 'false');
      }
    });
  }

  // ---------------------------------------------------------------
  // Smooth scroll para âncoras internas
  // ---------------------------------------------------------------
  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      var target = document.querySelector(this.getAttribute('href'));
      if (target) {
        e.preventDefault();
        var offset = 80;
        var top = target.getBoundingClientRect().top + window.scrollY - offset;
        window.scrollTo({ top: top, behavior: 'smooth' });
      }
    });
  });

  // ---------------------------------------------------------------
  // Filtro de categorias — página Referenzen
  // ---------------------------------------------------------------
  var refFilterBtns = document.querySelectorAll('.ref-filter-btn');
  var refKategorien = document.querySelectorAll('.ref-kategorie');

  if (refFilterBtns.length && refKategorien.length) {
    refFilterBtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        refFilterBtns.forEach(function (b) { b.classList.remove('active'); });
        btn.classList.add('active');

        var filter = btn.dataset.filter;
        refKategorien.forEach(function (kat) {
          if (filter === 'all' || kat.dataset.category === filter) {
            kat.classList.remove('hidden');
          } else {
            kat.classList.add('hidden');
          }
        });

        // Scroll suave até a primeira categoria visível
        var first = document.querySelector('.ref-kategorie:not(.hidden)');
        if (first && filter !== 'all') {
          var offset = 72 + 64; // header + filter bar
          var top = first.getBoundingClientRect().top + window.scrollY - offset;
          window.scrollTo({ top: top, behavior: 'smooth' });
        }
      });
    });
  }

  // ---------------------------------------------------------------
  // Animação de entrada leve — só footer e .reveal-fade explícitos
  // ---------------------------------------------------------------
  if ('IntersectionObserver' in window) {
    var revealObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          revealObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12 });

    // Colunas do footer
    document.querySelectorAll('.footer-col').forEach(function (el) {
      revealObserver.observe(el);
    });

    // Elementos marcados explicitamente com reveal-fade nos templates
    document.querySelectorAll('.reveal-fade').forEach(function (el, i) {
      el.style.transitionDelay = (i * 0.08) + 's';
      revealObserver.observe(el);
    });
  } else {
    // Fallback: exibe tudo sem animação
    document.querySelectorAll('.footer-col, .reveal-fade').forEach(function (el) {
      el.classList.add('is-visible');
    });
  }

  // ---------------------------------------------------------------
  // FAQ Accordion — Wissen
  // ---------------------------------------------------------------
  document.querySelectorAll('.faq-question').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var isOpen = btn.getAttribute('aria-expanded') === 'true';

      // Fechar todos
      document.querySelectorAll('.faq-question').forEach(function (b) {
        b.setAttribute('aria-expanded', 'false');
        b.nextElementSibling.classList.remove('open');
      });

      // Abrir o clicado (se estava fechado)
      if (!isOpen) {
        btn.setAttribute('aria-expanded', 'true');
        btn.nextElementSibling.classList.add('open');
      }
    });
  });

  // ---------------------------------------------------------------
  // Mega-menu Produkte — hover com delay para não fechar ao mover o cursor
  // (position:fixed no dropdown sai dos bounds do li, CSS :hover não é suficiente)
  // ---------------------------------------------------------------
  var megaLi   = document.querySelector('.has-megamenu');
  var megaDrop = megaLi ? megaLi.querySelector(':scope > .dropdown') : null;
  var megaTimer = null;

  if (megaLi && megaDrop && window.innerWidth > 960) {
    function openMega() {
      clearTimeout(megaTimer);
      megaLi.classList.add('mega-open');
    }
    function closeMega() {
      megaTimer = setTimeout(function () {
        megaLi.classList.remove('mega-open');
      }, 320);
    }

    megaLi.addEventListener('mouseenter', openMega);
    megaLi.addEventListener('mouseleave', closeMega);
    megaDrop.addEventListener('mouseenter', openMega);
    megaDrop.addEventListener('mouseleave', closeMega);
  }

});
