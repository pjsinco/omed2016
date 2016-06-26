<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package omed2016
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" charset="utf-8">
  

!function(){function e(e,n,t){"use strict";var o=window.document.createElement("link"),r=n||window.document.getElementsByTagName("script")[0],a=window.document.styleSheets;return o.rel="stylesheet",o.href=e,o.media="only x",r.parentNode.insertBefore(o,r),o.onloadcssdefined=function(e){for(var n,t=0;t<a.length;t++)a[t].href&&a[t].href===o.href&&(n=!0);n?e():setTimeout(function(){o.onloadcssdefined(e)})},o.onloadcssdefined(function(){o.media=t||"all"}),o}function n(e,n){e.onload=function(){e.onload=null,n&&n.call(e)},"isApplicationInstalled"in navigator&&"onloadcssdefined"in e&&e.onloadcssdefined(n)}!function(t){var o=function(r,a){"use strict";if(r&&3===r.length){var i=t.navigator,c=t.document,s=t.Image,d=!(!c.createElementNS||!c.createElementNS("http://www.w3.org/2000/svg","svg").createSVGRect||!c.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#Image","1.1")||t.opera&&i.userAgent.indexOf("Chrome")===-1||i.userAgent.indexOf("Series40")!==-1),l=new s;l.onerror=function(){o.method="png",o.href=r[2],e(r[2])},l.onload=function(){var t=1===l.width&&1===l.height,i=r[t&&d?0:t?1:2];t&&d?o.method="svg":t?o.method="datapng":o.method="png",o.href=i,n(e(i),a)},l.src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==",c.documentElement.className+=" grunticon"}};o.loadCSS=e,o.onloadCSS=n,t.grunticon=o}(this),function(e,n){"use strict";var t=n.document,o="grunticon:",r=function(e){if(t.attachEvent?"complete"===t.readyState:"loading"!==t.readyState)e();else{var n=!1;t.addEventListener("readystatechange",function(){n||(n=!0,e())},!1)}},a=function(e){return n.document.querySelector('link[href$="'+e+'"]')},i=function(e){var n,t,r,a,i,c,s={};if(n=e.sheet,!n)return s;t=n.cssRules?n.cssRules:n.rules;for(var d=0;d<t.length;d++)r=t[d].cssText,a=o+t[d].selectorText,i=r.split(");")[0].match(/US\-ASCII\,([^"']+)/),i&&i[1]&&(c=decodeURIComponent(i[1]),s[a]=c);return s},c=function(e){var n,r,a,i;a="data-grunticon-embed";for(var c in e){i=c.slice(o.length);try{n=t.querySelectorAll(i)}catch(s){continue}r=[];for(var d=0;d<n.length;d++)null!==n[d].getAttribute(a)&&r.push(n[d]);if(r.length)for(d=0;d<r.length;d++)r[d].innerHTML=e[c],r[d].style.backgroundImage="none",r[d].removeAttribute(a)}return r},s=function(n){"svg"===e.method&&r(function(){c(i(a(e.href))),"function"==typeof n&&n()})};e.embedIcons=c,e.getCSS=a,e.getIcons=i,e.ready=r,e.svgLoadedCallback=s,e.embedSVG=s}(grunticon,this)}();

grunticon([
  "<?php echo get_template_directory_uri() . '/dist/grunticon/icons.data.svg.css'; ?>", 
  "<?php echo get_template_directory_uri() . '/dist/grunticon/icons.data.png.css'; ?>", 
  "<?php echo get_template_directory_uri() . '/dist/grunticon/icons.fallback.css'; ?>"], 
  grunticon.svgLoadedCallback
);
</script>
    
    <?php wp_head(); ?>
  </head>

  <body <?php body_class('js'); ?>>
    <header class="header">
      <div class="wrap relative">
        <div class="menu__block">
          <div class="menu__logo">
            <div class="branding--menu">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="svg" title="OMED 2016">
                <div class="branding__logo icon-omed-logo-teal" style="height: 40px; width: 187px;"></div>
              </a>
            </div> <!-- .branding__block-alpha -->
          </div>
          <div class="menu__nav">
            <a href="#menu" class="menu__link"></a>
            <div class="menu__items">
              <nav id="menu" class="menu wrap">
                <ul class="level-1 menu__list--major">
                  <li class="menu__item"><a class="nav__link" href="/inspiration">Inspiration</a></li>
                  <li class="menu__item"><a class="nav__link" href="/education">Education <i class="icon-ctrl-down"></i></a>
                    <ul class="level-2">
                      <li><a href="/education">Tracks</a></li>
                      <li><a href="/education">Dual CME</a></li>
                      <li><a href="/education/exhibits/">Exhibits</a></li>
                      <li><a href="/education">Lorem Ipsum</a></li>
                      <li><a href="/education">Dolor Commodo</a></li>
                    </ul>
                  </li>
                  <li class="menu__item"><a class="nav__link" href="/connection">Connection <i class="icon-ctrl-down"></i></a>
                    <ul class="level-2">
                      <li><a href="/connection">Receptions</a></li>
                      <li><a href="/connection">Bibendum</a></li>
                      <li><a href="/connection">Aenean Bibendum Elit</a></li>
                    </ul>
                  </li>
                </ul>

                <ul class="level-1 menu__list--minor">
                  <li class="menu__item--minor">
                    <a class="nav__link svg" href="/registration">
                      <div class="nav__icon icon-ticket-warmgray" style="width: 32px;"></div>
                      <span class="nav__label">Registration</span>
                    </a>
                  </li>
                  <li class="menu__item--minor">
                    <a class="nav__link svg" href="#0">
                      <div class="nav__icon icon-hotel-warmgray"></div>
                      <span class="nav__label">Lorem</span>
                    </a>
                  </li>
                  <li class="menu__item--minor">
                    <a class="nav__link svg" href="/for-exhibitors">
                      <div class="nav__icon icon-exhibits-warmgray"></div>
                      <span class="nav__label">For Exhibitors</span>
                    </a>
                  </li>
                </ul>
                <!-- .menu__list-minor  goes here -->
              </nav>
            </div> <!-- .navmenu -->
          </div>
        </div> <!-- .menu__block -->
    
        <div class="branding">
          <a  href="http://www.osteopathic.org" title="American Osteopathic Association">
            <div class="icon-aoa-logo" style="width: 114px; height: 32px;"></div>
          </a>
        </div> <!-- .branding -->
      </div> <!-- .wrap -->
    </header>

    <div id="content" class="site-content">
