const html = document.documentElement;
const boton = document.querySelector('[data-tema-boton]');
const luna = document.querySelector('[data-tema-luna]');
const sol = document.querySelector('[data-tema-sol]');

function aplicarTema(tema) {
    const oscuro = tema === 'dark';
    html.classList.remove('light', 'dark');
    html.classList.add(tema);
    if (boton) boton.setAttribute('aria-pressed', String(oscuro));
    if (luna) luna.hidden = oscuro;
    if (sol) sol.hidden = !oscuro;
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
