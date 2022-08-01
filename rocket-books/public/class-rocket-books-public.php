<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
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
 * @author     Your Name <email@example.com>
 */
class Rocket_Books_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $rocket_books    The ID of this plugin.
	 */
	private $rocket_books;

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
	 * @param      string    $rocket_books       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $rocket_books, $version ) {

		$this->rocket_books = $rocket_books;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

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

		wp_enqueue_style( $this->rocket_books, plugin_dir_url( __FILE__ ) . 'css/rocket-books-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

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

		wp_enqueue_script( $this->rocket_books, plugin_dir_url( __FILE__ ) . 'js/rocket-books-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * This function is provided for demonstration purposes only.
	 */
	public function register_book_post_type() {

		function wpdocs_codex_book_init() {
			$labels = array(
				'name'                  => _x( 'Books', 'Post type general name', 'textdomain' ),
				'singular_name'         => _x( 'Book', 'Post type singular name', 'textdomain' ),
				'menu_name'             => _x( 'Books', 'Admin Menu text', 'textdomain' ),
				'name_admin_bar'        => _x( 'Book', 'Add New on Toolbar', 'textdomain' ),
				'add_new'               => __( 'Add New', 'textdomain' ),
				'add_new_item'          => __( 'Add New Book', 'textdomain' ),
				'new_item'              => __( 'New Book', 'textdomain' ),
				'edit_item'             => __( 'Edit Book', 'textdomain' ),
				'view_item'             => __( 'View Book', 'textdomain' ),
				'all_items'             => __( 'All Books', 'textdomain' ),
				'search_items'          => __( 'Search Books', 'textdomain' ),
				'parent_item_colon'     => __( 'Parent Books:', 'textdomain' ),
				'not_found'             => __( 'No books found.', 'textdomain' ),
				'not_found_in_trash'    => __( 'No books found in Trash.', 'textdomain' ),
				'featured_image'        => _x( 'Book Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
				'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
				'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
				'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
				'archives'              => _x( 'Book archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
				'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
				'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
				'filter_items_list'     => _x( 'Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
				'items_list_navigation' => _x( 'Books list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
				'items_list'            => _x( 'Books list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
			);
		 
			$args = array(
				'labels'             => $labels,
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => array( 'slug' => 'book' ),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => null,
				'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
			);
		 
			register_post_type( 'book', $args );
		}
		 
		add_action( 'init', 'wpdocs_codex_book_init' );

	}

}
