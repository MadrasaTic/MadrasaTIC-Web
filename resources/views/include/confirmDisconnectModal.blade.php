<div class="animate__animated animate__fadeIn d-none modal_bg--default" id="disconnect--modal">
    <div class="modal-dialog modal-dialog-centered animate__animated animate__fadeIn">
        <div class="modal-content animate__animated animate__fadeInDown">
            <!-- Modal Header -->
            <div class="modal-header" id="modal_disconnect--header">
                <h5 class="modal-title">Déconnexion</h5>
                <button type="button" class="btn-close" aria-label="Close" id="close_disconnect--icon"></button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body" id="modal_disconnect--body">
                <p>Êtes-vous sûr de vouloir vous déconnecter ?</p>
            </div>
            <!-- Modal Footer -->
            <div class="container-fluid p-2 d-flex" id="modal_disconnect--footer">
                <button type="button" class="btn btn-outline-secondary me-auto fw-bold" data-bs-dismiss="modal"
                    id="close_disconnect--button">Fermer</button>
                <button class="btn btn-secondary text-primary fw-bold me-2"
                    id="cancel_disconnect--button">Annuler</button>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary fw-bold"
                        id="save_disconnect--button">Confirmer</button>
                </form>
            </div>
        </div>
    </div>
</div> <!-- Modal Disconnect  End -->
