#####Sat Jun 25 07:41:03 2016 CDT
* [WP Theme Handbook](https://developer.wordpress.org/themes/)

* Blog: [Getting Started with Grunt and Sass – Tania Rascia](https://www.taniarascia.com/getting-started-with-grunt-and-sass/)

* Smashing: [How To Harness The Machines: Being Productive With Task Runners](https://www.smashingmagazine.com/2016/06/harness-machines-productive-task-runners/)
    * For grunticon setup

#####Sun Jun 26 06:08:18 2016 CDT
* Sitepoint: [Getting Sticky Headers and the WordPress Admin Bar to Behave](https://www.sitepoint.com/getting-sticky-headers-wordpress-admin-bar-behave/)

* Blog: [How to add Critical CSS to a WordPress site](https://aarontgrogg.com/blog/2016/01/13/how-to-add-critical-css-to-a-wordpress-site/)

* Smashing: [Customizing Tree-Like Data Structures With Walker Class](https://www.smashingmagazine.com/2015/10/customize-tree-like-data-structures-wordpress-walker-class/)

* CSS-Tricks: [The WordPress Nav Walker Class: A Guided var_dump() | CSS-Tricks](https://css-tricks.com/the-wordpress-nav-walker-class-a-guided-var_dump/)

#####Mon Jun 27 06:41:40 2016 CDT
* Tutsplus: [Understanding the Walker Class](http://code.tutsplus.com/tutorials/understanding-the-walker-class--wp-25401)

* Blog: [How to Add a Custom Class to a WordPress Menu Item - SevenSpark](http://sevenspark.com/how-to/how-to-add-a-custom-class-to-a-wordpress-menu-item)

* Menu markup:
    ```html
    <ul id="menu-header-major" class="level-1 menu__list--major">
        <li id="menu-item-16" class="hiya menu__item menu-item-16">
            <a href="http://omed2016.dev/inspiration/">Inspiration</a>
            <i class="icon-ctrl-down"></i>
        </li>
        <li id="menu-item-17" class="hiya menu__item--active menu-item-17">
            <a href="http://omed2016.dev/education/">Education</a>
            <ul class="level-2 menu__list--major">
                <li id="menu-item-32" class="hiya menu__item menu-item-32">
                    <a href="http://omed2016.dev/education/exhibits/">Exhibits</a>
                    <i class="icon-ctrl-down"></i>
                </li>
            </ul>
            <i class="icon-ctrl-down"></i>
        </li>
        <li id="menu-item-18" class="hiya menu__item menu-item-18">
            <a href="http://omed2016.dev/connection/">Connection</a>
            <i class="icon-ctrl-down"></i>
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
    ```

* [WordPress › Support » Add Class to Link in Custom Menu](https://wordpress.org/support/topic/add-class-to-link-in-custom-menu)

    ```php
    function add_menuclass($ulclass) {
      return preg_replace('/<a rel="fancybox"/', '<a rel="fancybox" class="fancybox"', $ulclass, 1);
    }
    add_filter('wp_nav_menu','add_menuclass');
    ```

* StackEx: [Add class to menu items of one specific menu (nav_menu_css_class) - WordPress Development Stack Exchange](http://wordpress.stackexchange.com/questions/90649/add-class-to-menu-items-of-one-specific-menu-nav-menu-css-class)


* Blog: [Passing variables to get_template_part() in WordPress - k.dev](http://keithdevon.com/passing-variables-to-get_template_part-in-wordpress/)

    ```
    include(locate_template('your-template-name.php'));
    ```
    > You can use the WordPress locate_template function within PHP’s include(). 

    > All of the variables available in your current script will be available in that template file now too.

######Tue Jun 28 09:42:31 2016 CDT

* Blog: [Cache Busting WordPress Style.css - Gilbert Pellegrom](https://gilbert.pellegrom.me/cache-busting-wordpress-style-css/)
    ```php
    wp_register_style( 
      'screen', 
      get_template_directory_uri().'/style.css', 
      array(), 
      filemtime( get_template_directory().'/style.css' ) 
    );
    ```

#####Wed Jun 29 06:55:00 2016 CDT
* Blog: [Understanding get_template_part – Konstantin Kovshenin](https://kovshenin.com/2013/get_template_part/)

#####Sat Jul  2 04:57:14 2016 CDT
* Codepen: [Page Load Animations](http://codepen.io/brendeng/pen/sDjIC)

* Smashing: [Inserting Widgets With Shortcodes](https://www.smashingmagazine.com/2012/12/inserting-widgets-with-shortcodes/)

#####Sun Jul  3 07:43:59 2016 CDT
* Blog: [» Remove Default Post Type From Admin Menu WordPress](http://www.techjunkie.com/remove-default-post-type-from-admin-menu-wordpress/)

#####Mon Jul  4 10:51:34 2016 CDT
* CSS-Tricks: [Shortcode in a Template | CSS-Tricks](https://css-tricks.com/snippets/wordpress/shortcode-in-a-template/)

#####Tue Jul  5 17:12:47 2016 CDT
* Gist: [Adds Menu Description to Wordpress Menu with the walker_nav_menu_start_el filter.](https://gist.github.com/christophercochran/2844529)
    ```php
    add_filter( 'walker_nav_menu_start_el', 'gt_add_menu_item_description', 10, 4); 
    function gt_add_menu_item_description( $item_output, $item, $depth, $args ) {
        $desc = __( $item->post_content ); 
        return preg_replace('/(<a.*?>[^<]*?)</', '$1' . "<small class=\"nav-desc\">{$desc}</small><", $item_output); 
    }
    ```

* Blog: [Improve your Wordpress Navigation Menu Output | Kriesi.at - Premium WordPress Themes](http://www.kriesi.at/archives/improve-your-wordpress-navigation-menu-output)

#####Wed Jul  6 17:26:42 2016 CDT
* Blog: [Using Grunticon to inline SVG • Steve McKinney](https://iamsteve.me/blog/entry/using-grunticon-to-inline-svg)

#####Fri Jul  8 16:08:49 2016 CDT
* Blog: [Simple CSS3 Transitions, Transforms, & Animations Compilation - Call Me Nick](http://callmenick.com/post/simple-css3-transitions-transforms-animations-compilation)

#####Tue Jul 19 10:36:34 2016 CDT
* Blog: [Is The WordPress Upload Limit Giving You Trouble? Here’s How To Change It | Elegant Themes Blog](https://www.elegantthemes.com/blog/tips-tricks/is-the-wordpress-upload-limit-giving-you-trouble-heres-how-to-change-it)

#####Wed Nov  2 09:44:25 2016 CDT
* [css - Chrome / Safari not filling 100% height of flex parent - Stack Overflow](http://stackoverflow.com/questions/33636796/chrome-safari-not-filling-100-height-of-flex-parent)
    * This solved a flexbox problem with .tiles in Safari

#####Wed Feb  1 16:19:52 2017 CST 
* [Waypoints](http://imakewebthings.com/waypoints/)
