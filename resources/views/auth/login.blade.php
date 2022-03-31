@include('layouts.app')

<head>
  <link href="{{ asset('css/login.css') }}" rel="stylesheet" />
</head>

<body>
  <div class="container-fluid d-flex justify-content-center align-items-center animate__animated animate__fadeIn" style="height: 100vh">
    <div class="px-5 pb-5 rounded-6 hvr-grow  " id="login-container">
      <div class="">
        <i id="login--icon" class="fa-solid fa-circle-user position-relative top-100 start-50 translate-middle mt-1"></i>
      </div>
      <div class=" mb-4">
        <h1 class="fw-bolder text-primary">Connectez-vous</h1>
      </div>
      <!-- Form -->
      <div id="login--form" >
        <form class="row g-4">
          <!-- E-Mail Input -->
          <div class="col-md-12">
            <label for="email--input" class="form-label fs-5 mb-1">E-Mail</label>
            <div class="input-group">
              <span class="input-group-text "><i class="fa-solid fa-circle-user input--icon fs-4"></i></span>
              <input type="text" class="p-3" id="email--input" />
              <span class="check--container end-0 me-2 fs-4 ">
                  <i class="valid--icon fa-solid fa-circle-check text-success d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
                  <i class="invalid--icon  fa-solid fa-circle-exclamation text-danger d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
              </span>
            </div>
            <div class="invalid-feedback fs-6 d-none">Enter une adresse e-mail valide (username@esi-sba.dz)</div>
            <div class="valid-feedback fs-6 d-none">Email Valide</div>
          </div>
          <!-- Password Input -->
          <div class="col-md-12 mb-3">
            <label for="password--input" class="form-label fs-5 mb-1">Mot de passe</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fa-solid fa-lock input--icon fs-4"></i></span>
              <input type="password" class="p-3" id="password--input" />
              <span class="check--container end-0 me-2 fs-4 animate__animated animate__fadeIn">
                <i class="valid--icon fa-solid fa-circle-check text-success d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
                <i class="invalid--icon fa-solid fa-circle-exclamation text-danger d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
              </span>
            </div>
            <div class="invalid-feedback fs-6 d-none">Enter une adresse mot de passe valide</div>
            <div class="valid-feedback fs-6 d-none">Mot de passe valide</div>
          </div>
          <!-- Submit -->
          <div class="col-12 d-flex align-items-center">
            <button class="btn btn-primary btn-lg disabled me-auto" type="submit" id="login--btn">Connexion</button>
            <a href="#" class="fs-5 link-primary fw-bold">Mot de passe oublié ?</a>
          </div>
        </form>
        <!-- Form End -->
      </div>
    </div>
  </div>
</body>
