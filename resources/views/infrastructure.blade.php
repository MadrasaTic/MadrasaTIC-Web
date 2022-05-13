@include('layouts.app')

<head>
    <link href="{{ asset('css/infra.css') }}" rel="stylesheet" />
</head>

<body>
    @include('layouts.flash-messages')
    <div class="container-fluid p-0 " style="min-height: 100vh">
        <div class="row p-0 g-0">
            <!-- Side Bar -->
            @include('./include/sideBar')


            <!-- Middle -->
            <div class="p-4 col-md-7 border">
                <!-- Header -->
                <h3 class="fw-bold mt-6">Infrastructure</h3>
                <!-- Infra -->
                <div id="infra--container" class="mt-5" style="min-height: 500px">
                    <div class="row m-0" id="infra-header" style="height: 60px; background-color: #ECF1F4"></div>
                    <!-- Body -->
                    <div class="row m-0 ">
                        <!-- Annexe -->
                        <div class="items--container col m-0 p-0">
                            <div class="items--header fw-bold fs-4 border"><i
                                    class="fa-solid fa-building me-2"></i>Site</div>
                            <div class="items_add--container text-primary fw-bold">
                                <!-- Add Button -->
                                <div class="annexe_add--button items_add" data-type="annexe">
                                    <i class="fa-solid fa-plus me-2"></i>
                                    <span class="fs-5">Ajouter une Annexe</span>
                                </div>
                                <!-- Form -->
                                <div>
                                    <form method="POST" action="/infrastructure/annexe">
                                        @csrf
                                        <input id=name name="name" type="text"
                                            class="d-none w-100 p-4 annexe_add--input" placeholder="Nom de l'annexe"
                                            data-type="annexe">
                                    </form>
                                </div>
                            </div>
                            <!-- Items -->
                            <div id="annexe--container">
                            </div>
                        </div>
                        <!-- Bloc -->
                        <div class="items--container col m-0 p-0">
                            <div class="items--header fw-bold fs-4 border"><i
                                    class="fa-solid fa-square-full me-2"></i>Bloc</div>
                            <div class="text-primary fw-bold">
                                <!-- Add Button -->
                                <div class="bloc_add--button items_add" data-type="bloc">
                                    <i class="fa-solid fa-plus me-2"></i>
                                    <span class="fs-5">Ajouter un Bloc</span>
                                </div>
                                <!-- Form -->
                                <div class="">
                                    <form method="POST" action="/infrastructure/bloc">
                                        <input name="name" type="text" class="d-none w-100 p-4 bloc_add--input"
                                            placeholder="Nom du Bloc" data-type="bloc">
                                    </form>
                                </div>
                            </div>
                            <!-- Items -->
                            <div id="bloc--container" class="">

                            </div>
                        </div>
                        <!-- Salle -->
                        <div class="items--container col m-0 p-0">
                            <div class="items--header fw-bold fs- border"><i
                                    class="fa-solid fa-door-open me-2"></i>Salle</div>
                            <div class="text-primary fw-bold">
                                <!-- Add Button -->
                                <div class="room_add--button items_add" data-type="room">
                                    <i class="fa-solid fa-plus me-2"></i>
                                    <span class="fs-5">Ajouter une Salle</span>
                                </div>
                                <!-- Form -->
                                <div class="">
                                    <form method="POST" action="/infrastructure/room">
                                        <input name="type" type="text" class="d-none w-100 p-4 room_add--input has-next"
                                            placeholder="Type de la Salle" data-type="room">
                                        <input name="name" type="text"
                                            class="d-none w-100 p-4 room_add--input next-input"
                                            placeholder="Nom de la Salle" data-type="room">
                                    </form>
                                </div>
                            </div>
                            <!-- Items -->
                            <div id="room--container" class="">

                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- Middle End-->

            <!-- Notifications Bar -->
            @include('./include/notificationsPage');
        </div>
    </div>
    @include("./include/confirmDeleteModal")
</body>
