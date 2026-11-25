const html = document.documentElement;
const boton = document.querySelector('[data-tema-boton]');

function aplicarTema(tema) {
    html.classList.remove('light', 'dark');
    html.classList.add(tema);
    if (boton) boton.setAttribute('aria-pressed', String(tema === 'dark'));
}

const temaGuardado = localStorage.getItem('tema');
const temaSistema = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
aplicarTema(temaGuardado || temaSistema);

if (boton) {
    boton.addEventListener('click', () => {
        const nuevo = html.classList.contains('dark') ? 'light' : 'dark';
        aplicarTema(nuevo);
        localStorage.setItem('tema', nuevo);
    });
}
