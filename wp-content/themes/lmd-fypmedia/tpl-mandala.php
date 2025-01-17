<?php
/*
Template Name: LMD FYP MANDALA
*/
get_header(); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap"
      rel="stylesheet"
    />
  </head>
    
    
    <style>
      /* Reset and Base Styles */
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        font-family: "Poppins", sans-serif;
        background-color: #08090f;
        color: #e7e7e9;
        overflow-x: hidden;
        line-height: 1.6;
      }

      .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px 20px;
      }

      /* Main Content Section */
      .main-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 40px;
        margin-bottom: 80px;
      }

      .text-content {
        flex: 1;
      }

      .header {
        display: inline-flex;
        align-items: center;
        border: 1px solid #e7e7e9;
        padding: 5px 15px;
        border-radius: 20px;
        margin-bottom: 20px;
      }

      .header i {
        color: #ffd700;
        margin-right: 8px;
        font-size: 8px;
      }

      .header span {
        font-weight: bold;
        font-size: 12px;
        color: #b0b0b0;
      }

      .text-content h1 {
        font-size: clamp(2rem, 5vw, 3.5rem);
        margin-bottom: 20px;
      }

      .text-content p {
        color: #b0b0b0;
        margin-bottom: 30px;
        max-width: 600px;
      }

      .hero-images {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
      }

      .hero-images img {
        width: 100%;
        max-width: 220px;
        height: 220px;
        border-radius: 20px;
        object-fit: cover;
      }

      /* Brands Section */
      .brands {
        background-color: #0e0f1a;
        padding: 40px 20px;
        border-radius: 20px;
        margin: 80px auto;
        text-align: center;
        max-width: 1200px;
      }

      .brands h2 {
        font-size: 26px;
        margin-bottom: 40px;
      }

      .brand-row {
        display: flex;
        justify-content: center;
        gap: 40px;
        flex-wrap: wrap;
        margin-bottom: 40px;
      }

      .brand-row img {
        height: 50px;
        width: 100px;
        object-fit: contain;
      }

      /* Engaging Section */
      .engaging-section {
        background-color: #0a0a0a;
        padding: 60px 20px;
        border-radius: 20px;
        margin: 50px auto;
        max-width: 1200px;
      }

      .engaging-container {
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
      }

      .engaging-heading {
        font-size: clamp(1.8rem, 4vw, 2.5rem);
        font-weight: bold;
        margin-bottom: 30px;
      }

      .engaging-heading span {
        background: linear-gradient(to right, #a64bf4, #4b8df4);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
      }

      .engaging-subheading {
        font-size: 1.2rem;
        color: #b0b0b0;
        margin-bottom: 40px;
      }

      .engaging-stats {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 50px;
      }

      .engaging-stat {
        font-size: 2.5rem;
        font-weight: bold;
      }

      .engaging-divider {
        height: 50px;
        width: 1px;
        background-color: #4b8df4;
      }

      /* Join Section */
      .join-section {
        background-color: #0a0a0a;
        padding: 60px 20px;
        border-radius: 20px;
        margin: 50px auto;
        max-width: 1200px;
      }

      .join-title {
        font-size: clamp(1.8rem, 4vw, 2.5rem);
        text-align: center;
        margin-bottom: 40px;
      }

      .join-kriteria {
        font-size: 20px;
        text-align: center;
        margin-bottom: 40px;
      }

      .join-highlight {
        background: linear-gradient(90deg, #3e94d2, #9747ff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
      }

      .join-content {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        gap: 40px;
        max-width: 1000px;
        margin: 0 auto;
      }

      .join-images {
        display: flex;
        gap: 20px;
      }

      .join-images img {
        width: 200px;
        height: 350px;
        object-fit: cover;
        border-radius: 20px;
      }

      .criteria-list ol {
        list-style: none;
        counter-reset: item;
      }

      .criteria-list ol li {
        margin-bottom: 15px;
        font-size: 1.2rem;
        display: flex;
        align-items: center;
      }

      .criteria-list ol li::before {
        counter-increment: item;
        content: counter(item);
        color: #000000;
        background-color: #f5a623;
        border-radius: 50%;
        padding: 5px 10px;
        margin-right: 15px;
        font-size: 1rem;
        display: flex;
        justify-content: center;
        align-items: center;
        min-width: 20px;
        height: 30px;
      }

      /* MCN Section */
      .section-mcn {
        background-color: #1a1a2e;
        padding: 60px 20px;
        margin: 50px auto;
        max-width: 1200px;
        border-radius: 16px;
      }

      .header-mcn {
        display: flex;
        align-items: center;
        gap: 40px;
        max-width: 1000px;
        margin: 0 auto;
      }

      .header-mcn img {
        width: 100%;
        max-width: 500px;
        height: auto;
        border-radius: 12px;
        object-fit: cover;
      }

      .text-mcn {
        flex: 1;
      }

      .text-mcn h1 {
        font-size: 1.3rem;
      }

      .text-mcn p {
        margin-top: 20px;
      }

      .badge-mcn {
        display: inline-flex;
        align-items: center;
        background-color: transparent;
        color: #fff;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 14px;
        margin-bottom: 20px;
        gap: 8px;
        border: 1px solid #ffffff;
      }

      .badge-mcn::before {
        content: "";
        width: 8px;
        height: 8px;
        background-color: #ffcc00;
        border-radius: 50%;
        display: inline-block;
      }

      .benefits-mcn {
        max-width: 1200px;
        margin: 60px auto;
        padding: 0 20px;
        text-align: center;
      }

      .benefits-mcn h2 {
        font-size: clamp(1.8rem, 4vw, 2.5rem);
        margin-bottom: 40px;
      }

      .benefits-mcn h2 span {
        background: linear-gradient(90deg, #3e94d2, #9747ff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
      }

      .cards-mcn {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 24px;
        justify-content: center;
      }

      .card-mcn {
        background-color: #141414;
        padding: 24px;
        border-radius: 16px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        height: 100%;
        min-height: 200px;
        position: relative;
        text-align: left;
      }

      .number-mcn {
        font-size: 18px;
        font-weight: bold;
        color: rgba(255, 255, 255, 0.6);
        border: 1px solid #ffffff;
        padding: 5px;
        display: inline-block;
        border-radius: 50%;
        width: 35px;
        height: 35px;
        text-align: center;
        line-height: 25px;
        position: absolute;
        top: 20px;
        left: 20px;
      }

      .card-mcn h3 {
        font-size: 20px;
        margin: 60px 0 12px;
        color: #fff;
      }

      .card-mcn p {
        font-size: 16px;
        color: rgba(255, 255, 255, 0.6);
      }

      /* Consult Section */
      .consult-section {
        background: linear-gradient(to right, #8e2de2, #4a00e0, #00c6ff);
        border-radius: 20px;
        padding: 50px 20px;
        text-align: center;
        max-width: 800px;
        margin: 40px auto;
      }

      .consult-section h1 {
        font-size: clamp(1.5rem, 4vw, 2.5rem);
        margin-bottom: 20px;
      }

      .consult-section p {
        color: rgba(255, 255, 255, 0.7);
        margin-bottom: 30px;
      }

      .button,
      .consult-section button {
        background-color: #ffcc00;
        border: none;
        border-radius: 20px;
        padding: 15px 30px;
        font-size: 1rem;
        color: #000;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
      }

      .button:hover,
      .consult-section button:hover {
        background-color: #e6b800;
        transform: translateY(-2px);
      }

      /* Responsive Design */
      @media (max-width: 1024px) {
        .container {
          padding: 20px;
        }

        .header-mcn {
          flex-direction: column;
          text-align: center;
        }

        .text-mcn {
          text-align: center;
        }

        .cards-mcn {
          grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        }

        .join-content {
          flex-direction: column;
          align-items: center;
        }
      }

      @media (max-width: 768px) {
        .main-content {
          flex-direction: column;
          text-align: center;
        }

        .hero-images {
          grid-template-columns: repeat(2, 1fr);
          max-width: 500px;
          margin: 0 auto;
        }

        .text-content {
          text-align: center;
        }

        /* .engaging-stats {
          flex-direction: column;
        } */

        /* .engaging-divider {
          height: 1px;
          width: 50px;
          margin: 20px 0;
        } */

        .join-images {
          /* flex-direction: column; */
          align-items: center;
        }
      }

      @media (max-width: 480px) {
        .hero-images {
          grid-template-columns: 1fr;
        }

        .brand-row {
          gap: 20px;
        }

        .card-mcn {
          min-height: 180px;
        }

        .text-content h1 {
          font-size: 2rem;
        }

        .join-images img {
          width: 100%;
          max-width: 300px;
        }

        .header-mcn img {
          height: 250px;
        }
      }
    </style>
 
  <body>
    <div class="container">
      <!-- Section 1: Main Content -->
      <div class="main-content">
        <div class="text-content">
          <div class="header">
            <i class="fas fa-circle"></i>
            <span>FYP Mandala</span>
          </div>
          <h1>
            We Help You <br />
            Grow on Social <br />
            Media
          </h1>
          <p>
            FYP Media Mandala berkolaborasi dengan TikTok untuk memberikan
            peluang luar biasa bagi Anda yang ingin menghasilkan hingga ratusan
            juta rupiah per bulan.
          </p>
          <a class="button" href="#">Get in touch</a>
        </div>
        <div class="hero-images">
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/regina.JPG'); ?>" alt="Person 1" />
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/amira.JPG'); ?>" alt="Person 2" />
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/indah.jpeg'); ?>" alt="Person 3" />
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/ambar.JPG'); ?>" alt="Person 4" />
        </div>
      </div>

      <!-- Section 2: Brands -->
      <div class="brands">
        <h2>We Trusted by 100+ Brands</h2>
        <div class="brand-row">
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/honda.png'); ?>" alt="Brand 1" />
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/gojek.png'); ?>" alt="Brand 2" />
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/jnt.png'); ?>" alt="Brand 3" />
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/pegadaian.png'); ?>" alt="Brand 4" />
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/ruangguru.png'); ?>" alt="Brand 5" />
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/bt.png'); ?>" alt="Brand 6" />
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/kapalapi.png'); ?>" alt="Brand 7" />
        </div>
        <div class="brand-row">
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/sejutacita.png'); ?>" alt="Brand 8" />
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/wardah.png'); ?>" alt="Brand 9" />
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/mustikaratu.png'); ?>" alt="Brand 10" />
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/idx.png'); ?>" alt="Brand 11" />
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/sunsilk.png'); ?>" alt="Brand 12" />
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/bri.png'); ?>" alt="Brand 13" />
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/flip.png'); ?>" alt="Brand 14" />
        </div>
      </div>

      <!-- Section 3: Engaging Content -->
      <div class="engaging-section">
        <div class="engaging-container">
          <div class="engaging-heading">
            We are ready to help you develop engaging
            <span>content and increase visibility</span> on the platform.
          </div>
          <div class="engaging-subheading">
            Enhance your personal branding as well as your brand with an
            effective social media strategy. With a professional team in the
            digital field, we optimize content quality to accelerate your
            business growth.
          </div>
          <div class="engaging-stats">
            <div>
              <div class="engaging-stat">5+</div>
              <div class="engaging-stat-description">Years Experience</div>
            </div>
            <div class="engaging-divider"></div>
            <div>
              <div class="engaging-stat">500+</div>
              <div class="engaging-stat-description">Talents have joined</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Section 4: Join Us -->
      <div class="join-section">
        <h1 class="join-title">
          <span class="join-highlight">Bergabunglah</span> dengan kami dan raih
          kesuksesan sebagai kreator di TikTok.
        </h1>
        <div>
          <h2 class="join-kriteria">Kriteria dan Ketentuan:</h2>
        </div>
        <div class="join-content">
          <div class="join-images">
            <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/riyadz.jpg'); ?>" alt="Man in white sweater" />
            <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/vini.jpg'); ?>" alt="Woman in yellow dress" />
          </div>
          <div class="criteria-list">
            <ol>
              <li>Pria dan Wanita</li>
              <li>
                Memiliki akun TikTok dengan <br />
                minimal 2k+ followers
              </li>
              <li>Berusia minimal 18 tahun</li>
              <li>
                Konten yang di buat tidak <br />
                menyinggung unsur SARA
              </li>
              <li>Memiliki keinginan untuk grow</li>
              <li>Semangat membuat konten</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- mcn -->
    <div class="section-mcn">
      <div class="header-mcn">
        <img
          alt="People working in an office"
          height="400"
          src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/Rectangle 17[1].png'); ?>"
          width="600"
        />
        <div class="text-mcn">
          <div class="badge-mcn">FYP Mandala</div>
          <h1>
            Jadilah bagian dari MCN FYP Mandala <br />
            dan bekerja sama dengan ByteDance <br />
            Corporation sebagai Creator Resmi.
          </h1>
          <p>
            Setiap Partner MCN resmi TikTok berfungsi sebagai tim <br />
            pemilik platform, menjalin kemitraan dengan semua <br />
            brand yang ada di TikTok Shop.
          </p>
        </div>
      </div>
    </div>
    <div class="container-mcn">
      <div class="benefits-mcn">
        <h2><span>Keuntungan</span> Gabung MCN FYP Mandala</h2>
        <div class="cards-mcn">
          <div class="card-mcn">
            <div class="number-mcn">01</div>
            <h3>Official Partnership dengan TikTok:</h3>
            <p>Ikuti campaign resmi TikTok</p>
          </div>
          <div class="card-mcn">
            <div class="number-mcn">02</div>
            <h3>Ekstra Komisi:</h3>
            <p>
              4-5% per produk di TikTok Shop dikhususkan untuk Creator MCN Resmi
              TikTok.
            </p>
          </div>
          <div class="card-mcn">
            <div class="number-mcn">03</div>
            <h3>Pendapatan Tambahan:</h3>
            <p>
              Pendapatan bulanan sesuai keaktifan sebagai Creator Resmi dalam
              membuat Content.
            </p>
          </div>
          <div class="card-mcn">
            <div class="number-mcn">04</div>
            <h3>Boosting Ads Tanpa Batas:</h3>
            <p>Menaikkan viewers, pengunjung, dan followers</p>
          </div>
          <div class="card-mcn">
            <div class="number-mcn">05</div>
            <h3>Produk Gratis:</h3>
            <p>Ratusan sample produk sesuai kategori kamu</p>
          </div>
          <div class="card-mcn">
            <div class="number-mcn">06</div>
            <h3>Bantuan Real-Time:</h3>
            <p>Dapatkan dukungan untuk mengatasi pelanggaran</p>
          </div>
          <div class="card-mcn">
            <div class="number-mcn">07</div>
            <h3>Reward Menarik:</h3>
            <p>
              Kesempatan mendapatkan reward dari total pendapatan GMV/NMW
              Creator
            </p>
          </div>
          <div class="card-mcn">
            <div class="number-mcn">08</div>
            <h3>Training & Workshop:</h3>
            <p>
              Akses gratis ke private training setiap 2 bulan dan konsultasi
              mingguan
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- consult section -->
    <div class="consult-section">
      <h1>
        Consult your needs with FYP <br />
        Agency.
      </h1>
      <p>Jangan ragu untuk menghubungi kami dan jadwalkan konsultasi gratis</p>
      <a href="https://wa.me/+6285175123014?text=Hi,%20Saya%20ingin%20bekerjasama%20menjadi%20bagian%20dari%20FYP-Mandala.%20Info%20ini%20saya%20dapatkan%20dari%20website%fypmedia.id" target="_blank">
        <button>Contact US!</button>
    </a>
    </div>
  </body>
</html>

<section class="footer">
    
<?php get_footer(); ?>
</section>