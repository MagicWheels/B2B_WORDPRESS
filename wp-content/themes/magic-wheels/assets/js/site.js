(function () {
  const toggle = document.querySelector('[data-nav-toggle]');
  const menu = document.querySelector('[data-nav-menu]');

  if (toggle && menu) {
    toggle.addEventListener('click', function () {
      const isOpen = menu.getAttribute('data-open') === 'true';
      menu.setAttribute('data-open', String(!isOpen));
      toggle.setAttribute('aria-expanded', String(!isOpen));
    });
  }

  const searchOpen = document.querySelector('[data-search-open]');
  const searchOverlay = document.querySelector('[data-search-overlay]');
  const searchInput = document.querySelector('[data-search-input]');
  const searchCloseButtons = document.querySelectorAll('[data-search-close]');
  let searchLastFocus = null;

  document.querySelectorAll('[data-file-input]').forEach(function (input) {
    const fileField = input.closest('.mw-file-field');
    const fileName = fileField ? fileField.querySelector('[data-file-name]') : null;

    input.addEventListener('change', function () {
      if (!fileName) {
        return;
      }

      fileName.textContent = input.files && input.files.length ? input.files[0].name : 'No file selected';
    });
  });

  document.querySelectorAll('[data-product-filter]').forEach(function (root) {
    const cards = Array.from(root.querySelectorAll('[data-product-card]'));
    const categoryLinks = Array.from(root.querySelectorAll('[data-product-category]'));
    const searchForm = root.querySelector('.mw-product-toolbar');
    const searchInput = root.querySelector('[data-product-search]');
    const filterInputs = Array.from(root.querySelectorAll('[data-product-filter-key]'));
    const emptyState = root.querySelector('[data-products-empty]');
    const state = {
      category: 'all',
      query: '',
    };

    if (!cards.length) {
      return;
    }

    function numberFromCard(card, key) {
      const value = Number(card.dataset[key] || 0);
      return Number.isFinite(value) ? value : 0;
    }

    function matchesActiveFilters(card) {
      return filterInputs.every(function (input) {
        if (!input.checked) {
          return true;
        }

        switch (input.dataset.productFilterKey) {
          case 'moq-500':
            return numberFromCard(card, 'moq') >= 500;
          case 'age-3':
            return numberFromCard(card, 'ageMin') >= 3;
          case 'load-20-100': {
            const maxLoad = numberFromCard(card, 'maxLoad');
            return maxLoad >= 20 && maxLoad <= 100;
          }
          case 'cert-en-astm': {
            const compliance = card.dataset.compliance || '';
            return compliance.includes('en') || compliance.includes('astm');
          }
          default:
            return true;
        }
      });
    }

    function updateCategoryLinks() {
      categoryLinks.forEach(function (link) {
        const isActive = (link.dataset.productCategory || 'all') === state.category;
        link.classList.toggle('is-active', isActive);

        if (isActive) {
          link.setAttribute('aria-current', 'true');
        } else {
          link.removeAttribute('aria-current');
        }
      });
    }

    function updateProducts() {
      const query = state.query.trim().toLowerCase();
      let visibleCount = 0;

      cards.forEach(function (card) {
        const categories = (card.dataset.categorySlugs || '').split(/\s+/).filter(Boolean);
        const matchesCategory = state.category === 'all' || categories.includes(state.category);
        const matchesSearch = query === '' || (card.dataset.searchContent || '').includes(query);
        const isVisible = matchesCategory && matchesSearch && matchesActiveFilters(card);

        card.hidden = !isVisible;

        if (isVisible) {
          visibleCount += 1;
        }
      });

      if (emptyState) {
        emptyState.hidden = visibleCount > 0;
      }

      updateCategoryLinks();
    }

    categoryLinks.forEach(function (link) {
      link.addEventListener('click', function (event) {
        event.preventDefault();
        state.category = link.dataset.productCategory || 'all';
        updateProducts();
      });
    });

    filterInputs.forEach(function (input) {
      input.addEventListener('change', updateProducts);
    });

    if (searchInput) {
      state.query = searchInput.value || '';
      searchInput.addEventListener('input', function () {
        state.query = searchInput.value || '';
        updateProducts();
      });
    }

    if (searchForm) {
      searchForm.addEventListener('submit', function (event) {
        event.preventDefault();
        state.query = searchInput ? searchInput.value || '' : '';
        updateProducts();
      });
    }

    updateProducts();
  });

  if (!searchOpen || !searchOverlay) {
    return;
  }

  function openSearch() {
    searchLastFocus = document.activeElement;
    searchOverlay.hidden = false;
    document.body.classList.add('mw-search-open');
    searchOpen.setAttribute('aria-expanded', 'true');

    if (menu && toggle) {
      menu.setAttribute('data-open', 'false');
      toggle.setAttribute('aria-expanded', 'false');
    }

    window.requestAnimationFrame(function () {
      if (searchInput) {
        searchInput.focus();
        searchInput.select();
      }
    });
  }

  function closeSearch() {
    if (searchOverlay.hidden) {
      return;
    }

    searchOverlay.hidden = true;
    document.body.classList.remove('mw-search-open');
    searchOpen.setAttribute('aria-expanded', 'false');

    if (searchLastFocus && typeof searchLastFocus.focus === 'function') {
      searchLastFocus.focus();
    }
  }

  searchOpen.addEventListener('click', openSearch);

  searchCloseButtons.forEach(function (button) {
    button.addEventListener('click', closeSearch);
  });

  document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') {
      closeSearch();
    }

    if (event.key !== 'Tab' || searchOverlay.hidden) {
      return;
    }

    const focusable = searchOverlay.querySelectorAll('button, input, [href], select, textarea, [tabindex]:not([tabindex="-1"])');
    const first = focusable[0];
    const last = focusable[focusable.length - 1];

    if (!first || !last) {
      return;
    }

    if (event.shiftKey && document.activeElement === first) {
      event.preventDefault();
      last.focus();
    } else if (!event.shiftKey && document.activeElement === last) {
      event.preventDefault();
      first.focus();
    }
  });
})();
