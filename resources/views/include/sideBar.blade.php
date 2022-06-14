<head>
    <link href="{{ asset('css/sideBar.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<style>
</style>


<div class="col-md-2 position-relative" id="sidebar--container">
    <div class="position-relative d-flex align-items-center w-100 mt-5" id="sideBar--header">
        <div class="h-100 d-flex align-items-center mx-2" id="SBprofile-picture">
            <div class="rounded-circle bg-secondary" id="">
                @if (Auth::user()->userInformation->avatar_path != "")
            <img
                class="rounded-circle img-fluid"
                src="{{ asset('/storage/images/' . Auth::user()->userInformation->avatar_path) }}"
                alt="img"/>
            @else
            <div
                class="rounded-circle img-fluid"
                style="
                    height: 75px;
                    width: 75px;
                "></div>
            </div>
            @endif

        </div>
        <div class="h-100 d-flex flex-column align-items-center justify-content-center">
            <h3 class="text-primary fw-bold fs-5 ">{{ Auth::user()->userInformation->last_name }}<span class="fw-normal"> {{ Auth::user()->userInformation->first_name }}</span></h3>
            <p class="fs-6 fw-normal m-0">{{ Auth::user()->email }}</p>
        </div>
    </div>
    <div class="position-relative d-flex align-items-center justify-content-center mt-5" id="sidebar--top">
            <div class="h-auto w-100" id="sidebar_items--container">
                <!-- Head -->
                <h3 class="text-primary ms-2 mb-2 h3">Menu</h3>
                <!-- Item -->
                <div name="" class="sideBar--item h-auto w-100 fs-4" item-clicked="0">
                    <a class="link" href="{{ route("signalements")}}">
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
                    <a class="link" href="{{ route("infrastructure") }}">
                        <i class="fa-solid fa-building py-3 px-1 ms-3"></i>
                        <span class="me-1">Infrastructure</span>
                    </a>
                </div>
                <div name="" class="sideBar--item h-auto w-100 fs-4" item-clicked="0">
                    <a class="link" href="#">
                        <i class="fa-solid fa-save py-3 px-1 ms-3"></i>
                        <span class="me-1">Enregistré</span>
                    </a>
                </div>
                <div name="" class="sideBar--item h-auto w-100 fs-4" item-clicked="0">
                    <a class="link" href="{{ route("infrastructure") }}">
                        <i class="fa-solid fa-cog py-3 px-1 ms-3"></i>
                        <span class="me-1">Services</span>
                    </a>
                </div>
                <div name="" class="sideBar--item h-auto w-100 fs-4" item-clicked="0">
                    <a class="link" href="{{ route("signalmentsCategory") }}">
                        <i class="fa-solid fa-list py-3 px-1 ms-3"></i>
                        <span class="me-1">Catégories</span>
                    </a>
                </div>
                <div name="" class="sideBar--item h-auto w-100 fs-4" item-clicked="0">
                    <a class="link" href="{{ route("signalmentsState") }}">
                        <i class="fa-solid fa-flag py-3 px-1 ms-3"></i>
                        <span class="me-1">États</span>
                    </a>
                </div>
                <div name="" class="sideBar--item  h-auto w-100 fs-4">
                    <a class="link" href="{{ route("members")}}">
                        <i class="fa-solid fa-users py-3 px-1 ms-3"></i>
                        <span class="me-1">Membres</span>
                    </a>
                </div>
                <div name="" class="sideBar--item  h-auto w-100 fs-4" item-clicked="0">
                    <a class="link" href="{{ route("roles")}}">
                        <i class="fa-solid fa-key py-3 px-1 ms-3"></i>
                        <span class="me-1">Roles</span>
                    </a>
                </div>
                <div name="" class="sideBar--item  h-auto w-100 fs-4" item-clicked="0">
                    <a class="link" href="{{ route("permissions")}}">
                        <i class="fa-regular fa-star py-3 px-1 ms-3"></i>
                        <span class="me-1">Permissions</span>
                    </a>
                </div>
                <div name="" class="sideBar--item  h-auto w-100 fs-4">
                    <a class="link" href="{{ route("profile")}}">
                        <i class="fa-solid fa-user py-3 px-1 ms-3"></i>
                        <span class="me-1">Mon Profil</span>
                    </a>
                </div>

            </div>
    </div>

</div>
