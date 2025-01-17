<?php
/*
Template Name: LMD FYP MANAGEMENT
*/
get_header(); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <title>Creative FYP Management</title>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
      rel="stylesheet"
    />
  </head>
  
<style>
    body {
        margin: 0;
        font-family: "Poppins", sans-serif;
        background-color: #f7f7f7;
      }
      .navbar .menu {
        display: flex;
        align-items: center;
        margin-left: auto;
        flex-wrap: wrap;
        justify-content: space-between;
      }
      .navbar .menu a {
        margin-left: 20px;
        font-size: 16px;
        color: black;
        text-decoration: none;
        display: flex;
        align-items: center;
      }
      .navbar .menu a:hover {
        color: gray;
      }
      .navbar .menu .dropdown {
        position: relative;
        display: inline-block;
      }
      
      
      
      
             /* Footer Section */
            .footer {
              text-align: left;
              background-color:black;
              padding: 40px 0;
            }
            
            .footer h1 {
              font-size: 2.8em;
              margin-bottom: 20px;
            }
            
            .footer p {
              font-size: 0.9em;
              color: #b3b3b3;
              margin-bottom: 20px;
            }

    
      .navbar .menu .dropdown-content {
        margin: 40px 0px;
        border-radius: 20px;
        display: none;
        position: absolute;
        background-color: white;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
      }
      .navbar .menu .dropdown-content a {
        color: black;
        padding: 12px 16px;
        display: block;
      }
      .navbar .menu .dropdown-content a:hover {
        background-color: #f1f1f1;
      }
      .navbar .menu .dropdown:hover .dropdown-content {
        display: block;
      }
      .navbar .menu .dropdown .dropbtn i {
        margin-left: 5px;
        transition: transform 0.3s;
      }
      .navbar .menu .dropdown:hover .dropbtn i {
        transform: rotate(180deg);
      }
      .hamburger {
        display: none;
        flex-direction: column;
        cursor: pointer;
        margin-left: auto;
      }
      .hamburger div {
        width: 25px;
        height: 3px;
        background-color: black;
        margin: 4px 0;
        transition: 0.4s;
      }
      .hamburger.active div:nth-child(1) {
        transform: rotate(-45deg) translate(-5px, 6px);
      }
      .hamburger.active div:nth-child(2) {
        opacity: 0;
      }
      .hamburger.active div:nth-child(3) {
        transform: rotate(45deg) translate(-5px, -6px);
      }
      
      /* hero  */
      .hero {
        text-align: center;
        padding: 60px 20px;
        background-color: #f9f9f9;
      }
      .hero h1 {
        font-size: 58px;
        color: black;
        margin: 0;
      }
      .hero h1 span {
        color: #a553db;
      }
      .hero p {
        font-size: 16px;
        color: #666;
        margin: 40px 60px;
      }
      .hero .cta-container {
        display: flex;
        flex-direction: column;
        align-items: center;
      }
      .hero button {
        background-color: #0b0c0f;
        color: #fff;
        padding: 15px 30px;
        border-radius: 20px;
        border: none;
        font-size: 16px;
        cursor: pointer;
        margin-bottom: 20px;
      }

      .hero button:hover {
        background-color: #333;
      }
      .hero img {
        margin-top: 50px;
        border-radius: 50%;
        border: 5px dashed #ccc;
      }

      /* our partner */
      .partners {
        background-color: rgba(165, 83, 219, 0.4);
        padding: 40px 150px;
        text-align: center;
        overflow: hidden;
        position: relative;
      }

      .partners h2 {
        margin: 0 0 50px;
        color: #0b0c0f;
      }
      .partners .marquee {
        display: flex;
        white-space: nowrap;
        overflow: hidden;
        position: relative;
      }
      .partners .marquee-content {
        display: flex;
        animation: marquee 20s linear infinite;
      }
      .partners .marquee img {
        margin: 0 10px;
      }
      @keyframes marquee {
        0% {
          transform: translateX(0);
        }
        100% {
          transform: translateX(-100%);
        }
      }

      /* KOL */
      .container-KOL {
        padding: 20px;
        display: flex;
        align-items: flex-start;
        max-width: 75%;
        width: 100%;
        margin: 40px auto;
        background: #f7f7f7;
        position: relative;
      }

      .image-container-KOL {
        position: relative;
        width: 302px;
        height: 374px;
        margin-right: 20px;
        margin-left: 40px;
      }

      .image-container-KOL img {
        width: 302px;
        height: 374px;
        border-radius: 20px;
        object-fit: cover;
        position: relative;
        z-index: 1;
      }

      .image-container-KOL::before {
        content: "";
        position: absolute;
        top: -10px;
        left: -10px;
        right: -10px;
        bottom: -10px;
        border: 2px solid transparent;
        border-radius: 25px;
        background: linear-gradient(to bottom right, #a553db, #4cc9f0)
          border-box;
        -webkit-mask: linear-gradient(#fff 0 0) padding-box,
          linear-gradient(#fff 0 0);
        -webkit-mask-composite: destination-out;
        mask-composite: exclude;
        z-index: 0;
      }

      .text-KOL {
        flex: 1;
        padding-left: 20px;
        position: relative;
        min-width: 300px;
      }

      .text-KOL h1 {
        font-size: 28px;
        color: #333333;
        margin: 20px 20px 20px 50px;
        position: relative;
        padding-left: 40px;
      }

      .text-KOL h1::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 5px;
        background: linear-gradient(to bottom, #a553db, #4cc9f0);
      }

      .text-KOL p {
        font-size: 16px;
        color: #666666;
        margin: 20px 20px 20px 10px;
        padding-left: 40px;
      }

      .horizontal-line {
        width: 100%;
        text-align: center;
        border-bottom: 3px solid rgba(165, 83, 219, 0.4);
        line-height: 0.1em;
        margin: 20px 0 20px;
      }
      .horizontal-line span {
        background: #f7f7f7;
        padding: 0 10px;
        color: #999999;
      }

      /* benefit */
      .head-benefit h1 {
        font-size: 48px;
        font-weight: 600;
        text-align: center;
        color:black;
        margin: 80px 0;
        padding: 0 20px;
      }
      .head-benefit h1 span {
        color: #a553db;
      }
      .container-benefit {
        max-width: 650px;
        width: 100%;
        padding: 20px;
        border-radius: 8px;
        margin: auto;
      }
      .benefit {
        display: flex;
        align-items: flex-start;
        margin-bottom: 40px;
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
      }
      .benefit-icon {
        font-size: 24px;
        color: #a553db;
        margin-right: 20px;
        position: relative;
      }
      .benefit-icon::after {
        content: "";
        position: absolute;
        top: 100%;
        left: 50%;
        transform: translateX(-50%);
        width: 2px;
        height: 0;
        background-color: #a553db;
        transition: height 0.6s ease-out;
      }
      .benefit-content {
        flex: 1;
      }
      .benefit-title {
        font-size: 34px;
        font-weight: 600;
        color:black;
        margin: 0 0 10px 0;
      }
      .benefit-subtitle {
        font-size: 14px;
        font-weight: 400;
        color: #cd7f32;
        margin-bottom: 10px;
      }
      .benefit-description {
        font-weight: 300;
        font-size: 16px;
        color: #666666;
      }
      .divider {
        width: 2px;
        height: 100%;
        background-color: #a553db;
        margin-left: 20px;
      }
      .visible {
        opacity: 1;
        transform: translateY(0);
      }
      .visible .benefit-icon::after {
        height: 100px;
      }
      .benefit-number {
        font-size: 34px;
        font-weight: bold;
        color: #a553db;
        min-width: 80px;
        text-align: center;
        margin-right: 20px;
      }
      .benefit-number::before {
        content: "0";
      }
      .benefit-content {
        margin-left: 0;
      }
      @media (max-width: 768px) {
        .benefit-number {
          min-width: 60px;
          font-size: 36px;
        }
      }

      /* grow with us */
      .container-grow-with-us {
        display: flex;
        align-items: center;
        background-color: #f7f7f7;
        padding: 20px;
        border-radius: 8px;
        flex-wrap: wrap;
        max-width: 800px;
        width: 100%;
        margin: auto;
      }
      .left-grow-with-us {
        font-size: 30px;
        font-weight: bold;
        color: #0b0c0f;
        margin-right: 20px;
        flex: 1 1 100%;
      }
      .right-grow-with-us {
        font-size: 16px;
        color: #0b0c0f;
        flex: 1 1 100%;
      }
      .divider-grow-with-us {
        width: 1px;
        height: 100px;
        background-color: #0b0c0f;
        margin: 20px 0;
        flex: 0 0 auto;
      }
      .button-grow-with-us {
        display: inline-block;
        background-color: #0b0c0f;
        color: #fff;
        padding: 10px 20px;
        border-radius: 25px;
        text-decoration: none;
        font-size: 16px;
        margin-top: 20px;
      }
      .button-grow-with-us i {
        margin-left: 10px;
      }
      @media (min-width: 600px) {
        .left-grow-with-us {
          flex: 1 1 45%;
        }
        .right-grow-with-us {
          flex: 1 1 45%;
        }
        .divider-grow-with-us {
          margin: 0 20px;
          display: block;
        }
      }
      @media (max-width: 599px) {
        .left-grow-with-us,
        .right-grow-with-us {
          flex: 1 1 100%;
        }
        .right-grow-with-us {
          margin-top: 20px;
        }
        .divider-grow-with-us {
          display: none;
        }
      }

</style>


<div class="tpl-management">

        
<section class="hero">
      <h1>
        Buat <span>Kebutuhan KOL</span> <br />
        Lebih Mudah
      </h1>
      <p>
        Mau brand kamu dikenal lebih luas dan efektif? Saatnya bekerjasama
        dengan KOL FYP Management. Kami menyediakan fasilitas untuk <br />
        membuat, mengecek, dan membandingkan rate card KOL dengan mudah.
      </p>
      <!--<div class="cta-container">-->
      <!--  <button>Get in Touch</button>-->
      <!--  <div class="circle">-->
      <!--    <img src="<?php echo lmd_get_mod('ag_welcome_img', get_template_directory_uri().'/assets/image/agung.png'); ?>" alt="" width="500" height="500" />-->
      <!--  </div>-->
      <!--</div>-->
    </section>
    
    <section class="partners">
      <h2>Our Partners</h2>
      <div class="marquee">
        <div class="marquee-content">
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/honda.png'); ?>" alt="" width="75" height="32" />
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/gojek.png'); ?>" alt="" width="75" height="32" />
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/pegadaian.png'); ?>" alt="" width="75" height="32" />
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/ruangguru.png'); ?>" alt="" width="75" height="32" />
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/bt.png'); ?>" alt="" width="75" height="32" />
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/kapalapi.png'); ?>" alt="" width="75" height="32" />
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/stockbit.png'); ?>" alt="" width="75" height="32" />
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/vitasma.png'); ?>" alt="" width="75" height="32" />
        </div>
        <div class="marquee-content">
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/sejutacita.png'); ?>" alt="" width="75" height="32" />
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/wardah.png'); ?>" alt="" width="75" height="32" />
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/mustikaratu.png'); ?>" alt="" width="75" height="32" />
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/idx.png'); ?>" alt="" width="75" height="32" />
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/sunsilk.png'); ?>" alt="" width="75" height="32" />
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/bri.png'); ?>" alt="" width="75" height="32" />
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/flip.png'); ?>" alt="" width="75" height="32" />
          <img src="<?php echo lmd_get_mod('man_welcome_img', get_template_directory_uri().'/assets/image/jobstreet.png'); ?>" alt="" width="75" height="32" />
        </div>
      </div>
    </section>

    <section class="container-KOL">
      <div class="image-container-KOL">
        <img src="<?php echo lmd_get_mod('ag_welcome_img', get_template_directory_uri().'/assets/image/regina.JPG'); ?>" alt="" height="374" width="302" />
      </div>
      <div class="text-KOL">
        <h1>
          Sudah coba berbagai cara tapi <br />
          engagement masih gitu-gitu aja? Apa KOL <br />
          marketing udah ga bagus lagi?:
        </h1>
        <p>
          Saatnya upgrade strategi kamu. Gunakan KOL untuk bawa campaign-mu ke
          level selanjutnya
        </p>
        <p>
          FYP Management siap bantu wujudkan impian campaign-mu dengan
          engagement yang meningkat.
        </p>
      </div>
    </section>
    
    
    <!-- benefit for you-->
    <div class="horizontal-line">
      <span>benefit for you</span>
    </div>
    <div class="head-benefit">
      <h1>
        keuntungan <span>Menjadi Official Creator</span> di <br />
        FYP Management
      </h1>
    </div>
    <section class="container-benefit">
      <div class="benefit">
        <i class="fas fa-check-circle benefit-icon"></i>
        <div class="benefit-content">
          <div class="benefit-subtitle">For Creator</div>
          <div class="benefit-title">Pajak Ringan</div>
          <div class="benefit-description">
            Nikmati tarif pajak PPH 21 yang lebih rendah untuk pendapatan
            endorse kamu. Kami akan memberikan contoh perhitungan agar kamu
            paham cara menghitung pajak dengan tepat, sehingga menghindari
            kesalahan dan memaksimalkan penghasilanmu.
          </div>
        </div>
        <div class="divider"></div>
      </div>
      <div class="benefit">
        <i class="fas fa-check-circle benefit-icon"></i>
        <div class="benefit-content">
          <div class="benefit-subtitle">For Creator</div>
          <div class="benefit-title">Pitching Brand</div>
          <div class="benefit-description">
            Nikmati akses audiens yang tepat, bangun kredibilitas, dan miliki konten menarik.
          </div>
        </div>
        <div class="divider"></div>
      </div>
      <div class="benefit">
        <i class="fas fa-check-circle benefit-icon"></i>
        <div class="benefit-content">
          <div class="benefit-subtitle">For Creator</div>
          <div class="benefit-title">Keluarga FYP</div>
          <div class="benefit-description">
            Gabung menjadi bagian dari keluarga FYP yang memperluas visibilitas dan meningkatkan peluang trending.
          </div>
        </div>
        <div class="divider"></div>
      </div>
      <div class="benefit">
        <i class="fas fa-check-circle benefit-icon"></i>
        <div class="benefit-content">
          <div class="benefit-subtitle">For Creator</div>
          <div class="benefit-title">Dukungan Media Sosial</div>
          <div class="benefit-description">
            Nikmati jangkauan creator yang luas, audiens yang interaktif, dan buat peluang kolaborasi yang lebih besar.
          </div>
        </div>
        <div class="divider"></div>
      </div>
      <div class="benefit">
        <i class="fas fa-check-circle benefit-icon"></i>
        <div class="benefit-content">
          <div class="benefit-subtitle">For Creator</div>
          <div class="benefit-title">Desain & Video</div>
          <div class="benefit-description">
            Dapatkan desain dan video yang impactful, kreatif yang semakin meningkatkan eksposur.
          </div>
        </div>
        <div class="divider"></div>
      </div>
      <div class="benefit">
        <i class="fas fa-check-circle benefit-icon"></i>
        <div class="benefit-content">
          <div class="benefit-subtitle">For Creator</div>
          <div class="benefit-title">Komunitas Kolaboratif</div>
          <div class="benefit-description">
            Dapatkan komunitas kolaboratif dengan berbagai ide, dan tumbuh bersama profesional kreatif
          </div>
        </div>
        <div class="divider"></div>
      </div>
      <div class="benefit">
        <i class="fas fa-check-circle benefit-icon"></i>
        <div class="benefit-content">
          <div class="benefit-subtitle">For Creator</div>
          <div class="benefit-title">Tim di 33 Provinsi</div>
          <div class="benefit-description">
            Dapatkan tim di 33 privinsi yang memudahkan akses dan komunikasi yang efisien
          </div>
        </div>
        <div class="divider"></div>
      </div>
      <div class="benefit">
        <i class="fas fa-check-circle benefit-icon"></i>
        <div class="benefit-content">
          <div class="benefit-subtitle">For Creator</div>
          <div class="benefit-title">Perlindungan Hukum</div>
          <div class="benefit-description">
            Dapatkan perlindungan hukum yang jelas, keamanan karya dan perlindungan hak cipta anda.
          </div>
        </div>
        <div class="divider"></div>
      </div>
      <div class="benefit">
        <i class="fas fa-check-circle benefit-icon"></i>
        <div class="benefit-content">
          <div class="benefit-subtitle">For Creator</div>
          <div class="benefit-title">Atmosfer Kekeluargaan</div>
          <div class="benefit-description">
            Nikmati atmosfer kekeluargaan yang mendukung, lingkungan kerja yang nyaman dan kolaboratif
          </div>
        </div>
        <div class="divider"></div>
      </div>
    </section>
    
    
    <!-- benefit for your brand -->
    <div class="horizontal-line">
      <span>benefit for your brand</span>
    </div>
    <div class="head-benefit">
      <h1>
        <span>Keuntungan Untuk Brand</span> Jika <br />
        Bekerjasama di FYP Management
      </h1>
    </div>
    
    
    <section class="container-benefit">
      <div class="benefit">
        <div class="benefit-number">1</div>
        <div class="benefit-content">
          <div class="benefit-subtitle">For Brand</div>
          <div class="benefit-title">Pajak Non PKP</div>
          <div class="benefit-description">
            Pajak non PKP untuk menghindari PPN 11% dan hanya membayar 0,5%.
            Contoh kasusnya, pembayaran dari 11 juta menjadi hanya 500 ribu
            dengan adanya non PKP.
          </div>
        </div>
        <div class="divider"></div>
      </div>
      <div class="benefit">
        <div class="benefit-number">2</div>
        <div class="benefit-content">
          <div class="benefit-subtitle">For Brand</div>
          <div class="benefit-title">Pelayanan Lengkap</div>
          <div class="benefit-description">
            Fokus pertama aporcing, pendekatan kepada talent yang dibutuhkan
            dengan bantuan dalam pemasaran 360 derajat serta menyediakan
            kebutuhan seperti designer dan video editor.
          </div>
        </div>
        <div class="divider"></div>
      </div>
      <div class="benefit">
        <div class="benefit-number">3</div>
        <div class="benefit-content">
          <div class="benefit-subtitle">For Brand</div>
          <div class="benefit-title">Talent Berkualitas</div>
          <div class="benefit-description">
            Memberikan talent berkualitas kepada brand yang bekerja sama.
          </div>
        </div>
        <div class="divider"></div>
      </div>
      <div class="benefit">
        <div class="benefit-number">4</div>
        <div class="benefit-content">
          <div class="benefit-subtitle">For Brand</div>
          <div class="benefit-title">Kooperatif</div>
          <div class="benefit-description">
            Memastikan kerjasama yang kooperatif.
          </div>
        </div>
        <div class="divider"></div>
      </div>
      <div class="benefit">
        <div class="benefit-number">5</div>
        <div class="benefit-content">
          <div class="benefit-subtitle">For Brand</div>
          <div class="benefit-title">Supportif Talent</div>
          <div class="benefit-description">
            Mendukung melalui ekosistem suportif dengan menyediakan talent yang
            meningkatkan kesuksesan kampanye klien.
          </div>
        </div>
        <div class="divider"></div>
      </div>
    </section>
    <!-- grow with us -->
    <div class="horizontal-line">
      <span>Grow with us</span>
    </div>

    <section class="container-grow-with-us">
      <div class="left-grow-with-us">
        Tingkatkan pertumbuhan merek Anda dengan FYP Management
      </div>
      <div class="divider-grow-with-us"></div>
      <div class="right-grow-with-us">
        Dapatkan semua yang Anda perlukan untuk memulai dan meningkatkan skala
        kampanye pemasaran influencer Anda.
        <br />
        <a href="#" class="button-grow-with-us"
          >Get in Touch <i class="fas fa-arrow-right"></i
        ></a>
      </div>
    </section>

    <script>
      function updateTime() {
        const timeElement = document.getElementById("time");
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, "0");
        const minutes = String(now.getMinutes()).padStart(2, "0");
        const seconds = String(now.getSeconds()).padStart(2, "0");
        timeElement.textContent = `${hours}:${minutes}:${seconds}`;
      }
      setInterval(updateTime, 1000);
      updateTime();

      const hamburger = document.getElementById("hamburger");
      const menu = document.getElementById("menu");

      hamburger.addEventListener("click", () => {
        hamburger.classList.toggle("active");
        menu.classList.toggle("active");
      });
    </script>
    
    <script>
      document.addEventListener("scroll", function () {
        const benefits = document.querySelectorAll(".benefit");
        const triggerBottom = (window.innerHeight / 5) * 4;

        benefits.forEach((benefit) => {
          const benefitTop = benefit.getBoundingClientRect().top;

          if (benefitTop < triggerBottom) {
            benefit.classList.add("visible");
          } else {
            benefit.classList.remove("visible");
          }
        });
      });

</script>

</div>
<section class="footer">
    
<?php get_footer(); ?>
</section>