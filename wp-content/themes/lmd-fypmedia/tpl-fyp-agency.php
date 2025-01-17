<?php
/*
Template Name: LMD FYP AGENCY
*/
get_header(); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <title>Creative FYP Agency</title>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Roboto:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="stylefix.css" />
  </head>
  
<style>
{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: "Poppins", sans-serif;
  background-color: #000000;
  color: #ffffff;
  margin: 0;
  padding: 0;
  font-size: 1.2em;
}

/* Main Container Styles */
.main-container {
  width: 80%;
  margin: 0 auto;
  padding: 50px 20px;
}

/* Hero Section */
.hero-section {
  text-align: center;
}

.agency-badge {
  display: inline-flex;
  align-items: center;
  background: #000;
  color: #fff;
  padding: 10px 20px;
  border-radius: 20px;
  font-size: 18px;
  margin-bottom: 20px;
  box-shadow: 0 0 10px #fff;
}

.agency-badge::before {
  content: "";
  width: 15px;
  height: 15px;
  background: #ffcc00;
  border-radius: 50%;
  margin-right: 10px;
}

.hero-title {
  font-size: 72px;
  margin: 0;
}

.hero-subtitle {
  font-size: 20px;
  color: #b0b0b0;
  margin: 20px 0;
}

.highlight {
  color: #fff;
}

/* Button Styles */
.cta-button {
  display: inline-block;
  background: #ffcc00;
  color: #000;
  padding: 15px 30px;
  border-radius: 30px;
  font-size: 20px;
  text-decoration: none;
  margin-top: 20px;
  transition: all 0.3s ease;
  border: none;
  cursor: pointer;
}

.cta-buttons {
  display: inline-block;
  color: white;
  padding: 15px 30px;
  border-radius: 20px;
  font-size: 20px;
  text-decoration: none;
  margin-top: 20px;
  transition: all 0.3s ease;
  border: solid 1px #fff;
  cursor: pointer;
  background-color: #000;
}

.cta-buttons:hover {
  border: solid 2px #fff;
  transform: translateY(-2px);
}

.cta-button:hover {
  background: #e6b800;
  transform: translateY(-2px);
}

/* Stats Section */
.stats-grid {
  display: flex;
  justify-content: center;
  gap: 30px;
  margin-top: 20px;
}

.stat-item {
  text-align: center;
}

.stat-number {
  font-size: 36px;
  margin: 0;
}

.stat-label {
  font-size: 18px;
  color: #b0b0b0;
}

/* Feature Image */
.feature-image {
  margin-top: 20px;
  border-radius: 20px;
  overflow: hidden;
}

.img-zigzag {
  width: 50%;
  border-radius: 10px;
  overflow: hidden;
}

.feature-image img {
  width: 100%;
  max-width: 1200px;
  height: 550px;
  object-fit: cover;
  border-radius: 15px;
}

/* Why Choose Us Section */
.why-choose-section {
  /* background-color: #2c2c2c; */
  padding: 40px 0;
}

.why-choose-header {
  display: flex;
  justify-content: space-between;
  align-items: flex-end;
  margin-bottom: 40px;
  flex-wrap: wrap;
}

