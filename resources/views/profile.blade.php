@include('layouts.app')

<head>
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="container-fluid p-0" style="min-height: 100vh">
        <div class="row p-0 g-0">
            <!-- Side Bar -->
            <div class="col d-flex align-items-center justify-content-center border">side bar</div>
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
                    <!-- Button trigger modal -->
                </div> <!-- Wrapper End--->
            </div> <!-- Middle Part END -->
            <!-- Actu Bar -->
            <div class="col-md-3 d-flex align-items-center justify-content-center border">actu</div>
            <!-- Modal Save Photo -->
            <div class="d-none animate__animated animate__fadeIn modal_bg--default" id="profil_photo--modal">
                <div class="modal-dialog modal-dialog-centered animate__animated animate__fadeIn">
                    <div class="modal-content animate__animated animate__fadeInDown" id="modal_photo--container">
                        <!-- Modal Header -->
                        <div class="modal-header" id="modal_photo--header">
                            <h5 class="modal-title">Changer votre photo</h5>
                            <button type="button" class="btn-close" aria-label="Close" id="close_photo--icon"></button>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body" id="modal_photo--body">
                            <div class="container-fluid p-0">
                                <div class="rounded-6  d-flex align-items-center justify-content-center"
                                    id="modal_photo--bg">
                                    <div class="text-center">
                                        <i class="upload--icon fa-solid fa-cloud-arrow-up text-primary mb-2 "
                                            id="upload_icon--default"></i>
                                        <i class="bi bi-cloud-check-fill p-0 text-primary mb-0 d-none animate__animated animate__fadeIn"
                                            id="upload_icon--success"></i>
                                        <p class="fw-normal mb-0" id="img_profil--text">Aucune image sectionnée</p>
                                        <p class="text-success mb-3 d-none" id="upload_image--success">Image Uploder
                                            avec Succès</p>
                                        <p class="text-danger mb-3 d-none" id="upload_image--error">Erreur lors du
                                            chargement</p>
                                        <form action="" class="mt-3">
                                            <label for="profil_image--input" class="btn btn-primary"
                                                id="upload_image--button">Uploder une image </label>
                                            <input class="d-none" id="profil_image--input" type="file" accept="image/*">
                                            <input class="d-none" type="submit" id="submit_image--input">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Footer -->
                        <div class="container-fluid p-2 d-flex" id="moda_photo--footer">
                            <button type="button" class="btn btn-outline-secondary me-auto fw-bold"
                                data-bs-dismiss="modal" id="close_photo--button">Fermer</button>
                            <button type="button" class="btn btn-primary fw-bold disabled"
                                id="save_profil--button">Sauvgarder</button>
                        </div>
                    </div>
                </div>
            </div> <!-- Modal Save Photo End -->
            <!-- Modal Confirm Password -->
            <div class="animate__animated animate__fadeIn d-none modal_bg--default" id="password--modal">
                <div class="modal-dialog modal-dialog-centered animate__animated animate__fadeIn">
                    <div class="modal-content animate__animated animate__fadeInDown">
                        <!-- Modal Header -->
                        <div class="modal-header" id="modal_password--header">
                            <h5 class="modal-title">Changement mot de passe</h5>
                            <button type="button" class="btn-close" aria-label="Close"
                                id="close_password--icon"></button>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body" id="modal_password--body">
                            <p>Êtes-vous sûr de vouloir changer votre mot de passe ?</p>
                        </div>
                        <!-- Modal Footer -->
                        <div class="container-fluid p-2 d-flex" id="modal_password--footer">
                            <button type="button" class="btn btn-outline-secondary me-auto fw-bold"
                                data-bs-dismiss="modal" id="close_password--button">Fermer</button>
                            <button class="btn btn-secondary text-primary fw-bold me-2"
                                id="cancel_password--button">Annuler</button>
                            <button type="button" class="btn btn-primary fw-bold"
                                id="save_password--button">Confirmer</button>
                        </div>
                    </div>
                </div>
            </div> <!-- Modal Save Photo End -->
            <!-- Modal Disconnect -->
            <div class="animate__animated animate__fadeIn d-none modal_bg--default" id="disconnect--modal">
                <div class="modal-dialog modal-dialog-centered animate__animated animate__fadeIn">
                    <div class="modal-content animate__animated animate__fadeInDown">
                        <!-- Modal Header -->
                        <div class="modal-header" id="modal_disconnect--header">
                            <h5 class="modal-title">Déconnexion</h5>
                            <button type="button" class="btn-close" aria-label="Close"
                                id="close_disconnect--icon"></button>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body" id="modal_disconnect--body">
                            <p>Êtes-vous sûr de vouloir vous déconnecter ?</p>
                        </div>
                        <!-- Modal Footer -->
                        <div class="container-fluid p-2 d-flex" id="modal_disconnect--footer">
                            <button type="button" class="btn btn-outline-secondary me-auto fw-bold"
                                data-bs-dismiss="modal" id="close_disconnect--button">Fermer</button>
                            <button class="btn btn-secondary text-primary fw-bold me-2"
                                id="cancel_disconnect--button">Annuler</button>
                            <button type="button" class="btn btn-primary fw-bold"
                                id="save_disconnect--button">Confirmer</button>
                        </div>
                    </div>
                </div>
            </div> <!-- Modal Disconnect  End -->
        </div>
    </div>
</body>
