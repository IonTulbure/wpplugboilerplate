<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://mustcode.xyz/
 * @since      1.0.0
 *
 * @package    Rocket_Books
 * @subpackage Rocket_Books/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Rocket_Books
 * @subpackage Rocket_Books/public
 * @author     Ion Tulbure <admin@mustcode.xyz>
 */
class Rocket_Books_Public
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Rocket_Books_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Rocket_Books_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/rocket-books-public.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Rocket_Books_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Rocket_Books_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/rocket-books-public.js', array('jquery'), $this->version, false);
	}

	/**
	 * Register Books custom post type
	 */
	public function register_book_post_type()
	{
		$labels = array(
			'name'                  => _x('Books', 'Post type general name', 'rocket-books'),
			'singular_name'         => _x('Book', 'Post type singular name', 'rocket-books'),
			'menu_name'             => _x('Books', 'Admin Menu text', 'rocket-books'),
			'name_admin_bar'        => _x('Book', 'Add New on Toolbar', 'rocket-books'),
			'add_new'               => __('Add New', 'rocket-books'),
			'add_new_item'          => __('Add New Book', 'rocket-books'),
			'new_item'              => __('New Book', 'rocket-books'),
			'edit_item'             => __('Edit Book', 'rocket-books'),
			'view_item'             => __('View Book', 'rocket-books'),
			'all_items'             => __('All Books', 'rocket-books'),
			'search_items'          => __('Search Books', 'rocket-books'),
			'parent_item_colon'     => __('Parent Books:', 'rocket-books'),
			'not_found'             => __('No books found.', 'rocket-books'),
			'not_found_in_trash'    => __('No books found in Trash.', 'rocket-books'),
			'featured_image'        => _x('Book Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'rocket-books'),
			'set_featured_image'    => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'rocket-books'),
			'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'rocket-books'),
			'use_featured_image'    => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'rocket-books'),
			'archives'              => _x('Book archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'rocket-books'),
			'insert_into_item'      => _x('Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'rocket-books'),
			'uploaded_to_this_item' => _x('Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'rocket-books'),
			'filter_items_list'     => _x('Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'rocket-books'),
			'items_list_navigation' => _x('Books list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'rocket-books'),
			'items_list'            => _x('Books list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'rocket-books'),
		);

		$args = array(
			'labels'             => $labels,
			'description'		 => __('Description', 'rocket-books'),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array('slug' => 'rocket-books'),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'menu_icon'			 => 'dashicons-book',
			'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
		);

		register_post_type('rocket-books', $args);
	}

	/**
	 * Register Taxonomy: Genre
	 */

	public function register_taxonomy_genre()
	{

		register_taxonomy('genre', array('rocket-books'), array(
			'description'  => 'Genre',
			'labels' => array(
				'name'                       => _x('Genre', 'taxonomy general name', 'rocket-books'),
				'singular_name'              => _x('Genre', 'taxonomy singular name', 'rocket-books'),
				'search_items'               => __('Search Genre', 'rocket-books'),
				'popular_items'              => __('Popular Genre', 'rocket-books'),
				'all_items'                  => __('All Genre', 'rocket-books'),
				'parent_item'                => null,
				'parent_item_colon'          => null,
				'edit_item'                  => __('Edit Genre', 'rocket-books'),
				'update_item'                => __('Update Genre', 'rocket-books'),
				'add_new_item'               => __('Add New Genre', 'rocket-books'),
				'new_item_name'              => __('New Genre Name', 'rocket-books'),
				'separate_items_with_commas' => __('Separate genre with commas', 'rocket-books'),
				'add_or_remove_items'        => __('Add or remove genre', 'rocket-books'),
				'choose_from_most_used'      => __('Choose from the most used genre', 'rocket-books'),
				'not_found'                  => __('No genre found.', 'rocket-books'),
				'menu_name'                  => __('Genre', 'rocket-books'),
			),
			'public'                     => true,
			'show_ui'                    => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'meta_box_cb'				 => null,
			'show_admin_column'			 => true,
			'hierarchical'				 => true,
			'query_var'					 => 'genre',
			'rewrite'                    => array(
				'slug'          => 'genre',
				'with_front'    => true,
				'hierarchical'  => true,
			),
			'capabilities' 				=> array(),
		));
	}
}
