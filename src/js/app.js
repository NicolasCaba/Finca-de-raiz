function navegacionResponsive() {
  const NAVEGACION = document.querySelector('.navegacion');

  NAVEGACION.classList.toggle('mostrar');
}

function darkMode() {
  document.body.classList.toggle('dark-mode');
}

function autoDarkMode() {
  const COLOR_PREFERENCE_DARK_MODE = window.matchMedia(
    '(prefers-color-scheme: dark)',
  );

  if (COLOR_PREFERENCE_DARK_MODE.matches) {
    document.body.classList.add('dark-mode');
  } else {
    document.body.classList.remove('dark-mode');
  }

  COLOR_PREFERENCE_DARK_MODE.addEventListener('change', () => {
    if (COLOR_PREFERENCE_DARK_MODE.matches) {
      document.body.classList.add('dark-mode');
    } else {
      document.body.classList.remove('dark-mode');
    }
  });
}

function eventListeners() {
  const MOBILE_MENU = document.querySelector('.mobile-menu');
  const BOTON_DARK_MODE = document.querySelector('.dark-mode-boton');

  MOBILE_MENU.addEventListener('click', navegacionResponsive);
  BOTON_DARK_MODE.addEventListener('click', darkMode);
}

document.addEventListener('DOMContentLoaded', () => {
  eventListeners();
  autoDarkMode();
});