.why-choose-title {
  font-size: 2.5em;
  margin: 0;
  background: linear-gradient(to right, #8e44ad, #3498db);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  margin-bottom: 4px;
}

.why-choose-title span {
  color: #ffffff;
  -webkit-background-clip: initial;
  -webkit-text-fill-color: initial;
}

.why-choose-content {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
}

.why-choose-image {
  width: 48%;
  height: 300px;
  background-color: #cccccc;
  border-radius: 20px;
}

.why-choose-text {
  width: 48%;
}

.numbered-section {
  display: flex;
  align-items: flex-start;
  margin-bottom: 20px;
}

.number-circle {
  display: inline-block;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background-color: #2c2c2c;
  color: #ffffff;
  text-align: center;
  line-height: 36px;
  border: 2px solid #ffffff;
  margin-right: 20px;
  flex-shrink: 0;
}

.numbered-section p {
  font-size: 18px;
  color: #b3b3b3;
}

/* Services Section */
.services-header {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: flex-start;
  margin-bottom: 30px;
}

.services-text {
  max-width: 70%;
}

.services-title {
  font-size: 1.2em;
  font-weight: normal;
  margin: 0;
}

/* .services-title span {
  color: #6a00ff;
} */

.services-description {
  color: #b3b3b3;
  font-size: 1.2em;
  margin: 10px 0 0;
  text-align: justify;
}

.service-item {
  display: flex;
  flex-direction: column;
  padding: 30px 0;
  border-bottom: 1px solid #333333;
  cursor: pointer;
  text-align: justify;
}

.service-header {
  font-size: 1.2em;
  font-weight: normal;
  margin: 0;
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
}

.service-icon {
  font-size: 0.75em;
  color: #000000;
  background-color: #ffcc00;
  border-radius: 50%;
  padding: 10px;
  transition: transform 0.3s;
}

.service-icon.rotate {
  transform: rotate(45deg);
}

.service-content {
  display: none;
  margin-top: 10px;
  color: #b3b3b3;
  font-size: 1.2em;
  transition: all 0.3s ease-out;
  max-height: 0;
  opacity: 0;
  text-align: justify;
}

.service-content.show {
  display: block;
  max-height: 1000px;
  opacity: 1;
}

/* Projects Section */
.projects-section {
  /* background-color: #000000; */
  padding: 40px 0;
}

.projects h2 {
  font-size: 2em;
  margin-bottom: 20px;
  text-align: left;
  background: linear-gradient(to right, #8e44ad, #3498db);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.project-list {
  display: flex;
  overflow-x: auto;
  padding-bottom: 10px;
  scrollbar-width: none;
}

.project-list::-webkit-scrollbar {
  display: none;
}

.project-card {
  min-width: 40%;
  background-color: #0d0d0d;
  border-radius: 10px;
  padding: 20px;
  text-align: left;
  margin-right: 20px;
}

.project-card img {
  width: 100%;
  border-radius: 10px;
  margin-bottom: 10px;
  height: 200px;
  object-fit: cover;
}

.text-with-arrow {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.text-with-arrow h3 {
  font-size: 1.2em;
  margin-bottom: 10px;
}

.text-with-arrow p {
  font-size: 0.9em;
  color: #b3b3b3;
}

.arrow {
  background-color: #f39c12;
  color: #0d0d0d;
  border-radius: 50%;
  width: 30px;
  height: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
}

/* Footer Section */
.footer {
  text-align: center;
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

/* Responsive Design */
@media (max-width: 768px) {
  .main-container {
    width: 90%;
  }

  .services-header {
    flex-direction: column;
    align-items: flex-start;
  }

  .services-text {
    max-width: 70%;
  }

  .hero-title {
    font-size: 20px;
  }

  .stats-grid {
    flex-direction: column;
    gap: 20px;
  }

  .feature-image img {
    height: 300px;
  }

  .why-choose-image,
  .why-choose-text {
    width: 100%;
  }

  .project-card {
    min-width: 100%;
  }

  .project-list {
    flex-direction: row;
    overflow-x: scroll;
    gap: 10px;
  }

  .project-card {
    min-width: 100%; /* Makes sure only one card is visible */
    margin-right: 0; /* Remove the right margin to avoid large gaps */
  }

  .project-list::-webkit-scrollbar {
    display: none;
  }
}

</style>







<div class="tpl-agency">

        
        
        <!-- Hero Section -->
    <div class="main-container hero-section">
      <div class="agency-badge">For Agency</div>
      <h1 class="hero-title">We Boost</h1>
      <h2 class="hero-title">Your Creative Ideas</h2>
      <p class="hero-subtitle">
        we have
        <span class="highlight"
          >developed effective social media marketing</span
        >
        strategies to meet your needs
      </p>
      <a href="#" class="cta-button">Get in touch</a>

      <div class="stats-grid">
        <div class="stat-item">
          <h3 class="stat-number">200+</h3>
          <p class="stat-label">Project Done</p>
        </div>
        <div class="stat-item">
          <h3 class="stat-number">5+</h3>
          <p class="stat-label">Years experience</p>
        </div>
        <div class="stat-item">
          <h3 class="stat-number">99%</h3>
          <p class="stat-label">Happy Clients</p>
        </div>
      </div>

      <div class="feature-image">
        <img src="<?php echo lmd_get_mod('ag_welcome_img', get_template_directory_uri().'/assets/image/featured_image.jpg'); ?>" alt="featured image" />
      </div>
    </div>

    <!-- Services Section -->
    <div class="main-container">
      <div class="services-header">
        <div class="services-text">
          <h2 class="why-choose-title">
            Our Offer <span> Several Creative Service For You </span>
          </h2>
          <p class="services-description">
            Tingkatkan personal branding pribadi maupun brand Anda dengan strategi media sosial yang efektif. Dengan tim yang profesional di bidang digital, 
            kami mengoptimalkan kualitas konten agar mempercepat pertumbuhan bisnis Anda.
          </p>
        </div>
        <a href="#" class="cta-buttons">Get in touch</a>
      </div>

      <div class="service-item" onclick="toggleDescription(this)">
        <h2 class="service-header">
          01 Enable Seller
          <i class="fas fa-plus service-icon"></i>
        </h2>
        <div class="service-content">
          <p>
            Partnering with over 100 businesses, <br />
            we help them establish a <br />
            professional presence in marketplaces, <br />
            from captivating catalog designs to <br />
            effective live streaming that boosts sales.
          </p>
        </div>
      </div>

      <div class="service-item" onclick="toggleDescription(this)">
        <h2 class="service-header">
          02 KOL & Endorsment
          <i class="fas fa-plus service-icon"></i>
        </h2>
        <div class="service-content">
          <p>
            With collaborations spanning 3,000+<br />
            creators and 1,000+ brands, <br />
            our KOL and endorsement services expand<br />
            product reach and visibility across broader markets.
          </p>
        </div>
      </div>

      <div class="service-item" onclick="toggleDescription(this)">
        <h2 class="service-header">
          03 Web Development & Copywriting
          <i class="fas fa-plus service-icon"></i>
        </h2>
        <div class="service-content">
          <p>
            A professional website is key to digital success.  <br />
            We’ve supported over 100 businesses in building strong, <br />
            SEO-friendly websites, making it easier  <br />
            to be found on search engines.
          </p>
        </div>
      </div>

      <div class="service-item" onclick="toggleDescription(this)">
        <h2 class="service-header">
          04 Digital Ads Management
          <i class="fas fa-plus service-icon"></i>
        </h2>
        <div class="service-content">
          <p>
            We manage ads on multiple platforms for 100+ partners, <br />
            ensuring your product reaches <br />
            the right audience and enhances <br />
             business profitability.
          </p>
        </div>
      </div>

      <div class="service-item" onclick="toggleDescription(this)">
        <h2 class="service-header">
          05 Content Production & Social Media Management
          <i class="fas fa-plus service-icon"></i>
        </h2>
        <div class="service-content">
          <p>
            Need engaging Instagram and TikTok content?<br />
            Our creative team has supported 100+ partners <br />
            by optimizing content and managing <br />
            social media so you can focus on your core business.
          </p>
        </div>
      </div>
    </div>

    <!-- Why Choose Us Section -->
    <div class="why-choose-section">
      <div class="main-container">
        <div class="why-choose-header">
          <div class="title">
            <h1 class="why-choose-title">
              Why Choose
              <span
                >FYP <br />
                Agency</span
              >
            </h1>
          </div>
          <button class="cta-buttons">Get in touch</button>
        </div>
        <div class="why-choose-content">
          <img
            class="img-zigzag"
            src="<?php echo lmd_get_mod('ag_welcome_img', get_template_directory_uri().'/assets/image/why_choose_agency.png'); ?>"
            alt="why choose agency"
          />

          <div class="why-choose-text">
            <div class="numbered-section">
              <div class="number-circle">01</div>
              <div>
                <h3>Professional & Experienced:</h3>
                <p>
                  With over 5 years in digital marketing, <br />
                  our team has partnered with more than 100 clients<br />
                  and is ready to deliver the best solutions for your needs.
                </p>
              </div>
            </div>
            <div class="numbered-section">
              <div class="number-circle">02</div>
              <div>
                <h3>Personalized Approach: </h3>
                <p>
                  Every business is unique.<br />
                  We offer customized strategies<br />
                  tailored to your specific requirements.
                </p>
              </div>
            </div>
            <div class="numbered-section">
              <div class="number-circle">03</div>
              <div>
                <h3>Measurable Results:</h3>
                <p>
                  We focus on tangible, measurable outcomes to maximize your ROI.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Projects Section -->
    <div class="projects-section">
      <div class="main-container">
        <div class="projects">
          <h1 class="why-choose-title">Featured <span> Projects </span></h1>
          <div class="project-list">
            <div class="project-card">
              <img
                alt="Image of a city skyline with the text 'Content Production'"
                height="200"
                src="<?php echo lmd_get_mod('ag_welcome_img', get_template_directory_uri().'/assets/image/content_production.png'); ?>"
                width="300"
              />
              <div class="text-with-arrow">
                <div>
                  <h3>Content Production</h3>
                  <p>Content Production Fypmedia</p>
                </div>
                <div class="arrow">
                  <i class="fas fa-arrow-right"></i>
                </div>
              </div>
            </div>

            <div class="project-card">
              <img
                alt="'Website Builder'"
                height="200"
                src="<?php echo lmd_get_mod('ag_welcome_img', get_template_directory_uri().'/assets/image/website.png'); ?>"
                width="300"
              />
              <div class="text-with-arrow">
                <div>
                  <h3>Website Builder</h3>
                  <p>
                    Web Development &amp; <br />
                    Copywriting
                  </p>
                </div>
                <div class="arrow">
                  <i class="fas fa-arrow-right"></i>
                </div>
              </div>
            </div>

            <!--<div class="project-card">-->
            <!--  <img-->
            <!--    alt="Image of a person standing against a blue wall with the text 'Awiwok Content'"-->
            <!--    height="200"-->
            <!--    src="<php echo lmd_get_mod('ag_welcome_img', get_template_directory_uri().'/assets/image/awikwok_content.jpg'); ?>"-->
            <!--    width="300"-->
            <!--  />-->
            <!--  <div class="text-with-arrow">-->
            <!--    <div>-->
            <!--      <h3>Awiwok Content</h3>-->
            <!--      <p>-->
            <!--        Content Production &amp; <br />-->
            <!--        Social Media Management-->
            <!--      </p>-->
            <!--    </div>-->
            <!--    <div class="arrow">-->
            <!--      <i class="fas fa-arrow-right"></i>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--</div>-->

            <!--<div class="project-card">-->
            <!--  <img-->
            <!--    alt="Image of a person standing against a blue wall with the text 'Project 4'"-->
            <!--    height="200"-->
            <!--    src="?php echo lmd_get_mod('ag_welcome_img', get_template_directory_uri().'/assets/image/popyrus_digital.jpg'); ?>"-->
            <!--    width="300"-->
            <!--  />-->
            <!--  <div class="text-with-arrow">-->
            <!--    <div>-->
            <!--      <h3>Popyrus Digital</h3>-->
            <!--      <p>Digital Ads Management</p>-->
            <!--    </div>-->
            <!--    <div class="arrow">-->
            <!--      <i class="fas fa-arrow-right"></i>-->
            <!--    </div>-->
            <!--  </div>-->
            <!--</div>-->
            
          </div>
        </div>
      </div>
    </div>

    <!-- Footer Section -->
    <div class="footer">
      <div class="main-container">
        <h1>
          Consult your needs with FYP <br />
          Agency.
        </h1>
        <p>
          Don't hesitate to contact us to schedule a free consultation.
        </p>
        <a href="https://wa.me/+6285175123014?text=Hi,%20Saya%20ingin%20bekerjasama%20menjadi%20bagian%20dari%20FYP-Mandala.%20Info%20ini%20saya%20dapatkan%20dari%20website%fypmedia.id" target="_blank">
        <button class="cta-button">Contact US!</button>
    </a>
      </div>
    </div>
    
    
    
<script>
    function toggleDescription(element) {
  const description = element.querySelector(".service-content");
  const icon = element.querySelector(".service-icon");

  // Close all other descriptions
  document.querySelectorAll(".service-content").forEach((desc) => {
    if (desc !== description) {
      desc.classList.remove("show");
      setTimeout(() => {
        desc.style.display = "none";
      }, 300);
    }
  });

  // Reset all other icons
  document.querySelectorAll(".service-icon").forEach((ic) => {
    if (ic !== icon) {
      ic.classList.remove("rotate");
    }
  });

  // Toggle current description
  if (!description.classList.contains("show")) {
    description.style.display = "block";
    setTimeout(() => {
      description.classList.add("show");
    }, 10);
    icon.classList.add("rotate");
  } else {
    description.classList.remove("show");
    setTimeout(() => {
      description.style.display = "none";
    }, 300);
    icon.classList.remove("rotate");
  }
}

</script>

</div>
<?php get_footer(); ?>