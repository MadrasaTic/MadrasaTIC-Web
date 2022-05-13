<form class="row" id="modal_update--form" method="POST" action=""{{'signalmentsPriority'}}"">
    @csrf
    <div class="mb-4 col-md-12">
    <label for="last_name" class="form-label">Nom</label>
        <div class="input-group">
            <input type="text" class="needs--validation w-100 p-3" placeholder="Nom" name="name" id="name" />
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
        <label for="category_id" class="form-label">Catégories associée</label>
        <div class="input-group">
            <select name="category_id" class="w-100 p-3">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mb-4 col-md-12">
        <label for="weight" class="form-label">Poids</label>
        <div class="input-group">
            <input type="number" data-type="positiveNumber" class="needs--validation w-100 p-3" placeholder="Poids de cette priorité" name="weight" id="weight"/>
            <span class="check--container end-0 me-2 fs-4 ">
                <i
                    class="valid--icon fa-solid fa-circle-check text-success d-none animateanimated animatefadeIn animate__delay-0.5s"></i>
                <i
                    class="invalid--icon  fa-solid fa-circle-exclamation text-danger d-none animateanimated animatefadeIn animate__delay-0.5s"></i>
            </span>
        </div>
        <div class="invalid-feedback fs-6 d-none">Entrer un nombre valide</div>
        <div class="valid-feedback fs-6 d-none">Nombre valide</div>
    </div>
    <input type="submit" value="ICI" class="modify--submit" hidden>
</form>
