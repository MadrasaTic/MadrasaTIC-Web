@include('layouts.app')

<head>
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="container-fluid p-0" style="min-height: 100vh">
        <div class="row p-0 g-0">
            <!-- Side Bar -->
            @include("./include/sideBar")
            <!-- Middle Part -->
            <div class="col-md-7 animate__animated animate__fadeIn animate__delay-0.5s ">
                <!-- Wrapper -->
                <div class="col-lg-9 col-md-12">
                    <!-- Profile Header -->
                    <h3 class="fw-bold mt-6 mb-1">Mon profile</h3>
                    <div id="profile--header" class="">
                        <br />
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle bg-secondary me-5" id="profile-picture"></div>
                            <div>
                                <h3 class="mb-1">BAGHDADLI<span class="fw-normal"> Yacine</span></h3>
                                <p class="fs-5">Etudiant</p>
                                <button class="btn btn-secondary btn-lg align-self-center text-primary fs-6 fw-bold"
                                    id="change_photo--button">
                                    <i class="fa-solid fa-pen-to-square me-1"></i> CHANGER LA PHOTO
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Separator -->
                    <div class="separator mt-5 mb-1"></div>
                    <p class="text-lead mb-1">Informations Personnelles</p>
                    <!-- Profile Infos -->
                    <div class="">
                        <form class="row" id="infos--form">
                            <div class="col-md-6 p-3">
                                <label for="fname--input" class="form-label">Nom</label>
                                <div class="input-group">
                                    <input class="w-100 p-3" type="text" id="fname--input" placeholder="Nom"
                                        aria-describedby="emailHelp" />
                                    <span class="check--container end-0 me-2 fs-4">
                                        <i
                                            class="valid--icon fa-solid fa-circle-check text-success d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                        <i
                                            class="invalid--icon fa-solid fa-circle-exclamation text-danger d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                    </span>
                                </div>
                                <div class="invalid-feedback fs-6 d-none">Enter un nom valide</div>
                                <div class="valid-feedback fs-6 d-none">Nom Valide</div>
                            </div>
                            <div class="col-md-6 p-3">
                                <label for="lname--input" class="form-label">Prénom</label>
                                <div class="input-group">
                                    <input class="w-100 p-3" type="text" id="lname--input" placeholder="Prénom"
                                        aria-describedby="emailHelp" />
                                    <span class="check--container end-0 me-2 fs-4">
                                        <i
                                            class="valid--icon fa-solid fa-circle-check text-success d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                        <i
                                            class="invalid--icon fa-solid fa-circle-exclamation text-danger d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                    </span>
                                </div>
                                <div class="invalid-feedback fs-6 d-none">Enter un prénom valide</div>
                                <div class="valid-feedback fs-6 d-none">Prénom Valide</div>
                            </div>
                            <div class="col-md-12 p-3">
                                <label for="email--input" class="form-label">Email</label>
                                <div class="input-group">
                                    <input class="w-100 p-3 disabled" type="email" id="email--input"
                                        placeholder="username@esi-sba.dz" aria-describedby="emailHelp" disabled/>
                                    <span class="check--container end-0 me-2 fs-4">
                                        <i
                                            class="fa-solid fa-ban text-secondary animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-12 p-3">
                                <label for="phone--input" class="form-label">Numéro de téléphone</label>
                                <div class="input-group">
                                    <input class="w-100 p-3" type="number" id="phone--input" placeholder="0123456789"
                                        aria-describedby="emailHelp" />
                                    <span class="check--container end-0 me-2 fs-4">
                                        <i
                                            class="valid--icon fa-solid fa-circle-check text-success d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                        <i
                                            class="invalid--icon fa-solid fa-circle-exclamation text-danger d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                    </span>
                                </div>
                                <div class="invalid-feedback fs-6 d-none">Enter un numéro de téléphone valide</div>
                                <div class="valid-feedback fs-6 d-none">Numéro de téléphone valide</div>
                            </div>
                            <div class="d-grid mt-2">
                                <button class="btn btn-primary disabled" id="btn--modify" type="submit"><i
                                        class="fa-solid fa-pen-to-square me-2"></i>Modifier</button>
                            </div>
                        </form>
                    </div>
                    <!-- Separator -->
                    <div class="separator mt-4 mb-1"></div>
                    <p class="text-lead mb-3">Notifications</p>
                    <!-- Separator -->
                    <div class="separator mt-4 mb-1"></div>
                    <p class="text-lead mb-3">Mot de Passe</p>
                    <!-- Profile Change Password -->
                    <div class="">
                        <form class="row" id="password--form">
                            <div class="col-md-6 p-3">
                                <label for="previous_password--input" class="form-label">Ancien mot de passe</label>
                                <div class="input-group">
                                    <input class="w-100 p-3" type="password" id="previous_password--input"
                                        placeholder="Ancien mot de passe" />
                                    <span class="check--container end-0 me-2 fs-4">
                                        <i
                                            class="valid--icon fa-solid fa-circle-check text-success d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                        <i
                                            class="invalid--icon fa-solid fa-circle-exclamation text-danger d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                    </span>
                                </div>
                                <div class="invalid-feedback fs-6 d-none">Enter un mot de passe valide</div>
                                <div class="valid-feedback fs-6 d-none">Mot de passe valide</div>
                                <div class="d-flex mt-2">
                                    <a href="#" class="ms-auto fs-6 text-end link-primary fw-bold">Mot de passe oublié
                                        ?</a>
                                </div>
                            </div>
                            <div class="col-md-6 p-3">
                                <label for="new_password--input" class="form-label">Nouveau mot de passe</label>
                                <div class="input-group">
                                    <input class="w-100 p-3" type="password" id="new_password--input"
                                        placeholder="Nouveau mot de passe" aria-describedby="emailHelp" />
                                    <span class="check--container end-0 me-2 fs-4">
                                        <i
                                            class="valid--icon fa-solid fa-circle-check text-success d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                        <i
                                            class="invalid--icon fa-solid fa-circle-exclamation text-danger d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                    </span>
                                </div>
                                <div class="invalid-feedback fs-6 d-none">Enter un mot de passe valide</div>
                                <div class="valid-feedback fs-6 d-none">Mot de passe valide</div>
                            </div>
                            <div class="col-md-6 d-flex align-items-center justify-content-center p-3 mt-2 mb-5"
                                id="this_div">
                                <button class="btn btn-primary disabled" id="btn--save" type="submit"><i
                                        class="fa-solid fa-bookmark me-2"></i>Sauvgarder</button>
                            </div>
                            <div class="col-md-6 d-flex align-items-center justify-content-center p-3 mt-2 mb-5">
                                <button class="btn btn-secondary text-primary fw-bold" id="disconnect--button"><i
                                        class="fa-solid fa-arrow-right-from-bracket me-2"></i>Se Déconnecter</button>
                            </div>
                        </form>
                    </div>
                </div> <!-- Wrapper End--->
            </div> <!-- Middle Part END -->
            <!-- Notifications Bar -->
            @include("./include/notificationsPage");
            <!-- Modal Save Photo -->
            @include("./include/addPictureModal")
            <!-- Modal Confirm Password -->
            @include("./include/confirmPasswordChangeModal")
            <!-- Modal Disconnect -->
            @include("./include/confirmDisconnectModal")
        </div>
    </div>
</body>
