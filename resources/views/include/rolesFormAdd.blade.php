<form class="row" id="modal--form" action="/roles" method="POST">
    @csrf
    <div class="mb-4 col-md-12">
        <div class="input-group">
            <input type="text" class="modal--input w-100 p-3" placeholder="Nom/Code" />
            <span class=" check--container end-0 me-2 fs-4 ">
                <i
                    class="valid--icon fa-solid fa-circle-check d-none text-success animate__animated animate__fadeIn animate__delay-0.5s"></i>
                <i
                    class="invalid--icon  fa-solid fa-circle-exclamation text-danger d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
            </span>
        </div>
        <div class="invalid-feedback fs-6 d-none">Enter un nom valide</div>
        <div class="valid-feedback fs-6 d-none">Nom valide</div>
    </div>
    <div class="mb-4 col-md-12">
        <div class="input-group">
            <textarea class="w-100 p-3" placeholder="Déscription du rôles" style="height: 25vh"></textarea>
            <span class="check--container end-0 me-2 fs-4 d-none ">
                <i
                    class="valid--icon fa-solid fa-circle-check d-none text-success animate__animated animate__fadeIn animate__delay-0.5s"></i>
                <i
                    class="invalid--icon  fa-solid fa-circle-exclamation text-danger d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
            </span>
        </div>
        <div class="invalid-feedback fs-6 d-none">Enter un nom valide</div>
        <div class="valid-feedback fs-6 d-none">Nom valide</div>
    </div>
    <div class="row m-0 ">
        <div class="col-md-3 px-0 py-2 text-center">
            <input type="checkbox" class="btn-check m-0 h-100 w-100" id="btncheck1" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck1">Permissions
                1</label>
        </div>
        <div class="col-md-3 px-0 py-2 text-center">
            <input type="checkbox" class="btn-check m-0 w-100" id="btncheck2" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck2">Permissions
                2</label>
        </div>
        <div class="col-md-3 px-0 py-2 text-center">
            <input type="checkbox" class="btn-check m-0 w-100" id="btncheck3" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck3">Permissions
                3</label>
        </div>
        <div class="col-md-3 px-0 py-2 text-center">
            <input type="checkbox" class="btn-check m-0 w-100" id="btncheck4" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck4">Permissions
                4</label>
        </div>
        <div class="col-md-3 px-0 py-2 text-center">
            <input type="checkbox" class="btn-check m-0 w-100" id="btncheck5" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck5">Permissions
                5</label>
        </div>
        <div class="col-md-3 px-0 py-2 text-center">
            <input type="checkbox" class="btn-check m-0 w-100" id="btncheck6" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck6">Permissions
                6</label>
        </div>
    </div>
    <input type="submit" value="" id="submit--button" hidden>
</form>
