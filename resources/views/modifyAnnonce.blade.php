@include('layouts.app')
<head>
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
</head>
<body>
    @include('layouts.flash-messages')
    <div class="container-fluid d-flex align-items-center justify-content-center py-5 " style="">
        <div class="col-md-5 px-6 py-5 rounded-6" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
            <div class="">
                <h3 class="text-center mb-4">Modifier une Annonce</h3>
                <form class="w-100" method="POST" action="/modifyAnnonce"" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="form-group mb-2">
                        <label>Titre de l'Annonce</label>
                        <input name="title" value="{{$data->title}}" class="form-control" placeholder="Titre de l'Annonce">
                    </div>
                    <div class="form-group mb-2">
                        <label>Déscription de l'Annonce</label>
                        <textarea name="description" class="form-control" rows="10">{{$data->description}}</textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label>Date Début</label>
                        <input name="beginDate" type="date" value="{{date("Y-m-d", strtotime($data->beginDate))}}" class="form-control" placeholder="Titre de l'Annonce">
                    </div>
                    <div class="form-group mb-2">
                        <label>Date Fin</label>
                        <input name="endDate" type="date" value="{{date("Y-m-d", strtotime($data->endDate))}}" class="form-control" placeholder="Titre de l'Annonce">
                    </div>
                    <div class="form-group mb-2">
                        <label class="mb-1">Image actuellement sélectionnée</label>
                        <img src="{{asset('/storage/'.$data['image'])}}"
                            class="img-fluid card-img-top h-50 rounded-6 mb-2" alt="Image du signalement">
                    </div>
                    <div class="form-group mb-2">
                        <label class="mb-1">Choisissez une autre image<br></label>
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
