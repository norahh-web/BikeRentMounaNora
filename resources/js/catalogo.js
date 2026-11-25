/* ---------- Cálculos (sin DOM) ---------- */

function filtrar(bicis, tipo) {
    return tipo === 'todas' ? bicis : bicis.filter((bici) => bici.tipo === tipo);
}

function ordenar(bicis, orden) {
    if (orden === 'asc') return [...bicis].sort((a, b) => a.precio - b.precio);
    if (orden === 'desc') return [...bicis].sort((a, b) => b.precio - a.precio);
    return bicis;
}

/* ---------- DOM ---------- */

function iniciarCatalogo() {
    const lista = document.getElementById('lista-bicis');
    if (!lista) return;

    const aviso = document.getElementById('aviso-sin-bicis');
    const selector = document.getElementById('orden-precio');
    const chips = document.querySelectorAll('.alquiler__filtros [data-filtro]');

    const bicis = Array.from(lista.querySelectorAll('.bicicleta-card')).map((el) => ({
        el,
        tipo: el.dataset.tipo,
        precio: Number(el.dataset.precio),
    }));

    let tipo = 'todas';
    let orden = '';

    function mostrar() {
        const visibles = ordenar(filtrar(bicis, tipo), orden);
        lista.replaceChildren(...visibles.map((bici) => bici.el));
        aviso.hidden = visibles.length > 0;
    }

    chips.forEach((chip) => {
        chip.addEventListener('click', () => {
            tipo = chip.dataset.filtro;
            chips.forEach((otro) => {
                otro.classList.toggle('chip--activo', otro === chip);
                otro.setAttribute('aria-pressed', String(otro === chip));
            });
            mostrar();
        });
    });

    selector.addEventListener('change', () => {
        orden = selector.value;
        mostrar();
    });
}

iniciarCatalogo();
