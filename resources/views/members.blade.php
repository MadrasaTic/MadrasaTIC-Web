@include('layouts.app')

<head>
    <link href="{{ asset('css/members.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="container-fluid p-0 h-100">
        <div class="row p-0 g-0">
            <!-- Add Rôle Modal -->
            <div class="d-none modal_bg--default animate__animated animate__fadeIn" id="modal--container">
                <div class="modal-dialog modal-lg modal-dialog-centered  animate__animated animate__fadeIn">
                    <div class="modal-content animate__animated animate__fadeInDown">
                        <!-- Modal Header -->
                        <div class="modal-header" id="modal_photo--header">
                            <h5 id="modal--title">Confirmer la suppression</h5>
                            <button type="button" class="btn-close" aria-label="Close" id="close--icon"></button>
                        </div>
                        <!-- Modal Body -->
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <div class="container-fluid p-0">
                                <!-- Add Membre -->
                                <div class="" id="members--body">
                                    <form class="row" id="modal--form">
                                        <div class="mb-4 col-md-12">
                                            <div class="input-group">
                                                <input type="text" class="members--inputs w-100 p-3"
                                                    placeholder="Nom" />
                                                <span class="check--container end-0 me-2 fs-4 ">
                                                    <i
                                                        class="valid--icon fa-solid fa-circle-check d-none text-success animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                                    <i
                                                        class="invalid--icon  fa-solid fa-circle-exclamation text-danger d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                                </span>
                                            </div>
                                            <div class="invalid-feedback fs-6 d-none">Enter un nom valide</div>
                                            <div class="valid-feedback fs-6 d-none">Nom valide</div>
                                        </div>
                                        <div class="mb-4 col-md-12">
                                            <div class="input-group">
                                                <input type="text" class="members--inputs w-100 p-3"
                                                    placeholder="Prénom" />
                                                <span class="check--container end-0 me-2 fs-4 ">
                                                    <i
                                                        class="valid--icon fa-solid fa-circle-check d-none text-success animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                                    <i
                                                        class="invalid--icon  fa-solid fa-circle-exclamation text-danger d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                                </span>
                                            </div>
                                            <div class="invalid-feedback fs-6 d-none">Enter un prénom valide</div>
                                            <div class="valid-feedback fs-6 d-none">Prénom valide</div>
                                        </div>
                                        <div class="mb-4 col-md-12">
                                            <div class="input-group">
                                                <input type="email" class="members--inputs w-100 p-3"
                                                    placeholder="Email" />
                                                <span class="check--container end-0 me-2 fs-4 ">
                                                    <i
                                                        class="valid--icon fa-solid fa-circle-check d-none text-success animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                                    <i
                                                        class="invalid--icon  fa-solid fa-circle-exclamation text-danger d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                                </span>
                                            </div>
                                            <div class="invalid-feedback fs-6 d-none">Enter une adresse e-mail valide
                                                (username@esi-sba.dz)</div>
                                            <div class="valid-feedback fs-6 d-none">Email Valide</div>
                                        </div>
                                        <div class="mb-4 col-md-12">
                                            <div class="input-group">
                                                <input type="password" class="members--inputs w-100 p-3"
                                                    placeholder="Mot de passe" />
                                                <span class="check--container end-0 me-2 fs-4 ">
                                                    <i
                                                        class="valid--icon fa-solid fa-circle-check d-none text-success animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                                    <i
                                                        class="invalid--icon  fa-solid fa-circle-exclamation text-danger d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                                </span>
                                            </div>
                                            <div class="invalid-feedback fs-6 d-none">Enter un mot de passe valide</div>
                                            <div class="valid-feedback fs-6 d-none">Mot de passe valide</div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <select class="w-100 p-3">
                                                    <option value="Admin" selected>Admin</option>
                                                    <option value="Résponsable d'un service">Résponsable d'un service
                                                    </option>
                                                    <option value="Aiguilleur">Aiguilleur</option>
                                                    <option value="Etudiant">Etudiant</option>
                                                </select>
                                            </div>
                                        </div>
                                        <input type="submit" value="" id="submit--button" hidden>
                                        </from>
                                </div>
                                <!-- Remove Body -->
                                <p class="d-none" id="remove--body">
                                    Êtes vous sûr de vous supprimer cet élément ?
                                </p>
                            </div>
                        </div>


                        <!-- Modal Footer -->
                        <div class="modal-footer p-2 d-flex">
                            <button type="button" class="btn btn-outline-secondary me-auto fw-bold"
                                id="modal_close--button">Fermer</button>
                            <button type="button" class="btn btn-primary fw-bold disabled"
                                id="modal_save--button">Enregister</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side Bar -->
            @include("./include/sideBar")
            <!-- Profile -->
            <div class="col-md-7" style="min-height: 100vh">
                <!-- Header -->
                <h3 class="fw-bold mt-6 mb-4">Membres</h3>
                <div class="px-4">
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-outline-secondary fw-bold" id="add--button">
                            <i class="fa-solid fa-circle-plus me-1"></i>
                            <span>Ajouter un Membre</span>
                        </button>
                    </div>
                </div>
                <!-- Members Table -->
                <div class=" p-4 mt-5" id="members--table">
                    <table class="table table-responsive text-center align-middle">
                        <thead id="members--thead">
                            <tr>
                                <th class="w-auto py-3" scope="col">ID</th>
                                <th class="w-auto py-3" scope="col">NOM ET PRÉNOM</th>
                                <th class="w-auto py-3" scope="col">EMAIL</th>
                                <th class="w-auto py-3" scope="col">RÔLE</th>
                                <th class="w-25 py-3" scope="col">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="py-3" scope="row">1</th>
                                <td>BAGHDADLI Mohammed Yacine</td>
                                <td>my.baghdadli@esi-sba.dz</td>
                                <td>Etudiant</td>
                                <td>
                                    <a href="#" class="modify--button me-3 fw-bold">Consulter</a>
                                    <a href="#" class="remove--button link-danger fw-bold">Supprimer</a>
                                </td>
                            </tr>
                            <tr>
                                <th class="py-3" scope="row">1</th>
                                <td>BAGHDADLI Mohammed Yacine</td>
                                <td>my.baghdadli@esi-sba.dz</td>
                                <td>Etudiant</td>
                                <td>
                                    <a href="#" class="modify--button me-3 fw-bold">Consulter</a>
                                    <a href="#" class="remove--button link-danger fw-bold">Supprimer</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>




            </div>
            <!-- Notifications Bar -->
            @include("./include/notificationsPage")
        </div>
    </div>
</body>
