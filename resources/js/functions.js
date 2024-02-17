function removerAlerta() {
    const alerta = document.querySelector('#alerta');

    if (alerta) {
        setTimeout(() => {
            alerta.remove();
        }, 3000)
        return;
    }
}

document.addEventListener('DOMContentLoaded', () => {
    removerAlerta();
});


