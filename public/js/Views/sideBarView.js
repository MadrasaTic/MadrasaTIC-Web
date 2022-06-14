

class sideBarView {
    #linksDiv = document.querySelectorAll(".sideBar--item");
    #parentLinksDiv = document.querySelector("#sidebar_items--container");
    
    displayHoverEffect() {
        this.#linksDiv.forEach((div) => {
            div.onclick = (e) => {
                this._renderClickEffect(e, "selected")
            }
        });
        this.#linksDiv.forEach((div) => {
            div.onmouseenter = (e) => {
                e.stopPropagation();
                this._renderClickEffect(e, "hoverd")
            };
        });        
        this.#parentLinksDiv.onmouseleave = () => {
            document.querySelector(".sideBar_item--hoverd")?.classList.remove("sideBar_item--hoverd");
            document.querySelector(`.link--hoverd`)?.classList.remove(`link--hoverd`);    
        }

        document.querySelector("#sidebar--container").ondblclick = (e) => {
            document.querySelector(".sideBar_item--selected")?.classList.remove("sideBar_item--selected");
            document.querySelector(`.link--selected`)?.classList.remove(`link--selected`);    
        }
    }

    _renderClickEffect(e, type) {
        const div = e.target.closest("div");
        const link = div.querySelector("a");
        document.querySelector(`.sideBar_item--${type}`)?.classList.remove(`sideBar_item--${type}`);
        document.querySelector(`.link--${type}`)?.classList.remove(`link--${type}`);       
        div.classList.add(`sideBar_item--${type}`);
        link?.classList.add(`link--${type}`);
    }
}

export default new sideBarView();