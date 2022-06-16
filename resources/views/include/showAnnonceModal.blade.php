<form class="row" id="modal_update--form" method="POST" action="{{'annonces'}}" data-id="{{ $annonce['id'] }}"
    enctype="multipart/form-data">
    @csrf
    <div class="d-none animate__animated animate__fadeIn modal_bg--default" id="modal_signalments">
        <div class="modal-dialog modal-lg modal-dialog-centered animate__animated animate__fadeIn">
            <div class="modal-content animate__animated animate__fadeInDown" id="modal_photo--container">
                <!-- Annonce Info -->
                <div class="animate__animated  animate__fadeIn" id="signalments--body">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="btn-close" aria-label="Close"
                            id="close_signalment--button"></button>
                    </div>
                    <!-- Modal Body -->
                    <div class="modal-body" id="modal_ signalments--body">
                        <div class="rounded-5" id="modal_image--container" style="height: 50vh">
                            <img id="annonce-image" src="" class="img-fluid h-100 w-100 rounded-5" alt="Image de l'annonces">
                        </div>
                        <div class="mt-3" id="modal_infos--container">
                            <h2 id="annonce-title"></h2>
                            <p class="m-0 fs-5 text-justify" id="annonce-description" style="text-align: justify;"></p>
                            <p class="fw-bold mb-0 mt-3 text-end">Annoncé par : <span class="fw-normal" id="annonce-annoncer"></span></p>
                        </div>
                    </div>
                    <!-- Modal Footer -->
                    <div class="container-fluid mt-1 mb-2 p-2 d-flex modal-footer" id="moda_photo--footer">
                        <button type="submit" class="btn btn-outline-secondary me-auto fw-bold" data-bs-dismiss="modal"
                            id="delete_signalment--button"> <a
                                href="{{ 'annonces/delete/'.$annonce['id']}}">hidden</a></button>
                    </div>
                    
                </div>


            </div>
        </div>
    </div>

    <input type="submit" value="ICI" class="modify--submit" hidden>

</form>
