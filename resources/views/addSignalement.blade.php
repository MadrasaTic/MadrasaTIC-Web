@include('layouts.app')

<head>


</head>


<style>
    input:focus {
        outline: 0 !important;
    }

    input::placeholder {
        color: #8C8CA2 !important;
    }

    form-control::placeholder {
        color: black !important;
    }

    #browse-input {
        background-color: none !important;
    }
</style>

<body>
    <div class="container-fluid d-flex align-items-center justify-content-center border border-primary py-3" style="min-height: 100vh">
        <div class="col-md-5 px-6 rounded-6 py-3" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
            <h3 class="text-center mb-4 mt-3">Ajouter un Signalement</h3>
            <form class="w-100" action="/signalments" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-2">
                    <label>Titre du Signalement</label>
                    <input name="title" type="text" class="form-control" placeholder="Titre du Signalement">
                </div>

                <div class="form-group mb-2">
                    <label>Déscription de signalement</label>
                    <textarea name="description" class="form-control" rows="10"></textarea>
                </div>

                <div class="form-group mb-2">
                    <label>Catégorie du Signalement</label>
                    <select name="category_id" class="form-select" >
                    <option diasbled selected>Selectionner la catégorie</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                    </select>
                </div>

                <div class="form-group mb-2">
                    <label>Cite du Signalement</label>
                    <select name="annexe_id" class="form-select" id="annexe--select">
                        <option selected>Selectionner le Cite</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>

                <div class="form-group mb-2">
                    <label>Bloc du Signalement</label>
                    <select name="bloc_id" class="form-select" id="bloc--select">
                    </select>
                </div>

                <div class="form-group mb-2">
                    <label>Salle du Signalement</label>
                    <select name="room_id" class="form-select" id="room--select">
                    </select>
                </div>

                <div class="form-group mb-2">
                    <label class="mb-1">Ajouter une Image<br></label>
                    <div class="form-group">
                        <input name="attachement" type="file" class="form-control-file" id="#browse-input">
                    </div>
                </div>

                <center>
                    <button type="submit" class="btn btn-primary mt-3 py-2 px-3">Ajouter le Signalement</button>
                </center>

            </form>
        </div>
    </div>
</body>
