var btnAbrirPopup = document.getElementById('btn-abrir-popup'),
    overlay = document.getElementById('overlay'),
    popup = document.getElementById('popup'),
    btnCerrarPopup = document.getElementById('btn-cerrar-popup'),
    btnAbrirPopup2 = document.getElementById('btn-abrir-popup2'),
    overlay2 = document.getElementById('overlay2P'),
    popup2 = document.getElementById('popup2P'),
    btnCerrarPopup2 = document.getElementById('btn-cerrar-popup2P'),
    btnCerrarPopup2_1 = document.getElementById('btn-cerrar-popup2_1P');

btnAbrirPopup.addEventListener('click', function() {
    overlay.classList.add('active');
    popup.classList.add('active');
});
btnCerrarPopup.addEventListener('click', function() {
    overlay.classList.remove('active');
    popup.classList.remove('active');
});

btnAbrirPopup2.addEventListener('click', function() {
    overlay2.classList.add('active');
    popup2.classList.add('active');
});
btnCerrarPopup2.addEventListener('click', function() {
    overlay2.classList.remove('active');
    popup2.classList.remove('active');
});
btnCerrarPopup2_1.addEventListener('click', function() {
    overlay2.classList.remove('active');
    popup2.classList.remove('active');
});

