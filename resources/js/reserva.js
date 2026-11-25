/* ---------- Cálculos (sin DOM) ---------- */

function formatoHora(hora) {
    return `${String(hora).padStart(2, '0')}:00`;
}

function horasSeguidas(horas) {
    return horas[horas.length - 1] - horas[0] + 1 === horas.length;
}

function calcularTotal(horas, precio) {
    return horas.length * precio;
}

function validar(estado) {
    const errores = [];
    if (!estado.biciId) errores.push('Elige una bici.');
    if (!estado.fecha) errores.push('Elige una fecha.');
    if (estado.horas.length === 0) {
        errores.push('Elige al menos una hora.');
    } else {
        if (!horasSeguidas(estado.horas)) errores.push('Las horas deben ser seguidas.');
        const inicio = new Date(`${estado.fecha}T${formatoHora(estado.horas[0])}:00`);
        if (estado.fecha && inicio < new Date()) errores.push('La hora de inicio ya ha pasado.');
    }
    return errores;
}

/* ---------- DOM ---------- */

function iniciarReserva() {
    const cuerpo = document.getElementById('alquiler');
    if (!cuerpo) return;

    const porId = (id) => document.getElementById(id);
    const tarjetas = document.querySelectorAll('.bicicleta-card');
    const dias = document.querySelectorAll('.calendario__dia');
    const franjas = document.querySelectorAll('.franja');
    const estado = { biciId: null, nombreBici: '', precio: 0, fecha: null, horas: [] };

    function mostrarErrores(errores) {
        const cajaErrores = porId('resumen-error');
        cajaErrores.replaceChildren(
            ...errores.map((texto) => {
                const item = document.createElement('li');
                item.textContent = texto;
                return item;
            }),
        );
        cajaErrores.hidden = errores.length === 0;
    }

    function pintarResumen() {
        const hayHoras = estado.horas.length > 0;
        const inicio = estado.horas[0];
        const fin = estado.horas[estado.horas.length - 1] + 1;
        const horario = hayHoras ? `${formatoHora(inicio)} - ${formatoHora(fin)}` : '—';

        porId('resumen-bici').textContent = estado.biciId ? estado.nombreBici : '—';
        porId('resumen-fecha').textContent = estado.fecha
            ? new Date(`${estado.fecha}T00:00:00`).toLocaleDateString('es-ES')
            : '—';
        porId('resumen-horario').textContent = horario;
        porId('resumen-duracion').textContent = hayHoras ? `${estado.horas.length} h` : '—';
        porId('resumen-precio').textContent = estado.biciId ? `${estado.precio} €/h` : '—';
        porId('resumen-total').textContent = `${calcularTotal(estado.horas, estado.precio).toFixed(2)} €`;
        porId('texto-horas').textContent = hayHoras
            ? `Has elegido ${estado.horas.length} h: ${horario}.`
            : 'Aún no has elegido horas.';

        porId('campo-bici').value = estado.biciId ?? '';
        porId('campo-inicio').value = estado.fecha && hayHoras ? `${estado.fecha} ${formatoHora(inicio)}:00` : '';
        porId('campo-fin').value = estado.fecha && hayHoras ? `${estado.fecha} ${formatoHora(fin)}:00` : '';
    }

    function actualizar(mostrar) {
        pintarResumen();
        mostrarErrores(mostrar ? validar(estado) : []);
    }

    function elegirBici(tarjeta, mostrar) {
        tarjetas.forEach((otra) => {
            otra.classList.toggle('bicicleta-card--seleccionada', otra === tarjeta);
        });
        estado.biciId = Number(tarjeta.dataset.id);
        estado.nombreBici = tarjeta.querySelector('.bicicleta-card__nombre').textContent.trim();
        estado.precio = Number(tarjeta.dataset.precio);
        actualizar(mostrar);
    }

    tarjetas.forEach((tarjeta) => {
        tarjeta.querySelector('.bicicleta-card__elegir')?.addEventListener('click', () => {
            elegirBici(tarjeta, true);
        });
    });

    dias.forEach((dia) => {
        dia.addEventListener('click', () => {
            dias.forEach((otro) => otro.classList.toggle('calendario__dia--elegido', otro === dia));
            estado.fecha = dia.dataset.fecha;
            actualizar(true);
        });
    });

    franjas.forEach((franja) => {
        franja.addEventListener('click', () => {
            const hora = Number.parseInt(franja.dataset.hora, 10);
            if (estado.horas.includes(hora)) {
                estado.horas = estado.horas.filter((h) => h !== hora);
            } else {
                estado.horas = [...estado.horas, hora].sort((a, b) => a - b);
            }
            const elegida = estado.horas.includes(hora);
            franja.classList.toggle('franja--elegida', elegida);
            franja.setAttribute('aria-pressed', String(elegida));
            actualizar(true);
        });
    });

    porId('formulario-reserva').addEventListener('submit', (evento) => {
        const errores = validar(estado);
        if (errores.length > 0) {
            evento.preventDefault();
            mostrarErrores(errores);
        }
    });

    const inicial = Array.from(tarjetas).find((t) => t.dataset.id === cuerpo.dataset.biciInicial);
    if (inicial) {
        elegirBici(inicial, false);
    } else {
        actualizar(false);
    }
}

iniciarReserva();
