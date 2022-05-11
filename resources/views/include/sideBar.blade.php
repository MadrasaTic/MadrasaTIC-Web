<head>
    <link href="{{ asset('css/sideBar.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<style> 
</style>


<div class="col-md-2 position-relative" id="sidebar--container">
    <div class="position-absolute d-flex align-items-center w-100 mt-6" id="sideBar--header">
        <div class="h-100 d-flex align-items-center mx-2" id="SBprofile-picture">
            <img class="rounded-circle"src="" alt="img">
        </div>
        <div class="h-100 d-flex flex-column align-items-center justify-content-center">
            <h3 class="text-primary fw-bold fs-5 ">BAGHDADLI<span class="fw-normal"> Yacine</span></h3>
            <p class="fs-6 fw-normal m-0">my.baghdadli@esi-sba.dz</p>
        </div>
    </div>
    <div class="position-relative d-flex align-items-center justify-content-center" id="sidebar--top">
            <div class="h-auto w-100 ">
                <!-- Head -->
                <h3 class="text-primary ms-2 mb-2 h3">Menu</h3>
                <!-- Item -->
                <div name="" class="sideBar--item h-auto w-100 fs-4" item-clicked="0">
                    <a class="link" href="#">
                        <i class="fa-solid fa-warning py-3 px-1 ms-3"></i>
                        <span class="me-1">Signalement</span>
                    </a>
                </div>
                <!-- Item -->
                <div name="" class="sideBar--item h-auto w-100 fs-4" item-clicked="0">
                    <a class="link" href="#">
                        <i class="fa-solid fa-bullhorn py-3 px-1 ms-3"></i>
                        <span class="me-1">Annonce</span>
                    </a>
                </div>
                <div name="" class="sideBar--item h-auto w-100 fs-4" item-clicked="0">
                    <a class="link" href="#">
                        <i class="fa-solid fa-save py-3 px-1 ms-3"></i>
                        <span class="me-1">Enregistré</span>
                    </a>
                </div>
                <div name="" class="sideBar--item  h-auto w-100 fs-4" item-clicked="0">
                    <a class="link" href="#">
                        <i class="fa-solid fa-key py-3 px-1 ms-3"></i>
                        <span class="me-1">Roles</span>
                    </a>
                </div>
                <div name="" class="sideBar--item  h-auto w-100 fs-4" item-clicked="0">
                    <a class="link" href="#">
                        <i class="fa-regular fa-star py-3 px-1 ms-3"></i>
                        <span class="me-1">Permissions</span>
                    </a>
                </div>
                <div name="" class="sideBar--item  h-auto w-100 fs-4">
                    <a class="link" href="#">
                        <i class="fa-solid fa-users py-3 px-1 ms-3"></i>
                        <span class="me-1">Membres</span>
                    </a>
                </div>
                <div name="" class="sideBar--item  h-auto w-100 fs-4">
                    <a class="link" href="#">
                        <i class="fa-solid fa-user py-3 px-1 ms-3"></i>
                        <span class="me-1">Mon Profil</span>
                    </a>
                </div>

            </div>
    </div>

</div>
