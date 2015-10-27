////////////////////////////////////////////////////////////////
//
//  QUADRON | ©PRAKT + DOPLUS
//
////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////
//
//  FONCTIONS
//
////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////
//
//  EVITER LES ERREURS CONSOLE POUR NAVIGATEURS
//
////////////////////////////////////////////////////////////////

(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

////////////////////////////////////////////////////////////////
//
//  INITIALISE JQUERY
//
////////////////////////////////////////////////////////////////

// Utile pour les système (comme Drupal) qui neutralise le $ 
// pour laisser l'option de l'utiliser pour d'autres usages 
// que JQuery.

function qdr_forceJquery()
{
    $ = jQuery;
}

////////////////////////////////////////////////////////////////
//
//  DETECTIONS DES DIMENSIONS DE LA FENÊTRE
//
////////////////////////////////////////////////////////////////

// Retourne la largeur de la fenêtre.
// gb_ww = qdr_getWW(); ==> dans le document ready et dans
// le window resize (dans le resizing_done si rien en dehors)

function qdr_getWW()
{
    var w = $(window).width();
    return w;
}

// Retourne la hauteur de la fenêtre.
// gb_wh = qdr_getWH(); ==> dans le document ready et dans
// le window resize (dans le resizing_done si rien en dehors)

function qdr_getWH()
{
    var h = $(window).height();
    return h;
}

////////////////////////////////////////////////////////////////
//
//  DETECTIONS DE LA HAUTEUR DU DOCUMENT
//
////////////////////////////////////////////////////////////////

// Retourne la hauteur du document.
// gb_dh = qdr_getDH(); ==> dans le document ready et dans
// le window resize (dans le resizing_done si rien en dehors)

function qdr_getDH() 
{
    var h = $(document).height();
    return h;
}

////////////////////////////////////////////////////////////////
//
//  CONTROLES VERISONS D'IE
//
////////////////////////////////////////////////////////////////

// Retourne la version d'IE. Pour les autres navigateur la 
// valeur retournée est en théorie -1. Prendre le soin de 
// vérifier pour éviter les bugs.

function qdr_IEversion()
{
  var rv = -1;
  if (navigator.appName == 'Microsoft Internet Explorer')
  {
    var ua = navigator.userAgent;
    var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
    if (re.exec(ua) != null)
      rv = parseFloat( RegExp.$1 );
  }
  else if (navigator.appName == 'Netscape')
  {
    var ua = navigator.userAgent;
    var re  = new RegExp("Trident/.*rv:([0-9]{1,}[\.0-9]{0,})");
    if (re.exec(ua) != null)
      rv = parseFloat( RegExp.$1 );
  }
  return rv;
}

////////////////////////////////////////////////////////////////
//
//  DETECTION MOBILE OU TABLETTE
//
////////////////////////////////////////////////////////////////

// Détection basée sur l'OS du terminal.
// Attention, potentielement peu fiable.

function qdr_checkMobile()
{
    var r = false;
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        r = true;
    }
    return r;
}

////////////////////////////////////////////////////////////////
//
//  FORCE L'ACCELÉRATION MATÉRIEL
//
////////////////////////////////////////////////////////////////

// Force l'accelération avec webkit (utile pour les images de 
// grandes tailles). <!> Pose des problème avec Firefox et les 
// images en position fixed.

function qdr_hardwareAccelr()
{
    $("img").css('-webkit-transform', 'translate3d(0, 0, 0)');
    $("img").css('-moz-transform', 'translate3d(0, 0, 0)');
    $("img").css('transform', 'translate3d(0, 0, 0)');
}

////////////////////////////////////////////////////////////////
//
//  DETECTION SENS DU SCROLL
//
////////////////////////////////////////////////////////////////

// Renvoie UP ou DOWN. Encore en phase beta, l'écoute du scroll 
// devrait être faite dans une fonction dédiée qui prend en 
// charge toutes les action au scroll.

function qdr_scrollTracker()
{
    var ws = "";
    var d = "";
    var p = "";
    $(window).scroll(function(e) {
        ws = $(this).scrollTop();
        (p<ws) ? d = "DOWN" : d = "UP";
        p = ws;
        //console.log("SCROLL P : "+p);
        //console.log("SCROLL TRACKER : "+d);
    });
}

////////////////////////////////////////////////////////////////
//
//  DETECTION DES PAGES
//
////////////////////////////////////////////////////////////////

// Contrôle si la balise body possède une classe.
// Renvoie un booléen.

function qdr_pageControl(p)
{
    var f = $("body").hasClass(p);
    var r = false;
    if(f){
        r = true;
    }
    return r;
}

////////////////////////////////////////////////////////////////
//
//  DETECTION D'ÉLÉMENTS
//
////////////////////////////////////////////////////////////////

// Contrôle si un élément du DOM possède une classe.
// Renvoie un booléen.

function qdr_itemControl(p)
{
    var f = $(p).length;
    var r = false;
    if(f){
        r = true;
    }
    return r;
}

////////////////////////////////////////////////////////////////
//
//  PLACE IMAGE D'ARRIÈRE-PLAN, PLEIN ÉCRAN ET CENTRÉE
//
////////////////////////////////////////////////////////////////

// L'image doit être contenue dans un parent.
// Les deux éléments doivent être ciblés dans les arguments
// d'appel : pContainer et pImg
// En plus de définir la hauteur et la largeur de l'image

function qdr_BGimg(pContainer,pImg,hImg,lImg)
{
    var container = $(pContainer);
    var img = $(pImg);
    var container_ratio = container.height()/container.width();
    var img_ratio = hImg/lImg;
    var marge_l = "";
    var marge_t = "";
    if(container_ratio > img_ratio) {
        img.height(container.height());
        img.width(img.height()/img_ratio);
    } else {
        img.width(container.width());
        img.height(img.width()*img_ratio);
    }
    marge_l = (container.width()/2)-(img.width()/2);
    marge_t = (container.height()/2)-(img.height()/2);
    img.css("margin-left",marge_l);
    img.css("margin-top",marge_t);
    
}

////////////////////////////////////////////////////////////////
//
//  GESTION SAME HEIGHT
//
////////////////////////////////////////////////////////////////

// Gère des éléments pour leur attribuer une hauteur similaire.
// Défini aussi à quel moment cette gestion doit s'arréter/reprendre.
// Nécessite de définir gb_ww en tant que variable globale, pour
// ce faire il faut utiliser la fonction qdr_getWW ci-dessus :
// gb_ww = qdr_getWW(); ==> dans le document ready et dans
// le window resize (dans le resizing_done si rien en dehors)
function qdr_sameHeight(container,width)
{
	var currentTallest = 0,
		currentRowStart = 0,
		rowDivs = new Array(),
		$el,
		topPosition = 0;

	$(container).each(function() {

		$el = $(this);
		$($el).height('auto');
		topPostion = $el.position().top;
		
		if(gb_ww > width) {
			if (currentRowStart != topPostion) {
				for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
				  rowDivs[currentDiv].height(currentTallest);
				}
				rowDivs.length = 0; // empty the array
				currentRowStart = topPostion;
				currentTallest = $el.height();
				rowDivs.push($el);
			}
			else {
				rowDivs.push($el);
				currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
			}
			for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
				rowDivs[currentDiv].height(currentTallest);
			}
		}
		if(gb_ww <= width) {
			$($el).height('auto');
		}
	});
};