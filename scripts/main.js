(function($) {

  console.log('hiya');

  // We don't care about resize events on screens below 768px wide
  var actionableScreenWidth = 768; // $large-start breakpoint
  var actionableScrollTop = 35;

  // The difference in pixel height between a highlightable image and 
  // its containing block
  var difference = 96;

  var $body = $('body');
  var $menu = $('#menu');
  var $menuLink = $('.menu__link');
  var $menuTrigger = $('.has-subnav > a');

  var windowWidth = $(window).width();
  var $highlightableImage = $('#highlightableImage');
  var $highlightable = $('#highlightable');

  $menuLink.click(function(evt) {
    evt.preventDefault();
    $menu.toggleClass('active');
    $menuLink.toggleClass('active');
    activateMenus();
  });


  $(document).on('scroll', function(evt) {
    // Check for scrolltop only on home page
    if (!($body).hasClass('home')) {
      return;
    }
    var y = $(this).scrollTop();
    if (y > actionableScrollTop) {
      $('body').addClass('sticky');
    } else {
      $('body').removeClass('sticky');
    }
    //console.log('scrolltop: ' + $(this).scrollTop());
  });

  function adjustHighlightableHeight() {
    $highlightable.height($highlightableImage.height() - difference);
  }

  function activateMenus() {
    $('.level-2').addClass('active');
  }

})(jQuery);
