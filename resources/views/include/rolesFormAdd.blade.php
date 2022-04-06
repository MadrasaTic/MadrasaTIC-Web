<form class="row" id="modal--form" action="/roles" method="POST">
    @csrf
    <div class="mb-4 col-md-12">
        <div class="input-group">
            <input type="text" class="needs--validation w-100 p-3" placeholder="Nom/Code" name="name" />
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
            <input type="text" class="needs--validation w-100 p-3" placeholder="Nom/Code" name="display_name" />
            <span class=" check--container end-0 me-2 fs-4 ">
                <i
                    class="valid--icon fa-solid fa-circle-check d-none text-success animate__animated animate__fadeIn animate__delay-0.5s"></i>
                <i
                    class="invalid--icon  fa-solid fa-circle-exclamation text-danger d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
            </span>
        </div>
        <div class="invalid-feedback fs-6 d-none">Enter un display nom valide</div>
        <div class="valid-feedback fs-6 d-none">Nom valide</div>
    </div>
    <div class="mb-4 col-md-12">
        <div class="input-group">
            <textarea class="w-100 p-3" placeholder="Déscription du rôles" style="height: 25vh" name="description"></textarea>
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
        @foreach ($permissions as $permission)
            <div class="col-md-3 px-0 py-2 text-center">
                <input type="checkbox" class="btn-check m-0 h-100 w-100" id="{{ 'add_btncheck' . $permission['id'] }}"
                    autocomplete="off" name="permissions[]" value="{{ $permission['id'] }}">
                <label class="btn btn-outline-primary"
                    for="{{ 'add_btncheck' . $permission['id'] }}">{{ $permission['display_name'] }}</label>
            </div>
        @endforeach
    </div>
    <input type="submit" value="" class="add--submit" hidden>
</form>
