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
    <div class="container-fluid d-flex align-items-center justify-content-center" style="height: 100vh">
        <div class="col-md-5 h-75 px-6 rounded-6 " style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
            <div class="">
                <h3 class="text-center mb-4 mt-3">Modifier une Annonce</h3>
                <form class="w-100" method="POST" action="/annonces" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-2">
                        <label>Titre de l'Annonce</label>
                        <input name="title" class="form-control" placeholder="Titre de l'Annonce">
                    </div>
                    <div class="form-group mb-2">
                        <label>Déscription de l'Annonce</label>
                        <textarea name="description" class="form-control" rows="10"></textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label>Date Début</label>
                        <input name="beginDate" type="date" class="form-control" placeholder="Titre de l'Annonce">
                    </div>
                    <div class="form-group mb-2">
                        <label>Date Fin</label>
                        <input name="endDate" type="date" class="form-control" placeholder="Titre de l'Annonce">
                    </div>
                    <div class="form-group mb-2">
                        <label class="mb-1">Ajouter une Image <br></label>
                        <div class="form-group">
                            <input  name="image" type="file" class="form-control-file"  id="#browse-input">
                        </div>
                    </div>
    
                    <center>
                        <button type="submit" class="btn btn-primary mt-3 py-2 px-3">Modifier l'Annonce</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</body>