/**
 * Scan Pro Child — product-filter.js
 * Filtro de categorias de produtos na página inicial.
 * Filtra os .product-card via data-category com animação.
 * Mostra sempre no máximo PREVIEW_LIMIT cards por vez — é só um preview,
 * o catálogo completo fica na página /produkte.
 */

document.addEventListener('DOMContentLoaded', function () {

  var PREVIEW_LIMIT = 3;

  var filterBtns = document.querySelectorAll('.filter-btn');
  var productCards = document.querySelectorAll('#products-grid .product-card');

  if (!filterBtns.length || !productCards.length) return;

  function applyFilter(filter) {
    // data-category traz uma lista de slugs (categoria + categorias-mãe)
    // separada por espaço, então checamos se o filtro está contido nela
    // em vez de exigir igualdade exata
    var matched = [];
    productCards.forEach(function (card) {
      var categories = (card.dataset.category || '').split(' ');
      if (filter === 'all' || categories.indexOf(filter) !== -1) {
        matched.push(card);
      }
    });

    var visible = matched.slice(0, PREVIEW_LIMIT);

    productCards.forEach(function (card) {
      var show = visible.indexOf(card) !== -1;

      if (show) {
        card.style.display = '';
        // Pequena animação de entrada
        card.style.opacity = '0';
        card.style.transform = 'translateY(8px)';
        requestAnimationFrame(function () {
          requestAnimationFrame(function () {
            card.style.transition = 'opacity 0.25s ease, transform 0.25s ease';
            card.style.opacity = '1';
            card.style.transform = '';
          });
        });
      } else {
        card.style.display = 'none';
        card.style.transition = '';
      }
    });

    announceFilterResult(visible.length);
  }

  filterBtns.forEach(function (btn) {
    btn.addEventListener('click', function () {
      var filter = this.dataset.filter;

      // Atualizar estado dos botões
      filterBtns.forEach(function (b) {
        b.classList.remove('active');
        b.setAttribute('aria-pressed', 'false');
      });
      this.classList.add('active');
      this.setAttribute('aria-pressed', 'true');

      applyFilter(filter);
    });
  });

  // Anúncio acessível do resultado do filtro
  function announceFilterResult(count) {
    var announcer = document.getElementById('filter-announcer');
    if (!announcer) {
      announcer = document.createElement('div');
      announcer.id = 'filter-announcer';
      announcer.setAttribute('aria-live', 'polite');
      announcer.setAttribute('aria-atomic', 'true');
      announcer.style.cssText = 'position:absolute;width:1px;height:1px;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;';
      document.body.appendChild(announcer);
    }
    // Texto em alemão (idioma padrão do site)
    announcer.textContent = count + ' Produkte gefunden.';
  }

  // Estado inicial: o botão "Alle" já vem marcado como ativo no HTML
  applyFilter('all');

});
