<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Procert</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="<?= BASE_URL ?>/assets/img/logo.png" rel="icon">
  <link href="<?= BASE_URL ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
  <link href="<?= BASE_URL ?>/assets/css/main.css" rel="stylesheet">

  <style>
    #login {
      width: 100%;
      height: 100dvh;
      display: flex;
      align-items: center;
      justify-content: center;
      background-image: url('<?= BASE_URL ?>/assets/img/hero-bg.jpg');
      background-position: center;
      background-size: cover;
      background-repeat: no-repeat;
      padding: 0;


    }

    .container-login {
      width: 100%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      background-position: center;
      background-color: rgba(0, 0, 0, 0.65);
    }

    .glass-card {
      max-width: 420px;
      width: 100%;
      border-radius: 20px;
      padding: 40px;

      background: rgba(255, 255, 255, 0.12);
      backdrop-filter: blur(15px);
      -webkit-backdrop-filter: blur(15px);

      border: 1px solid rgba(255, 255, 255, 0.2);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
    }

    .glass-input {
      background: rgba(255, 255, 255, 0.15) !important;
      border: 1px solid rgba(255, 255, 255, 0.25) !important;
      color: #fff !important;
    }

    .glass-input::placeholder {
      color: rgba(255, 255, 255, 0.6);
    }

    .glass-input:focus {
      box-shadow: 0 0 12px rgba(255, 255, 255, 0.35) !important;
    }

    .glass-button {
      background: rgba(255, 255, 255, 0.25) !important;
      color: #fff !important;
      border: 1px solid rgba(255, 255, 255, 0.3) !important;
      backdrop-filter: blur(10px);
      transition: 0.3s;
    }

    .glass-button:hover {
      background: rgba(255, 255, 255, 0.4) !important;
    }
  </style>
</head>

<body>

  <section id="login">

    <div class="container-login">




      <div class="container d-flex justify-content-center align-items-center vh-100 ">
        <div class="card glass-card p-4">
          <h2 class="text-center mb-3 text-white">Entrar</h2>
          <p class="text-center text-light mb-4">ou entre com sua conta</p>

          <form method="POST" action="<?= BASE_URL ?>auth/login">

            <div class="mb-3">
              <label class="form-label text-white-50">Email</label>
              <input
                type="email"
                class="form-control form-control-lg glass-input"
                placeholder="Digite seu email"
                name="email"
                required>
            </div>

            <div class="mb-3">
              <label class="form-label text-white-50">Senha</label>
              <input
                type="password"
                class="form-control form-control-lg glass-input"
                placeholder="Digite sua senha"
                name="senha"
                required>
            </div>

            <div class="text-end mb-3">
              <a href="#" class="text-decoration-none text-white">Esqueceu sua senha?</a>
            </div>

            <button class="btn btn-primary w-100 btn-lg glass-button" type="submit">
              Entrar
            </button>

          </form>
        </div>
      </div>


    </div>

  </section>


</body>


</html>