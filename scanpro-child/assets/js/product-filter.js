/**
 * Scan Pro Child — product-filter.js
 * Filtro de categorias de produtos na página inicial.
 * Filtra os .product-card via data-category com animação.
 */

document.addEventListener('DOMContentLoaded', function () {

  var filterBtns = document.querySelectorAll('.filter-btn');
  var productCards = document.querySelectorAll('#products-grid .product-card');

  if (!filterBtns.length || !productCards.length) return;

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

      // Filtrar cards
      productCards.forEach(function (card) {
        var category = card.dataset.category || '';
        var show = filter === 'all' || category === filter;

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

      // Anunciar resultado para leitores de tela
      var visibleCount = Array.prototype.filter.call(productCards, function (c) {
        return c.style.display !== 'none';
      }).length;
      announceFilterResult(visibleCount);
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

});
