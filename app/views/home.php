<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Procert</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="http://localhost/procert/public/assets/img/logo.png" rel="icon">
  <link href="http://localhost/procert/public/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files (via CDN) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/glightbox@3.3.0/dist/css/glightbox.min.css" rel="stylesheet">


  <!-- Main CSS File -->
  <link href="http://localhost/procert/public/assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Gp
  * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
  * Updated: Aug 15 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">Procert</h1>
        <span>.</span>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home<br></a></li>
          <li><a href="#about">Sobre</a></li>
          <li><a href="#services">Serviços</a></li>
          <li><a href="#portfolio">Portfólio</a></li>
          <li><a href="#team">Equipe</a></li>

          <li><a href="#contact">Contato</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="<?= BASE_URL ?>login">Login</a>

    </div>
  </header>

  <main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="assets/img/hero-bg.jpg" alt="" data-aos="fade-in">

      <div class="container">

        <div class="row justify-content-center text-center" data-aos="fade-up" data-aos-delay="100">
          <div class="col-xl-6 col-lg-8">
            <h2>Soluções Confiáveis em Certificação com a ProCert<span>.</span></h2>
            <p>Especialistas em garantir a conformidade e a qualidade dos seus produtos</p>
          </div>
        </div>

        <div class="row gy-4 mt-5 justify-content-center" data-aos="fade-up" data-aos-delay="200">
          <div class="col-xl-2 col-md-4" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <i class="bi bi-shield-check"></i>
              <h3><a href="">Certificação de Produtos</a></h3>
            </div>
          </div>
          <div class="col-xl-2 col-md-4" data-aos="fade-up" data-aos-delay="400">
            <div class="icon-box">
              <i class="bi bi-clipboard-check"></i>
              <h3><a href="">Auditorias Técnicas</a></h3>
            </div>
          </div>
          <div class="col-xl-2 col-md-4" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
              <i class="bi bi-archive"></i>
              <h3><a href="">Ensaios Laboratoriais</a></h3>
            </div>
          </div>
          <div class="col-xl-2 col-md-4" data-aos="fade-up" data-aos-delay="600">
            <div class="icon-box">
              <i class="bi bi-journal-check"></i>
              <h3><a href="">Normas e Regulamentos</a></h3>
            </div>
          </div>
          <div class="col-xl-2 col-md-4" data-aos="fade-up" data-aos-delay="700">
            <div class="icon-box">
              <i class="bi bi-award"></i>
              <h3><a href="">Selo de Qualidade</a></h3>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <div class="col-lg-6 order-1 order-lg-2">
            <img src="assets/img/about.jpg" class="img-fluid" alt="Equipe ProCert realizando auditoria">
          </div>
          <div class="col-lg-6 order-2 order-lg-1 content">
            <h3>Comprometidos com a Qualidade e a Conformidade</h3>
            <p class="fst-italic">
              A ProCert é um Organismo de Certificação de Produto especializado na certificação de Equipamentos de
              Proteção Individual (EPIs) e Artigos Escolares. Atuamos com rigor técnico, agilidade e compromisso com a
              conformidade.
            </p>
            <ul>
              <li><i class="bi bi-check2-all"></i> <span>Atuação com base nas principais normas nacionais e
                  internacionais.</span></li>
              <li><i class="bi bi-check2-all"></i> <span>Equipe técnica altamente qualificada e multidisciplinar.</span>
              </li>
              <li><i class="bi bi-check2-all"></i> <span>Processos transparentes e eficazes, com foco na credibilidade
                  dos resultados.</span></li>
            </ul>
            <p>
              Na ProCert, acreditamos que a certificação vai além de um selo: é a garantia de confiança entre
              fabricantes, consumidores e o mercado. Nossos serviços promovem segurança, inovação e responsabilidade.
            </p>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Clients Section -->

    <!-- <section id="clients" class="clients section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 40
                },
                "480": {
                  "slidesPerView": 3,
                  "spaceBetween": 60
                },
                "640": {
                  "slidesPerView": 4,
                  "spaceBetween": 80
                },
                "992": {
                  "slidesPerView": 6,
                  "spaceBetween": 120
                }
              }
            }
          </script>
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section> -->


    <!-- /Clients Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

      <div class="container">

        <div class="row gy-4">
          <div class="features-image col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <img src="assets/img/servico.jpg" alt="Laboratório técnico ProCert">
          </div>
          <div class="col-lg-6">

            <div class="features-item d-flex ps-0 ps-lg-3 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-archive flex-shrink-0"></i>
              <div>
                <h4>Rigor Técnico e Normativo</h4>
                <p>Seguimos padrões nacionais e internacionais com precisão para garantir conformidade completa dos
                  produtos certificados.</p>
              </div>
            </div><!-- End Features Item-->

            <div class="features-item d-flex mt-5 ps-0 ps-lg-3" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-shield-lock flex-shrink-0"></i>
              <div>
                <h4>Segurança e Confiabilidade</h4>
                <p>Oferecemos processos seguros e auditáveis, reforçando a credibilidade de cada etapa da certificação.
                </p>
              </div>
            </div><!-- End Features Item-->

            <div class="features-item d-flex mt-5 ps-0 ps-lg-3" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-broadcast flex-shrink-0"></i>
              <div>
                <h4>Atendimento Personalizado</h4>
                <p>Adaptamos nossos serviços às necessidades de cada cliente, com suporte técnico próximo e consultivo.
                </p>
              </div>
            </div><!-- End Features Item-->

            <div class="features-item d-flex mt-5 ps-0 ps-lg-3" data-aos="fade-up" data-aos-delay="500">
              <i class="bi bi-award flex-shrink-0"></i>
              <div>
                <h4>Reconhecimento de Mercado</h4>
                <p>Certificações emitidas pela ProCert têm aceitação nacional e internacional, agregando valor ao seu
                  produto.</p>
              </div>
            </div><!-- End Features Item-->

          </div>
        </div>

      </div>

    </section><!-- /Features Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Serviços</h2>
        <p>Conheça as soluções da ProCert</p>
      </div><!-- End Section Title -->

      <div class="container">
        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-shield-check"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Certificação de EPIs</h3>
              </a>
              <p>Capacetes de segurança, calçados de proteção, luvas, protetores auriculares, cintos e talabartes.
                Garantimos conformidade com as exigências legais e normas técnicas.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-pencil"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Certificação de Artigos Escolares</h3>
              </a>
              <p>Certificamos materiais como lápis, canetas, borrachas, réguas, colas, tintas e muito mais, assegurando
                que sejam seguros e estejam de acordo com a legislação vigente.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-check-circle"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Certificação de Produtos</h3>
              </a>
              <p>Garantimos que seus produtos atendam às normas técnicas e regulatórias exigidas pelos órgãos
                competentes, com credibilidade e reconhecimento.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-clipboard-data"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Auditorias e Inspeções</h3>
              </a>
              <p>Realizamos auditorias técnicas e inspeções periódicas para verificar conformidade com padrões de
                qualidade, segurança e desempenho.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-gear"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Ensaios em Laboratório</h3>
              </a>
              <p>Contamos com parceiros laboratoriais acreditados para testes em conformidade com requisitos normativos
                específicos para cada tipo de produto.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-book"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Consultoria em Normas Técnicas</h3>
              </a>
              <p>Ajudamos empresas a entender e aplicar corretamente as normas e regulamentações nacionais e
                internacionais aplicáveis aos seus produtos.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="700">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-journal-check"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Relatórios Técnicos</h3>
              </a>
              <p>Emitimos relatórios detalhados com base em análises, ensaios e avaliações para subsidiar processos de
                certificação e homologação.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="800">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-award"></i>
              </div>
              <a href="#" class="stretched-link">
                <h3>Selo de Conformidade ProCert</h3>
              </a>
              <p>Após o processo de certificação, emitimos o selo ProCert, reconhecido no mercado como símbolo de
                qualidade, segurança e credibilidade.</p>
            </div>
          </div><!-- End Service Item -->

        </div>
      </div>
    </section><!-- /Services Section -->


    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section dark-background">

      <img src="assets/img/cta-bg.jpg" alt="Profissional da ProCert realizando certificação de produto">

      <div class="container">
        <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-10">
            <div class="text-center">
              <h3>Precisa Certificar seu Produto?</h3>
              <p>Entre em contato com a ProCert e conte com uma equipe especializada para garantir a conformidade,
                segurança e qualidade do seu produto com reconhecimento no mercado.</p>
              <a class="cta-btn" href="#contact">Fale com um Especialista</a>
            </div>
          </div>
        </div>
      </div>

    </section><!-- /Call To Action Section -->



    <!-- Stats Section -->
    <section id="stats" class="stats section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 align-items-center justify-content-between">

          <div class="col-lg-5">
            <img src="assets/img/stats-img.jpg" alt="Equipe técnica da ProCert" class="img-fluid">
          </div>

          <div class="col-lg-6">

            <h3 class="fw-bold fs-2 mb-3">Resultados que Comprovam a Confiança na ProCert</h3>
            <p>
              Com anos de experiência no setor, a ProCert tem sido referência na certificação de produtos, garantindo
              qualidade, segurança e conformidade técnica em todo o Brasil.
            </p>

            <div class="row gy-4">

              <div class="col-lg-6">
                <div class="stats-item d-flex">
                  <i class="bi bi-emoji-smile flex-shrink-0"></i>
                  <div>
                    <span data-purecounter-start="0" data-purecounter-end="350" data-purecounter-duration="1"
                      class="purecounter"></span>
                    <p><strong>Clientes Satisfeitos</strong> <span>de diversos setores industriais</span></p>
                  </div>
                </div>
              </div><!-- End Stats Item -->

              <div class="col-lg-6">
                <div class="stats-item d-flex">
                  <i class="bi bi-journal-richtext flex-shrink-0"></i>
                  <div>
                    <span data-purecounter-start="0" data-purecounter-end="780" data-purecounter-duration="1"
                      class="purecounter"></span>
                    <p><strong>Certificações Emitidas</strong> <span>em conformidade com normas técnicas</span></p>
                  </div>
                </div>
              </div><!-- End Stats Item -->

              <div class="col-lg-6">
                <div class="stats-item d-flex">
                  <i class="bi bi-headset flex-shrink-0"></i>
                  <div>
                    <span data-purecounter-start="0" data-purecounter-end="2500" data-purecounter-duration="1"
                      class="purecounter"></span>
                    <p><strong>Horas de Suporte</strong> <span>técnico e especializado</span></p>
                  </div>
                </div>
              </div><!-- End Stats Item -->

              <div class="col-lg-6">
                <div class="stats-item d-flex">
                  <i class="bi bi-people flex-shrink-0"></i>
                  <div>
                    <span data-purecounter-start="0" data-purecounter-end="40" data-purecounter-duration="1"
                      class="purecounter"></span>
                    <p><strong>Profissionais Qualificados</strong> <span>dedicados à excelência em certificação</span>
                    </p>
                  </div>
                </div>
              </div><!-- End Stats Item -->

            </div>

          </div>

        </div>

      </div>

    </section><!-- /Stats Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section dark-background">

      <img src="assets/img/testimonials-bg.jpg" class="testimonials-bg" alt="">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Fernando souza</h3>
                <h4>Gerente de Qualidade - Indústria Têxtil</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>A ProCert foi essencial no processo de certificação dos nossos produtos. Atendimento ágil,
                    equipe técnica preparada e muita transparência em todas as etapas.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Bruna Lopes</h3>
                <h4>Engenheira Eletricista - Setor Eletrodoméstico</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Graças à certificação com a ProCert, conseguimos acessar novos mercados. O selo ProCert agregou
                    muito valor ao nosso produto.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Juliana Martins</h3>
                <h4>Diretora Comercial - Produtos Hospitalares</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>A ProCert tem um diferencial enorme no suporte técnico. Eles realmente entendem do processo e
                    acompanham de perto até a aprovação final.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Bruno Carvalho</h3>
                <h4>Empresário - Produtos Sustentáveis</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>A certificação com a ProCert trouxe mais credibilidade e confiança para nossos clientes.
                    Recomendo fortemente.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>Pedro silva</h3>
                <h4>Supervisor Técnica - Cosméticos Naturais</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Além da certificação, a ProCert nos orientou sobre adequações técnicas e melhorias no processo.
                    Um verdadeiro parceiro estratégico.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div>

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->

    <!-- Team Section -->
    <section id="team" class="team section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Equipe</h2>
        <p>Nosso Time</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member">
              <div class="member-img">
                <img src="assets/img/team/miler.png" class="img-fluid" alt="">
                <div class="social">


                </div>
              </div>
              <div class="member-info">
                <h4>Miller Santiago</h4>
                <span>Qualidade</span>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="team-member">
              <div class="member-img">
                <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
                <div class="social">


                </div>
              </div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Product Manager</span>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
            <div class="team-member">
              <div class="member-img">
                <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                <div class="social">


                </div>
              </div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>CTO</span>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
            <div class="team-member">
              <div class="member-img">
                <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
                <div class="social">


                </div>
              </div>
              <div class="member-info">
                <h4>Amanda Jepson</h4>
                <span>Accountant</span>
              </div>
            </div>
          </div><!-- End Team Member -->

        </div>

      </div>

    </section><!-- /Team Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contato</h2>
        <p>Fale Conosco</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="mb-4" data-aos="fade-up" data-aos-delay="200">
          <iframe style="border:0; width: 100%; height: 270px;"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3658.4139379621683!2d-46.708734388509896!3d-23.517609878741595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cef860ef3ad5d5%3A0xe47ff708d70ba56b!2sTrabalho%20Laisla!5e0!3m2!1spt-BR!2sbr!4v1753631386596!5m2!1spt-BR!2sbr"
            frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div><!-- End Google Maps -->

        <div class="row gy-4">

          <div class="col-lg-4">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Endereço</h3>
                <p>Rua: Rua: John Harrison, 299 - Lapa, São Paulo - SP, 05074-080</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Nosso Número</h3>
                <p> 11 94230-7431</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Nosso Email</h3>
                <p>procertocp@gmail.com</p>
              </div>
            </div><!-- End Info Item -->

          </div>

          <div class="col-lg-8">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
              data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer dark-background">

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-4 col-md-6 footer-about">
            <a href="index.html" class="logo d-flex align-items-center">
              <span class="sitename">Procert</span>
            </a>
            <div class="footer-contact pt-3">
              <p>Rua: John Harrison, 299</p>
              <p> Lapa, São Paulo</p>
              <p class="mt-3"><strong>Phone:</strong> <span> 11 94230-7431</span></p>
              <p><strong>Email:</strong> <span>procertocp@gmail.com</span></p>
            </div>
            <div class="social-links d-flex mt-4">
              <a href=""><i class="bi bi-twitter-x"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-md-3 footer-links">

          </div>
          <div class="col-lg-4 col-md-3 footer-links">

          </div>

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Veja mais</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#hero"> Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#about">Sobre</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#services"> Serviços</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#portifolio"> Portifólio</a></li>


            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="copyright">
      <div class="container text-center">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">Procert</strong> <span>Todos os Direitos
            Reservados</span></p>
        <div class="credits">

          Desenvolvido por <a href="https://miguelcferreira.com.br/" target="_blank">Miguel Cezar
        </div>
      </div>
    </div>

  </footer>


  <a href=" #" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>



  <!-- Vendor JS Files -->



  <!-- Vendor JS Files (via CDN) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/glightbox@3.3.0/dist/js/glightbox.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/imagesloaded@5/imagesloaded.pkgd.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs@1.5.0/dist/purecounter_vanilla.js"></script>


  <!-- Main JS File -->
  <script src="http://localhost/procert/public/assets/js/main.js"></script>

</body>

</html>