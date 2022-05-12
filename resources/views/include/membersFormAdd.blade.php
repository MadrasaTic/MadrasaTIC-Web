<form class="row" id="modal--form" method="POST" action="/members">
    @csrf
    <div class="mb-4 col-md-12">
        <label for="last_name" class="form-label">Nom</label>
        <div class="input-group">
            <input type="text" class="needs--validation w-100 p-3" placeholder="Nom" name="last_name" id="last_name" />
            <span class="check--container end-0 me-2 fs-4 ">
                <i
                    class="valid--icon fa-solid fa-circle-check text-success animateanimated d-none animatefadeIn animate__delay-0.5s"></i>
                <i
                    class="invalid--icon fa-solid fa-circle-exclamation text-danger d-none animateanimated animatefadeIn animate__delay-0.5s"></i>
            </span>
        </div>
        <div class="invalid-feedback fs-6 d-none">Enter un nom valide</div>
        <div class="valid-feedback fs-6 d-none">Nom valide</div>
    </div>
    <div class="mb-4 col-md-12">
        <label for="first_name" class="form-label">Prénom</label>
        <div class="input-group">
            <input type="text" class="needs--validation w-100 p-3" placeholder="Prénom" name="first_name" id="first_name" />
            <span class="check--container end-0 me-2 fs-4 ">
                <i
                    class="valid--icon fa-solid fa-circle-check d-none text-success animateanimated animatefadeIn animate__delay-0.5s"></i>
                <i
                    class="invalid--icon  fa-solid fa-circle-exclamation text-danger d-none animateanimated animatefadeIn animate__delay-0.5s"></i>
            </span>
        </div>
        <div class="invalid-feedback fs-6 d-none">Enter un prénom valide</div>
        <div class="valid-feedback fs-6 d-none">Prénom valide</div>
    </div>
    <div class="mb-4 col-md-12">
        <label for="email" class="form-label">Email</label>
        <div class="input-group">
            <input type="email" class="needs--validation w-100 p-3" placeholder="Email" name="email" id="email" />
            <span class="check--container end-0 me-2 fs-4 ">
                <i
                    class="valid--icon fa-solid fa-circle-check d-none text-success animateanimated animatefadeIn animate__delay-0.5s"></i>
                <i
                    class="invalid--icon  fa-solid fa-circle-exclamation text-danger d-none animateanimated animatefadeIn animate__delay-0.5s"></i>
            </span>
        </div>
        <div class="invalid-feedback fs-6 d-none">Enter une adresse e-mail valide
            (username@esi-sba.dz)</div>
        <div class="valid-feedback fs-6 d-none">Email Valide</div>
    </div>
    <div class="mb-4 col-md-12">
        <label for="new_password" class="form-label">Mot de passe</label>
        <div class="input-group">
            <input type="password" class="needs--validation w-100 p-3" placeholder="Mot de passe" name="new_password"
                id="new_password" />
            <span class="check--container end-0 me-2 fs-4 ">
                <i
                    class="valid--icon fa-solid fa-circle-check d-none text-success animateanimated animatefadeIn animate__delay-0.5s"></i>
                <i
                    class="invalid--icon  fa-solid fa-circle-exclamation text-danger d-none animateanimated animatefadeIn animate__delay-0.5s"></i>
            </span>
        </div>
        <div class="invalid-feedback fs-6 d-none">Enter un mot de passe valide</div>
        <div class="valid-feedback fs-6 d-none">Mot de passe valide</div>
    </div>
    <div class="mb-4 col-md-12">
        <label for="confirm_password" class="form-label">Confirmer le mot de passe</label>
        <div class="input-group">
            <input type="password" class="needs--validation w-100 p-3" placeholder="Confirmation de mot de passe"
                name="confirm_password" id="confirm_password" />
            <span class="check--container end-0 me-2 fs-4 ">
                <i
                    class="valid--icon fa-solid fa-circle-check d-none text-success animateanimated animatefadeIn animate__delay-0.5s"></i>
                <i
                    class="invalid--icon  fa-solid fa-circle-exclamation text-danger d-none animateanimated animatefadeIn animate__delay-0.5s"></i>
            </span>
        </div>
        <div class="invalid-feedback fs-6 d-none">Enter un mot de passe valide</div>
        <div class="valid-feedback fs-6 d-none">Mot de passe valide</div>
    </div>
    <div class="col-md-12">
        <label for="position_id" class="form-label">Position</label>
        <div class="input-group">
            <select name="position_id" class="w-100 p-3">
                @foreach($positions ?? '' as $position)
                <option value="{{ $position->id }}">{{ $position->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-12">
        <label for="role_id" class="form-label">Role</label>
        <div class="input-group">
            <select name="role_id" class="w-100 p-3">
                @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <input type="submit" value="ICI" class="add--submit" hidden>
</form>
