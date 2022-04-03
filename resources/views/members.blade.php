@include('layouts.app')

<head>
    <link href="{{ asset('css/members.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="container-fluid p-0 h-100">
        <div class="row p-0 g-0">
            <!-- Add Rôle Modal -->
            <div class="d-none modal_bg--default animate__animated animate__fadeIn" id="modal--container">
                <div class="modal-dialog modal-lg modal-dialog-centered  animate__animated animate__fadeIn" >
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
                                @include("./include/membersModal")
                                <!-- Add Permission -->
                                @include("./include/permissionsModal")
                                <!-- Add Rôle -->
                                @include("./include/rolesModal")
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
            </div> 
            <!-- Side Bar -->
            @include("./include/sideBar")
            <!-- Profile -->
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
                @include("./include/rolesTable")
                <!-- Members Table -->
                @include("./include/membersTable")
                <!-- Permission Table -->
                @includ("./include/permissionsTable")
            </div> 
            <!-- Notifications Bar -->
            @include("./include/notificationsPage")
        </div>
    </div>
</body>