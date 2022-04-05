<form class="row" id="modal--form" method="POST" action="/members">
    @csrf
    <div class="mb-4 col-md-12">
        <div class="input-group">
            <input type="text" class="modal--input w-100 p-3" placeholder="Nom" name="last_name"/>
            <span class="check--container end-0 me-2 fs-4 ">
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
            <input type="text" class="modal--input w-100 p-3" placeholder="Prénom" name="first_name"/>
            <span class="check--container end-0 me-2 fs-4 ">
                <i
                    class="valid--icon fa-solid fa-circle-check d-none text-success animate__animated animate__fadeIn animate__delay-0.5s"></i>
                <i
                    class="invalid--icon  fa-solid fa-circle-exclamation text-danger d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
            </span>
        </div>
        <div class="invalid-feedback fs-6 d-none">Enter un prénom valide</div>
        <div class="valid-feedback fs-6 d-none">Prénom valide</div>
    </div>
    <div class="mb-4 col-md-12">
        <div class="input-group">
            <input type="email" class="modal--input w-100 p-3" placeholder="Email" name="email"/>
            <span class="check--container end-0 me-2 fs-4 ">
                <i
                    class="valid--icon fa-solid fa-circle-check d-none text-success animate__animated animate__fadeIn animate__delay-0.5s"></i>
                <i
                    class="invalid--icon  fa-solid fa-circle-exclamation text-danger d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
            </span>
        </div>
        <div class="invalid-feedback fs-6 d-none">Enter une adresse e-mail valide
            (username@esi-sba.dz)</div>
        <div class="valid-feedback fs-6 d-none">Email Valide</div>
    </div>
    <div class="mb-4 col-md-12">
        <div class="input-group">
            <input type="password" class="modal--input w-100 p-3" placeholder="Mot de passe" name="password"/>
            <span class="check--container end-0 me-2 fs-4 ">
                <i
                    class="valid--icon fa-solid fa-circle-check d-none text-success animate__animated animate__fadeIn animate__delay-0.5s"></i>
                <i
                    class="invalid--icon  fa-solid fa-circle-exclamation text-danger d-none animate__animated animate__fadeIn animate__delay-0.5s"></i>
            </span>
        </div>
        <div class="invalid-feedback fs-6 d-none">Enter un mot de passe valide</div>
        <div class="valid-feedback fs-6 d-none">Mot de passe valide</div>
    </div>
    <div class="col-md-12">
        <div class="input-group">
            <select class="w-100 p-3" name="position">
                <option value="admin" selected>Admin</option>
            </select>
        </div>
    </div>
    <input type="submit" value="" id="submit--button">
    </from>
