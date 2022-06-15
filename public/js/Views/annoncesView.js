
class SignalmentsView {
    // Annonce
    addHandlerAnnonceState() {
        window.addEventListener("load", () => {
            const stateContainers = document.querySelectorAll(".state--container");
            stateContainers.forEach(container => {
                const state = container.dataset.annoncestate;
                const stateIcon = container.querySelector("#color--icon");
                const stateText = container.querySelector("#annonce--state");
                if (state == 1) {
                    stateText.textContent = "Publié";
                    stateIcon.style.backgroundColor = "#35F9AE"
                } else {
                    stateText.textContent = "Hidden";
                    stateIcon.style.backgroundColor = "#F80509"
                }
            })
        })
    }
    // Modal Basic Operations
    addHandlerShowModalBtn(handler) {
        const showModalBtn = document.querySelectorAll(".show_modal--button");
        showModalBtn.forEach(btn => {
            btn.addEventListener("click", (e) => {  
                document.querySelector("#modal_signalments").classList.remove("d-none");
                handler(e.target.dataset.annonceid);
            })
        })
    } 
    addHandlerCloseModal() {
        document.querySelector("#close_signalment--button").addEventListener("click", () => {
            document.querySelector("#modal_signalments").classList.add("d-none");
        })
    }
    addHandlerDeleteAnnonceBtn() {
        document.querySelector("#delete_signalment--button").addEventListener("click", (e) => {
            console.log("Annonce Delete");
        })
    }
    // Render Annonce ifno
    renderAnnonceInfo(data) {
        console.log("Fired");
        // console.log(data.title);
        document.querySelector("#annonce-title").textContent = data.title;
        document.querySelector("#annonce-description").textContent = data.description;
        // document.querySelector("#annonce-state") = data.state
        document.querySelector("#annonce-image").src = `/images/annonces/${data.image}`;
        document.querySelector("#annonce-annoncer").textContent = data.user.name;

    }

    
}

export default new SignalmentsView();
