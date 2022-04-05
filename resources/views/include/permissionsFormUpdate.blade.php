<form method="POST" action="/permissions" class="row" id="modal--form">
@csrf
    <div class="mb-4 col-md-12">
        <div class="input-group">
            <input  type="hidden" value="{{$permissions['id']}}" class="modal--input w-100 p-3"  />
        </div>
        
    </div>
    <div class="mb-4 col-md-12">
        <div class="input-group">
            <input name="code" type="text" value="{{$permissions['code']}}" class="modal--input w-100 p-3" placeholder="Code" />
            <span class=" check--container end-0 me-2 fs-4 ">
                <i
                    class="valid--icon fa-solid fa-circle-check d-none text-success animate__animated animate__fadeIn animate__delay-0.5s"></i>
                <i
                    class="invalid--icon  fa-solid fa-circle-exclamation text-danger d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
            </span>
        </div>
        <div class="invalid-feedback fs-6 d-none">Enter un code valide</div>
        <div class="valid-feedback fs-6 d-none">Code valide</div>
    </div>
    <div class="mb-4 col-md-12">
        <div class="input-group">
            <input name="name" type="text" value="{{$permissions['name']}}" class="modal--input  w-100 p-3" placeholder="Name" />
            <span class=" check--container end-0 me-2 fs-4 ">
                <i
                    class="valid--icon fa-solid fa-circle-check d-none text-success animate__animated animate__fadeIn animate__delay-0.5s"></i>
                <i
                    class="invalid--icon  fa-solid fa-circle-exclamation text-danger d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
            </span>
        </div>
        <div class="invalid-feedback fs-6 d-none">Enter un name valide</div>
        <div class="valid-feedback fs-6 d-none">Name valide</div>
    </div>
    <div class="mb-4 col-md-12">
        <div class="input-group">
            <input name="display_name" type="text"  value="{{$permissions['display_name']}}" class="modal--input  w-100 p-3" placeholder="display_name" />
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
            <textarea name="description"  value="{{$permissions['description']}}" class="w-100 p-3" placeholder="Déscription de la permission"
                style="height: 25vh"></textarea>
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
    <input type="submit" value="Submit" id="submit--button">
</form>