# Uix Portfolio
This is a WordPress Plugin.Readily organize &amp; present your fine works with our free portfolio post type plugin.

Copyright (c) 2016 UIUX Lab [@uiux_lab](http://twitter.com/uiux_lab)


[Plugin URI](http://uiux.cc/wp-plugins/uix-portfolio/)

### Licensing

Licensed under the [GPL3.0](http://www.gnu.org/licenses/gpl-3.0.en.html).

### Description

Enables a portfolio post type and taxonomies

This plugin registers a custom post type for portfolio items. It also registers separate portfolio taxonomies for tags and categories. If featured images are selected, they will be displayed in the column view. It doesn't change how portfolio items are displayed in your theme.


### Updates 

##### Version 1.0.0
Initial Release.


### Tested under

- WP 4.2.*
- WP 4.3.*
- WP 4.4.1
- WP 4.4.2


###Features

- Create a template with page navigation to display all portfolio items.
- Regenerate thumbnails after changing their size.
- Adding Categories support to a Custom Post Type in WordPress.
- It contains about three different layouts to choose from.
- You can create portfolio item with support for post formats.
- Portfolio List Pages support the infinite scroll functionality.
- There are some simple options to the theme customizer.
- Filterable Portfolio to display portfolio items to your site.
- The plugin supports a powerful Masonry grid layout that will present your content in a dynamic, fluid fashion that looks and feels great both on desktop and mobile based devices, perfect for very visual websites that deal in lots of image-based content in various aspect ratios.

###Credits

#####I would like to give special thanks to credits. The following is a guide to the list of credits for this plugin:

- [Automatic Theme & Plugin Updater for Self-Hosted Themes/Plugins](https://github.com/jeremyclark13/automatic-theme-plugin-update)
- [Gallery Metabox](https://github.com/uixplorer/gallery-metabox)
- [Custom Metaboxes and Fields](https://github.com/WebDevStudios/Custom-Metaboxes-and-Fields-for-WordPress)
- [Kirki](http://kirki.org/)
- [Flexslider](https://github.com/woothemes/FlexSlider)
- [Masonry](http://masonry.desandro.com/v2/index.html)
- [Shuffle (filtering and sorting)](https://github.com/Vestride/Shuffle)

###How to use?

1.After activating your theme, you can see a prompt pointed out as absolutely critical. Go to **"Appearance -> Install Plugins"**.
Or, upload the plugin to wordpress, Activate it. (Access the path (/wp-content/plugins/) And upload files there.)

![](https://github.com/xizon/Uix-Portfolio/blob/master/helper/img/plug.jpg)

2.Please check if you have the **10** template files `uix-portfolio-style.css`, `uix-portfolio-script.js`, `uix-portfolio.php`, `taxonomy-uix_portfolio_category.php`, `single-uix-portfolio.php`, `content_uix_portfolio-video.php`, `content_uix_portfolio-gallery.php`, `content_uix_portfolio.php`, `partials-uix_portfolio_catgory_filterable.php` and `partials-uix_portfolio_catgory_standard.php` in your templates directory. If you can't find these files, then just copy them from the directory **"/wp-content/plugins/uix-portfolio/theme_templates/"** to your templates directory.

![](https://github.com/xizon/Uix-Portfolio/blob/master/helper/img/temp.jpg)


3.Create a new WordPress file or edit an existing one. Just make sure to select this new created template file as the **"Template"** for this page from the **"Attributes"** section. Save the page and hit **"Preview"** to see how it looks. ( You should specify the template name, in this case I used `Uix Portfolio`. The "Template Name: Uix Portfolio" tells WordPress that this will be a custom page template. )

![](https://github.com/xizon/Uix-Portfolio/blob/master/helper/img/menu.jpg)

![](https://github.com/xizon/Uix-Portfolio/blob/master/helper/img/add-page.jpg)

4.In your dashboard go to Appearance and select Menus. You’ll be able to add items to the menu. On the left you have your portfolio pages.

![](https://github.com/xizon/Uix-Portfolio/blob/master/helper/img/add-menu-1.jpg)

![](https://github.com/xizon/Uix-Portfolio/blob/master/helper/img/add-menu-2.jpg)


5. Or use the Uix Slides Widget to add it to a sidebar. Go to **"Appearance -> Widgets"** in the WordPress Administration Screens. Find the **"Recent Portfolio (Uix Portfolio Widget)"** in the list of Widgets and click and drag the Widget to the spot you wish it to appear.

![](https://github.com/xizon/Uix-Portfolio/blob/master/helper/img/widget-1.jpg)

![](https://github.com/xizon/Uix-Portfolio/blob/master/helper/img/widget-2.jpg)



6.Create uix portfolio item and publish portfolio then.

![](https://github.com/xizon/Uix-Portfolio/blob/master/helper/img/add-item.jpg)


7.You can pretty much custom every aspect of the look and feel of this page by modifying the `*.php` template files **(Access the path to the themes directory)**. **Best Practices for Editing WordPress Template Files:**

　(1) WordPress comes with a theme and plugin editor as part of the core functionality. You can find it in your install by going to **"Appearance > Editor"** from your sidebar.
  
  ![](https://github.com/xizon/Uix-Portfolio/blob/master/helper/img/editor.jpg)

　(2) You can connect to your site via an **FTP** client, download a copy of the file you want to change, make the changes and then upload the file back to the server, overwriting the file that’s on the server.



8.The Uix Portfolio plugin allows users to easily enable a "Customizer Page" to themes. Go to **"Appearance -> Customize"**.

![](https://github.com/xizon/Uix-Portfolio/blob/master/helper/img/customize.jpg)


9.You can overview the original styles to overwrite it. It will be on creating new styles to your website, without modifying original `.css` files. Go to **"Appearance -> Customize"**.

![](https://github.com/xizon/Uix-Portfolio/blob/master/helper/img/css.jpg)
