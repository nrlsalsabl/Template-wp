<?php
/*
Theme Customizer using Codestar
*/
require_once get_template_directory() . '/inc/codestar-framework/codestar-framework.php';

// Set a unique slug-like ID
$prefix = UPT_THEME_SLUG.'_customize';

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

	// Create Customize options
  CSF::createCustomizeOptions( $prefix );

  //Main Panel
	$panel = 'lomedia_panel';

  // Create a top-tab/panel
  CSF::createSection( $prefix, array(
    'id'				=> $panel, // main panel
	'priority'	=> 0,
    'title'			=> 'LombokMedia',
  ) );

  // Create a sub-tab
  CSF::createSection( $prefix, array(
    'parent' => $panel, // The slug id of the parent section
    'title'  => 'Umum',
	'description' => 'Pengaturan umum. Untuk favicon atur di Customize > Site Identity',
    'fields' => array(

		array(
			'id'    => 'logo',
			'type'    => 'upload',
			'library' => 'image',
			'default' => get_template_directory_uri().'/img/logo.png',
			'preview' => true,
			'preview_width' => 100,
			'preview_height' => 50,
			'title' => 'Logo di Header',
			'desc' => 'Rek ukuran 353x40 pixel',
		),
		
		array(
			'type'    => 'heading',
			'content' => 'Fonts',
		),
		array(
		  'id'      => 'font',
		  'type'    => 'typography',
		  'title'   => 'Typography',
		  'default' => array(
			'font-family' => 'Poppins',
			'font-size'   => '16',
			'unit'        => 'px',
			'type'        => 'google',
		  ),
		  'output' => 'body',
		),
		
		array(
			'type'    => 'heading',
			'content' => 'Footer',
		),
		
		array(
			'id'    => 'flogo',
			'type'    => 'upload',
			'library' => 'image',
			'default' => get_template_directory_uri().'/img/flogo.png',
			'preview' => true,
			'preview_width' => 80,
			'preview_width' => 80,
			'title' => 'Logo di Footer',
			'desc' => 'Rek ukuran 353x40 pixel',
		),
		array(
			'id'		=> 'about',
			'type'		=> 'textarea',
			'title'		=> 'Text about di Footer',
		    'default'	=> '<b>FYP Media & Agency</b> <br>"<i>Leading the Way in Media and Branding Excellence.</i>"',
		),
		
		array(
			'id'		=> 'about',
			'type'		=> 'textarea',
			'title'		=> 'Text about di Footer',
		    'default'	=> '<b>FYP Media & Management</b> <br>"<i>Leading the Way in Media and Branding Excellence.</i>"',
		),
		
		array(
			'type'    => 'subheading',
			'content' => 'Contact di Footer',
		),
		array(
			'type'    => 'content',
			'content' => 'jika diganti dengan widget, blok ini tidak ditampilkan.',
		),
		array(
			'id'		=> 'contact_alamat',
			'type'		=> 'textarea',
			'title'		=> 'Alamat di Footer',
		    'default'	=> 'Residence One BSD, <br>Jl. Raya Serpong Kilometer 7, Jelupang, Kec. Serpong Utara, <br>Kota Tangerang Selatan, Banten 15310',
		),
		array(
			'id'      => 'contact_phone',
			'type'    => 'text',
			'title'   => 'Phone',
			'desc'		=> 'No Telpon/WA. Ex: +62 851 7512 3014',
		),
		array(
			'id'      => 'contact_email',
			'type'    => 'text',
			'title'   => 'Email',
			'desc'		=> 'Alamat email. Ex: fypmediaid@gmail.com',
		),
		
		array(
			'type'    => 'heading',
			'content' => 'Social Media',
		),
		array(
			'type'    => 'content',
			'content' => 'kosongkan jika tidak dipakai',
		),
		array(
			'id'      => 'contact_facebook',
			'type'    => 'text',
			'title'   => 'Facebook URL',
			'desc'		=> 'Copas URL link-nya disini. Ex: https://facebook.com/amrinz',
		),
		array(
			'id'      => 'contact_youtube',
			'type'    => 'text',
			'title'   => 'Youtube URL',
			'desc'		=> 'Copas URL link-nya disini. Ex: https://youtube.com/c/AmrinZulkarnain',
		),
		array(
			'id'      => 'contact_instagram',
			'type'    => 'text',
			'title'   => 'Instagram URL',
			'desc'		=> 'Copas URL link-nya disini. Ex: https://instagram.com/amrinzulkarnain',
		),
		array(
			'id'      => 'contact_threads',
			'type'    => 'text',
			'title'   => 'Threads URL',
			'desc'		=> 'Copas URL link-nya disini. Ex: https://threads.com/LombokMedia',
		),
		array(
			'id'      => 'contact_twitter',
			'type'    => 'text',
			'title'   => 'Twitter URL',
			'desc'		=> 'Copas URL link-nya disini. Ex: https://twitter.com/LombokMedia',
		),
		array(
			'id'      => 'contact_tiktok',
			'type'    => 'text',
			'title'   => 'Tiktok URL',
			'desc'		=> 'Copas URL link-nya disini. Ex: https://tiktok.com/@LombokMedia',
		),
		array(
			'id'      => 'contact_linkedin',
			'type'    => 'text',
			'title'   => 'Linkedin URL',
			'desc'		=> 'Copas URL link-nya disini. Ex: https://www.linkedin.com/',
		),
		


    ) //end of fields
  ) ); //end of section


  // Create a sub-tab/section
  CSF::createSection( $prefix, array(
    'parent' => $panel,
    'title'  => 'Homepage',
	'description' => 'Pengaturan Homepage. Ikuti panduan untuk mengaktifkan Homepage ini.',
    'fields' => array(
	
		array(
			'type'    => 'heading',
			'content' => 'Home: Welcome',
		),
		array(
			'id'          => 'hwel_query',
			'type'        => 'select',
			'title'       => 'Jenis Query Post',
			'options'     => array('hwel_latest'=>'Post Terbaru', 'hwel_pilihan'=>'Post Pilihan'),
			'default'	  => 'hwel_latest',
			'desc'		  => 'Post pilihan di aktifkan di kanan atas post ybs.',
		),
		array(
			'id'          => 'hwel_carousel',
			'type'        => 'number',
			'title'       => 'Jumlah Post Carousel',
			'default'	  => 5,
			'desc'		  => 'Jumlah posts sebagai carousel/slide',
		),
		
		array(
			'type'    => 'heading',
			'content' => 'Home: Artikel',
		),
		array(
			'id'          => 'hart_title',
			'type'        => 'text',
			'title'       => 'Judul Blok',
			'default'	  => 'Artikel FYP',
			'desc'		  => 'Judul blok sesuai pilihan posts. Ex: Artikel FYP',
		),
		array(
			'id'          => 'hart_query',
			'type'        => 'select',
			'title'       => 'Jenis Query Post',
			'options'     => array('hart_latest'=>'Post Terbaru', 'hart_populer'=>'Post Populer', 'hart_kategori'=>'Post Kategori'),
			'default'	  => 'hart_latest',
			'desc'		  => 'Post pilihan di aktifkan di kanan atas post ybs.',
		),
		array(
			'id'          => 'hart_cat',
			'type'        => 'select',
			'title'       => 'Pilih Kategori-nya',
			'placeholder' => 'Select a category',
			'options'     => 'categories',
			'dependency'  => array('hart_query', '==', 'hart_kategori'),
		),
		array(
			'id'          => 'hart_link',
			'type'        => 'text',
			'title'       => 'Link Lihat Semua',
			'default'	  => '#',
			'desc'	  => 'Atur di Setting > Reading > Posts page > Halaman kosong dgn nama Indeks. Ex: '.home_url('/indeks/'),
			'dependency'  => array('hart_query', '==', 'hart_latest'),
		),
		
		array(
			'type'    => 'heading',
			'content' => 'Home: Populer',
		),
		array(
			'type'    => 'subheading',
			'content' => 'Blok Populer Kiri',
		),
		array(
			'id'          => 'hpop_title_ki',
			'type'        => 'text',
			'title'       => 'Judul Blok',
			'default'	  => 'Artikel Populer',
			'desc'		  => 'Judul blok sesuai pilihan posts. Ex: Artikel Populer',
		),
		array(
			'id'          => 'hpop_query_ki',
			'type'        => 'select',
			'title'       => 'Jenis Query Post',
			'options'     => array('hpop_latest'=>'Post Terbaru', 'hpop_populer'=>'Post Populer', 'hpop_kategori'=>'Post Kategori'),
			'default'	  => 'hpop_latest',
			'desc'		  => 'Post pilihan di aktifkan di kanan atas post ybs.',
		),
		array(
			'id'          => 'hpop_cat_ki',
			'type'        => 'select',
			'title'       => 'Pilih Kategori-nya',
			'placeholder' => 'Select a category',
			'options'     => 'categories',
			'dependency'  => array('hpop_query_ki', '==', 'hpop_kategori'),
		),
		array(
			'id'          => 'hpop_link_ki',
			'type'        => 'text',
			'title'       => 'Link Lihat Semua',
			'default'	  => '#',
			'desc'	  => 'Atur di Setting > Reading > Posts page > Halaman kosong dgn nama Indeks. Ex: '.home_url('/indeks/'),
			'dependency'  => array('hpop_query_ki', '==', 'hpop_latest'),
		),
		array(
			'type'    => 'subheading',
			'content' => 'Blok Populer Kanan',
		),
		array(
			'id'          => 'hpop_title_ka',
			'type'        => 'text',
			'title'       => 'Judul Blok',
			'default'	  => 'Artikel Populer',
			'desc'		  => 'Judul blok sesuai pilihan posts. Ex: Artikel Populer',
		),
		array(
			'id'          => 'hpop_query_ka',
			'type'        => 'select',
			'title'       => 'Jenis Query Post',
			'options'     => array('hpop_latest'=>'Post Terbaru', 'hpop_populer'=>'Post Populer', 'hpop_kategori'=>'Post Kategori'),
			'default'	  => 'hpop_latest',
			'desc'		  => 'Post pilihan di aktifkan di kanan atas post ybs.',
		),
		array(
			'id'          => 'hpop_cat_ka',
			'type'        => 'select',
			'title'       => 'Pilih Kategori-nya',
			'placeholder' => 'Select a category',
			'options'     => 'categories',
			'dependency'  => array('hpop_query_ka', '==', 'hpop_kategori'),
		),
		array(
			'id'          => 'hpop_link_ka',
			'type'        => 'text',
			'title'       => 'Link Lihat Semua',
			'default'	  => '#',
			'desc'	  => 'Atur di Setting > Reading > Posts page > Halaman kosong dgn nama Indeks. Ex: '.home_url('/indeks/'),
			'dependency'  => array('hpop_query_ka', '==', 'hpop_latest'),
		),
		
		array(
			'type'    => 'heading',
			'content' => 'Home: Carousel',
		),
		array(
			'id'          => 'hcar_title',
			'type'        => 'text',
			'title'       => 'Judul Blok',
			'default'	  => 'Artikel Populer',
			'desc'		  => 'Judul blok sesuai pilihan posts. Ex: Artikel Populer',
		),
		array(
			'id'          => 'hcar_query',
			'type'        => 'select',
			'title'       => 'Jenis Query Post',
			'options'     => array('hcar_latest'=>'Post Terbaru', 'hcar_populer'=>'Post Populer', 'hcar_kategori'=>'Post Kategori'),
			'default'	  => 'hcar_latest',
			'desc'		  => 'Post pilihan di aktifkan di kanan atas post ybs.',
		),
		array(
			'id'          => 'hcar_count',
			'type'        => 'number',
			'title'       => 'Jumlah post',
			'default'	  => 5,
			'desc'		  => 'Jumlah post carousel/slide yg ditampilkan. Ex: 5',
		),
		array(
			'id'          => 'hcar_cat',
			'type'        => 'select',
			'title'       => 'Pilih Kategori-nya',
			'placeholder' => 'Select a category',
			'options'     => 'categories',
			'dependency'  => array('hcar_query', '==', 'hcar_kategori'),
		),
		array(
			'id'          => 'hcar_link',
			'type'        => 'text',
			'title'       => 'Link Lihat Semua',
			'default'	  => '#',
			'desc'	  => 'Atur di Setting > Reading > Posts page > Halaman kosong dgn nama Indeks. Ex: '.home_url('/indeks/'),
			'dependency'  => array('hcar_query', '==', 'hcar_latest'),
		),
		
		array(
			'type'    => 'heading',
			'content' => 'Home: Trusted by',
		),
		array(
			'id'          => 'home_partner_aktif',
			'type'        => 'switcher',
			'title'       => 'Aktifkan Modul Ini?',
			'title'       => 'Aktifkan Modul Ini?',
			'desc'       => 'Tambahkan konten modul ini di panel LombokMedia > BuiltIn Moduls > Partners',
		),
		
		array(
			'type'    => 'heading',
			'content' => 'Home: Image Links',
		),
		array(
			'id'    => 'imglinks',
			'type'  => 'group',
			'title' => 'Image Links',
			'button_title' => 'Tambah Image Link',
			'fields'    => array(
				array(
					'id'    => 'title',
					'type'  => 'text',
					'title' => 'Judul-nya',
					'desc' => 'Misalnya: FYP Media',
				),
				array(
					'id'    => 'img',
					'type'    => 'upload',
					'library' => 'image',
					'preview' => true,
					'preview_width' => 80,
					'preview_height' => 40,
					'title' => 'Thumbnail-nya'
				),
				array(
					'id'    => 'link',
					'type'  => 'text',
					'title' => 'Link-nya',
					'desc' => 'Misalnya: '.home_url().'/category/fypmedia/',
				),
			),
		),	
		
		array(
			'type'    => 'heading',
			'content' => 'Home: Carousel 3',
		),
		array(
			'id'          => 'hcar3_title',
			'type'        => 'text',
			'title'       => 'Judul Blok',
			'default'	  => 'Artikel Populer',
			'desc'		  => 'Judul blok sesuai pilihan posts. Ex: Artikel Populer',
		),
		array(
			'id'          => 'hcar3_query',
			'type'        => 'select',
			'title'       => 'Jenis Query Post',
			'options'     => array('hcar3_latest'=>'Post Terbaru', 'hcar3_populer'=>'Post Populer', 'hcar3_kategori'=>'Post Kategori'),
			'default'	  => 'hcar3_latest',
			'desc'		  => 'Post pilihan di aktifkan di kanan atas post ybs.',
		),
		array(
			'id'          => 'hcar3_count',
			'type'        => 'number',
			'title'       => 'Jumlah post',
			'default'	  => 5,
			'desc'		  => 'Jumlah post carousel/slide yg ditampilkan. Ex: 5',
		),
		array(
			'id'          => 'hcar3_cat',
			'type'        => 'select',
			'title'       => 'Pilih Kategori-nya',
			'placeholder' => 'Select a category',
			'options'     => 'categories',
			'dependency'  => array('hcar3_query', '==', 'hcar3_kategori'),
		),
		array(
			'id'          => 'hcar3_link',
			'type'        => 'text',
			'title'       => 'Link Lihat Semua',
			'default'	  => '#',
			'desc'	  => 'Atur di Setting > Reading > Posts page > Halaman kosong dgn nama Indeks. Ex: '.home_url('/indeks/'),
			'dependency'  => array('hcar3_query', '==', 'hcar3_latest'),
		),
		
	) //end of fields
  ) ); //end of section


  // Create a sub-tab/section
  CSF::createSection( $prefix, array(
    'parent' => $panel,
    'title'  => 'Template: About FYP Media',
	'description' => 'Pengaturan template about.',
    'fields' => array(
		
		array(
			'type'    => 'content',
			'content' => 'Pastikan halaman ybs menggunakan template <b>LMD About FYP Media</b>',
		),
		
		array(
			'type'    => 'heading',
			'content' => 'About: About FYP Media',
		),
		array(
			'id'          => 'ab_about_title',
			'type'        => 'text',
			'title'       => 'Judul Halaman',
			'default'	  => 'We Help You Boost <br>Your Brand',
			'desc'	  => 'Ex: We Help You Boost <br>Your Brand',
		),
		array(
			'id'          => 'ab_about_desc',
			'type'        => 'textarea',
			'title'       => 'Deskripsi Halaman',
			'default'	  => 'FYP Media is a proud Indonesian talent management company and has been building international influencers across the globe',
			'desc'	  => 'Ex: FYP Media is a proud Indonesian talent management company and has been building international influencers across the globe',
		),
		array(
			'id'          => 'ab_about_btn1_label',
			'type'        => 'text',
			'title'       => 'Tombol 1: Label',
			'default'	  => 'Contact Us',
			'desc'	  => 'Ex: Contact Us',
		),
		array(
			'id'          => 'ab_about_btn1_link',
			'type'        => 'text',
			'title'       => 'Tombol 1: Link',
			'default'	  => '#',
			'desc'	  => 'Ex: <i>'.home_url('/contact/').'</i>',
		),
		array(
			'id'          => 'ab_about_btn2_label',
			'type'        => 'text',
			'title'       => 'Tombol 2: Label',
			'default'	  => 'Meet the Talents',
			'desc'	  => 'Ex: Meet the Talents',
		),
		array(
			'id'          => 'ab_about_btn2_link',
			'type'        => 'text',
			'title'       => 'Tombol 2: Link',
			'default'	  => '#',
			'desc'	  => 'Ex: <i>'.home_url('/talent/').'</i>',
		),
		array(
			'id'    => 'ab_about_img',
			'type'    => 'upload',
			'library' => 'image',
			'default' => get_template_directory_uri().'/img/about-about.png',
			'preview' => true,
			'preview_width' => 100,
			'preview_height' => 50,
			'title' => 'Gambar di bawah tombol',
			'desc'  => 'Rek ukuran misalnya: 768x355 pixel',
		),

		array(
			'type'    => 'heading',
			'content' => 'About: Partners',
		),
		array(
			'id'          => 'ab_partner_aktif',
			'type'        => 'switcher',
			'title'       => 'Aktifkan Modul Ini?',
			'desc'       => 'Tambahkan konten modul ini di panel LombokMedia > BuiltIn Moduls > Partners',
		),

		array(
			'type'    => 'heading',
			'content' => 'About: Commitment',
		),
		array(
			'id'          => 'ab_commitment_title',
			'type'        => 'text',
			'title'       => 'Judul-nya',
			'default'	  => 'Our Commitment',
			'desc'	  => 'Ex: Our Commitment',
		),
		array(
			'id'    => 'ab_commitment_img',
			'type'    => 'upload',
			'library' => 'image',
			'default' => get_template_directory_uri().'/img/about-commitment.png',
			'preview' => true,
			'preview_width' => 100,
			'preview_height' => 50,
			'title' => 'Gambar-nya',
			'desc'  => 'Rek ukuran misalnya: 600x500 pixel',
		),
		array(
			'type'    => 'subheading',
			'content' => 'Commitment Counters',
		),
		array(
			'id'          => 'ab_counter1_title',
			'type'        => 'text',
			'title'       => 'Judul Kolom 1',
			'default'	  => '1 Billions',
			'desc'	  => 'Ex: 1 Billions',
		),
		array(
			'id'          => 'ab_counter1_subtitle',
			'type'        => 'text',
			'title'       => 'SubJudul Kolom 1',
			'default'	  => 'Views',
			'desc'	  => 'Ex: Views',
		),
		array(
			'type'    => 'subheading',
			'content' => 'About: Counter 2',
		),
		array(
			'id'          => 'ab_counter2_title',
			'type'        => 'text',
			'title'       => 'Judul Kolom 2',
			'default'	  => '12K',
			'desc'	  => 'Ex: 12K',
		),
		array(
			'id'          => 'ab_counter2_subtitle',
			'type'        => 'text',
			'title'       => 'SubJudul Kolom 2',
			'default'	  => 'Creative Talents',
			'desc'	  => 'Ex: Creative Talents',
		),
		array(
			'type'    => 'subheading',
			'content' => 'About: Counter 3',
		),
		array(
			'id'          => 'ab_counter3_title',
			'type'        => 'text',
			'title'       => 'Judul Kolom 3',
			'default'	  => '55',
			'desc'	  => 'Ex: 55',
		),
		array(
			'id'          => 'ab_counter3_subtitle',
			'type'        => 'text',
			'title'       => 'SubJudul Kolom 3',
			'default'	  => 'Collaborations',
			'desc'	  => 'Ex: Collaborations',
		),		
		
		array(
			'type'    => 'heading',
			'content' => 'About: Founder',
		),
		array(
			'id'          => 'ab_founder_title',
			'type'        => 'text',
			'title'       => 'Judul Halaman',
			'default'	  => 'Meet John Doe <br>& Jane Doe',
			'desc'	  => 'Ex: Meet John Doe <br>& Jane Doe',
		),
		array(
			'id'    => 'ab_founder_img',
			'type'  => 'upload',
			'library' => 'image',
			'preview' => true,
			'preview_width' => 60,
			'preview_height' => 80,
			'default' => get_template_directory_uri().'/img/about-founder.png',
			'desc'  => 'Rek ukuran 600x571px',
			'title' => 'Foto founder-nya',
		),
		array(
			'id'          => 'ab_founder_desc',
			'type'        => 'textarea',
			'title'       => 'Deskripsi Halaman',
			'default'	  => 'Starting as a manager-talent duo, they are ready to help you boost your brand globally through the most talented talents in FYP Media',
			'desc'	  => 'Ex: Starting as a manager-talent duo, they are ready to help you boost your brand globally through the most talented talents in FYP Media',
		),
		array(
			'id'          => 'ab_founder_btn_label',
			'type'        => 'text',
			'title'       => 'Tombol: Label',
			'default'	  => 'Contact Us',
			'desc'	  => 'Ex: Contact Us',
		),
		array(
			'id'          => 'ab_founder_btn_link',
			'type'        => 'text',
			'title'       => 'Tombol: Link',
			'default'	  => '#',
			'desc'	  => 'Ex: <i>'.home_url('/contact/').'</i>',
		),
		
		array(
			'type'    => 'heading',
			'content' => 'About:Team',
		),
		array(
			'type'    => 'content',
			'content' => 'Tambahkan di Teams > Add New',
		),
		array(
			'id'          => 'ab_team_aktif',
			'type'        => 'switcher',
			'title'       => 'Aktifkan Modul Ini?',
		),

    ) //end of fields
  ) ); //end of section


  // Create a sub-tab/section
  CSF::createSection( $prefix, array(
    'parent' => $panel,
    'title'  => 'Template: About Papyrus',
	'description' => 'Pengaturan halaman About Papyrus',
    'fields' => array(
		
		array(
			'type'    => 'content',
			'content' => 'Pastikan halaman ybs menggunakan template <b>LMD About Papyrus</b>',
		),

		array(
			'id'    => 'pap_welcome_img',
			'type'  => 'upload',
			'library' => 'image',
			'preview' => true,
			'preview_width' => 60,
			'preview_height' => 80,
			'default' => get_template_directory_uri().'/img/papyrus-welcome-img.jpg',
			'desc'  => 'Foto welcome-nya, rek ukuran 1512x720 pixel',
			'title' => 'Foto welcome-nya',
		),
		array(
			'type'    => 'subheading',
			'content' => 'Bagian About',
		),
		array(
			'id'          => 'pap_about_title',
			'type'        => 'text',
			'title'       => 'Judul Halaman/About',
			'default'	  => 'Papyrus',
			'desc'	  => 'Ex: Papyrus',
		),
		array(
			'id'          => 'pap_about_desc',
			'type'        => 'textarea',
			'title'       => 'Deskripsi Halaman/About',
			'default'	  => 'Selamat datang di Papyrus Corp! Kami adalah tim profesional yang berdedikasi untuk membantu Anda menciptakan berita yang informatif, menarik, dan berkualitas tinggi baik dalam jasa pembuatan website, artikel dan berita maupun penulisan buku. Dengan pengalaman dalam industri jurnalistik dan komitmen terhadap standar tertinggi, kami siap membantu Anda mengomunikasikan cerita Anda kepada dunia.',
			'desc'	  => 'Ex: Selamat datang di Papyrus Corp! Kami adalah tim profesional yang berdedikasi untuk membantu Anda menciptakan berita yang informatif, menarik, dan berkualitas tinggi baik dalam jasa pembuatan website, artikel dan berita maupun penulisan buku. Dengan pengalaman dalam industri jurnalistik dan komitmen terhadap standar tertinggi, kami siap membantu Anda mengomunikasikan cerita Anda kepada dunia.',
		),
		array(
			'id'    => 'pap_about_logo',
			'type'  => 'upload',
			'library' => 'image',
			'preview' => true,
			'preview_width' => 60,
			'preview_height' => 80,
			'default' => get_template_directory_uri().'/img/papyrus-logo.png',
			'desc'  => 'Rek ukuran 336x100px',
			'title' => 'Logo about-nya',
		),
		array(
			'id'          => 'pap_about_contact',
			'type'        => 'text',
			'title'       => 'Teks kontak=nya',
			'default'	  => 'Let\'s Collaborate',
			'desc'	  => 'Ex: Let\'s Collaborate',
		),
		array(
			'id'          => 'pap_about_email',
			'type'        => 'text',
			'title'       => 'Email kontak-nya',
			'desc'	  => 'Ex: emailku@gmail.com',
		),
		array(
			'id'          => 'pap_about_phone',
			'type'        => 'text',
			'title'       => 'Telp kontak-nya',
			'desc'	  => 'Ex: +62 812 3456 7890',
		),

    ) //end of fields
  ) ); //end of section

  
  // Create a sub-tab/section
  CSF::createSection( $prefix, array(
    'parent' => $panel,
    'title'  => 'Template: About Helios',
	'description' => 'Pengaturan halaman About Helios',
    'fields' => array(
		
		array(
			'type'    => 'content',
			'content' => 'Pastikan halaman ybs menggunakan template <b>LMD About Helios</b>',
		),

		array(
			'id'    => 'hel_welcome_img',
			'type'  => 'upload',
			'library' => 'image',
			'preview' => true,
			'preview_width' => 60,
			'preview_height' => 80,
			'default' => get_template_directory_uri().'/img/helios-welcome-img.jpg',
			'desc'  => 'Foto welcome-nya, rek ukuran 1512x720 pixel',
			'title' => 'Foto welcome-nya',
		),
		array(
			'type'    => 'subheading',
			'content' => 'Bagian About',
		),
		array(
			'id'          => 'hel_about_title',
			'type'        => 'text',
			'title'       => 'Judul Halaman/About',
			'default'	  => 'Helios',
			'desc'	  => 'Ex: Helios',
		),
		array(
			'id'          => 'hel_about_desc',
			'type'        => 'textarea',
			'title'       => 'Deskripsi Halaman/About',
			'default'	  => 'Selamat datang di Helios Network/Motion! Kami adalah studio kreatif yang menghidupkan ide-ide Anda melalui desain video dan animasi yang dinamis. Dengan fokus pada kualitas visual dan narasi yang kuat, kami siap membantu Anda menciptakan konten yang menarik dan mengesankan. ',
			'desc'	  => 'Ex: Selamat datang di Helios Network/Motion! Kami adalah studio kreatif yang menghidupkan ide-ide Anda melalui desain video dan animasi yang dinamis. Dengan fokus pada kualitas visual dan narasi yang kuat, kami siap membantu Anda menciptakan konten yang menarik dan mengesankan. ',
		),
		
		array(
			'type'    => 'subheading',
			'content' => 'Bagian Portfolio',
		),
		array(
			'id'          => 'hel_gallery',
			'type'        => 'gallery',
			'title'       => 'Portfolios',
			'desc'	  => 'Upload gambar portfolio dengan ukuran tinggi seragam. Rek ukuran 600x335px',
		),
		
		array(
			'type'    => 'subheading',
			'content' => 'Bagian Contact',
		),
		array(
			'id'    => 'hel_contact_img',
			'type'  => 'upload',
			'library' => 'image',
			'preview' => true,
			'preview_width' => 60,
			'preview_height' => 80,
			'desc'  => 'Gambar latar kontak, Rek ukuran 1512x720 pixel',
			'title' => 'Gambar Latar-nya (optional)',
		),
		array(
			'id'    => 'hel_about_logo',
			'type'  => 'upload',
			'library' => 'image',
			'preview' => true,
			'preview_width' => 60,
			'preview_height' => 80,
			'default' => get_template_directory_uri().'/img/helios-logo.png',
			'desc'  => 'Rek ukuran 336x100px',
			'title' => 'Logo about-nya',
		),
		array(
			'id'          => 'hel_about_contact',
			'type'        => 'text',
			'title'       => 'Teks kontak=nya',
			'default'	  => 'Let\'s Collaborate',
			'desc'	  => 'Ex: Let\'s Collaborate',
		),
		array(
			'id'          => 'hel_about_email',
			'type'        => 'text',
			'title'       => 'Email kontak-nya',
			'desc'	  => 'Ex: emailku@gmail.com',
		),
		array(
			'id'          => 'hel_about_phone',
			'type'        => 'text',
			'title'       => 'Telp kontak-nya',
			'desc'	  => 'Ex: +62 812 3456 7890',
		),
		

    ) //end of fields
  ) ); //end of section
  
  
  
  
  
  // Create a sub-tab/section
  CSF::createSection( $prefix, array(
    'parent' => $panel,
    'title'  => 'Template: Fyp Agency',
	'description' => 'Pengaturan halaman Fyp Agency',
    'fields' => array(
		
		array(
			'type'    => 'content',
			'content' => 'Pastikan halaman ybs menggunakan template <b>LMD Fyp Agency</b>',
		),

		array(
			'id'    => 'ag_welcome_img',
			'type'  => 'upload',
			'library' => 'image',
			'preview' => true,
			'preview_width' => 40,
			'preview_height' => 60,
			'default' => get_template_directory_uri().'/img/agency.jpg',
			'desc'  => 'Foto welcome-nya, rek ukuran 353x40px',
			// 353x40 768x355
			'title' => 'Foto welcome-nya',
		),
		array(
			'type'    => 'subheading',
			'content' => 'Bagian About',
		),
		array(
			'id'          => 'ag_about_title',
			'type'        => 'text',
			'title'       => 'Judul Halaman/About',
			'default'	  => 'Fyp Agency',
			'desc'	  => 'Ex: Fyp Agency',
		),
		array(
			'id'          => 'ag_about_desc',
			'type'        => 'textarea',
			'title'       => 'Deskripsi Halaman/About',
			'default'	  => 'Ingin mengembangkan bisnis Anda di dunia digital dengan cara yang efektif? FYP Agency hadir untuk membantu! Kami menawarkan layanan digital marketing khusus untuk memenuhi kebutuhan bisnis Anda.',
			'desc'	  => 'Ex: Ingin mengembangkan bisnis Anda di dunia digital dengan cara yang efektif? FYP Agency hadir untuk membantu! Kami menawarkan layanan digital marketing khusus untuk memenuhi kebutuhan bisnis Anda.',
		),
		array(
			'id'    => 'ag_about_logo',
			'type'  => 'upload',
			'library' => 'image',
			'preview' => true,
			'preview_width' => 60,
			'preview_height' => 120,
			'default' => get_template_directory_uri().'/img/agency2.png',
			'desc'  => 'Rek ukuran 336x100px',
            //'desc'  => 'Rek ukuran 1512x720 pixel',
			'title' => 'Logo about-nya',
		),
		array(
			'id'          => 'ag_about_contact',
			'type'        => 'text',
			'title'       => 'Teks kontak=nya',
			'default'	  => 'Hubungi Kami',
			'desc'	  => 'Ex: Let\'s Collaborate',
		),
		array(
			'id'          => 'ag_about_email',
			'type'        => 'text',
			'title'       => 'Email kontak-nya',
			'desc'	  => 'Ex: info@fypmedia.com',
		),
		array(
			'id'          => 'ag_about_phone',
			'type'        => 'text',
			'title'       => '+62 812 3456 7890',
			'desc'	  => 'Ex: +62 812 3456 7890',
		),

    ) //end of fields
  ) ); //end of section
  
  
  
  
  // Create a sub-tab/section
  CSF::createSection( $prefix, array(
    'parent' => $panel,
    'title'  => 'Template: Fyp Management',
	'description' => 'Pengaturan halaman Fyp Management',
    'fields' => array(
		
		array(
			'type'    => 'content',
			'content' => 'Pastikan halaman ybs menggunakan template <b>LMD Fyp Management</b>',
		),

		array(
			'id'    => 'man_welcome_img',
			'type'  => 'upload',
			'library' => 'image',
			'preview' => true,
			'preview_width' => 40,
			'preview_height' => 60,
			'default' => get_template_directory_uri().'/img/fypman.jpeg',
			'desc'  => 'Foto welcome-nya, rek ukuran 353x40px',
			// 353x40 768x355
			'title' => 'Foto welcome-nya',
		),
		array(
			'type'    => 'subheading',
			'content' => 'Bagian About',
		),
		array(
			'id'          => 'man_about_title',
			'type'        => 'text',
			'title'       => 'Judul Halaman/About',
			'default'	  => 'Fyp Management',
			'desc'	      => 'Ex: Fyp Management',
		),
		array(
			'id'          => 'man_about_desc',
			'type'        => 'textarea',
			'title'       => 'Deskripsi Halaman/About',
			'default'	  => 'Ingin mengembangkan bisnis Anda di dunia digital dengan cara yang efektif? FYP Agency hadir untuk membantu! Kami menawarkan layanan digital marketing khusus untuk memenuhi kebutuhan bisnis Anda.',
			'desc'	  => 'Ex: Ingin mengembangkan bisnis Anda di dunia digital dengan cara yang efektif? FYP Agency hadir untuk membantu! Kami menawarkan layanan digital marketing khusus untuk memenuhi kebutuhan bisnis Anda.',
		),
		array(
			'id'    => 'man_about_logo',
			'type'  => 'upload',
			'library' => 'image',
			'preview' => true,
			'preview_width' => 60,
			'preview_height' => 120,
			'default' => get_template_directory_uri().'/img/agency2.png',
			'desc'  => 'Rek ukuran 336x100px',
            //'desc'  => 'Rek ukuran 1512x720 pixel',
			'title' => 'Logo about-nya',
		),
		array(
			'id'          => 'man_about_contact',
			'type'        => 'text',
			'title'       => 'Teks kontak=nya',
			'default'	  => 'Hubungi Kami',
			'desc'	  => 'Ex: Let\'s Collaborate',
		),
		array(
			'id'          => 'man_about_email',
			'type'        => 'text',
			'title'       => 'Email kontak-nya',
			'desc'	  => 'Ex: emailku@gmail.com',
		),
		array(
			'id'          => 'man_about_phone',
			'type'        => 'text',
			'title'       => 'Telp kontak-nya',
			'desc'	  => 'Ex: +62 812 3456 7890',
		),

    ) //end of fields
  ) ); //end of section
  
  
  
  
  
  
  
   // Create a sub-tab/section
  CSF::createSection( $prefix, array(
    'parent' => $panel,
    'title'  => 'Template: Fyp Mandala',
	'description' => 'Pengaturan halaman Fyp Mandala',
    'fields' => array(
		
		array(
			'type'    => 'content',
			'content' => 'Pastikan halaman ybs menggunakan template <b>LMD Fyp Mandala</b>',
		),

		array(
			'id'    => 'man_welcome_img',
			'type'  => 'upload',
			'library' => 'image',
			'preview' => true,
			'preview_width' => 40,
			'preview_height' => 60,
			'default' => get_template_directory_uri().'/img/agency.jpg',
			'desc'  => 'Foto welcome-nya, rek ukuran 353x40px',
			// 353x40 768x355
			'title' => 'Foto welcome-nya',
		),
		array(
			'type'    => 'subheading',
			'content' => 'Bagian About',
		),
		array(
			'id'          => 'man_about_title',
			'type'        => 'text',
			'title'       => 'Judul Halaman/About',
			'default'	  => 'Fyp Mandala',
			'desc'	  => 'Ex: Fyp Mandala',
		),
		array(
			'id'          => 'man_about_desc',
			'type'        => 'textarea',
			'title'       => 'Deskripsi Halaman/About',
			'default'	  => 'Ingin mengembangkan bisnis Anda di dunia digital dengan cara yang efektif? FYP Agency hadir untuk membantu! Kami menawarkan layanan digital marketing khusus untuk memenuhi kebutuhan bisnis Anda.',
			'desc'	  => 'Ex: Ingin mengembangkan bisnis Anda di dunia digital dengan cara yang efektif? FYP Agency hadir untuk membantu! Kami menawarkan layanan digital marketing khusus untuk memenuhi kebutuhan bisnis Anda.',
		),
		array(
			'id'    => 'Mandala_about_logo',
			'type'  => 'upload',
			'library' => 'image',
			'preview' => true,
			'preview_width' => 60,
			'preview_height' => 120,
			'default' => get_template_directory_uri().'/img/agency2.png',
			'desc'  => 'Rek ukuran 336x100px',
            //'desc'  => 'Rek ukuran 1512x720 pixel',
			'title' => 'Logo about-nya',
		),
		array(
			'id'          => 'Man_about_contact',
			'type'        => 'text',
			'title'       => 'Teks kontak=nya',
			'default'	  => 'Hubungi Kami',
			'desc'	  => 'Ex: Let\'s Collaborate',
		),
		array(
			'id'          => 'Man_about_email',
			'type'        => 'text',
			'title'       => 'Email kontak-nya',
			'desc'	  => 'Ex: info@fypmedia.com',
		),
		array(
			'id'          => 'Man_about_phone',
			'type'        => 'text',
			'title'       => '+62 812 3456 7890',
			'desc'	  => 'Ex: +62 812 3456 7890',
		),

    ) //end of fields
  ) ); //end of section
  
  
  
  
  
  
  
  
  
  
  
  
  


  // Create a sub-tab/section
  CSF::createSection( $prefix, array(
    'parent' => $panel,
    'title'  => 'Template: Contact',
	'description' => 'Pengaturan halaman contact',
    'fields' => array(
		
		array(
			'type'    => 'content',
			'content' => 'Pastikan halaman ybs menggunakan template <b>LMD Contact</b>',
		),

		array(
			'id'          => 'co_title',
			'type'        => 'text',
			'title'       => 'Judul Halaman',
			'default'	  => 'Drop Us a Message',
			'desc'	  => 'Ex: Drop Us a Message',
		),
		array(
			'id'          => 'co_subtitle',
			'type'        => 'text',
			'title'       => 'Sub Judul',
			'default'	  => 'Whether you have a question about talents, pricing, portfolio, or anything else, our team is ready to answer all your queries.',
			'desc'	  => 'Ex: Whether you have a question about talents, pricing, portfolio, or anything else, our team is ready to answer all your queries.',
		),
		array(
			'id'          => 'co_cf7',
			'type'        => 'text',
			'title'       => 'Contact Form Shortcode',
			'desc'	  => 'Copas shortcode dari plugin Contact Form 7. Ex: <i>[contact-form-7 id="515" title="Contact form 1"]</i>. <br>Untuk kodenya lihat di <a href="'.get_template_directory_uri().'/NOTES.txt" target="_blank">NOTES.txt</a>',
		),
		array(
			'id'          => 'co_gmap',
			'type'        => 'textarea',
			'title'       => 'Google Map',
			'desc'	  => 'Kosongkan jika tidak digunakan. Copas kode embed/iframe dari google map, <b>Share > Embed a Map</b> dan rubah lebarnya menjadi 100%, tinggi-nya sesuai selera. <br>Lihat contoh: <i>&lt;iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945.30858903892!2d116.0739017!3d-8.566297000000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcdc045a5555555%3A0x4541ac3b2713cbf7!2sLombok%20Media%20Web%20Desain!5e0!3m2!1sen!2sid!4v1693038871044!5m2!1sen!2sid" <b>width="100%"</b> height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"&gt;&lt;/iframe&gt;</i>',
		),

    ) //end of fields
  ) ); //end of section


  // Create a sub-tab/section
  CSF::createSection( $prefix, array(
    'parent' => $panel,
    'title'  => 'Talents',
	'description' => 'Pengaturan talents',
    'fields' => array(
		
		array(
			'type'    => 'content',
			'content' => 'Halaman arsip talent/talent list diakses melalui <i>'.home_url('/talent/').'</i>. <br>Jumlah posts per halaman diatur global di Settings > Reading',
		),

		array(
			'id'          => 'ta_title',
			'type'        => 'text',
			'title'       => 'Judul Halaman',
			'default'	  => 'Our talents (2024)',
			'desc'	  => 'Ex: Our talents (2024)',
		),
		array(
			'id'          => 'ta_desc',
			'type'        => 'textarea',
			'title'       => 'Deskripsi Halaman',
			'default'	  => 'Whether you have a question about talents, pricing, portfolio, or anything else, our team is ready to answer all your queries.',
			'desc'	  => 'Ex: Whether you have a question about talents, pricing, portfolio, or anything else, our team is ready to answer all your queries.',
		),

    ) //end of fields
  ) ); //end of section
 

 // Create a sub-tab/section
  CSF::createSection( $prefix, array(
    'parent' => $panel,
    'title'  => 'Careers',
	'description' => 'Pengaturan careers',
    'fields' => array(
		
		array(
			'type'    => 'content',
			'content' => 'Halaman/arsip career diakses melalui <i>'.home_url('/career/').'</i>. <br>Jumlah posts per halaman diatur global di Settings > Reading',
		),

		array(
			'id'          => 'ca_title',
			'type'        => 'text',
			'title'       => 'Judul Halaman',
			'default'	  => 'Place to Grow Your Skill',
			'desc'	  => 'Ex: Place to Grow Your Skill',
		),
		array(
			'id'          => 'ca_desc',
			'type'        => 'textarea',
			'title'       => 'Deskripsi Halaman',
			'default'	  => 'Start finding your purpose with us. See our latest vacancies below.',
			'desc'	  => 'Ex: Start finding your purpose with us. See our latest vacancies below.',
		),
		
		array(
			'type'    => 'heading',
			'content' => 'Team',
		),
		array(
			'type'    => 'content',
			'content' => 'Tambahkan di Teams > Add New',
		),
		array(
			'id'          => 'ca_team_aktif',
			'type'        => 'switcher',
			'title'       => 'Aktifkan Modul Ini?',
		),

    ) //end of fields
  ) ); //end of section


  // Create a sub-tab
  CSF::createSection( $prefix, array(
    'parent' => $panel, // The slug id of the parent section
    'title'  => 'Builtin Moduls',
	'description' => 'Pengaturan untuk modul bawaan',
    'fields' => array(
		array(
			'type'    => 'heading',
			'content' => 'Social Sharing',
		),
		array(
			'type'    => 'content',
			'content' => 'Modul ini harus diaktifkan dulu pluginnya. Bebas memilih plugin apapun, asalkan memiliki shortcode yg bisa di copas dibawah ini.',
		),
		array(
			'id'          => 'social_share',
			'type'        => 'text',
			'title'       => 'Social Share Shortcode',
			'desc'	  => 'Copas shortcode dari plugin, Misalnya: <i><b>[addtoany]</b></i> dari plugin AddToAny - https://wordpress.org/plugins/add-to-any/. Hilangkan juga centang dari semua Placement di Settings > AddToAny',
		),
		
		array(
			'type'    => 'heading',
			'content' => 'Partners',
		),
		array(
			'type'    => 'content',
			'content' => 'Modul ini bisa diaktifkan di halaman Homepage dan About FYP Media',
		),
		array(
			'id'          => 'ab_partner_title',
			'type'        => 'text',
			'title'       => 'Judul Partners',
			'default'	  => 'Trusted By',
			'desc'	  => 'Ex: Trusted By',
		),
		array(
			'id'          => 'ab_partner_gallery',
			'type'        => 'gallery',
			'title'       => 'Partners Images',
			'desc'	  => 'Upload logo partner dengan ukuran tinggi seragam. Rek ukuran 200x60',
		),
		array(
			'id'          => 'ab_partner_gallery2',
			'type'        => 'gallery',
			'title'       => 'Partners Images 2',
			'desc'	  => 'Upload logo partner dengan ukuran tinggi seragam. Rek ukuran 200x60',
		),
	
		array(
			'type'    => 'heading',
			'content' => 'Collaboration',
		),

		array(
			'id'    => 'collab_title',
			'type'  => 'text',
			'title' => 'Judul kolaborasi',
			'default' => 'Send us an email, <br>Discuss a new project.',
			'desc'  => 'Ex: Send us an email, <br>Discuss a new project.',
		),		
		array(
			'id'    => 'collab_subtitle',
			'type'  => 'text',
			'title' => 'Sub Judul kolaborasi',
			'default' => 'LET\'S COLLABORATE',
			'desc'  => 'Ex: LET\'S COLLABORATE',
		),
		array(
			'id'    => 'collab_desc',
			'type'  => 'text',
			'title' => 'Link kolaborasi',
			'default' => 'Let\'s collaborate! Hire our team to speak at your event, advertise on our platforms, or appear on our show - any way you slice it, we\'d love to work with you.',
			'desc'  => 'Ex: Let\'s collaborate! Hire our team to speak at your event, advertise on our platforms, or appear on our show - any way you slice it, we\'d love to work with you.',
		),
		array(
			'id'    => 'collab_label',
			'type'  => 'text',
			'title' => 'Label Tombol kolaborasi',
			'default' => 'Contact Us',
			'desc'  => 'Ex: Contact Us',
		),
		array(
			'id'    => 'collab_link',
			'type'  => 'text',
			'title' => 'Link kolaborasi',
			'default' => '#',
			'desc'  => 'Link untuk modul collaboration (di atas footer). Ex: <i>'.home_url('/contact/').'</i>',
		),

    ) //end of fields
  ) ); //end of section


  // Create a sub-tab/section
  CSF::createSection( $prefix, array(
    'parent' => $panel,
    'title'  => 'Archives',
	'description' => 'Pengaturan Arsip',
    'fields' => array(
		
		array(
			'id'          => 'blog_layout',
			'type'        => 'select',
			'title'       => 'Jenis Layout',
			'placeholder' => 'Pilih jenis-nya',
			'options'     => array('full'=>'Full Width', 'sidebar'=>'2 Kolom Sidebar'),
			'default'	  => 'full',
		),
			
		array(
			'type'    => 'heading',
			'content' => 'Excerpts',
		),
		
		array(
			'id'          => 'blog_thumbnail',
			'type'        => 'radio',
			'title'       => 'Tampilkan Thumbnail',
			'options'     => array('ya'=>'Tampil', 'tidak'=>'Sembunyi'),
			'default'	  => 'ya',
			'inline'	  => true,
		),
		array(
			'id'          => 'blog_excerpt',
			'type'        => 'radio',
			'title'       => 'Tampilkan Excerpt',
			'options'     => array('ya'=>'Tampil', 'tidak'=>'Sembunyi'),
			'default'	  => 'tidak',
			'inline'	  => true,
		),
		array(
			'id'          => 'excerpt_count',
			'type'        => 'number',
			'after'		  => 'kata',
			'title'       => 'Jumlah Excerpt (Kata)',
			'default'	  => 20,
		),
		array(
			'id'          => 'blog_meta',
			'type'        => 'radio',
			'title'       => 'Tampilkan Post Meta',
			'options'     => array('ya'=>'Tampil', 'tidak'=>'Sembunyi'),
			'default'	  => 'ya',
			'inline'	  => true,
		),
		array(
			'id'          => 'blog_meta_category',
			'type'        => 'radio',
			'title'       => 'Tampilkan Category',
			'options'     => array('ya'=>'Tampil', 'tidak'=>'Sembunyi'),
			'default'	  => 'ya',
			'inline'	  => true,
		),
		array(
			'id'          => 'blog_meta_author',
			'type'        => 'radio',
			'title'       => 'Tampilkan Author',
			'options'     => array('ya'=>'Tampil', 'tidak'=>'Sembunyi'),
			'default'	  => 'ya',
			'inline'	  => true,
		),
		array(
			'id'          => 'blog_meta_date',
			'type'        => 'radio',
			'title'       => 'Tampilkan Tanggal',
			'options'     => array('ya'=>'Tampil', 'tidak'=>'Sembunyi'),
			'default'	  => 'ya',
			'inline'	  => true,
		),

	) //end of fields
  ) ); //end of section


	// Create a sub-tab/section
  CSF::createSection( $prefix, array(
    'parent' => $panel,
    'title'  => 'Page/Halaman',
	'description' => 'Pengaturan page/halaman',
    'fields' => array(

		array(
			'id'          => 'page_layout',
			'type'        => 'select',
			'title'       => 'Jenis Layout',
			'placeholder' => 'Pilih jenis-nya',
			'options'     => array('full'=>'Full Width', 'sidebar'=>'2 Kolom Sidebar'),
			'default'	  => 'full',
		),

    ) //end of fields
  ) ); //end of section


	// Create a sub-tab/section
  CSF::createSection( $prefix, array(
    'parent' => $panel,
    'title'  => 'Single Post',
	'description' => 'Pengaturan single post',
    'fields' => array(

		array(
			'id'          => 'single_layout',
			'type'        => 'select',
			'title'       => 'Jenis Layout',
			'placeholder' => 'Pilih jenis-nya',
			'options'     => array('full'=>'Full Width', 'sidebar'=>'2 Kolom Sidebar'),
			'default'	  => 'full',
		),

		array(
			'id'          => 'single_thumbnail',
			'type'        => 'radio',
			'title'       => 'Tampilkan Thumbnail',
			'options'     => array('ya'=>'Tampil', 'tidak'=>'Sembunyi'),
			'default'	  => 'ya',
			'inline'	  => true,
		),
		array(
			'id'          => 'single_meta',
			'type'        => 'radio',
			'title'       => 'Tampilkan Single Post Meta',
			'options'     => array('ya'=>'Tampil', 'tidak'=>'Sembunyi'),
			'default'	  => 'tidak',
			'inline'	  => true,
		),
		array(
			'id'          => 'sharetop',
			'type'        => 'radio',
			'title'       => 'Tampilkan Share (Top)',
			'options'     => array('ya'=>'Tampil', 'tidak'=>'Sembunyi'),
			'default'	  => 'tidak',
			'inline'	  => true,
		),
		array(
			'id'          => 'sharebot',
			'type'        => 'radio',
			'title'       => 'Tampilkan Share (Bottom)',
			'options'     => array('ya'=>'Tampil', 'tidak'=>'Sembunyi'),
			'default'	  => 'ya',
			'inline'	  => true,
		),
		array(
			'type'    => 'heading',
			'content' => 'Related Posts',
		),
		array(
			'id'          => 'related',
			'type'        => 'radio',
			'title'       => 'Tampilkan Related Posts',
			'options'     => array('ya'=>'Tampil', 'tidak'=>'Sembunyi'),
			'default'	  => 'ya',
			'inline'	  => true,
		),
		array(
			'id'          => 'related_title',
			'type'        => 'text',
			'title'       => 'Judul Related Posts',
			'default'	  => 'Related Posts',
		),
		array(
			'type'    => 'heading',
			'content' => 'Komentar',
		),
		array(
			'id'          => 'komentar',
			'type'        => 'radio',
			'title'       => 'Tampilkan Komentar',
			'options'     => array('ya'=>'Tampil', 'tidak'=>'Sembunyi'),
			'default'	  => 'ya',
			'inline'	  => true,
		),
		array(
			'id'          => 'komentar_type',
			'type'        => 'radio',
			'title'       => 'Jenis Komentar',
			'options'     => array('wp'=>'WordPress', 'fb'=>'Facebook'),
			'default'	  => 'wp',
			'inline'	  => true,
		),
		array(
			'id'          => 'fb_id',
			'type'        => 'text',
			'title'       => 'FB App ID',
			'default'	  => '246505639864458',
			'dependency'  => array( 'komentar_type', '==', 'fb' ),
			'desc' => 'Dapatkan disini. https://developers.facebook.com/docs/plugins/comments/',
		),
		array(
			'id'          => 'fb_comm_count',
			'type'        => 'number',
			'title'       => 'Jumlah Komentar',
			'default'	  => 5,
			'dependency' => array( 'komentar_type', '==', 'fb' ),
		),

    ) //end of fields
  ) ); //end of section


	  // Create a sub-tab/section
	CSF::createSection( $prefix, array(
		'parent' => $panel,
		'title'  => 'Backup & Import',
		'description' => 'Export - Import customizer settings',
		'fields' => array(
			array(
			  'type' => 'backup',
		),

		) //end of fields
	) ); //end of section
	

}