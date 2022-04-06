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
                                <!-- Add Membre -->
                                <div class="d-none" id="members_add--body">
                                    @include("./include/membersFormAdd")
                                </div>
                                <!-- Modfiy Membre -->
                                <div class="d-none" id="members_modify--body">
                                    @include("./include/membersFormUpdate")
                                </div>
                                <!-- Remove Body -->
                                <form action="/members" method="post" id="modal_delete--form">
                                    @csrf
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
                            @foreach($members as $member)
                            <tr>
                                <th class="py-3" scope="row">{{ $member['id'] }}</th>
                                <td>{{ $member['userinformation']['last_name']. ' ' .$member['userinformation']['first_name'] }}</td>
                                <td>{{ $member['email'] }}</td>
                                <td>{{ $member['userinformation']['position']['name'] ?? $member[''] }}</td>
                                <td>
                                    <a href="{{ 'members/'.$member['id'] }}" class="modify--button me-3 fw-bold">Consulter</a>
                                    <a href="{{ 'members/'.$member['id'] }}" class="remove--button link-danger fw-bold">{{ $member['acivated'] == 1 ? 'disactiver' : 'Activer' }}</a>
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
