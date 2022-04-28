<form class="row" id="modal_update--form" method="POST" action="/signalmentsCategory">
    @csrf
    <div class="mb-4 col-md-12 d-none">
        <label class="form-label">ID</label>
        <div class="input-group">
            <input type="text" class="w-100 p-3" placeholder="ID" name="id" id="id"/>
        </div>
    </div>
    <div class="mb-4 col-md-12">
        <label class="form-label">Nom</label>
        <div class="input-group">
            <input type="text" class="needs--validation w-100 p-3" placeholder="Nom" name="name" id="name"/>
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
        <label for="parent_id" class="form-label">Catégorie Parent</label>
        <div class="input-group">
            <select name="parent_id" class="w-100 p-3" id="parent_id">
                <option selected disabled></option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mb-4 col-md-12">
        <label for="last_name" class="form-label">Priorité par défaut</label>
        <div class="input-group">
            <input type="number" class="w-100 p-3 needs--validation" placeholder="Priorité par défaut" name ="priority_default" id="priority_default" min="0"/>
            <span class="check--container end-0 me-2 fs-4 ">
                <i
                    class="valid--icon fa-solid fa-circle-check text-success d-none animateanimated animatefadeIn animate__delay-0.5s"></i>
                <i
                    class="invalid--icon fa-solid fa-circle-exclamation text-danger d-none animateanimated animatefadeIn animate__delay-0.5s"></i>
            </span>
        </div>
        <div class="invalid-feedback fs-6 d-none">Enter un numéro valide</div>
        <div class="valid-feedback fs-6 d-none">Numéro valide</div>
    </div>
    <div class="mb-4 col-md-12">
        <label for="last_name" class="form-label">Description</label>
        <div class="input-group">
            <textarea class="w-100 p-3 text--area" placeholder="Description de la catégorie" style="height: 25vh"
                name="description" id="description"></textarea>
        </div>
    </div>
    <input type="submit" value="ICI" class="modify--submit" hidden>
</form>
