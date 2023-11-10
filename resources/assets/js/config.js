/**
 * Config
 * -------------------------------------------------------------------------------------
 * ! IMPORTANT: Make sure you clear the browser local storage In order to see the config changes in the template.
 * ! To clear local storage: (https://www.leadshook.com/help/how-to-clear-local-storage-in-google-chrome-browser/).
 */

'use strict';

// JS global variables
let config = {
  colors: {
    primary: '#E86F3F', // Corail
    secondary: '#FDF8EF', // Lin
    success: '#28c76f', // Conservé pour les succès
    info: '#00cfe8', // Conservé pour les informations
    warning: '#ff9f43', // Utilisation du Saumon pour les avertissements
    danger: '#ea5455', // Utilisation du Quartz pour les dangers
    dark: '#626B70', // Quartz
    black: '#000000', // Noir
    white: '#FFFFFF', // Blanc
    cardColor: '#FDF8EF', // Lin pour le fond des cartes
    bodyBg: '#f8f7fa', // Conservé pour le fond du corps
    bodyColor: '#6f6b7d', // Conservé pour la couleur du texte du corps
    headingColor: '#5d596c', // Conservé pour la couleur des titres
    textMuted: '#a5a3ae', // Conservé pour le texte désactivé
    borderColor: '#dbdade' // Conservé pour la bordure
  },
  colors_label: {
    primary: '#E86F3F29', // Corail avec transparence
    secondary: '#FDF8EF29', // Lin avec transparence
    success: '#28c76f29', // Conservé pour les étiquettes de succès
    info: '#00cfe829', // Conservé pour les étiquettes d'information
    warning: '#F9996429', // Saumon avec transparence pour les avertissements
    danger: '#ea545529', // Quartz avec transparence pour les dangers
    dark: '#4b4b4b29' // Conservé pour les étiquettes sombres
  },
  colors_dark: {
    cardColor: '#2f3349', // Conservé pour les cartes en mode sombre
    bodyBg: '#25293c', // Conservé pour le fond du corps en mode sombre
    bodyColor: '#b6bee3', // Conservé pour la couleur du texte du corps en mode sombre
    headingColor: '#cfd3ec', // Conservé pour la couleur des titres en mode sombre
    textMuted: '#7983bb', // Conservé pour le texte désactivé en mode sombre
    borderColor: '#434968' // Conservé pour la bordure en mode sombre
  },
  enableMenuLocalStorage: true // Enable menu state with local storage support
};

let assetsPath = document.documentElement.getAttribute('data-assets-path'),
  baseUrl = document.documentElement.getAttribute('data-base-url') + '/',
  templateName = document.documentElement.getAttribute('data-template'),
  rtlSupport = true; // set true for rtl support (rtl + ltr), false for ltr only.
