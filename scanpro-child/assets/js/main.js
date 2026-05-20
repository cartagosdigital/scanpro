/**
 * Scan Pro Child — main.js
 * Header sticky, menu mobile hamburger, tabs do produto.
 */

document.addEventListener('DOMContentLoaded', function () {

  // ---------------------------------------------------------------
  // Header sticky com sombra no scroll
  // ---------------------------------------------------------------
  var header = document.getElementById('site-header');
  if (header) {
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
  // Abas do produto (single-product.php)
  // ---------------------------------------------------------------
  var tabBtns = document.querySelectorAll('.product-tab-btn');
  var tabPanels = document.querySelectorAll('.product-tab-panel');

  if (tabBtns.length) {
    tabBtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        var targetId = 'tab-panel-' + this.dataset.tab;

        // Desativar todos
        tabBtns.forEach(function (b) {
          b.classList.remove('active');
          b.setAttribute('aria-selected', 'false');
          b.setAttribute('tabindex', '-1');
        });
        tabPanels.forEach(function (p) {
          p.classList.remove('active');
          p.hidden = true;
        });

        // Ativar alvo
        this.classList.add('active');
        this.setAttribute('aria-selected', 'true');
        this.removeAttribute('tabindex');

        var panel = document.getElementById(targetId);
        if (panel) {
          panel.classList.add('active');
          panel.hidden = false;
        }
      });

      // Navegação por teclado nas abas (→ ← Home End)
      btn.addEventListener('keydown', function (e) {
        var idx = Array.prototype.indexOf.call(tabBtns, this);
        var next;
        if (e.key === 'ArrowRight') {
          next = tabBtns[(idx + 1) % tabBtns.length];
        } else if (e.key === 'ArrowLeft') {
          next = tabBtns[(idx - 1 + tabBtns.length) % tabBtns.length];
        } else if (e.key === 'Home') {
          next = tabBtns[0];
        } else if (e.key === 'End') {
          next = tabBtns[tabBtns.length - 1];
        }
        if (next) {
          e.preventDefault();
          next.click();
          next.focus();
        }
      });
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
        var offset = 80; // altura do header fixo
        var top = target.getBoundingClientRect().top + window.scrollY - offset;
        window.scrollTo({ top: top, behavior: 'smooth' });
      }
    });
  });

});
