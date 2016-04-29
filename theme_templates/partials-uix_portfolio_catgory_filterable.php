<?php
/**
 * The template for displaying  portfolio filterable categories.
 *
 * It will allow you to filter items by portfolio categories that requires the use of jquery Plug-in
 *
 */



echo '<li class="current-cat"><a href="javascript:" data-group="all">All</a></li>';

wp_list_categories(array(

	'show_option_all'    => '', //Text to display for link to all Categories --> All (default)
	'orderby'            => 'id', //Sorts by Category ID --> ID (Default)  name
	'order'              => 'asc', //Sorts in ascending order
	'style'              => 'list', //Sets the Categories in an unordered list (<ul><li>)  -->  list (default) none
	'show_count'         => 0,//Does not display the count of posts within each Category -->  1(True) 0 (False - default)
	'hide_empty'         => 1, //Does not display links to Categories which have no posts -->  1 (True - default) 0 (False)
	'use_desc_for_title' => 1, //Sets whether a category's description is inserted into the title attribute of the links created (i.e. <a title="<em>Category Description</em>" href="...). 
	'child_of'           => 0, //Only display categories that are children of the category identified by this parameter. There is no default for this parameter.  (ID number).
	'feed'               => '', //Display a link to each category's rss-2 feed and set the link text to display. The default is no text and no feed displayed.
	'feed_type'          => '', 
	'feed_image'         => '', //Set a URI for an image (usually an rss feed icon) to act as a link to each categories' rss-2 feed. This parameter overrides the feed parameter.
	'exclude'            => '', //Sets the Categories to be excluded. This must be in the form of an array (ex: 1, 2, 3).
	'exclude_tree'       => '',//Exclude category-tree from the results. This parameter takes a comma-separated list of category ids. The parameter include must be empty. 
	'include'            => '',//Only include the categories detailed in a comma-separated list by category id.
	'hierarchical'       => 0, //Displays the children Categories in a hierarchical order under its Category parent  -->  1 (True - default) 0 (False)
	'title_li'           => '', //Set the title and style of the outer list item. Defaults to "Categories". If present but empty, the outer list item will not be displayed. 
	'show_option_none'   => __( 'No categories', 'uix-portfolio'), //Set the text to show when no categories are listed. Defaults to "No categories".
	'number'             => null, //Sets the number of Categories to display. This causes the SQL LIMIT value to be defined. Default to no LIMIT.
	'echo'               => 1, //Show the result or keep it in a variable. The default is true (display the categories organized). 
	'depth'              => 0, //This parameter controls how many levels in the hierarchy of Categories are to be included in the list of Categories.
	'current_category'   => 0, //Allows you to force the "current-cat" to appear on uses of wp_list_categories that are not on category archive pages. 
	'pad_counts'         => 1, //Calculates link or post counts by including items from child categories. If show_counts and hierarchical are true this is automatically set to true.
	'taxonomy'           => 'uix_portfolio_category', //Designates the taxonomy in which the term resides. The default taxonomies are category, link_category, and post_tag.  --> category - default
	'walker'             => new Uix_Portfolio_Dropdown_Walker_Portfolio_Category //Walker class to render the list with. 

));



