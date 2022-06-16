<form class="row" id="modal_update--form" method="POST" action="/signalments" data-id="{{ $signalment['id'] }}"
    enctype="multipart/form-data">
    @csrf
    <div class="d-none animate__animated animate__fadeIn modal_bg--default" id="modal_signalments">
        <div class="modal-dialog modal-lg modal-dialog-centered animate__animated animate__fadeIn">
            <div class="modal-content animate__animated animate__fadeInDown" id="modal_photo--container">
                <!-- Signalments Info -->
                <div class="animate__animated  animate__fadeIn" id="signalments--body">
                    <div class="modal-header">
                        <div class="d-flex align-items-center">
                            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                                aria-label="breadcrumb">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item fw-bold"><a id="signalments-annexe">Cite Here</a></li>
                                    <li class="breadcrumb-item fw-bold"><a id="signalments-bloc">Bloc Here</a></li>
                                    <li class="breadcrumb-item fw-bold"><a id="signalments-room">Room Here</a></li>
                                </ol>
                            </nav>
                        </div>
                        <button type="button" class="btn-close" aria-label="Close"
                            id="close_signalment--button"></button>
                    </div>
                    <div class="modal-body" id="modal_ signalments--body">
                        <div class="d-flex mb-3 justify-content-between" id="modal_header--container">
                            <div class="d-flex align-content-center">
                                <select class="px-3 py-3" name="category" id="modalCategory--select">
                                    @foreach($categories as $category)
                                    <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-flex align-content-center">
                                <select class="d-flex my-auto px-3 py-3" name="state" id="modalState--select">
                                    @foreach($states as $state)
                                    <option value="{{ $state['id'] }}">{{ $state['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="rounded-5" id="modal_image--container" style="height: 50vh">
                            <img src="signalments-img"
                                class="img-fluid h-100 w-100 rounded-5" alt="Image du signalement">
                        </div>
                        <div class="mt-3" id="modal_infos--container">
                            <h2 id="signalment-title">Titre Here</h2>
                            <p class="m-0 fs-5 text-justify" id="signalment-description" style="text-align: justify;">Description Here</p>
                            <p class="fw-bold mb-0 mt-3 text-end">Signalé par : <span
                                    class="fw-normal" id="signalments-user">User Here</span></p>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-secondary w-100 fw-500" id="showRattachedTo--button">
                                <i class="fa-solid fa-link me-2"></i>Rattacher à un autre Signalement
                            </button>
                        </div>
                        <div>
                            <button class="btn btn-secondary w-100 fw-500" id="showRapport--button">
                                <i class="fa-solid fa-link me-2"></i>Rattacher un rapport
                            </button>
                        </div>
                        <div>
                            <button class="btn btn-secondary w-100 fw-500" id="viewRapport--button">
                                <i class="fa-solid fa-link me-2"></i>Afficher le rapport
                            </button>
                        </div>
                    </div>
                    <div class="container-fluid mt-1 mb-2 p-2 d-flex modal-footer" id="moda_photo--footer">
                        <button type="submit" class="btn btn-outline-secondary me-auto fw-bold" data-bs-dismiss="modal"
                            id="delete_signalment--button">Supprimer</button>
                        <button type="button" class="btn btn-secondary fw-bold me-2"
                            id="resend_signalment--button">Renvoyer</button>
                        <button type="submit" class="btn btn-primary fw-bold"
                            id="approve_signalment--button">Valider</button>
                    </div>
                </div>
                <!--Signalments body end -->

                <!-- Rattached-To Body -->
                <div class="d-none animate__animated  animate__fadeIn" id="rattachedTo--body">
                    <div class="modal-header">
                        <p class="m-0 h5">Rattacher à un signalement</p>
                        <button type="button" class="btn-close" aria-label="Close"
                            id="close_rattachedTo--icon"></button>
                    </div>
                    <div class="modal-body" style="height: 30rem; overflow: scroll;">
                        @foreach ($signalments as $signalment)
                        <div class="card border w-100 rounded-6 mb-4">
                            <div class="card-body h-50" style="cursor: pointer;">
                                <div class="card-description d-flex align-items-center text-secondary">
                                    <p class="me-auto my-auto  fw-bold">
                                        {{ $signalment->lastSignalementVC->category['name'] }}</p>
                                    <span class="d-flex px-1 rounded-6" id="state--container">
                                        <div class="my-auto me-1" id="color--icon"
                                            style="background-color: {{$signalment->lastSignalementVC->state['color']}}">
                                        </div>
                                        <span class="fw-500">{{ $signalment->lastSignalementVC->state['name'] }}</span>
                                    </span>
                                </div>
                                <h5 class="card-title fw-bold">{{ $signalment['title'] }}</h5>
                                <p class="card-text">{{ $signalment['description'] }}</p>
                                <div class="card--footer d-flex">
                                    <a class="me-auto my-auto" href="test"></a>
                                    <a href="#" class="btn btn-primary disabled">Détails</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="container-fluid mt-1 mb-2 p-2 d-flex modal-footer">
                        <button class="btn btn-secondary fw-bold me-2" id="rattachedTo_back--button">Revenir</button>
                        <button type="button" class="btn btn-primary fw-bold"
                            id="rattachedTo_valid--button">Rattacher</button>
                    </div>
                </div>
                <!-- Rattached-To END -->

                <!-- Add Rapport  -->
                <div class="d-none animate__animated  animate__fadeIn" id="rapport--body">
                    <div class="modal-header">
                        <p class="m-0 h5">Rattacher un Rapport</p>
                        <button type="button" class="btn-close" aria-label="Close" id="close_rapport--icon""></button>
                    </div>
                    <div class=" modal-body" style="height: 30rem; overflow: scroll;">
                            <div>
                                <div class="form-group mb-2">
                                    <label>Titre du Rapport</label>
                                    <input type="text" class="form-control" placeholder="Titre du Rapport" id="addRapport-title">
                                </div>
                                <div class="form-group mb-4">
                                    <label>Contenu du Rapport</label>
                                    <textarea class="form-control" rows="10" id="addRapport-description"></textarea>
                                </div>
                                <div class="form-group mb-2">
                                    <button class="btn btn-secondary w-100" type="button" id="rapport_image--button">Ajouter des images</button>
                                    <p class="text-secondary text-center" id="rapport_images--p"></p>
                                    <input class="d-none" type="file" accept=".jpg" id="rapport--browse">
                                </div>
                            </div>
                    </div>
                    <div class="container-fluid mt-1 mb-2 p-2 d-flex modal-footer">
                        <button class="btn btn-secondary fw-bold me-2" id="rapport_back--button">Revenir</button>
                        <button class="btn btn-primary fw-bold me-2" id="rapport_add--button">Ajouter</button>
                    </div>
                </div>
                <!-- Add Rapport END -->

                <!-- View Rapport -->
                <div class="d-none animate__animated  animate__fadeIn" id="viewRapport--body">
                    <div class="modal-header">
                        <p class="m-0 h5">Rapport du Signalement</p>
                        <button type="button" class="btn-close" aria-label="Close" id="close_viewRapport--icon""></button>
                    </div>
                    <div class="modal-body" style="height: 30rem; overflow: scroll;">
                            <div>
                                <h3 id="viewRapport-title">Titre du Rapport Here</h3>
                                <p id="viewRapport-description"style="text-align: justify;">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci et similique praesentium aut consequuntur cumque, porro assumenda reiciendis vero non. Incidunt odit eveniet expedita voluptatum neque excepturi debitis reprehenderit enim.</p>
                                <img id="addRapport-image" class="img-fluid" src="https://picsum.photos/id/237/200/300" alt="">
                            </div>
                    </div>
                    <div class="container-fluid mt-1 mb-2 p-2 d-flex modal-footer">
                        <button class="btn btn-secondary fw-bold me-2" id="viewRapport_back--button">Revenir</button>
                    </div>
                </div>


            </div>
        </div>
        <input type="submit" value="ICI" class="modify--submit" hidden>
</form>


