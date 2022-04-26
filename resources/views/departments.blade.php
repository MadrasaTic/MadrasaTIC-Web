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
                            <h5 id="modal--title">Confirmer la Suppression</h5>
                            <button type="button" class="btn-close" aria-label="Close" id="close--icon"></button>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <div class="container-fluid p-0">
                                <!-- Add -->
                                <div class="d-none" id="departments_add--body">
                                    @include("./include/departmentsFormAdd")
                                </div>
                                <!-- Modfiy -->
                                <div class="d-none" id="departments_modify--body">
                                    @include("./include/departmentsFormModify")
                                </div>
                                <!-- Remove -->
                                <form action="/members" method="post" id="modal_delete--form">
                                    <p class="d-none" id="remove--body">
                                        Êtes vous sûr de vous supprimer cet élément ?
                                    </p>
                                    <input type="submit" value="" class="remove--submit" hidden>
                                </form>
                            </div>
                        </div>
                        <!-- Modal Footer -->
                        <div class="modal-footer p-2 d-flex">
                            <button type="button" class="btn btn-outline-secondary me-auto fw-bold"
                                id="modal_close--button">Fermer</button>
                            <button type="button" class="btn btn-primary fw-bold "
                                id="modal_save--button">Enregister</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side Bar -->
            @include("./include/sideBar")
            <!-- Table -->
            <div class=" p-4 col-md-7" style="min-height: 100vh">
                <!-- Header -->
                <h3 class="fw-bold mt-6 mb-4">Services</h3>
                <div class="px-4">
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-outline-secondary fw-bold" id="add--button">
                            <i class="fa-solid fa-circle-plus me-1"></i>
                            <span>Ajouter un Service</span>
                        </button>
                    </div>
                </div>
                <!-- Table -->
                <div class="mt-5" id="members--table">
                    <table class="table table-responsive text-center align-middle">
                        <thead id="members--thead">
                            <tr>
                                <th class="w-auto py-3" scope="col">ID</th>
                                <th class="w-auto py-3" scope="col">NOM</th>
                                <th class="w-auto py-3" scope="col">RESPONSABLE</th>
                                <th class="w-auto py-3" scope="col">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="" scope="row">1</th>
                                <td>Service Sécurité</td>
                                <td>BAGHDADLI Mohammed Yacine</td>
                                <td>
                                    <a href="#" class="modify--button me-3 fw-bold">Modifier</a>
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