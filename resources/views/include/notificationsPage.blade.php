@include('layouts.app')

<head>
    <link href="{{ asset('css/notificationBar.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

</head>

<div class="col px-3 border-start border-2">
    <div class="w-100 mt-6 mb-5 border-bottom">
        <a type="button" href="/signalments/create" class="btn btn-secondary btn-lg w-100 mb-3">Ajouter un Signalement</a>
        <a type="button" href="/annonces/create" class="btn btn-secondary btn-lg w-100 mb-5">Ajouter une Annonce</a>
    </div>
    <div class="mb-3 border notification--container animate__animated animate__pulse" style="height: 4.5rem;">
        <div class="row m-0 w-100 h-100">
            <div class="col-md-2"></div>
            <div class="col d-flex align-items-center justify-content-start">
                <div>
                    <h6 class="text-light fs-5 fw-bold m-0 ">Titre du Signalement</h6>
                    <p class="text-light fs-6 m-0">il ya 2 min</p>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3 border notification--container animate__animated animate__pulse" style="height: 4.5rem;">
        <div class="row m-0 w-100 h-100">
            <div class="col-md-2"></div>
            <div class="col d-flex align-items-center justify-content-start">
                <div>
                    <h6 class="text-light fs-5 fw-bold m-0 ">Titre du Signalement</h6>
                    <p class="text-light fs-6 m-0">il ya 2 min</p>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3 border notification--container animate__animated animate__pulse" style="height: 4.5rem;">
        <div class="row m-0 w-100 h-100">
            <div class="col-md-2"></div>
            <div class="col d-flex align-items-center justify-content-start">
                <div>
                    <h6 class="text-light fs-5 fw-bold m-0 ">Titre du Signalement</h6>
                    <p class="text-light fs-6 m-0">il ya 2 min</p>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3 border notification--container animate__animated animate__pulse" style="height: 4.5rem;">
        <div class="row m-0 w-100 h-100">
            <div class="col-md-2"></div>
            <div class="col d-flex align-items-center justify-content-start">
                <div>
                    <h6 class="text-light fs-5 fw-bold m-0 ">Titre du Signalement</h6>
                    <p class="text-light fs-6 m-0">il ya 2 min</p>
                </div>
            </div>
        </div>
    </div>

</div>
