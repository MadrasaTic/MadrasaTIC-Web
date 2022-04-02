@include('layouts.app')

<head>
    <link href="{{ asset('css/members.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="container-fluid p-0 h-100">
        <div class="row p-0 g-0">
            <!-- Add Rôle Modal -->
            <div class="d-none modal_bg--default animate__animated animate__fadeIn" id="modal--container">
                <div class="modal-dialog modal-dialog-centered animate__animated animate__fadeIn" >
                    <div class="modal-content animate__animated animate__fadeInDown">
                        <!-- Modal Header -->
                        <div class="modal-header" id="modal_photo--header">
                            <h5 id="modal--title">Confirmer la suppression</h5>
                            <button type="button" class="btn-close" aria-label="Close" id="close--icon"></button>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <div class="container-fluid p-0">
                                <!-- Add User -->
                                <div class="d-none" id="members--body">
                                    <form class="row add--forms">
                                        <div class="mb-4 col-md-12">
                                            <div class="input-group">
                                                <input type="text" class="members--inputs w-100 p-3" placeholder="Nom" />
                                                <span class="check--container end-0 me-2 fs-4 ">
                                                    <i class="valid--icon fa-solid fa-circle-check d-none text-success animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                                    <i class="invalid--icon  fa-solid fa-circle-exclamation text-danger d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                                </span>
                                            </div>
                                            <div class="invalid-feedback fs-6 d-none">Enter un nom valide</div>
                                            <div class="valid-feedback fs-6 d-none">Nom valide</div>
                                        </div>
                                        <div class="mb-4 col-md-12">
                                            <div class="input-group">
                                                <input type="text" class="members--inputs w-100 p-3" placeholder="Prénom" />
                                                <span class="check--container end-0 me-2 fs-4 ">
                                                    <i class="valid--icon fa-solid fa-circle-check d-none text-success animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                                    <i class="invalid--icon  fa-solid fa-circle-exclamation text-danger d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                                </span>
                                            </div>
                                            <div class="invalid-feedback fs-6 d-none">Enter un prénom valide</div>
                                            <div class="valid-feedback fs-6 d-none">Prénom valide</div>
                                        </div>
                                        <div class="mb-4 col-md-12">
                                            <div class="input-group">
                                                <input type="email" class="members--inputs w-100 p-3"  placeholder="Email" />
                                                <span class="check--container end-0 me-2 fs-4 ">
                                                    <i class="valid--icon fa-solid fa-circle-check d-none text-success animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                                    <i class="invalid--icon  fa-solid fa-circle-exclamation text-danger d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                                </span>
                                            </div>
                                            <div class="invalid-feedback fs-6 d-none">Enter une adresse e-mail valide (username@esi-sba.dz)</div>
                                            <div class="valid-feedback fs-6 d-none">Email Valide</div>
                                        </div>
                                        <div class="mb-4 col-md-12">
                                            <div class="input-group">
                                                <input type="password" class="members--inputs w-100 p-3" placeholder="Mot de passe" />
                                                <span class="check--container end-0 me-2 fs-4 ">
                                                    <i class="valid--icon fa-solid fa-circle-check d-none text-success animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                                    <i class="invalid--icon  fa-solid fa-circle-exclamation text-danger d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                                </span>
                                            </div>
                                            <div class="invalid-feedback fs-6 d-none">Enter un mot de passe valide</div>
                                            <div class="valid-feedback fs-6 d-none">Mot de passe valide</div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <select class="w-100 p-3" >
                                                    <option value="Admin" selected>Admin</option>
                                                    <option value="Résponsable d'un service">Résponsable d'un service</option>
                                                    <option value="Aiguilleur">Aiguilleur</option>
                                                    <option value="Etudiant">Etudiant</option>
                                                </select>
                                            </div>
                                        </div>
                                    </from>
                                </div>
                                <!-- Add Permission -->
                                <div class="d-none" id="permissions--body">
                                    <form class="row add--forms">
                                        <div class="mb-4 col-md-12">
                                                <div class="input-group">
                                                    <input type="text" class="permissions--inputs w-100 p-3" placeholder="Nom/Code" />
                                                    <span class=" check--container end-0 me-2 fs-4 ">
                                                        <i class="valid--icon fa-solid fa-circle-check d-none text-success animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                                        <i class="invalid--icon  fa-solid fa-circle-exclamation text-danger d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                                    </span>
                                                </div>
                                                <div class="invalid-feedback fs-6 d-none">Enter un nom valide</div>
                                                <div class="valid-feedback fs-6 d-none">Nom valide</div>
                                        </div>
                                        <div class="mb-4 col-md-12">
                                            <div class="input-group">
                                                    <textarea class="w-100 p-3" placeholder="Déscription de la permission" style="height: 100px"></textarea>
                                                    <span class="check--container end-0 me-2 fs-4 d-none ">
                                                        <i class="valid--icon fa-solid fa-circle-check d-none text-success animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                                        <i class="invalid--icon  fa-solid fa-circle-exclamation text-danger d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                                    </span>
                                                </div>
                                                <div class="invalid-feedback fs-6 d-none">Enter un nom valide</div>
                                                <div class="valid-feedback fs-6 d-none">Nom valide</div>
                                        </div>
                                    </form>
                                </div>
                                <!-- Add Rôle -->
                                <div class="d-none" id="roles--body">
                                    <form class="row add--forms">
                                        <div class="mb-4 col-md-12">
                                                <div class="input-group">
                                                    <input type="text" class="roles--inputs w-100 p-3" placeholder="Nom/Code" />
                                                    <span class=" check--container end-0 me-2 fs-4 ">
                                                        <i class="valid--icon fa-solid fa-circle-check d-none text-success animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                                        <i class="invalid--icon  fa-solid fa-circle-exclamation text-danger d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                                    </span>
                                                </div>
                                                <div class="invalid-feedback fs-6 d-none">Enter un nom valide</div>
                                                <div class="valid-feedback fs-6 d-none">Nom valide</div>
                                        </div>
                                        <div class="mb-4 col-md-12">
                                            <div class="input-group">
                                                    <textarea class="w-100 p-3" placeholder="Déscription du rôles" style="height: 100px"></textarea>
                                                    <span class="check--container end-0 me-2 fs-4 d-none ">
                                                        <i class="valid--icon fa-solid fa-circle-check d-none text-success animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                                        <i class="invalid--icon  fa-solid fa-circle-exclamation text-danger d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                                    </span>
                                                </div>
                                                <div class="invalid-feedback fs-6 d-none">Enter un nom valide</div>
                                                <div class="valid-feedback fs-6 d-none">Nom valide</div>
                                        </div>
                                        <div class="row m-0 p-0">
                                            <div class="col-md-4 px-0 py-2 text-center">
                                                <input type="checkbox" class="btn-check m-0 w-100" id="btncheck1" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btncheck1">Permissions 1</label>
                                            </div>
                                            <div class="col-md-4 px-0 py-2 text-center">
                                                <input type="checkbox" class="btn-check m-0 w-100" id="btncheck2" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btncheck2">Permissions 2</label>
                                            </div>
                                            <div class="col-md-4 px-0 py-2 text-center">
                                                <input type="checkbox" class="btn-check m-0 w-100" id="btncheck3" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btncheck3">Permissions 3</label>
                                            </div>
                                            <div class="col-md-4 px-0 py-2 text-center">
                                                <input type="checkbox" class="btn-check m-0 w-100" id="btncheck4" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btncheck4">Permissions 4</label>
                                            </div>
                                            <div class="col-md-4 px-0 py-2 text-center">
                                                <input type="checkbox" class="btn-check m-0 w-100" id="btncheck5" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btncheck5">Permissions 5</label>
                                            </div>
                                            <div class="col-md-4 px-0 py-2 text-center">
                                                <input type="checkbox" class="btn-check m-0 w-100" id="btncheck6" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btncheck6">Permissions 6</label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- Remove Body -->
                                <p class="d-none" id="remove--body">
                                    Êtes vous sûr de vous supprimer cet élément ?
                                </p>

                            </div>
                        </div>
                        <!-- Modal Footer -->
                        <div class="modal-footer p-2 d-flex">
                            <button type="button" class="btn btn-outline-secondary me-auto fw-bold" data-bs-dismiss="modal" id="close--button">Fermer</button>
                            <button type="button" class="btn btn-primary fw-bold disabled" id="save--button">Enregister</button>
                        </div>
                    </div>
                </div>
            </div> <!-- Modal Save Photo End -->
            <div class="col d-flex align-items-center justify-content-center border">side bar</div>
            <!-- Middle Part -->
            <div class="col-md-7" style="min-height: 100vh">
                <!-- Header -->
                <h3 class="fw-bold mt-6 mb-4">Membres</h3>  
                <div class="px-4">
                    <div class="d-flex justify-content-end">
                        <select class="form-select me-3 w-25" name="select" id="table--select">
                            <option value="members" selected>Members</option>
                            <option value="permissions">Permission</option>
                            <option value="roles">Rôles</option>
                        </select>
                        <button class="btn btn-outline-secondary add--button fw-bold" id="add--button"><i class="fa-solid fa-circle-plus me-1"></i>
                            <span class="" id="add_members--text">Ajouter un Utilisateur </span> 
                            <span class="d-none" id="add_roles--text">Ajouter un Rôle</span>
                            <span class="d-none" id="add_permissions--text">Ajouter une Permission</span>
                        </button>
                    </div>
                </div>
                <!-- Rôle Table -->
                <div class="d-none p-4 mt-5" id="roles--table">
                    <table class="table table-responsive text-center align-middle">
                        <thead id="roles--thead">
                            <tr>
                                <th class="w-auto py-3" scope="col">ID</th>
                                <th class="w-auto py-3" scope="col">NOM</th>
                                <th class="w-auto py-3" scope="col">#PERMISSIONS</th>
                                <th class="w-25 py-3" scope="col">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="py-3" scope="row">1</th>
                                    <td>Admin</td>
                                    <td>6</td>
                                    <td>
                                        <a href="#" class="consult--link link-primary me-3 fw-bold" id="roles_consult--link">Modifier</a>
                                        <a href="#" class="link-danger fw-bold" id="roles_remove--link">Supprimer</a>
                                    </td>
                                </tr>
                                <th class="py-3" scope="row">1</th>
                                    <td>Réponsable d"un  Service</td>
                                    <td>4</td>
                                    <td>
                                        <a href="#" class="consult--link link-primary me-3 fw-bold" id="roles_consult--link">Modifier</a>
                                        <a href="#" class="link-danger fw-bold" id="roles_remove--link">Supprimer</a>
                                    </td>
                                </tr>
                                <th class="py-3" scope="row">1</th>
                                    <td>Aiguilleur</td>
                                    <td>2</td>
                                    <td>
                                        <a href="#" class="consult--link link-primary me-3 fw-bold" id="roles_consult--link">Modifier</a>
                                        <a href="#" class="link-danger fw-bold" id="roles_remove--link">Supprimer</a>
                                    </td>
                                </tr>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Members Table -->
                <div class=" p-4 mt-5" id="members--table">
                    <table class="table table-responsive text-center align-middle">
                        <thead  id="members--thead">
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
                                        <a href="#" class="link-primary me-3 fw-bold" id="members_consult--link">Consulter</a>
                                        <a href="#" class="remove--link link-danger fw-bold" id="members_remove--link">Supprimer</a>
                                    </td>
                                </tr>
                                <th class="py-3" scope="row">1</th>
                                    <td>LATRECHE Yassine</td>
                                    <td>ya.latreche@esi-sba.dz</td>
                                    <td>Etudiant</td>
                                    <td>
                                        <a href="#" class="link-primary me-3 fw-bold" id="members_consult--link">Consulter</a>
                                        <a href="#" class="remove--link link-danger fw-bold" id="members_remove--link">Supprimer</a>
                                    </td>
                                </tr>
                                <th class="py-3" scope="row">1</th>
                                    <td>TOABA Rabie</td>
                                    <td>tf.rabie@esi-sba.dz</td>
                                    <td>Etudiant</td>
                                    <td>
                                        <a href="#" class="link-primary me-3 fw-bold" id="members_consult--link">Consulter</a>
                                        <a href="#" class="remove--link link-danger fw-bold" id="members_remove--link">Supprimer</a>
                                    </td>
                                </tr>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Permission Table -->
                <div class="d-none p-4 mt-5" id="permissions--table">
                    <table class="table table-responsive text-center align-middle">
                        <thead id="permissions--thead">
                            <tr>
                                <th class="w-auto py-3" scope="col">ID</th>
                                <th class="w-auto py-3" scope="col">NOM</th>
                                <th class="w-auto py-3" scope="col">DESCRIPTION</th>
                                <th class="w-25 py-3" scope="col">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="py-3" scope="row">1</th>
                                    <td>Permission 1</td>
                                    <td>Description</td>
                                    <td>
                                        <a href="#" class="consult--link link-primary me-3 fw-bold" id="permissions_consult--link">Modifier</a>
                                        <a href="#" class="link-danger fw-bold" id="permissions_remove--link">Supprimer</a>
                                    </td>
                                </tr>
                                <th class="py-3" scope="row">1</th>
                                    <td>Permission 2</td>
                                    <td>Description</td>
                                    <td>
                                        <a href="#" class="consult--link link-primary me-3 fw-bold" id="permissions_consult--link">Modifier</a>
                                        <a href="#" class="link-danger fw-bold" id="permissions_remove--link">Supprimer</a>
                                    </td>
                                </tr>
                                <th class="py-3" scope="row">1</th>
                                    <td>Permission 3</td>
                                    <td>Description</td>
                                    <td>
                                        <a href="#" class="consult--link link-primary me-3 fw-bold" id="permissions_consult--link">Modifier</a>
                                        <a href="#" class="link-danger fw-bold" id="permissions_remove--link">Supprimer</a>
                                    </td>
                                </tr>
                            </tr>
                        </tbody>
                    </table>
                </div>
                

            </div> <!-- Middle Part End-->
            <div class="col-md-3 d-flex align-items-center justify-content-center border">actu</div>
        </div>
    </div>
</body>