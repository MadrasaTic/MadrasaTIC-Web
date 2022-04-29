

class sideBarView {
    #linksDiv = document.querySelectorAll(".sideBar--item");
    #links = document.querySelectorAll(".link")

    displayHoverEffect() {
        this.#linksDiv.forEach((div) => {
            div.onclick = (e) => {
                this._renderClickEffect(e, "selected")
            }
        });
        this.#linksDiv.forEach((div) => {
            div.onmouseenter = (e) => {
                this._renderClickEffect(e, "hoverd")
            };
        });        
    }

    _renderClickEffect(e, type) {
        const div = e.target.closest("div");
        const link = div.querySelector("a");
        document.querySelector(`.sideBar_item--${type}`)?.classList.remove(`sideBar_item--${type}`);
        document.querySelector(`.link--${type}`)?.classList.remove(`link--${type}`);       
        div.classList.add(`sideBar_item--${type}`);
        link.classList.add(`link--${type}`) 
    }
}

export default new sideBarView();