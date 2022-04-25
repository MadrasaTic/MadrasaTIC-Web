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
                    <!-- H1 -->
                    <div class="" id="infra-header" style="height: 60px; background-color: #ECF1F4">
                    </div>
                    <!-- Body -->
                    <div class="row m-0 ">
                        <!-- Annexe -->
                        <div class="items--container col m-0 p-0">
                            <div class="items--header fw-bold fs-5 border"><i class="fa-solid fa-building me-2"></i>Annexe</div>
                            <div class="items_add--container text-primary fw-bold">
                                <div class="items--add">
                                    <i class="fa-solid fa-plus me-2"></i>
                                    <span>Ajouter une Annexe</span>
                                </div>
                                <div>
                                    <form action="">
                                        <input type="text"class="d-none w-100 p-4 add_items--input" placeholder="Nom de l'annexe">
                                    </form>
                                </div>
                            </div>
                            <div class="item d-flex">Cycle Supérieure <i class="d-none ms-2 fa-solid fa-angles-right"></i></div>
                            <div class="item">Cycle Préparatoire <i class="d-none ms-2 fa-solid fa-angles-right"></i></div>
                        </div>
                        <!-- Bloc -->
                        <div class="items--container col m-0 p-0">
                            <div class="items--header fw-bold fs-5 border"><i class="fa-solid fa-square-full me-2"></i>Bloc</div>
                            <div id="bloc-container" class="d-none">
                                <div class="text-primary fw-bold">
                                    <div class="items--add">
                                        <i class="fa-solid fa-plus me-2"></i>
                                        <span>Ajouter un Bloc</span>
                                    </div>
                                    <div class="">
                                        <form action="">
                                            <input type="text"class="d-none w-100 p-4 add_items--input" placeholder="Nom du Bloc">
                                        </form>
                                    </div>
                                </div>
                                <div class="item">Bloc A <i class="d-none ms-2 fa-solid fa-angles-right"></i></div>
                                <div class="item">Bloc B <i class="d-none ms-2 fa-solid fa-angles-right"></i></div>
                            </div>
                        </div>
                        <!-- Salle -->
                        <div class="items--container col m-0 p-0">
                            <div class="items--header fw-bold fs-5 border"><i class="fa-solid fa-door-open me-2"></i>Salle</div>
                            <div id="salle-container" class="d-none">
                                <div class="text-primary fw-bold">
                                    <div class="items--add">
                                        <i class="fa-solid fa-plus me-2"></i>
                                        <span>Ajouter une Salle</span>
                                    </div>
                                    <div class="">
                                        <form action="">
                                            <input type="text"class="d-none w-100 p-4 add_items--input has-next" placeholder="Nom de la Salle ">
                                            <input type="text"class="d-none w-100 p-4 add_items--input next-input" placeholder="Type de la Salle">
                                        </form>
                                    </div>
                                </div>
                                <div class="item">Cycle Supérieure</div>
                                <div class="item">Cycle Préparatoire</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- Middle End-->

            <!-- Notifications Bar -->
            @include('./include/notificationsPage');
        </div>
    </div>
</body>
