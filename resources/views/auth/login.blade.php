@include('layouts.app')

<head>
  <link href="{{ asset('css/login.css') }}" rel="stylesheet" />

</head>

<body>
  <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100vh">
    <!-- Login Container  -->
    <div class=" px-5 border border-primary rounded-3 " id="login-container">

    <i id="login--icon" class="display-1 fa-solid fa-circle-user position-relative top-100 start-50 translate-middle mt-1 bi bi-caret-down-fill"></i>
    
      
      <div class="border mb-4">
        <h1 class="fw-bolder text-primary">Connecez-vous</h1>
      </div>
 
      
      <!-- Form -->
      <div class="border">
        <form class="row g-3">
          <!-- E-Mail Input -->
          <div class="i col-md-12">
            <label for="loginemail" class="form-label mb-1">E-Mail</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fa-solid fa-circle-user"></i></span>
              <input type="text" class="form-control" id="email--input" />
              <span class="input-group-text check--container d-none"><i class="fa-solid fa-circle-check text-success valid--icon d-none"></i><i class="fa-solid fa-circle-exclamation invalid--icon text-danger"></i></span>
            </div>
            <div class="invalid-feedback invalid_email--text d-none">Enter une adresse e-mail valide (username@esi-sba.dz)</div>
            <div class="valid-feedback valid_email--text d-none">Email Valide</div>
          </div>
          <!-- Password Input -->
          <div class="i col-md-12 mb-3">
            <label for="password--input" class="form-label mb-1">Mot de passe</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
              <input type="password" class="form-control" id="password--input" />
              
              <span class="input-group-text check--container d-none"><i class="fa-solid fa-circle-check text-success passwooord valid--icon d-none"></i><i class="fa-solid fa-circle-exclamation invalid--icon text-danger"></i></span>
            </div>
            <div class="d-none" id="error_messages--container">
              <div class="invalid-feedback" id="er1">Au moin une majuscule/miniscule</div>
              <div class="invalid-feedback" id="er2">Au moin un caractère spécial</div>
              <div class="invalid-feedback" id="er3">Au moin un chiffre</div>
              <div class="invalid-feedback" id="er4">Au moin 8 caractères</div>
            </div>
          </div>
          <div class="col-12  ">
            <button class="btn btn-primary btn-lg disabled" type="submit" id="login--btn">Connexion</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</body>
