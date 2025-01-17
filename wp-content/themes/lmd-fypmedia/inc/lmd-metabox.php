<?php
/* Metaboxes */
require_once get_template_directory() . '/inc/codestar-framework/codestar-framework.php';

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

	// Create a metabox
	CSF::createMetabox( 'post_mbx', array(
		'title'     => 'Post Metabox',
		'post_type' => 'post',
		'context' => 'advanced', //normal, side, advanced
		'priority'	=> 'high', //high, low, default
		'data_type' => 'unserialize',
	) );

	// Create a section
	CSF::createSection( 'post_mbx', array(
		'fields' => array(
			array(
				'type' => 'content',
				'content' => 'Selalu upload featured image dengan ukuran yg seragam, misalnya: 1366x768 pixel, jangan lupa isi bagian Caption gambar jika ingin ditampilkan.',
			),
			array(
				'id'    => 'talent',
				'type' => 'select',
				'title' => 'Talent-nya',
				'placeholder' => 'Select talent',
				'chosen'      => true,
				'ajax'        => true,
				'options'     => 'posts',
				'query_args'  => array(
					'post_type' => 'talent'
				),
				'desc' => 'siapa (talent) yang punya post? pilih satu (sesuai full name-nya)',
			),
			
			array(
				'type' => 'heading',
				'content' => 'Post Authors',
			),
			array(
				'id'    => 'pa_authors',
				'type'  => 'group',
				'title' => 'Post Authors',
				'fields'    => array(
					array(
						'id'    => 'name',
						'type' => 'text',
						'title' => 'Nama Author-nya',
						'desc' => 'Ex: John Travolta, Elvis Presley, Keanu Reeves',
					),
					array(
						'id'    => 'title',
						'type' => 'text',
						'title' => 'Job/Title Author',
						'desc' => 'Ex: Penulis, Editor, Kontributor',
					),
				),
			),			
			
			array(
				'type' => 'heading',
				'content' => 'Post Type: Video',
			),
			array(
				'id'    => 'vidlink',
				'type' => 'text',
				'title' => 'Link ke video-nya',
				'desc' => 'Ex: https://www.youtube.com/watch?v=Hz2aCKe8G8A',
			),

		) //end of fields
	) ); //end of metabox
	
	// Create a metabox
	CSF::createMetabox( 'post_pilihan_mbx', array(
		'title'     => 'Post Pilihan',
		'post_type' => 'post',
		'context' => 'side', //normal, side, advanced
		'priority'	=> 'high', //high, low, default
		'data_type' => 'unserialize',
	) );

	// Create a section
	CSF::createSection( 'post_pilihan_mbx', array(
		'fields' => array(

			array(
				'id' => 'pilihan',
				'type' => 'switcher',
				'default' => 0,
				'title'	=> 'Post pilihan?',
				'desc' => 'Aktifkan jika post ini pilihan',
			),

		) //end of fields
	) ); //end of metabox


	// Create a metabox - career
	CSF::createMetabox( 'career_mbx', array(
		'title'     => 'Career Metabox',
		'post_type' => 'career',
		'context' => 'advanced', //normal, side, advanced
		'priority'	=> 'high', //high, low, default
		'data_type' => 'unserialize',
	) );

	// Create a section
	CSF::createSection( 'career_mbx', array(
		'fields' => array(

			array(
				'id'    => 'cr_lokasi',
				'type' => 'text',
				'title' => 'Lokasi Loker-nya',
				'desc' => 'Ex: Kuningan, South Jakarta',
			),
			array(
				'id'    => 'cr_link',
				'type' => 'text',
				'title' => 'Link Apply-nya',
				'desc' => 'Link ke for pendaftaran-nya, misalnya: <br>URL <i>https://glints.com/job-example/legal-officer/</i><br>EMAIL: <i>mailto:fypmediaid@gmail.com</i><br>atau WA: <i>https://api.whatsapp.com/send?phone=+6281234567890</i>',
			),

		) //end of fields
	) ); //end of metabox


   // Create a metabox - Talent
  CSF::createMetabox( 'tl_metabox', array(
    'title'				=> 'Talent Metabox',
    'post_type'			=> array('talent'),
	'context'			=> 'advanced', //normal, side, advanced
    'priority'			=> 'high', //high, low, default
	'data_type' => 'unserialize',
  ) );

  // Create a section
  CSF::createSection( 'tl_metabox', array(
    'fields' => array(
		
		array(
			'type'    => 'content',
			'content' => 'Notes: Judul post = Full Name, Konten = Biodata singkat. Featured image (kanan bawah) = foto profil - Upload gambar yg ukurannya seragam, rekomendasi ukuran: 800x1132 pixel',
		),
		array(
			'id'      => 'tl_alamat',
			'type'    => 'text',
			'title'   => 'Alamat',
		),
		array(
			'id'      => 'tl_konten',
			'type'    => 'text',
			'title'   => 'Jenis Konten',
		),
		array(
			'id'      => 'tl_hobby',
			'type'    => 'text',
			'title'   => 'Hobby',
		),

		array(
			'type'    => 'heading',
			'content' => 'Platforms',
		),
		array(
			'id'      => 'tl_instagram',
			'type'    => 'text',
			'title'   => 'Instagram URL',
			'desc'		=> 'Copas URL link-nya disini. Ex: https://instagram.com/amrinzulkarnain',
		),			
		array(
			'id'      => 'tl_youtube',
			'type'    => 'text',
			'title'   => 'Youtube URL',
			'desc'		=> 'Copas URL link-nya disini. Ex: https://youtube.com/c/AmrinZulkarnain',
		),
		array(
			'id'      => 'tl_tiktok',
			'type'    => 'text',
			'title'   => 'Tiktok URL',
			'desc'		=> 'Copas URL link-nya disini. Ex: https://tiktok.com/@amrinz',
		),		
		array(
			'id'      => 'tl_facebook',
			'type'    => 'text',
			'title'   => 'Facebook URL',
			'desc'		=> 'Copas URL link-nya disini. Ex: https://facebook.com/amrinz',
		),
		array(
			'id'      => 'tl_twitter',
			'type'    => 'text',
			'title'   => 'Twitter URL',
			'desc'		=> 'Copas URL link-nya disini. Ex: https://twitter.com/LombokMedia',
		),
		array(
			'id'      => 'tl_linkedin',
			'type'    => 'text',
			'title'   => 'Linkedin URL',
			'desc'		=> 'Copas URL link-nya disini. Ex: https://www.linkedin.com/',
		),
		
		array(
			'type'		=> 'heading',
			'content'	=> 'Featured Content',
		),
		array(
			'id'    => 'tl_featured',
			'type'  => 'group',
			'max' => 3,
			'title' => 'Featured Content',
			'desc' => 'Klik Add New untuk menambah Featured Content',
			'fields'    => array(
				array(
					'id'    => 'judul',
					'type'  => 'text',
					'title' => 'Judul-nya',
					'desc' => 'Ex: Jalan-jalan ke Disneyland',
				),
				array(
					'id'    => 'jenis',
					'type'  => 'select',
					'options' => array('youtube' => 'Youtube', 'manual' => 'Manual Post'),
					'default' => 'manual',
					'title' => 'Jenis Post-nya',
					'desc' => 'Tidak semua konten bisa diembed dengan baik.',
				),
				array(
					'id'    => 'thumbnail',
					'type'    => 'upload',
					'library' => 'image',
					'preview' => true,
					'title' => 'Thumbnail-nya',
					'desc' => 'Ukuran rekomendasi: 800x600px',
				),
				array(
					'id'    => 'deskripsi',
					'type'  => 'textarea',
					'title' => 'Deskripsi-nya',
					'desc' => 'Sebagai pengganti ALT untuk gambar thumbnail',
				),
				array(
					'id'    => 'link',
					'type'  => 'text',
					'title' => 'Link konten-nya',
					'desc' => 'Ex: https://www.youtube.com/watch?v=0trCuxSRGNY',
				),
			),
		),
		
		array(
			'type'		=> 'Heading',
			'content'	=> 'Blog dibuat lebih dahulu sebelum ditambahkan disini. Pastikan talent ybs sudah ditambahkan.',
		),

    ) //end of fields
  ) ); //end of metabox


  // Create a metabox - Talent
  CSF::createMetabox( 'ta_metabox', array(
    'title'				=> 'Team Metabox',
    'post_type'			=> array('team'),
	'context'			=> 'advanced', //normal, side, advanced
    'priority'			=> 'high', //high, low, default
	'data_type' => 'unserialize',
  ) );

  // Create a section
  CSF::createSection( 'ta_metabox', array(
    'fields' => array(
		array(
			'type'    => 'content',
			'content' => 'Notes: Judul post = Full Name, Konten = Biodata singkat. Featured image (kanan bawah) = foto profil - Upload gambar yg ukurannya seragam, rekomendasi ukuran: 800x1132 pixel',
		),
		array(
			'id'      => 'ta_alamat',
			'type'    => 'text',
			'title'   => 'Alamat',
		),
		array(
			'id'      => 'ta_job',
			'type'    => 'text',
			'title'   => 'Jobdesc',
		),
		array(
			'id'      => 'ta_hobby',
			'type'    => 'text',
			'title'   => 'Hobby',
		),

    ) //end of fields
  ) ); //end of metabox


  // Create taxonomy options
  CSF::createTaxonomyOptions( 'tax_mbx', array(
    'taxonomy'  => 'category',
    'data_type' => 'unserialize', // The type of the database save options. `serialize` or `unserialize`
  ) );

  //
  // Create a section
  CSF::createSection( 'tax_mbx', array(
    'fields' => array(

		array(
			'id'    => 'logo',
			'type'    => 'upload',
			'library' => 'image',
			'preview' => true,
			'title' => 'Logo-nya',
			'desc' => 'Ukuran rekomendasi: 356x150px - latar transparan',
		),

    )
  ) );


} //end of CSF