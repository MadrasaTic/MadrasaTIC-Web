@include('layouts.app')

<head>
    <link href="{{ asset('css/signalments.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- Date ranger picker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

</head>

<body>
    @include('layouts.flash-messages')
    <div class="container-fluid p-0 " style="min-height: 100vh">
        <div class="row p-0 g-0">
            <!-- Side Bar -->
            @include('./include/sideBar')


            <!-- Middle -->
            <div class="p-4 col-md-7">
                <!-- Signalments -->
                <div id="signalments--container">
                    <!-- Header -->
                    <div class="d-flex align-items-center py-2" id="signa--header">
                        <p class="fs-3 me-auto my-auto ">Annonces</p>
                        <i class="fs-3 bi bi-grid-3x3-gap-fill"></i>
                    </div>
                    <!-- Cards -->
                    <div class="mt-4" id="signa_cards--container">
                        <div class="row m-0" id="signa--cards">
                            <!-- Card  -->
                            @foreach($annonces as $annonce)
                            @if($annonce['public'] == '1')
                            <div class="col-xl-6 col-md-12 px-3 py-3">
                                <div class="card border h-100 w-100 rounded-6">
                                    <img src="{{asset('/images/annonces/'.$annonce['image'])}}"
                                        class="img-fluid card-img-top h-50 rounded-6" alt="Image du signalement">
                                    <div class="card-body h-50">
                                        <div class="card-description d-flex align-items-center text-secondary">
                                            <p class="me-auto my-auto fw-bold">{{$annonce->user->userInformation['first_name']}} {{$annonce->user->userInformation['last_name']}}</p>
                                            <span class="d-flex px-1 rounded-6" id="state--container">
                                                <div class="my-auto me-1" id="color--icon"></div>
                                                <span class="fw-500">{{$annonce->state}}</span>
                                            </span>
                                        </div>
                                        <h5 class="card-title fw-bold">{{$annonce->title}}</h5>
                                        <p class="card-text">{{$annonce->description}}</p>
                                        <div class="card--footer d-flex">
                                            <a class="me-auto my-auto" href="test"></a>
                                            <button href={{'annonces/'.$annonce['id']}} class="btn btn-primary show_modal--button">Détails</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @include('./include/showAnnonceModal')
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div> <!-- Middle End-->

            <!-- Show Signalments Modal -->
            

            <!-- Notifications Bar -->
            @include('./include/notificationsPage');
        </div>
    </div>

    
 


</body>
