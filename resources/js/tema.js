const html = document.documentElement;
const boton = document.querySelector('[data-tema-boton]');

function aplicarTema(tema) {
    html.classList.remove('light', 'dark');
    html.classList.add(tema);
    if (boton) boton.setAttribute('aria-pressed', String(tema === 'dark'));
}

aplicarTema(localStorage.getItem('tema') || 'light');

if (boton) {
    boton.addEventListener('click', () => {
        const nuevo = html.classList.contains('dark') ? 'light' : 'dark';
        aplicarTema(nuevo);
        localStorage.setItem('tema', nuevo);
    });
}
