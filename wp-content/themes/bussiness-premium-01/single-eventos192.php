<?php
	get_header();

	$id_page = get_page_by_path( 'eventos', OBJECT, 'page' )->ID;

	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
?>

	<?php include "inc-breadcrumbs.php"; ?>

	<section class="wq-evento-interna_01">
		<div class="wq-container">
			<div class="wq-flex">
				<article class="wq-box_8 wq-box_cp-12 wq-box_cl-12 wq-box_tp-12">
					<div>
						<div class="wq-projeto_carousel">
							<?php
								$wsg_evento_interna_img = get_post_meta( get_the_ID(), 'wsg_evento_interna_img', true );
								foreach ($wsg_evento_interna_img as $key => $value){
							?>
								<figure>
									<?php getImageThumb($key,'715x450'); ?>
								</figure>
							<?php } ?>
						</div>
						<p><?php echo get_post_meta( get_the_ID(), 'wsg_evento_interna_subtitulo', true ); ?></p>
						<h2><?php echo get_post_meta( get_the_ID(), 'wsg_evento_interna_titulo', true ); ?></h2>
						<?php echo wpautop(get_post_meta( get_the_ID(), 'wsg_evento_interna_conteudo', true )); ?>
					</div>
					<?php
						$entries = get_post_meta( get_the_ID(), 'evento_interna_items', true );
						if ( !empty($entries) ) {
					?>
						<div class="wq-evento-interna_info">
							<?php

								foreach ( (array) $entries as $key => $entry ) {

									if ( isset( $entry['wsg_evento_interna_items_subtitulo'] ) ) {
										$wsg_evento_interna_items_subtitulo = $entry['wsg_evento_interna_items_subtitulo'];
									}
									if ( isset( $entry['wsg_evento_interna_items_titulo'] ) ) {
										$wsg_evento_interna_items_titulo = $entry['wsg_evento_interna_items_titulo'];
									}
							?>
								<div>
									<p><?php echo $wsg_evento_interna_items_subtitulo; ?></p>
									<h3><?php echo $wsg_evento_interna_items_titulo; ?></h3>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
				</article>
				<aside class="wq-box_4 wq-box_cp-12 wq-box_cl-12 wq-box_tp-12">
					<div class="wq-inscricao_box">
						<?php $wsg_evento_data_valor = get_post_meta( get_the_ID(), 'wsg_evento_data_valor', true ); ?>
						<div class="wq-data-hora">
							<h3><?php echo strftime("%d de %B" , $wsg_evento_data_valor); ?></h3>
							<p><?php echo strftime("%H:%M" , $wsg_evento_data_valor); ?></p>
						</div>
						<form action="#" onsubmit="return submitFormWithRecaptcha(this);" class="contact-form" method="POST">

							<input type="hidden" name="subject_email" value="Newsletter enviado pelo site">
							<input required type="hidden" name="title_email" value="Contato enviado pelo formulário da página: <?php the_title(); ?>">

							<input type="hidden" name="label-send-data-name" value="Nome">
							<input required type="text" name="send-data-name" placeholder="Qual é o seu nome?">

							<input type="hidden" name="label-send-data-email" value="Email">
							<input required type="email" name="send-data-email" placeholder="Qual é o seu melhor email?">

							<input type="hidden" name="label-send-data-phone" value="telefone">
							<input required type="text" name="send-data-phone" placeholder="Qual é o seu whatsapp?" class="inputphone">

							<input type="hidden" name="label-send-data-message" value="Mensagem">
							<textarea required name="send-data-message" cols="30" rows="10" placeholder="Deixe sua mensagem"></textarea>

							<div class="wq-dir">
								<button class="wq-btn wq-btn_peq" type="submit">
									<span>Enviar</span>
								</button>
							</div>

							<?php if (strlen($wsg_contato_widget) > 0) { ?>
								<div class="g-recaptcha invisible-recaptcha" id="recaptcha-<?php echo md5(uniqid(rand(), true)); ?>" data-sitekey="<?php echo $wsg_contato_widget; ?>" data-size="invisible"></div>
							<?php } ?>
						</form>
					</div>
				</aside>
			</div>
		</div>
	</section>

	<?php include "inc-newsletter.php"; ?>

	<?php include "inc-depoimentos.php"; ?>

<?php get_footer(); ?>