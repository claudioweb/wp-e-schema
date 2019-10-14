<?php 
/***************************************************************************
Plugin Name:  E-Schema
Plugin URI:   https://www.e-schema.com.br/
Description:  Ao ativar o plug-in, o plug-in E-Schema App WordPress cria automaticamente a marcação schema.org para todas as suas páginas, postagens, autor e conteúdo de categoria, aproveitando as informações que já existem no seu site WordPress. Basta ativar o plug-in, adicionando seu logotipo e nome da sua empresa, BAM, seu conteúdo é otimizado para ser totalmente compreendido pelos mecanismos de pesquisa, resultando em maior tráfego, taxas de cliques mais altas e muito mais.
Version:      1.0
Author:       Claudio Web (claudioweb) | Aline Espalaor
Author URI:   http://www.claudioweb.com.br/
Text Domain:  e-schema
**************************************************************************/

Class ESchema {

	private $name_plugin;

	private $body_types;

	private $element_types;

	public function __construct() {

		$this->name_plugin = 'E-Schema';

		$this->body_types = array();
		$this->body_types[] = 'WebPage';
		$this->body_types[] = 'AboutPage';
		$this->body_types[] = 'CheckoutPage';
		$this->body_types[] = 'CollectionPage';
		$this->body_types[] = 'ContactPage';
		$this->body_types[] = 'FAQPage';
		$this->body_types[] = 'ItemPage';
		$this->body_types[] = 'MedicalWebPage';
		$this->body_types[] = 'ProfilePage';
		$this->body_types[] = 'QAPage';
		$this->body_types[] = 'SearchResultsPage';

		$this->element_types = array();

		// WebPage
		$this->element_types['WebPage'][] = 'Article';
		$this->element_types['WebPage'][] = 'Blog';
		$this->element_types['WebPage'][] = 'Book';
		$this->element_types['WebPage'][] = 'Course';
		$this->element_types['WebPage'][] = 'Game';
		$this->element_types['WebPage'][] = 'SoftwareApplication';
		$this->element_types['WebPage'][] = 'SoftwareSourceCode';
		$this->element_types['WebPage'][] = 'WebSite';
		$this->element_types['WebPage'][] = 'TVSeries';
		$this->element_types['WebPage'][] = 'Photograph';
		$this->element_types['WebPage'][] = 'Conversation';
		$this->element_types['WebPage'][] = 'DigitalDocument';

		// AboutPage
		$this->element_types['AboutPage'][] = 'Article';
		$this->element_types['AboutPage'][] = 'Blog';
		$this->element_types['AboutPage'][] = 'Book';
		$this->element_types['AboutPage'][] = 'Course';
		$this->element_types['AboutPage'][] = 'Game';
		$this->element_types['AboutPage'][] = 'SoftwareApplication';
		$this->element_types['AboutPage'][] = 'SoftwareSourceCode';
		$this->element_types['AboutPage'][] = 'WebSite';
		$this->element_types['AboutPage'][] = 'TVSeries';
		$this->element_types['AboutPage'][] = 'Photograph';
		$this->element_types['AboutPage'][] = 'Conversation';
		$this->element_types['AboutPage'][] = 'DigitalDocument';

		// CheckoutPage
		$this->element_types['CheckoutPage'][] = 'Article';
		$this->element_types['CheckoutPage'][] = 'Blog';
		$this->element_types['CheckoutPage'][] = 'Book';
		$this->element_types['CheckoutPage'][] = 'Course';
		$this->element_types['CheckoutPage'][] = 'Game';
		$this->element_types['CheckoutPage'][] = 'SoftwareApplication';
		$this->element_types['CheckoutPage'][] = 'SoftwareSourceCode';
		$this->element_types['CheckoutPage'][] = 'WebSite';
		$this->element_types['CheckoutPage'][] = 'TVSeries';
		$this->element_types['CheckoutPage'][] = 'Photograph';
		$this->element_types['CheckoutPage'][] = 'Conversation';
		$this->element_types['CheckoutPage'][] = 'DigitalDocument';

		// CollectionPage
		$this->element_types['CollectionPage'][] = 'Article';
		$this->element_types['CollectionPage'][] = 'Blog';
		$this->element_types['CollectionPage'][] = 'Book';
		$this->element_types['CollectionPage'][] = 'Course';
		$this->element_types['CollectionPage'][] = 'Game';
		$this->element_types['CollectionPage'][] = 'SoftwareApplication';
		$this->element_types['CollectionPage'][] = 'SoftwareSourceCode';
		$this->element_types['CollectionPage'][] = 'WebSite';
		$this->element_types['CollectionPage'][] = 'TVSeries';
		$this->element_types['CollectionPage'][] = 'Photograph';
		$this->element_types['CollectionPage'][] = 'Conversation';
		$this->element_types['CollectionPage'][] = 'DigitalDocument';

		// ContactPage
		$this->element_types['ContactPage'][] = 'Article';
		$this->element_types['ContactPage'][] = 'Blog';
		$this->element_types['ContactPage'][] = 'Book';
		$this->element_types['ContactPage'][] = 'Course';
		$this->element_types['ContactPage'][] = 'Game';
		$this->element_types['ContactPage'][] = 'SoftwareApplication';
		$this->element_types['ContactPage'][] = 'SoftwareSourceCode';
		$this->element_types['ContactPage'][] = 'WebSite';
		$this->element_types['ContactPage'][] = 'TVSeries';
		$this->element_types['ContactPage'][] = 'Photograph';
		$this->element_types['ContactPage'][] = 'Conversation';
		$this->element_types['ContactPage'][] = 'DigitalDocument';

		// FAQPage
		$this->element_types['FAQPage'][] = 'Article';
		$this->element_types['FAQPage'][] = 'Blog';
		$this->element_types['FAQPage'][] = 'Book';
		$this->element_types['FAQPage'][] = 'Course';
		$this->element_types['FAQPage'][] = 'Game';
		$this->element_types['FAQPage'][] = 'SoftwareApplication';
		$this->element_types['FAQPage'][] = 'SoftwareSourceCode';
		$this->element_types['FAQPage'][] = 'WebSite';
		$this->element_types['FAQPage'][] = 'TVSeries';
		$this->element_types['FAQPage'][] = 'Photograph';
		$this->element_types['FAQPage'][] = 'Conversation';
		$this->element_types['FAQPage'][] = 'DigitalDocument';

		// ItemPage
		$this->element_types['ItemPage'][] = 'Article';
		$this->element_types['ItemPage'][] = 'Blog';
		$this->element_types['ItemPage'][] = 'Book';
		$this->element_types['ItemPage'][] = 'Course';
		$this->element_types['ItemPage'][] = 'Game';
		$this->element_types['ItemPage'][] = 'SoftwareApplication';
		$this->element_types['ItemPage'][] = 'SoftwareSourceCode';
		$this->element_types['ItemPage'][] = 'WebSite';
		$this->element_types['ItemPage'][] = 'TVSeries';
		$this->element_types['ItemPage'][] = 'Photograph';
		$this->element_types['ItemPage'][] = 'Conversation';
		$this->element_types['ItemPage'][] = 'DigitalDocument';

		// MedicalWebPage
		$this->element_types['MedicalWebPage'][] = 'MedicalCondition';
		$this->element_types['MedicalWebPage'][] = 'MedicalOrganization';
		$this->element_types['MedicalWebPage'][] = 'MedicalClinic';
		$this->element_types['MedicalWebPage'][] = 'MedicalSpecialty';
		$this->element_types['MedicalWebPage'][] = 'MedicalTherapy';
		$this->element_types['MedicalWebPage'][] = 'MedicalEntity';
		$this->element_types['MedicalWebPage'][] = 'MedicalProcedure';
		$this->element_types['MedicalWebPage'][] = 'MedicalDevice';
		$this->element_types['MedicalWebPage'][] = 'MedicalCause';
		$this->element_types['MedicalWebPage'][] = 'MedicalStudy';
		$this->element_types['MedicalWebPage'][] = 'MedicalTest';
		$this->element_types['MedicalWebPage'][] = 'MedicalSign';
		$this->element_types['MedicalWebPage'][] = 'MedicalAudience';
		$this->element_types['MedicalWebPage'][] = 'MedicalContraindication';
		$this->element_types['MedicalWebPage'][] = 'MedicalGuidelineContraindication';
		$this->element_types['MedicalWebPage'][] = 'MedicalRiskCalculator';
		$this->element_types['MedicalWebPage'][] = 'MedicalObservationalStudy';
		$this->element_types['MedicalWebPage'][] = 'MedicalIndication';
		$this->element_types['MedicalWebPage'][] = 'MedicalRiskFactor';
		$this->element_types['MedicalWebPage'][] = 'MedicalBusiness';
		$this->element_types['MedicalWebPage'][] = 'AnatomicalStructure';
		$this->element_types['MedicalWebPage'][] = 'healthCondition';
		$this->element_types['MedicalWebPage'][] = 'PrimaryCare';
		$this->element_types['MedicalWebPage'][] = 'ChildCare';
		$this->element_types['MedicalWebPage'][] = 'AnatomicalSystem';
		$this->element_types['MedicalWebPage'][] = 'DietarySupplement';
		$this->element_types['MedicalWebPage'][] = 'DiagnosticProcedure';
		$this->element_types['MedicalWebPage'][] = 'SuperficialAnatomy';
		$this->element_types['MedicalWebPage'][] = 'PsychologicalTreatment';
		$this->element_types['MedicalWebPage'][] = 'PhysicalActivity';
		$this->element_types['MedicalWebPage'][] = 'RadiationTherapy';
		$this->element_types['MedicalWebPage'][] = 'secondaryPrevention';
		$this->element_types['MedicalWebPage'][] = 'Muscle';
		$this->element_types['MedicalWebPage'][] = 'Nerve';
		$this->element_types['MedicalWebPage'][] = 'Artery';
		$this->element_types['MedicalWebPage'][] = 'Diet';
		$this->element_types['MedicalWebPage'][] = 'Drug';
		$this->element_types['MedicalWebPage'][] = 'Dentist';
		$this->element_types['MedicalWebPage'][] = 'Dermatology';
		$this->element_types['MedicalWebPage'][] = 'Geriatric';
		$this->element_types['MedicalWebPage'][] = 'Oncologic';
		$this->element_types['MedicalWebPage'][] = 'Physician';
		$this->element_types['MedicalWebPage'][] = 'Hospital';
		$this->element_types['MedicalWebPage'][] = 'Emergency';
		$this->element_types['MedicalWebPage'][] = 'indication';
		$this->element_types['MedicalWebPage'][] = 'VeterinaryCare';

		// ProfilePage
		$this->element_types['ProfilePage'][] = 'Article';
		$this->element_types['ProfilePage'][] = 'Blog';
		$this->element_types['ProfilePage'][] = 'Book';
		$this->element_types['ProfilePage'][] = 'Course';
		$this->element_types['ProfilePage'][] = 'Game';
		$this->element_types['ProfilePage'][] = 'SoftwareApplication';
		$this->element_types['ProfilePage'][] = 'SoftwareSourceCode';
		$this->element_types['ProfilePage'][] = 'WebSite';
		$this->element_types['ProfilePage'][] = 'TVSeries';
		$this->element_types['ProfilePage'][] = 'Photograph';
		$this->element_types['ProfilePage'][] = 'Conversation';
		$this->element_types['ProfilePage'][] = 'DigitalDocument';

		// QAPage
		$this->element_types['QAPage'][] = 'Article';
		$this->element_types['QAPage'][] = 'Blog';
		$this->element_types['QAPage'][] = 'Book';
		$this->element_types['QAPage'][] = 'Course';
		$this->element_types['QAPage'][] = 'Game';
		$this->element_types['QAPage'][] = 'SoftwareApplication';
		$this->element_types['QAPage'][] = 'SoftwareSourceCode';
		$this->element_types['QAPage'][] = 'WebSite';
		$this->element_types['QAPage'][] = 'TVSeries';
		$this->element_types['QAPage'][] = 'Photograph';
		$this->element_types['QAPage'][] = 'Conversation';
		$this->element_types['QAPage'][] = 'DigitalDocument';

		// SearchResultsPage
		$this->element_types['SearchResultsPage'][] = 'Article';
		$this->element_types['SearchResultsPage'][] = 'Blog';
		$this->element_types['SearchResultsPage'][] = 'Book';
		$this->element_types['SearchResultsPage'][] = 'Course';
		$this->element_types['SearchResultsPage'][] = 'Game';
		$this->element_types['SearchResultsPage'][] = 'SoftwareApplication';
		$this->element_types['SearchResultsPage'][] = 'SoftwareSourceCode';
		$this->element_types['SearchResultsPage'][] = 'WebSite';
		$this->element_types['SearchResultsPage'][] = 'TVSeries';
		$this->element_types['SearchResultsPage'][] = 'Photograph';
		$this->element_types['SearchResultsPage'][] = 'Conversation';
		$this->element_types['SearchResultsPage'][] = 'DigitalDocument';
		
		add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
		add_action('admin_enqueue_scripts', array($this, 'media_uploader_enqueue') );

		add_action( 'admin_init', array( $this, 'taxonomy' ) );
		$taxonomy_selected = get_option('eschema_taxonomy');
		add_action( 'edited_'.$taxonomy_selected, array($this, 'save_custom_meta'), 10, 2 );  
		add_action( 'create_'.$taxonomy_selected, array($this, 'save_custom_meta'), 10, 2 );

		add_action( 'add_meta_boxes', array($this, 'post_type') );
		add_action( 'save_post', array($this, 'save_meta_box') );

		if(!empty($_POST['salvar'])){
			unset($_POST['salvar']);
			foreach ($_POST as $key_field => $value_field) {
				update_option( $key_field, $value_field );
			}

			$redirect_param = $_POST['page_schema'];
			if(empty($redirect_param)){
				$redirect_param = sanitize_title($this->name_plugin);
			}
			header('Location:'.admin_url('admin.php?page='.$redirect_param));
			exit;
		}
		
		include "shortcodes.php";
		$init_shortcodes = new ESchemaShort;
	}

	public function media_uploader_enqueue() {

		wp_enqueue_media();
		wp_register_script('media-uploader', plugins_url('media-uploader.js' , __FILE__ ), array('jquery'));
		wp_enqueue_script('media-uploader');
	}

	public function add_admin_menu(){

		add_menu_page(
			$this->name_plugin,
			$this->name_plugin,
			'manage_options', 
			sanitize_title($this->name_plugin), 
			array($this,'e_schema_home'), 
    		'dashicons-megaphone', //URL ICON
    		99 // Ordem menu
    	);

		add_submenu_page( 
			sanitize_title($this->name_plugin), 
			'Configurações', 
			'Configurações', 
			'manage_options', 
			sanitize_title($this->name_plugin).'-config', 
			array($this,'e_schema_settings')
		);
	}

	public function e_schema_home(){

		$fields = array();


		include "templates/home.php";
	}

	public function e_schema_settings(){

		$fields = array();

		// @TYPE SCHEMA SITE
		$fields['eschema_type'] = array('type'=>'select','text'=>'Schema @type');
		$fields['eschema_type']['options'] = $this->body_types;

		// @TYPE SCHEMA NAME
		$fields['eschema_name'] = array('type'=>'text','text'=>'Schema @name');

		// @TYPE SCHEMA TELEPHONE
		$fields['eschema_telephone'] = array('type'=>'text','text'=>'Schema @telephone');

		// @TYPE SCHEMA DESCRIPTION
		$fields['eschema_description'] = array('type'=>'textarea','text'=>'Schema @description');

		// @TYPE SCHEMA LOGO
		$fields['eschema_logo'] = array('type'=>'file','text'=>'Schema @logo');

		// @TYPE SCHEMA TAXONOMY
		$fields['eschema_taxonomy'] = array('type'=>'select','text'=>'TYPE TAXONOMY SCHEMA');
		$fields['eschema_taxonomy']['description'] = 'Selecione a taxonomia onde poderá selecionar os elemntos do 
		<br>@type schema selecionado como o <b>MedicalCondition</b>';
		$taxs = get_taxonomies();
		foreach ($taxs as $key_t => $tax) {
			$fields['eschema_taxonomy']['options'][] = $tax;
		}

		// @TYPE SCHEMA PAGE
		$fields['eschema_post_type'] = array('type'=>'select','text'=>'TYPE POST_TYPE SCHEMA');
		$fields['eschema_post_type']['description'] = 'Selecione o post_type onde poderá selecionar o
		<br>@type da body padrão do schema como o uma página <b>AboutPage</b>';
		$types =  get_post_types( [], 'objects' );
		foreach ($types as $key_tp => $type) {
			$fields['eschema_post_type']['options'][] = $key_tp;
		}

		// @TYPE SCHEMA PAGE
		$fields['eschema_post_type_code'] = array('type'=>'select','text'=>'POST_TYPE CODE ICD-9');
		$fields['eschema_post_type_code']['description'] = 'Selecione o post_type onde poderá selecionar o
		Código do ICD-9';
		$c_types =  get_post_types( [], 'objects' );
		foreach ($c_types as $key_tpc => $c_type) {
			$fields['eschema_post_type_code']['options'][] = $key_tpc;
		}

		// META AUTHOR SCHEMA TELEPHONE
		$fields['eschema_author'] = array('type'=>'text','text'=>'META POST AUTHOR');
		$fields['eschema_author']['description'] = 'Subscrever o post_meta post_author * caso queira pegar o usuário, deixe em branco';


		include "templates/configuracoes.php";
	}

	public function taxonomy(){
		
		$taxonomy_selected = get_option('eschema_taxonomy');
		add_action( $taxonomy_selected.'_add_form_fields', array($this, 'select_types_phtml'), 10, 2 );
		add_action( $taxonomy_selected.'_edit_form_fields', array($this, 'select_types_phtml'), 10, 2 );
	}


	public function save_custom_meta( $term_id ) {
		if ( isset( $_POST['eschema_meta'] ) ) {

			$t_id = $term_id;
			
			$schema_meta = get_term_meta($t_id, "eschema_meta");
			
			$cat_keys = array_keys( $_POST['eschema_meta'] );
			foreach ( $cat_keys as $key ) {
				if ( isset ( $_POST['eschema_meta'][$key] ) ) {
					$schema_meta[$key] = $_POST['eschema_meta'][$key];
				}
			}

			update_term_meta($t_id, "eschema_meta", $schema_meta );
		}
	}

	public function post_type(){

		$post_type_selected = get_option('eschema_post_type');

		add_meta_box( 
			'e-schema-fields',
			__( 'E-SCHEMA' ),
			array($this, 'select_types_phtml'),
			$post_type_selected,
			'side',
			'high'
		);

		$eschema_post_type_code = get_option('eschema_post_type_code');
		if(!empty($eschema_post_type_code)){
			add_meta_box( 
			'e-schema-fields',
			__( 'E-SCHEMA' ),
			array($this, 'input_icd_phtml'),
			$eschema_post_type_code,
			'side',
			'high'
		);
		}

	}

	public function save_meta_box( $post_id ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
		if ( $parent_id = wp_is_post_revision( $post_id ) ) {
			$post_id = $parent_id;
		}

		var_dump( $_POST['eschema_meta']);

		update_post_meta( $post_id, 'eschema_meta', $_POST['eschema_meta'] );
	}

	public function select_types_phtml($type){

		$phtml = '<div class="form-field term-group">';
		$phtml .= '<label for="featuret-group"><b>SCHEMA @TYPE</b> </label>';
		$phtml .= '<select class="postform" id="eschema_type" name="eschema_meta[type]">';

		if(!empty($_GET['post'])){
			$types = $this->body_types;
			$meta = get_post_meta( $_GET['post'], 'eschema_meta', true);
		}else{
			$b_type = get_option( 'eschema_type' );
			$types = $this->element_types[$b_type];
			$meta = get_term_meta($_GET['tag_ID'], 'eschema_meta', true);
		}

		foreach ($types as $key => $type) {
			$selected = '';
			if($type==$meta['type']){
				$selected = 'selected';
			}
			$phtml .= '<option '. $selected .' value="'. $type .'" >'. $type .'</option>';
		}
		$phtml .= '</select>';
		$phtml .= '</div>';

		echo $phtml;

	}

	public function input_icd_phtml($type){

		$phtml = '<div class="form-field term-group">';
		$phtml .= '<label for="featuret-group"><b>ICD-9 CODE</b> </label>';

		if(!empty($_GET['post'])){
			$b_type = get_option( 'eschema_type' );
			$types = $this->element_types[$b_type];
			$meta = get_post_meta( $_GET['post'], 'eschema_meta', true);
		}

		$phtml .= '<input type="text" class="postform" id="eschema_code" name="eschema_meta[code]" value="' . $meta['type'] . '">';

		$phtml .= '<label for="featuret-group"><b>SCHEMA @TYPE</b> </label><br>';
		$phtml .= '<select class="postform" id="eschema_type" name="eschema_meta[type]">';
		$phtml .= '<option value="">@type padrão da categoria</option>';
		foreach ($types as $key => $type) {
			$selected = '';
			if($type==$meta['type']){
				$selected = 'selected';
			}
			$phtml .= '<option '. $selected .' value="'. $type .'" >'. $type .'</option>';
		}
		$phtml .= '</select>';
		
		$phtml .= '</div>';

		echo $phtml;

	}

}

$init_plugin = new ESchema;

?>