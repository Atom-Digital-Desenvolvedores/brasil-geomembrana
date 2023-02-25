<?php
	get_header();

	$id_page = get_page_by_path( 'eventos', OBJECT, 'page' )->ID;
?>

	<?php include "inc-breadcrumbs.php"; ?>

	<section class="wq-beneficios_01 wq-eventos">
		<div class="wq-container">
			<div class="wq-cto">
				<h3 class="wq-titulo_1"><?php echo get_post_meta( $id_page, 'wsg_eventos_01_titulo', true ); ?></h3>
				<?php echo wpautop(get_post_meta( $id_page, 'wsg_eventos_01_texto', true )); ?>
			</div>
			<div class="wq-flex">
				<?php
					$arrayQueryEventos = array(
						'post_type'				=> array( 'eventos192' ),
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'posts_per_page'		=> '-1',
					);
					$queryEventos = new WP_Query($arrayQueryEventos);
					while ( $queryEventos->have_posts()) {
						$queryEventos->the_post();
				?>
					<div class="wq-box_4 wq-box_cp-12 wq-box_cl-6 wq-box_tp-6">
						<div class="wq-treinamento_box">
							<figure>
								<?php
									$wsg_evento_item_img_id = get_post_meta( get_the_ID(), 'wsg_evento_item_img_id', true );
									getImageThumb($wsg_evento_item_img_id,'370x300');
								?>
							</figure>
							<div>
								<h2><?php the_title(); ?></h2>
								<?php echo wpautop(get_post_meta( get_the_ID(), 'wsg_evento_item_resumo', true )); ?>
								<a href="<?php the_permalink(); ?>" class="wq-btn">
									<span>Saiba mais</span>
								</a>
							</div>
						</div>
					</div>
				<?php }wp_reset_query(); ?>
			</div>
		</div>
	</section>

	<?php include "inc-newsletter.php"; ?>

<?php get_footer(); ?>