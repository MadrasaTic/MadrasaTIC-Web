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
                        width: 75px;">
                </div>
                @endif
            </div>

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
                <a class="link" href="{{ route("signalements")}}">
                    <div name="" class="@if(Route::current()->getName() == "signalements") sideBar_item--selected @endif sideBar--item h-auto w-100 fs-4" item-clicked="0">
                        <i class="fa-solid fa-warning py-3 px-1 ms-3"></i>
                        <span class="me-1">Signalement</span>
                    </div>
                </a>
                <!-- Item -->
                <a class="link" href="#">
                    <div name="" class="@if(Route::current()->getName() == "annonces") sideBar_item--selected @endif sideBar--item h-auto w-100 fs-4" item-clicked="0">
                        <i class="fa-solid fa-bullhorn py-3 px-1 ms-3"></i>
                        <span class="me-1">Annonce</span>
                    </div>
                </a>
                <a class="link" href="{{ route("infrastructure") }}">
                    <div name="" class="@if(Route::current()->getName() == "infrastructure") sideBar_item--selected @endif sideBar--item h-auto w-100 fs-4" item-clicked="0">
                        <i class="fa-solid fa-building py-3 px-1 ms-3"></i>
                        <span class="me-1">Infrastructure</span>
                    </div>
                </a>
                {{-- <a class="link" href="#">
                    <div name="" class="@if(Route::current()->getName() == "saved") sideBar_item--selected @endif sideBar--item h-auto w-100 fs-4" item-clicked="0">
                        <i class="fa-solid fa-save py-3 px-1 ms-3"></i>
                        <span class="me-1">Enregistré</span>
                    </div>
                </a> --}}
                <a class="link" href="{{ route("departments") }}">
                    <div name="" class="@if(Route::current()->getName() == "departments") sideBar_item--selected @endif sideBar--item h-auto w-100 fs-4" item-clicked="0">
                        <i class="fa-solid fa-cog py-3 px-1 ms-3"></i>
                        <span class="me-1">Services</span>
                    </div>
                </a>
                <a class="link" href="{{ route("signalmentsCategory") }}">
                    <div name="" class="@if(Route::current()->getName() == "signalmentsCategory") sideBar_item--selected @endif sideBar--item h-auto w-100 fs-4" item-clicked="0">
                        <i class="fa-solid fa-list py-3 px-1 ms-3"></i>
                        <span class="me-1">Catégories</span>
                    </div>
                </a>
                <a class="link" href="{{ route("signalmentsState") }}">
                    <div name="" class="@if(Route::current()->getName() == "signalmentsState") sideBar_item--selected @endif sideBar--item h-auto w-100 fs-4" item-clicked="0">
                        <i class="fa-solid fa-flag py-3 px-1 ms-3"></i>
                        <span class="me-1">États</span>
                    </div>
                </a>
                <a class="link" href="{{ route("signalmentsPriority") }}">
                    <div name="" class="@if(Route::current()->getName() == "signalmentsPriority") sideBar_item--selected @endif sideBar--item h-auto w-100 fs-4" item-clicked="0">
                        <i class="fa-solid fa-level-up py-3 px-1 ms-3"></i>
                        <span class="me-1">Priorités</span>
                    </div>
                </a>
                <a class="link" href="{{ route("members")}}">
                    <div name="" class="@if(Route::current()->getName() == "members") sideBar_item--selected @endif sideBar--item  h-auto w-100 fs-4">
                        <i class="fa-solid fa-users py-3 px-1 ms-3"></i>
                        <span class="me-1">Membres</span>
                    </div>
                </a>
                <a class="link" href="{{ route("roles")}}">
                    <div name="" class="@if(Route::current()->getName() == "roles") sideBar_item--selected @endif sideBar--item  h-auto w-100 fs-4" item-clicked="0">
                        <i class="fa-solid fa-key py-3 px-1 ms-3"></i>
                        <span class="me-1">Roles</span>
                    </div>
                </a>
                <a class="link" href="{{ route("permissions")}}">
                    <div name="" class="@if(Route::current()->getName() == "permissions") sideBar_item--selected @endif sideBar--item  h-auto w-100 fs-4" item-clicked="0">
                        <i class="fa-regular fa-star py-3 px-1 ms-3"></i>
                        <span class="me-1">Permissions</span>
                    </div>
                </a>
                <a class="link" href="{{ route("profile")}}">
                    <div name="" class="@if(Route::current()->getName() == "profile") sideBar_item--selected @endif sideBar--item  h-auto w-100 fs-4">
                        <i class="fa-solid fa-user py-3 px-1 ms-3"></i>
                        <span class="me-1">Mon Profil</span>
                    </div>
                </a>

            </div>
    </div>

</div>
