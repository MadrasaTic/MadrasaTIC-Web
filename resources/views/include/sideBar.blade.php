<head>
    <link href="{{ asset('css/sideBar.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>


<div class="col d-flex align-items-start justify-content-center " id="sidebar--container">
    <div id="sidebar--top" class="d-flex align-items-center justify-content-center border-danger" >
            <div class="h-auto w-100 ">
                <h3 class="text-primary fw-bold">Menu</h3>
                <div name="qsdf" class="h-auto w-100 h4 mt-4  sidebar_links">
                    <a href="#"><span name=""><i class="fa-solid fa-warning p-3 ms-3 me-1"></i>Signalement</span></a>
                </div>
                <div class="h-auto w-100  h4 sidebar_links">
                    <a href="#"><span name=""><i class="fa-solid fa-bullhorn p-3 ms-3 me-1"></i>Annonce</span></a>
                </div>
                <div class="h-auto w-100  h4 sidebar_links">
                    <a href="#"><span name=""><i class="fa-solid fa-save p-3 ms-3 me-1"></i>Enregistré</span></a>
                </div>
                <div class="h-auto w-100  h4 sidebar_links" id="roles">
                    <a href="{{ route('roles') }}"><span name="roles"><i class="fa-solid fa-key p-3 ms-3 me-1"></i>Roles</span></a>
                </div>
                <div class="h-auto w-100  h4 sidebar_links" id="permissions">
                    <a href="{{ route('permissions') }}"><span name="permissions"><i class="fa-regular fa-star p-3 ms-3 me-1"></i>Permissions</span></a>
                </div>
                <div class="h-auto w-100  h4 sidebar_links" id="members">
                    <a href="{{ route('members') }}"><span name="members"><i class="fa-solid fa-users p-3 ms-3 me-1"></i>Membres</span></a>
                </div>
                <div class="h-auto w-100  h4 sidebar_links" id="profile">
                    <a href="{{ route('profile') }}"><span name="profile"><i class="fa-solid fa-user p-3 ms-3 me-1"></i>Mon Profil</span></a>
                </div>
            </div>
    </div>

</div>
