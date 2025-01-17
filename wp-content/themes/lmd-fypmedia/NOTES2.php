		array(
			'type'    => 'heading',
			'content' => 'About: Services',
		),
		array(
			'id'    => 'ab_services',
			'type'  => 'group',
			'title' => 'Services',
			'fields'    => array(
				array(
					'id'    => 'nama',
					'type'  => 'text',
					'desc'  => 'Ex: FYP Media & Agency',
					'title' => 'Judul/Nama Service-ya',
				),
				array(
					'id'    => 'order',
					'type'  => 'select',
					'options' => array('order-0'=>'Kiri', 'order-2'=>'Kanan'),
					'default' => 'order-0',
					'title' => 'Order/Layout-nya',
				),				
				array(
					'id'    => 'desc',
					'type'  => 'textarea',
					'desc'  => 'Menerima simple html seperti &lt;P&gt;, &lt;B&gt;, dll',
					'title' => 'Deskripsi-nya',
				),
				array(
					'id'    => 'foto',
					'type'  => 'upload',
					'library' => 'image',
					'preview' => true,
					'preview_width' => 60,
					'preview_height' => 80,
					'default' => get_template_directory_uri().'/img/service.png',
					'desc'  => 'Foto servicenya. rek ukuran 800x600px',
					'title' => 'Foto-nya',
				),
			),
		),


	<?php $entries = lmd_get_mod('ab_services'); if(!empty($entries)) : ?>

		<section class="about_services py-0 py-lg-4">
			
			<?php $i = 0; foreach ( (array)$entries as $key => $entry) :

			$i++;
			$order = $nama = $desc = $foto = '';

			if ( isset( $entry['order'] ) ) {
				$order = $entry['order'];
			}
			if ( isset( $entry['nama'] ) ) {
				$nama = $entry['nama'];
			}
			if ( isset( $entry['desc'] ) ) {
				$desc = $entry['desc'];
			}
			if ( isset( $entry['foto'] ) ) {
				$foto = $entry['foto'];
			}?>

			<div class="abs_<?php echo $i; ?>">
				<div class="container overflow-hidden py-4">
					<div class="row match-height gx-lg-5">
						<div class="col-lg-5 col-match-height <?php echo $order; ?> text-center mb-3 mb-lg-0">
							<img class="img-fluid d-block mx-auto" src="<?php echo $foto; ?>" alt="<?php echo $nama; ?>">
						</div>
						<div class="col-lg-7 col-match-height order-1 mb-3 mb-lg-0">
							 <h2 class="fh fw-bold mb-4"><?php echo $nama; ?></h2>

							<div class="fs-5"><?php echo $desc; ?></div>
						</div>
					</div>
				</div><!--/container-->
			</div>

			<?php endforeach; ?>

		</section><!--/founder-->

	<?php endif; //services ?>


Selamat datang di FYPMedia.id! Kami adalah sumber terkini untuk informasi seputar talent, manajemen talent, dan berita terbaru di berbagai industri. Didirikan dengan visi untuk menghubungkan para talenta berbakat dengan peluang yang tepat, serta menyediakan berita terupdate untuk menjaga Anda tetap terinformasi.

Selamat datang di Papyrus Corp! Kami adalah tim profesional yang berdedikasi untuk membantu Anda menciptakan berita yang informatif, menarik, dan berkualitas tinggi baik dalam jasa pembuatan website, artikel dan berita maupun penulisan buku. Dengan pengalaman dalam industri jurnalistik dan komitmen terhadap standar tertinggi, kami siap membantu Anda mengomunikasikan cerita Anda kepada dunia. 

Selamat datang di Helios Network/Motion! Kami adalah studio kreatif yang menghidupkan ide-ide Anda melalui desain video dan animasi yang dinamis. Dengan fokus pada kualitas visual dan narasi yang kuat, kami siap membantu Anda menciptakan konten yang menarik dan mengesankan. 