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
                                <!-- Add Permission -->
                                <div class="d-none" id="permissions_add--body">
                                    @include("./include/permissionsFormAdd")
                                </div>
                                <!-- Modify Permisison -->
                                <div class="d-none" id="permissions_modify--body">
                                    @include("./include/permissionsFormUpdate")
                                </div>
                                <!-- Remove Body -->
                                <p class="d-none" id="remove--body">
                                    Êtes vous sûr de vous supprimer cet élément ?
                                    <input type="submit" value="Submit" >
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
                <h3 class="fw-bold mt-6 mb-4">Permissions</h3>
                <div class="px-4">
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-outline-secondary add--button fw-bold" id="add--button">
                            <i class="fa-solid fa-circle-plus me-1"></i>
                            <span>Ajouter une Permission</span>
                        </button>
                    </div>
                </div>
                <!-- Permission Table -->
                <div class="p-4 mt-5" id="permissions--table">
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
                            @foreach($permissions  as $permission)
                            <tr>
                                <th class="py-3" scope="row">{{$permission['id']}}</th>
                                <td>{{$permission['name']}}</td>
                                <td>{{$permission['description']}}</td>
                                <td>
                                    <a href={{'permissions/'.$permission['id']}}
                                        class="modify--button consult--link link-primary me-3 fw-bold">Modifier</a>
                                    <a href={{"/permissions/delete/".$permissions['id']}} class="remove--button link-danger fw-bold">Supprimer</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
            <!-- Notifications Bar -->
            @include("./include/notificationsPage")
        </div>
    </div>
</body>
