<?php

Class ESchemaShort {
	
	public function __construct() {

		add_shortcode( 'e_schema', array( $this, 'attr_shortcode') );
	}

	public function attr_shortcode($attr=null){

		$schema_type = get_option( 'eschema_type' );
		$schema_name = get_option( 'eschema_name' );
		$schema_telephone = get_option( 'eschema_telephone' );
		$schema_description = get_option( 'eschema_description' );
		$schema_logo = get_option( 'eschema_logo' );
		$schema_taxonomy = get_option( 'eschema_taxonomy' );
		$eschema_author = get_option( 'eschema_author' );

		$post = get_queried_object();

		$thumbnail = get_the_post_thumbnail_url( $post->ID , 'large' );

		$author = get_userdata($post->post_author);

		$author = $author->first_name . ' ' . $author->last_name;

		if(!empty($eschema_author)){
			
			$meta_author = get_post_meta( $post->ID, $eschema_author, true );
			if(!empty($meta_author)){
				$author = $meta_author;
			}
		}

		$categorias = wp_get_post_terms($post->ID, $schema_taxonomy);

		$schema_categoria = get_post_meta( $post->ID, 'eschema_meta', true);
		if(!empty($categorias) && empty($schema_categoria['type'])){
			$schema_categoria = get_term_meta( $categorias[0]->term_id, 'eschema_meta', true );
		}
		if(empty($schema_categoria)){
			$schema_categoria = get_term_meta( $post->ID, 'eschema_meta', true);
		}

		$schema_type_post = $schema_categoria['type'];
		$schema_medicalcode = $schema_categoria['code'];

		// BODY ITEMSCOPE
		if($attr['attr']=='body'){
			return ' itemscope itemtype="https://schema.org/' . $schema_type . '" ';
		}

		// BREADCRUMP ITEMSCOPE
		if($attr['attr']=='breadcrumb'){
			return ' itemscope itemtype="https://schema.org/BreadcrumbList" ';
		}

		// ITEM-BREADCRUMP ITEMPROP
		if($attr['attr']=='item_breadcrumb'){
			return ' itemprop itemtype="https://schema.org/ListItem" ';
		}

		// H1 ITEMPROP
		if($attr['attr']=='h1'){
			return ' itemprop="name" ';
		}

		// DESCRIPTION ITEMPROP
		if($attr['attr']=='description'){
			return ' itemprop="description" ';
		}

		// AUTHOR ITEMPROP
		if($attr['attr']=='author'){
			return ' itemprop="author" itemtype="https://schema.org/Person" ';
		}

		// MAIN ITEMPROP
		if($attr['attr']=='main'){

			$phtml = '<link itemprop="' . $schema_type_post . '" href="' . get_permalink( $post ) . '">';
			$phtml .= '<link itemprop="datePublished" content="' . $post->post_date . '">';
			$phtml .= '<link itemprop="dateModified" content="' . $post->post_modified . '">';
			$phtml .= '<link itemprop="headline" content="' . $post->post_title . '">';
			$phtml .= '<link itemprop="image" content="' . $thumbnail . '">';
			if(!empty($schema_medicalcode)){
				$phtml .= '<span itemprop="code" itemscope itemtype="https://schema.org/MedicalCode">
				<meta itemprop="code" content="' . $schema_medicalcode . '" />
				<meta itemprop="codingSystem" content="ICD-9" />
				</span>';
			}
			return $phtml;
		}

		// HEAD JSON
		if($attr['attr']=='head'){

			$json_schema = array();

			$json_schema['@context'] = 'https://schema.org';
			$json_schema['@type'] = $schema_type_post;

			$json_schema['mainEntityOfPage']['@type'] = $schema_type;
			$json_schema['mainEntityOfPage']['@id'] = get_permalink($post);

			$json_schema['headline'] = $post->post_title;

			if(!empty($thumbnail)){
				$json_schema['image']['@type'] = 'ImageObject';
				$json_schema['image']['url'] = $thumbnail;
			}

			$json_schema['datePublished'] = str_replace(' ', 'T', $post->post_date);
			$json_schema['dateModified'] = str_replace(' ', 'T', $post->post_modified);

			$json_schema['author']['@type'] = 'Person';
			$json_schema['author']['name'] = $author;

			$json_schema['publisher']['@type'] = $schema_type;
			$json_schema['publisher']['name'] = $schema_name;
			if(!empty( $schema_telephone)){
				$json_schema['publisher']['telephone'] = $schema_telephone;
			}
			$json_schema['publisher']['description'] = $schema_description;
			$json_schema['publisher']['logo']['@type'] = 'ImageObject';
			$json_schema['publisher']['logo']['url'] = $schema_logo;

			if(empty($post->post_excerpt)){
				//Yoast meta description
				$post->post_excerpt = get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true);
			}

			$json_schema['description'] = $post->post_excerpt;

			$post_content =  nl2br(str_replace(array("\n", "\r"), ' ', strip_tags($post->post_content)));

			$json_schema['articleBody'] = $post_content;

			$json_schema['wordcount'] = str_word_count($post->post_content, 0);

			return '<script type="application/ld+json">' . json_encode($json_schema, JSON_UNESCAPED_UNICODE  | JSON_UNESCAPED_SLASHES) . '</script>';

		}

	}

}