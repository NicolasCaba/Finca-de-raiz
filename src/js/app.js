function navegacionResponsive() {
  const navegacion = document.querySelector('.navegacion');

  navegacion.classList.toggle('mostrar');
}

function darkMode() {
  document.body.classList.toggle('dark-mode');
}

function autoDarkMode() {
  const colorPreferenceDarkMode = window.matchMedia(
    '(prefers-color-scheme: dark)',
  );

  if (colorPreferenceDarkMode.matches) {
    document.body.classList.add('dark-mode');
  } else {
    document.body.classList.remove('dark-mode');
  }

  colorPreferenceDarkMode.addEventListener('change', () => {
    if (colorPreferenceDarkMode.matches) {
      document.body.classList.add('dark-mode');
    } else {
      document.body.classList.remove('dark-mode');
    }
  });
}

function eventListeners() {
  const mobileMenu = document.querySelector('.mobile-menu');
  const botonDarkMode = document.querySelector('.dark-mode-boton');

  mobileMenu.addEventListener('click', navegacionResponsive);
  botonDarkMode.addEventListener('click', darkMode);
}

document.addEventListener('DOMContentLoaded', () => {
  eventListeners();
  autoDarkMode();
});
