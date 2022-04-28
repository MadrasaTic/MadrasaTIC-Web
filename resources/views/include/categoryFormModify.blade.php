<form class="row" id="modal_update--form" method="POST" action="/members">
    <div class="mb-4 col-md-12 d-none">
        <label class="form-label">ID</label>
        <div class="input-group">
            <input type="text" class="w-100 p-3" placeholder="ID" />
        </div>
    </div>
    <div class="mb-4 col-md-12">
        <label class="form-label">Nom</label>
        <div class="input-group">
            <input type="text" class="needs--validation w-100 p-3" placeholder="Nom" />
            <span class="check--container end-0 me-2 fs-4 ">
                <i
                    class="valid--icon fa-solid fa-circle-check text-success d-none animateanimated animatefadeIn animate__delay-0.5s"></i>
                <i
                    class="invalid--icon  fa-solid fa-circle-exclamation text-danger d-none animateanimated animatefadeIn animate__delay-0.5s"></i>
            </span>
        </div>
        <div class="invalid-feedback fs-6 d-none">Enter un nom valide</div>
        <div class="valid-feedback fs-6 d-none">Nom valide</div>
    </div>
    <div class="mb-4 col-md-12">
        <label class="form-label">Catégorie Parent</label>
        <div class="input-group">
            <input type="text" class="needs--validation w-100 p-3" placeholder="Catégorie Parent" />
            <span class="check--container end-0 me-2 fs-4 ">
                <i
                    class="valid--icon fa-solid fa-circle-check text-success d-none animateanimated animatefadeIn animate__delay-0.5s"></i>
                <i
                    class="invalid--icon  fa-solid fa-circle-exclamation text-danger d-none animateanimated animatefadeIn animate__delay-0.5s"></i>
            </span>
        </div>
        <div class="invalid-feedback fs-6 d-none">Enter un nom valide</div>
        <div class="valid-feedback fs-6 d-none">Nom valide</div>
    </div>
    <div class="mb-4 col-md-12">
        <label for="last_name" class="form-label">Priorité par défaut</label>
        <div class="input-group">
            <input type="number" class="w-100 p-3" placeholder="Priorité par défaut" />
            <span class="check--container end-0 me-2 fs-4 ">
                <i
                    class="valid--icon fa-solid fa-circle-check text-success d-none animateanimated animatefadeIn animate__delay-0.5s"></i>
                <i
                    class="invalid--icon  fa-solid fa-circle-exclamation text-danger d-none animateanimated animatefadeIn animate__delay-0.5s"></i>
            </span>
        </div>
        <div class="invalid-feedback fs-6 d-none">Enter un nom valide</div>
        <div class="valid-feedback fs-6 d-none">Nom valide</div>
    </div>
    <div class="mb-4 col-md-12">
        <label for="last_name" class="form-label">Déscription</label>
        <div class="input-group">
            <textarea class="w-100 p-3" placeholder="Déscription du Service" style="height: 25vh"
                name="description"></textarea>
        </div>
    </div>
    <input type="submit" value="ICI" class="modify--submit" hidden>
</form>
