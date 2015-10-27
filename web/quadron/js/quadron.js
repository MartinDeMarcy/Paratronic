////////////////////////////////////////////////////////////////
//
//  QUADRON | ©PRAKT + DOPLUS
//
////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////
//
//  INFOS
//
////////////////////////////////////////////////////////////////

// INFOS GÉNÉRALES
// Ce fichier contient tous les appels de fichiers externes, 
// les appels de fonctions et les déclarations de variables globales.
//
// VARIABLES GLOBALES
// Les variables JS globale doivent avoir une préfixe gb_ 
// et doivent être déclarées dans le document ready.
//
// PREPROS
// Prepros compile les fichiers ci-dessous dans : ./quadron/js/quadron.min.js
// Pour commenter l'appel d'un fichier placer un * après le double slash : //*@prepros-prepend
//
// INFO BLOCS D'APPEL
// Les blocs d'appel contiennent les appels JS.
// L'ordre d'appel par les navigateurs est :
// 1 - Document ready
// 2 - Window load
// Window resize est appelé à chaque fois que la fenêtre est redimensionnée.
// Pour effectuer des actions à la fin du redimensionnement, 
// placer le code à executer dans : resizing_done()
//
// FICHIERS SPÉCIAUX
// Pour les fichiers spéciaux, ajax ou autres. Créer un fichier dédié avec 
// le préfix qdr_ : qdr_ajax.js puis l'appeler pour Prepros
// 
// 
// 
// ENLEVER CSS STARTER PUIS CHOISIR SON MODE DE TRAVAIL :
//
// DEV MANO : APPELS FICHIERS JS
// du bon dèv. à l'ancienne…, choisir vos fichiers vous mêmes
// 
// DRUPAL : APPELS FICHIERS JS
// ./libs/jquery-migrate-1.2.1.min.js (si utilisation dans jquery update d'une version 1.9/1.9+ pour le front-end)
// ./libs/modernizr.min.js › Appel de Modernizr
// ./libs/jquery.easing.min.js
// ./libs/jquery.scrollTo.min.js
// ./libs/jquery.placeholder.min.js
// ./assets/drupal/drupal.js (contient des éléments js utiles pour drupal)
// ./assets/drupal/close-message.min.js (permet d'avoir un bouton pour fermer les messages)
// ./qdr_lib.js › Appel de la lib Quadron
// ./qdr_dev.js › Fichier de développement JS



////////////////////////////////////////////////////////////////
//
//  STARTER POUR READ ME, ETC… (à enlever)
//
////////////////////////////////////////////////////////////////

//@prepros-prepend ./assets/outil/outil.js
//@prepros-prepend ./qdr_lib.js
//@prepros-prepend ./qdr_dev.js



////////////////////////////////////////////////////////////////
//
//  DÈV. MANO : APPELS FICHIERS JS
//
////////////////////////////////////////////////////////////////

// PRÉFÉREZ APPELER LES LIBRARIES DANS À LA FUN DU BODY POUR PLUS DE LÉGÈRETÉ
//
//--@prepros-prepend ./assets/outil/outil.js
//--@prepros-prepend ./qdr_lib.js
//--@prepros-prepend ./qdr_dev.js



////////////////////////////////////////////////////////////////
//
//  DRUPAL : APPELS FICHIERS JS
//
////////////////////////////////////////////////////////////////

//--@prepros-prepend ./libs/modernizr.min.js
//--@prepros-prepend ./libs/jquery.easing.min.js
//--@prepros-prepend ./libs/jquery.scrollTo.min.js
//--@prepros-prepend ./libs/jquery.placeholder.min.js

//--@prepros-prepend ./assets/drupal/drupal.js
//--@prepros-prepend ./assets/drupal/close-message.min.js

//--@prepros-prepend ./qdr_lib.js
//--@prepros-prepend ./qdr_dev.js




////////////////////////////////////////////////////////////////
//
//  DOCUMENT READY
//
////////////////////////////////////////////////////////////////

jQuery(document).ready(function ()
{
	// FORCE JQUERY
	qdr_forceJquery();
	
	// VARIABLES GLOBALES
	// Mettre prefix gb_

	// APPELS FONCTIONS
	hello_world();
	
	
	
	
	//
	// OUTIL DEFAULT (à enlever si dèv mano hors outil ou Drupal)
	//
	
	// TOPBAR
	btn_menu_sidebar_responsive();
	
	// MENU SIDEBAR
	menu_sidebar();
});

////////////////////////////////////////////////////////////////
//
//  WINDOW LOAD
//
////////////////////////////////////////////////////////////////

jQuery(window).load(function()
{
});

////////////////////////////////////////////////////////////////
//
//  WINDOW RESIZE
//
////////////////////////////////////////////////////////////////

jQuery(window).resize(function()
{
    // Actions à la fin du redimensionnement
    // Mettre les actions dans : resizing_done()
    clearTimeout(this.rto);
    this.rto = setTimeout(resizing_done, 200);
});
function resizing_done(){
    // Actions à la fin du redimensionnement
}
