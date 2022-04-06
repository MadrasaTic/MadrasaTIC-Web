
class sideBarView {

    #linksContainer = document.querySelectorAll(".sidebar_links");
    #cpt = 0;


    displayHoverEffect() {

        this.#linksContainer.forEach((link) => {
            link.addEventListener("mouseenter", function(e) {
                link.classList.add("sidebar_links_hovered");
            })
        })

        this.#linksContainer.forEach((link) => {
            link.addEventListener("click", () => {
                window.location.pathname.slice(1);
            })
        })

        this.#linksContainer.forEach((link) => {

            link.addEventListener("mouseleave", function(e) {
                link.classList.remove("sidebar_links_hovered");
            })
        })



    }
    
}

export default new sideBarView();