<?php
class Templates {
	public $name;
	public $pages;

	function __construct( $table_title, $object_type ) {
		//$object_type can only be 'pages', 'gblocks', 'fcsections'
		$this->draw_table( $table_title, $object_type );
	}

	private function get_pages( $object_type ) {
		$templates = array(); // array that contain objects $template->name + $template->pages
		if ( 'pages' === $object_type ) {
			$post_types = array( 'page' );
		} else {
			$post_types = array( 'page', 'post' );
		}

		$posts = get_posts(
			array(
				'numberposts' => -1,
				'post_type'   => $post_types,
				'post_status' => 'publish',
			)
		);
		if ( $posts ) {

			switch ( $object_type ) {

				case 'pages':
					foreach ( $posts as $post ) {
						if ( get_page_template_slug( $post->ID ) ) {
							$templatesphp[] = get_page_template_slug( $post->ID );
						} else {
							$templatesphp[] = 'default';
						}
					}
					$templatesphp = array_unique( $templatesphp ); // all template files
					sort( $templatesphp );

					foreach ( $templatesphp as $tname ) {
						$this->name  = $tname;
						$this->pages = '';
						foreach ( $posts as $post ) {
							if ( get_page_template_slug( $post->ID ) ) {
								$t = get_page_template_slug( $post->ID );
							} else {
								$t = 'default';
							}
							if ( $t === $tname ) {
								$this->pages .= '<a href="' . get_the_permalink( $post->ID ) . '" target="_blank">' . get_the_title( $post->ID ) . '</a>; ';
							}
						}
						$this->pages = substr( $this->pages, 0, -2 );

						$templates[] = (object) array(
							'name'  => $this->name,
							'pages' => $this->pages,
						);
					}
					break;

				case 'fcsections':
					$fcsection_names = array();

					foreach ( $posts as $post ) {
						$meta_values = get_post_meta( $post->ID, 'sections' );
						if ( ! empty( $meta_values[0] ) ) {
							$fcsection_names = array_merge( $fcsection_names, $meta_values[0] );
						}
					}
					$fcsection_names = array_unique( $fcsection_names );
					sort( $fcsection_names );

					foreach ( $fcsection_names as $fcsection_name ) {
						$this->name  = $fcsection_name;
						$this->pages = '';

						foreach ( $posts as $post ) {
							$meta_values = get_post_meta( $post->ID, 'sections', false );
							if ( ! empty( $meta_values[0] ) && in_array( $fcsection_name, $meta_values[0] ) ) {
								$this->pages .= '<a href="' . get_the_permalink( $post->ID ) . '" target="_blank">' . get_the_title( $post->ID ) . '</a>; ';
							}
						}
						$this->pages = substr( $this->pages, 0, -2 );

						$templates[] = (object) array(
							'name'  => $this->name,
							'pages' => $this->pages,
						);
					}
					break;

				case 'gblocks':
					$gblock_names = array();

					foreach ( $posts as $post ) {
						$matches = array();
						preg_match_all( '/wp:acf\/([^{]+){/', $post->post_content, $matches );
						if ( ! empty( $matches[1] ) ) {
							$gblock_names = array_merge( $gblock_names, $matches[1] );
						}
					}
					$gblock_names = array_unique( $gblock_names );
					sort( $gblock_names );

					foreach ( $gblock_names as $gblock_name ) {
						$this->name  = $gblock_name;
						$this->pages = '';

						foreach ( $posts as $post ) {
							$matches = array();
							preg_match_all( '/wp:acf\/([^{]+){/', $post->post_content, $matches );
							if ( ! empty( $matches[1] ) && in_array( $this->name, $matches[1] ) ) {
								$this->pages .= '<a href="' . get_the_permalink( $post->ID ) . '" target="_blank">' . get_the_title( $post->ID ) . '</a>; ';
							}
						}
						$this->pages = substr( $this->pages, 0, -2 );

						$templates[] = (object) array(
							'name'  => $this->name,
							'pages' => $this->pages,
						);
					}
					break;
			}

			return $templates;
		}
	}
	private function draw_table( $table_title, $object_type ) {

		$templates = $this->get_pages( $object_type );
		if ( ! empty( $templates ) ) {
			?>
		<div class="tp-page">
			<h2><?php echo $table_title; ?></h2>
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Template</th><th>Pages</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ( $templates as $t_obj ) { ?>
					<tr>
						<td><?php echo $t_obj->name; ?></td><td><?php echo $t_obj->pages; ?></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
			<?php
		}
	}

}

?>
