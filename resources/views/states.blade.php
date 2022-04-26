@include('layouts.app')

<head>
    <link href="{{ asset('css/members.css') }}" rel="stylesheet" />
    <style>
        #circule-color {
            height: 20px;
            width: 20px; 
            background-color: red
        }
    </style>
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
                            <h5 id="modal--title"></h5>
                            <button type="button" class="btn-close" aria-label="Close" id="close--icon"></button>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <div class="container-fluid p-0">
                                <!-- Membre -->
                                <div class="d-none" id="signalmentsState_add--body">
                                    @include("./include/stateFormAdd")
                                </div>
                                <!-- Membre -->
                                <div class="d-none" id="signalmentsState_modify--body">
                                    @include("./include/stateFormModify")
                                </div>
                                <!-- Remove -->
                                <form action="/signalmentsState" method="post" id="modal_delete--form">
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
            <div class=" p-4 col-md-7" style="min-height: 100vh">
                <!-- Header -->
                <h3 class="fw-bold mt-6 mb-4">Etats de Signalement</h3>
                <div class="px-4">
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-outline-secondary fw-bold" id="add--button">
                            <i class="fa-solid fa-circle-plus me-1"></i>
                            <span>Ajouter un Etat</span>
                        </button>
                    </div>
                </div>
                <!-- Members Table -->
                <div class="mt-5" id="members--table">
                    <table class="table table-responsive text-center align-middle">
                        <thead id="members--thead">
                            <tr>
                                <th class="w-auto py-3" scope="col">ID</th>
                                <th class="w-auto py-3" scope="col">NOM</th>
                                <th class="w-auto py-3" scope="col">COULEURS</th>
                                <th class="w-auto py-3" scope="col">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($states as $state)
                            <tr>
                                <th class="" scope="row">{{ $state['id'] }}</th>
                                <td>{{ $state['name'] }}</td>
                                <td class="d-flex align-items-center justify-content-center py-3">
                                    <div class="border-primary border-3 rounded-circle me-2" id="circule-color"></div>
                                    {{ strtoupper($state['color']) }}</td>
                                <td>
                                    <a href="{{ 'signalmentsState/'.$state['id'] }}" class="modify--button me-3 fw-bold">Modifier</a>
                                    <a href="{{ 'signalmentsState/'.$state['id'] }}" class="remove--button link-danger fw-bold">Supprimer</a>
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
