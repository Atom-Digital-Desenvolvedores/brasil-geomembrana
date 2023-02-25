<?php

	add_action( 'cmb2_admin_init', 'metaboxes_projetos' );

	function metaboxes_projetos() {

		// Detalhes do projeto na home
		$projeto_item = new_cmb2_box( array(
			'id'            => 'projeto_item',
			'title'         => __( 'Detalhes do projeto na home' ),
			'object_types'  => array( 'projetos192', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => false,
		) );

		$projeto_item->add_field( array(
			'name'       => __( 'Imagem do projeto' ),
			'desc'       => __( 'Tamanho recomendado <strong>370x300</strong>' ),
			'id'         => 'wsg_projeto_item_img',
			'type' => 'file',
			'preview_size' => array( 370/1, 300/1 ),
			'query_args' => array( 'type' => 'image' ),
		) );
		$projeto_item->add_field( array(
			'name'       => __( 'Resumo do projeto' ),
			'id'         => 'wsg_projeto_item_resumo',
			'type'       => 'wysiwyg',
		) );

		// Página do projeto
		$projeto_interna = new_cmb2_box( array(
			'id'            => 'projeto_interna',
			'title'         => __( 'Página do projeto' ),
			'object_types'  => array( 'projetos192', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => false,
		) );
		$projeto_interna->add_field( array(
			'name'       => __( 'Imagem do projeto' ),
			'desc'       => __( 'Tamanho recomendado <strong>715x450</strong>' ),
			'id'         => 'wsg_projeto_interna_img',
			'type' => 'file_list',
			'preview_size' => array( 715/3, 450/3 ),
			'query_args' => array( 'type' => 'image' ),
		) );
		$projeto_interna->add_field( array(
			'name'       => __( 'Título do conteúdo do projeto' ),
			'id'         => 'wsg_projeto_interna_titulo',
			'type'       => 'text',
		) );
		$projeto_interna->add_field( array(
			'name'       => __( 'Conteúdo do projeto' ),
			'id'         => 'wsg_projeto_interna_conteudo',
			'type'       => 'wysiwyg',
		) );
		$projeto_interna->add_field( array(
			'name'       => __( 'Título do formulário do projeto' ),
			'id'         => 'wsg_projeto_interna_form_titulo',
			'type'       => 'text',
		) );

		// Método de especificação de página
		$projetosPage = get_page_by_path( 'projetos', OBJECT, 'page' );

		$post_id;

		if (isset($_GET['post'])) {
			$post_id = $_GET['post'];
		}else if(isset($_POST['post_ID'])) {
			$post_id = $_POST['post_ID'];
		}
		if( !isset( $post_id ) ) return;

		if($projetosPage && $projetosPage->ID != $post_id){
			return;
		}

		// Metabox projetos
		$projetos_01 = new_cmb2_box( array(
			'id'            => 'projetos_01',
			'title'         => __( 'projetos' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$projetos_01->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_projetos_01_titulo',
			'type'       => 'text',
		) );

		$projetos_01->add_field( array(
			'name'       => __( 'Texto da seção' ),
			'id'         => 'wsg_projetos_01_texto',
			'type'       => 'wysiwyg',
		) );

	}

?>