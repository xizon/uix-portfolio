=== Uix Portfolio ===
Contributors: UIUX Lab
Author URI: http://uiux.cc
Plugin URL: http://uiux.cc/wp-plugins/uix-portfolio/
Tags: portfolio, post type
Requires at least: 4.2
Tested up to: 4.4.2
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Readily organize & present your fine works with our free portfolio post type plugin.

== Description ==

Enables a portfolio post type and taxonomies.

This plugin registers a custom post type for portfolio items. It also registers separate portfolio taxonomies for tags and categories. If featured images are selected, they will be displayed in the column view. It doesn't change how portfolio items are displayed in your theme. 



= Features =

* Create a template with page navigation to display all portfolio items. 
* Regenerate thumbnails after changing their size. 
* Adding Categories support to a Custom Post Type in WordPress. 
* It contains about three different layouts to choose from.
* You can create portfolio item with support for post formats.
* Portfolio List Pages support the infinite scroll functionality.
* There are some simple options to the theme customizer. 
* Filterable Portfolio to display portfolio items to your site.
* The plugin supports a powerful Masonry grid layout  that will present your content in a dynamic, fluid fashion that looks and feels great both on desktop and mobile based devices, perfect for very visual websites that deal in lots of image-based content in various aspect ratios.


= Credits and Special Thanks =
 - Automatic Theme & Plugin Updater for Self-Hosted Themes/Plugins (https://github.com/jeremyclark13/automatic-theme-plugin-update)
 - Gallery Metabox (https://github.com/uixplorer/gallery-metabox)
 - Custom Metaboxes and Fields (https://github.com/WebDevStudios/Custom-Metaboxes-and-Fields-for-WordPress)
 - Kirki (http://kirki.org/)
 - Flexslider (https://github.com/woothemes/FlexSlider)
 - Masonry (http://masonry.desandro.com/)
 - prettyPhoto (http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/#prettyPhoto)
 - Shuffle (filtering and sorting) (https://github.com/Vestride/Shuffle)
 
 
 

== Installation ==

1. After activating your theme, you can see a prompt pointed out as absolutely critical. Go to "Appearance -> Install Plugins".
Or, upload the plugin to wordpress, Activate it. (Access the path (/wp-content/plugins/) And upload files there.)

2. You need to create Uix Portfolio template files in your templates directory. You can create the files on the WordPress admin panel. As a workaround you can use FTP, access the Uix Portfolio template files path (/wp-content/plugins/uix-portfolio/theme_templates/) and upload files to your theme templates directory (/wp-content/themes/{your-theme}/).  

	Please check if you have the 10 template files 'uix-portfolio-style.css', 'uix-portfolio-script.js', 'uix-portfolio.php', 'taxonomy-uix_portfolio_category.php', 'single-uix-portfolio.php', 'content_uix_portfolio-video.php', 'content_uix_portfolio-gallery.php', 'content_uix_portfolio.php', 'partials-uix_portfolio_catgory_filterable.php' and 'partials-uix_portfolio_catgory_standard.php' in your templates directory. If you can't find these files, then just copy them from the directory '/wp-content/plugins/uix-portfolio/theme_templates/' to your templates directory.

3. Create a new WordPress file or edit an existing one. Just make sure to select this new created template file as the "Template" for this page from the "Attributes" section. Save the page and hit "Preview" to see how it looks. ( You should specify the template name, in this case I used "Uix Portfolio". The "Template Name: Uix Portfolio" tells WordPress that this will be a custom page template. )

4. In your dashboard go to Appearance and select Menus. You’ll be able to add items to the menu. On the left you have your portfolio pages.

5. Or use the Uix Slides Widget to add it to a sidebar. Go to "Appearance -> Widgets" in the WordPress Administration Screens. Find the "Recent Portfolio (Uix Portfolio Widget)" in the list of Widgets and click and drag the Widget to the spot you wish it to appear.

6. Create uix portfolio item and publish portfolio then.

7. You can pretty much custom every aspect of the look and feel of this page by modifying the "*.php" template files (Access the path to the themes directory) . Best Practices for Editing WordPress Template Files:

  (1) WordPress comes with a theme and plugin editor as part of the core functionality. You can find it in your install by going to "Appearance > Editor" from your sidebar.

  (2) You can connect to your site via an FTP client, download a copy of the file you want to change, make the changes and then upload the file back to the server, overwriting the file that’s on the server.

8. The Uix Portfolio plugin allows users to easily enable a "Customizer Page" to themes. Go to "Appearance -> Customize".

9. You can overview the original styles to overwrite it. It will be on creating new styles to your website, without modifying original ".css" files. Go to "Appearance -> Customize".



== Changelog ==

= 1.0.0 =
*Release Date - 1st February, 2016*

* First release.
