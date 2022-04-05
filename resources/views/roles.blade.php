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
                        <div class="modal-body">
                            <div class="container-fluid p-0">
                                <!-- Add Rôle -->
                                <div class="d-none" id="roles--body">
                                    <form class="row" id="modal--form">
                                        <div class="mb-4 col-md-12">
                                            <div class="input-group">
                                                <input type="text" class="modal--input w-100 p-3"
                                                    placeholder="Nom/Code" />
                                                <span class=" check--container end-0 me-2 fs-4 ">
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
                                                <textarea class="w-100 p-3" placeholder="Déscription du rôles"
                                                    style="height: 25vh"></textarea>
                                                <span class="check--container end-0 me-2 fs-4 d-none ">
                                                    <i
                                                        class="valid--icon fa-solid fa-circle-check d-none text-success animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                                    <i
                                                        class="invalid--icon  fa-solid fa-circle-exclamation text-danger d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
                                                </span>
                                            </div>
                                            <div class="invalid-feedback fs-6 d-none">Enter un nom valide</div>
                                            <div class="valid-feedback fs-6 d-none">Nom valide</div>
                                        </div>
                                        <div class="row m-0 ">
                                            <div class="col-md-3 px-0 py-2 text-center">
                                                <input type="checkbox" class="btn-check m-0 h-100 w-100" id="btncheck1"
                                                    autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btncheck1">Permissions
                                                    1</label>
                                            </div>
                                            <div class="col-md-3 px-0 py-2 text-center">
                                                <input type="checkbox" class="btn-check m-0 w-100" id="btncheck2"
                                                    autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btncheck2">Permissions
                                                    2</label>
                                            </div>
                                            <div class="col-md-3 px-0 py-2 text-center">
                                                <input type="checkbox" class="btn-check m-0 w-100" id="btncheck3"
                                                    autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btncheck3">Permissions
                                                    3</label>
                                            </div>
                                            <div class="col-md-3 px-0 py-2 text-center">
                                                <input type="checkbox" class="btn-check m-0 w-100" id="btncheck4"
                                                    autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btncheck4">Permissions
                                                    4</label>
                                            </div>
                                            <div class="col-md-3 px-0 py-2 text-center">
                                                <input type="checkbox" class="btn-check m-0 w-100" id="btncheck5"
                                                    autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btncheck5">Permissions
                                                    5</label>
                                            </div>
                                            <div class="col-md-3 px-0 py-2 text-center">
                                                <input type="checkbox" class="btn-check m-0 w-100" id="btncheck6"
                                                    autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btncheck6">Permissions
                                                    6</label>
                                            </div>
                                        </div>
                                        <input type="submit" value="" id="submit--button" hidden>
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
                <h3 class="fw-bold mt-6 mb-4">Roles</h3>
                <div class="px-4">
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-outline-secondary add--button fw-bold" id="add--button">
                            <i class="fa-solid fa-circle-plus me-1"></i>
                            <span>Ajouter un Rôle</span>
                        </button>
                    </div>
                </div>
                <!-- Rôle Table -->
                <div class=" p-4 mt-5" id="roles--table">
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
                                    <a href="#" class="modify--button link-primary me-3 fw-bold">Modifier</a>
                                    <a href="#" class="remove--button link-danger fw-bold">Supprimer</a>
                                </td>
                            </tr>
                            <tr>
                                <th class="py-3" scope="row">1</th>
                                <td>Admin</td>
                                <td>6</td>
                                <td>
                                    <a href="#" class="modify--button link-primary me-3 fw-bold">Modifier</a>
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
