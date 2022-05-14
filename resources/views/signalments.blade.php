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
                <h3 class="fw-bold mt-4">Bonjour Yacine ! </h3>
                <!-- Stats -->
                <div class="mb-4 mt-2" id="stats--container">
                    <p class="fs-3 m-0">Statistiques</p>
                    <div class="m-0" id="stats" style="height: 60vh">
                        <div class="row h-100 m-0 ">
                            <div class="col-md-4 p-0 d-flex align-items-center justify-content-start ">
                                <div class="progress-cards text-center rounded-6 d-block">
                                    <svg class="m-auto progress mt-3 bg-primary w-75 h-75 green noselect"
                                        data-progress="65" x="0px" y="0px" viewBox="0 0 80 80">
                                        <path class="track" d="M5,40a35,35 0 1,0 70,0a35,35 0 1,0 -70,0" />
                                        <path class="fill" d="M5,40a35,35 0 1,0 70,0a35,35 0 1,0 -70,0" />
                                        <text class="value" x="50%" y="55%">0%</text>
                                    </svg>
                                    <div class="m-auto">
                                        <span>text here</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 h-50">

                            </div>
                            <div class="col-md-4 h-50"></div>
                            <div class="col-md-4 h-50"></div>
                            <div class="col-md-4 h-50"></div>
                        </div>
                    </div>
                </div>
                <!-- Signalments -->
                <div id="signalments--container">
                    <!-- Header -->
                    <div class="d-flex align-items-center py-2" id="signa--header">
                        <p class="fs-3 me-auto my-auto ">Signalments</p>
                        <i class="fs-3 bi bi-grid-3x3-gap-fill"></i>
                    </div>
                    <!-- Nav -->
                    <div class="d-flex p-0 align-items-center" id="signa--nav">
                        <div class="col nav_filter nav_item--hoverd">Signalement Aiguillés</div>
                        <div class="col nav_filter">Signalement non Aiguillés</div>
                        <div class="col position-relative d-flex justify-content-end" id="signa_search--container">
                            <!-- Input -->
                            <div class="h-75 w-100" id="search_input--container">
                                <form action="/search" method="get"  class="h-100 w-100">
                                    <input type="text" name="search" class="px-3 h-100 w-100" id="search--input"
                                                            placeholder="Rechercher ...">
                                </form>
                            </div>
                            <!-- Icon -->
                            <div class=" me-2" id="search_icon--container">
                                <i class="align-middle bi bi-search" id="search_icon"></i>
                            </div>
                        </div>  
                    </div>
                    <!-- Filter -->
                    <div class="row mt-2 m-0">
                        <select class="col py-2 m-2" name="" id="category--select">
                          @foreach($categories as $category)
                            <option value="{{$category->id}}" >{{$category->name}}</option>
                          @endforeach 
                        </select>
                        <select class="col py-2 m-2" name="" id="state--select">
                          @foreach($states as $state)
                            <option value="{{$state->id}}" selected>{{$state->name}}</option>
                          @endforeach
                        </select>
                        <button class="btn col py-2 m-2 text-start" id="infra_filter--button">Infrastructure</button>
                        <input class="col py-2 m-2" type="date" placeholder="Date" id="date_range--input">
                    </div>
                    <!-- Infra -->
                    <div class="row m-0 d-none animate__animated  animate__fadeIn" id="infra-filters--container">
                        <select class="col py-2 m-2" id="annexe--select">
                        </select>
                        <select class="col py-2 m-2" name="" id="bloc--select">
                        </select>
                        <select class="col py-2 m-2" name="" id="room--select">
                        </select>
                    </div>

                    <!-- Cards -->
                    
                    <div class="mt-4" id="signa_cards--container">
                        <div class="row m-0" id="signa--cards"> 
                        @foreach($signals as $signal)
                            <div class="col-xl-6 col-md-12 px-3 py-3">
                                <!-- Card  -->
                                <div class="card border h-100 w-100 rounded-6">
                                    <img src="https://picsum.photos/600/600"
                                        class="img-fluid card-img-top h-50 rounded-6" alt="...">
                                    <div class="card-body h-50">
                                        <div class="card-description d-flex align-items-center text-secondary">
                                            <p class="me-auto my-auto  fw-bold" >{{$signal->category['name'] ?? '/'}}</p>
                                            <span class="d-flex px-1 rounded-6" id="state--container">
                                                <div class="my-auto me-1" id="color--icon" data-color="{{$signal->state['color']}}"></div>
                                                <span class="fw-500">{{$signal->state['name']}}</span>
                                            </span>
                                        </div>
                                        <h5 class="card-title fw-bold" >{{ $signal->signalement['title'] ?? '/' }}</h5>
                                        <p class="card-text">{{ $signal->signalement['description'] ?? '/' }}</p>
                                        <div class="card--footer d-flex">
                                            <a class="me-auto my-auto" href="test"></a>
                                            <a href="#" class="btn btn-primary" id="show_modal--button">Détails</a>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        @endforeach
                            <div class="col-xl-6 col-md-12"></div>
                            <div class="col-xl-6 col-md-12"></div>
                        </div>
                    </div>
                </div>
            </div> <!-- Middle End-->

            <!-- Show Signalments Modal -->
            @include('./include/showSignalmentModal')

            <!-- Notifications Bar -->
            @include('./include/notificationsPage');
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        var forEach = function (array, callback, scope) {
            for (var i = 0; i < array.length; i++) {
                callback.call(scope, i, array[i]);
            }
        };
        window.onload = function () {
            var max = -219.99078369140625;
            forEach(document.querySelectorAll('.progress'), function (index, value) {
                percent = value.getAttribute('data-progress');
                value.querySelector('.fill').setAttribute('style', 'stroke-dashoffset: ' + ((100 -
                    percent) / 100) * max);
                value.querySelector('.value').innerHTML = percent + '%';
            });
        }

    </script>

    <script>
        flatpickr("#date_range--input", {
            mode: "range",
            enableTime: true,
            dateFormat: "d.m.Y",
            onChange: function(selectedDates, dateStr, instance) {
                const dates = dateStr.split(" to ");
                if (dates.length == 1) return;
                console.log(dates);
            }
        });

    </script>


</body>
