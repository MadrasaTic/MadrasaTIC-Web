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
                <h3 class="text-center mb-4 mt-3">Ajouter une Annonce</h3>
                <form class="w-100">
                    <div class="form-group mb-2">
                        <label>Titre de l'Annonce</label>
                        <input type="email" class="form-control" placeholder="Titre de l'Annonce">
                    </div>
                    <div class="form-group mb-2">
                        <label>Déscription de l'Annonce</label>
                        <textarea class="form-control" rows="10"></textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label class="mb-1">Ajouter une Image (Non Obligatoire) <br></label>
                        <div class="form-group">
                            <input type="file" class="form-control-file" accept=".jpg" id="#browse-input">
                        </div>
                    </div>
    
                    <center>
                        <button type="submit" class="btn btn-primary mt-3 py-2 px-3">Ajouter l'Annonce</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</body>