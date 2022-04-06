<div class="d-none animate__animated animate__fadeIn modal_bg--default" id="profil_photo--modal">
    <div class="modal-dialog modal-dialog-centered animate__animated animate__fadeIn">
        <div class="modal-content animate__animated animate__fadeInDown" id="modal_photo--container">
            <!-- Modal Header -->
            <div class="modal-header" id="modal_photo--header">
                <h5 class="modal-title">Changer votre photo</h5>
                <button type="button" class="btn-close" aria-label="Close" id="close_photo--icon"></button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body" id="modal_photo--body">
                <div class="container-fluid p-0">
                    <div class="rounded-6  d-flex align-items-center justify-content-center" id="modal_photo--bg">
                        <div class="text-center">
                            <i class="upload--icon fa-solid fa-cloud-arrow-up text-primary mb-2 "
                                id="upload_icon--default"></i>
                            <i class="bi bi-cloud-check-fill p-0 text-primary mb-0 d-none animate__animated animate__fadeIn"
                                id="upload_icon--success"></i>
                            <p class="fw-normal mb-0" id="img_profil--text">Aucune image sectionnée</p>
                            <p class="text-success mb-3 d-none" id="upload_image--success">Image Uploder
                                avec Succès</p>
                            <p class="text-danger mb-3 d-none" id="upload_image--error">Erreur lors du
                                chargement</p>
                            <form action="{{ route('uploadProfilePicture') }}" class="mt-3" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label for="profil_image--input" class="btn btn-primary"
                                    id="upload_image--button">Uploder une image </label>
                                <input name="profilePicture" class="d-none" id="profil_image--input" type="file" accept="image/*">
                                <input class="d-none" type="submit" id="submit_image--input">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Footer -->
            <div class="container-fluid p-2 d-flex" id="moda_photo--footer">
                <button type="button" class="btn btn-outline-secondary me-auto fw-bold" data-bs-dismiss="modal"
                    id="close_photo--button">Fermer</button>
                <button type="button" class="btn btn-primary fw-bold disabled"
                    id="save_profil--button">Sauvgarder</button>
            </div>
        </div>
    </div>
</div>
