<form class="row" id="modal_update--form" method="POST" action="/signalments" data-id="{{ $signalment['id'] }}" enctype="multipart/form-data">
@csrf
<div class="d-none animate__animated animate__fadeIn modal_bg--default" id="modal_signalments">
    <div class="modal-dialog modal-lg modal-dialog-centered animate__animated animate__fadeIn">
        <div class="modal-content animate__animated animate__fadeInDown" id="modal_photo--container">
            <!-- Signalments Info -->
            <div class="animate__animated  animate__fadeIn" id="signalments--body">
                <!-- Modal Header -->
                <div class="modal-header">
                    <div class="d-flex align-items-center">
                        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                            aria-label="breadcrumb">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item fw-bold"><a href="#">Cycle Supérieure</a></li>
                                <li class="breadcrumb-item fw-bold"><a href="#">Bloc A</a></li>
                                <li class="breadcrumb-item fw-bold"><a href="#">TD (Salle N°12)</a></li>
                            </ol>
                        </nav>
                    </div>
                    <button type="button" class="btn-close" aria-label="Close" id="close_signalment--button"></button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body" id="modal_ signalments--body">
                    <div class="d-flex mb-3" id="modal_header--container">
                        <!-- Catégorie Select -->
                        <select class="me-auto my-auto py-3 px-2 w-25" name="category" id="modalCategory--select">
                            @foreach($categories as $category)
                                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                            @endforeach
                        </select>
                        <!-- Select End -->
                        <div class="d-flex align-content-center">
                            <!-- <span class="d-flex my-auto px-2 rounded-6" id="modalState--container">
                                <div class="my-auto me-1" id="color--icon"></div>
                                <span class="fw-500">{{ $signalment->state['name'] }}</span>
                            </span> -->
                            <select class="d-flex my-auto py-3 px-4" name="state" id="modalState--select">
                            @foreach($states as $state)
                                <option value="{{ $state['id'] }}">{{ $state['name'] }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="rounded-5" id="modal_image--container" style="height: 50vh">
                        <img src="{{ asset('/images/signalements/'.$signalment['attachement']) }}" class="img-fluid h-100 w-100 rounded-5" alt="Image du signalement">
                    </div>
                    <div class="mt-3" id="modal_infos--container">
                        <h2>{{ $signalment->signalement['title'] }}</h2>
                        <p class="m-0 fs-5 text-justify" style="text-align: justify;">{{ $signalment->signalement['description'] }}</p>
                        <p class="fw-bold mb-0 mt-3 text-end">Signalé par : <span class="fw-normal">{{ $signalment->signalement->creator['name'] }}</span></p>
                    </div>
                    <div class="mt-3">
                        <button class="btn d-none btn-secondary w-100 fw-500" id="showRattachedTo--button"><i class="fa-solid fa-link me-2"></i>Rattacher à
                            un autre Signalement</button>
                        <input class=" w-100 fw-500" name="file1" type="file" accept="application/pdf">
                    </div>
                </div>
                <!-- Modal Footer -->
                <div class="container-fluid mt-1 mb-2 p-2 d-flex" id="moda_photo--footer">
                    <button type="submit" class="btn btn-outline-secondary me-auto fw-bold" data-bs-dismiss="modal"
                        id="delete_signalment--button">Supprimer</button>
                    <button type="button" class="btn d-none btn-secondary fw-bold me-3"
                        id="resend_signalment--button">Renvoyer</button>
                    <button type="submit" class="btn btn-primary fw-bold"
                        id="approve_signalment--button">Valider</button>
                </div>
            </div>
            <!-- Rattacher un signalement -->
            <div class="d-none animate__animated  animate__fadeIn" id="rattachedTo--body">
                <!-- Header -->
                <div class="modal-header">
                    <p class="m-0 h5">Rattacher à un signalement</p>
                    <button type="button" class="btn-close" aria-label="Close" id="close_rattachedTo--icon"></button>
                </div>
                <!-- Body -->
                @foreach ($signalments as $signalment)
                <div class="modal-body" style="height: 30rem; overflow: scroll;">
                    <div class="card border w-100 rounded-6 mb-4">
                        <div class="card-body h-50" style="cursor: pointer;">
                            <div class="card-description d-flex align-items-center text-secondary">
                                <p class="me-auto my-auto  fw-bold">{{ $signalment->category['name'] }}</p>
                                <span class="d-flex px-1 rounded-6" id="state--container">
                                    <div class="my-auto me-1" id="color--icon"></div>
                                    <span class="fw-500">{{ $signalment->state['name'] }}</span>
                                </span>
                            </div>
                            <h5 class="card-title fw-bold">{{ $signalment->signalement['title'] }}</h5>
                            <p class="card-text">{{ $signalment->signalement['description'] }}</p>
                            <div class="card--footer d-flex">
                                <a class="me-auto my-auto" href="test"></a>
                                <a href="#" class="btn btn-primary disabled">Détails</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Footer -->
                <div class="container-fluid mt-1 mb-2 p-2 d-flex" id="moda_photo--footer">
                    <button type="button" class="btn btn-outline-secondary me-auto fw-bold" data-bs-dismiss="modal"
                        id="rattachedTo_back--button">Revenir</button>
                    <button type="button" class="btn btn-primary fw-bold" id="rattachedTo_valid--button">Rattacher</button>
                </div>
            </div>
        </div>
    </div>
</div>
<input  type="submit" value="ICI" class="modify--submit" hidden>
</form>