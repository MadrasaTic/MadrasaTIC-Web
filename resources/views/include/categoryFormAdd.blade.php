<form class="row" id="modal--form" method="POST" action="/signalmentsCategory">
    @csrf
    <div class="mb-4 col-md-12 d-none">
        <label class="form-label">ID</label>
        <div class="input-group">
            <input type="text" class="w-100 p-3" placeholder="ID" name="id" id="id" />
        </div>
    </div>
    <div class="mb-4 col-md-12">
        <label class="form-label">Nom</label>
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
    <!-- <div class="mb-4 col-md-12">
        <label for="parent_id" class="form-label">Catégorie Parent</label>
        <div class="input-group">
            <select name="parent_id" class="w-100 p-3">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div> -->
    <div class="mb-4 col-md-12">
        <label for="priority_id" class="form-label">Priorité</label>
        <div class="input-group">
            <select name="priority_id" class="w-100 p-3">
                @foreach($priorities as $priority)
                <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mb-4 col-md-12">
        <label for="service_id" class="form-label">Service Attaché</label>
        <div class="input-group">
            <select name="service_id" class="w-100 p-3">
                @foreach($services as $service)
                <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mb-4 col-md-12">
        <label for="last_name" class="form-label">Déscription</label>
        <div class="input-group">
            <textarea class="w-100 p-3" placeholder="Description de la catégorie" style="height: 25vh"
                name="description" id="description"></textarea>
        </div>
    </div>
    <input type="submit" value="ICI" class="add--submit" hidden>
</form>
