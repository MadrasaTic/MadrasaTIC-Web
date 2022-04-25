
class InfraView {
    #btnAdd = document.querySelectorAll(".items--add");
    #inputAdd = document.querySelectorAll(".add_items--input");
    #item = document.querySelectorAll(".item");

    renderAddAction () {
        this.#btnAdd.forEach((btn) => {
            btn.addEventListener("click", (e) => {
                const inputAdd = e.target.closest(".items--add").parentNode.querySelector(".add_items--input");
                e.preventDefault();
                inputAdd.classList.remove("d-none");
                e.target.closest(".items--add").classList.add("d-none");
                inputAdd.focus();
            })
        })
    }

    renderInputAction() {
        this.#inputAdd.forEach((input) => {
            input.addEventListener("keypress", (e) => {
                if (e.key == "Enter") {
                    const type = document.querySelector(".has-next").value || "";
                    if (e.target.classList.contains("has-next")) {
                        const nextInput = e.target.parentNode.querySelector(".next-input");
                        e.preventDefault();
                        e.target.classList.add("d-none");
                        nextInput.classList.remove("d-none");
                        nextInput.focus();
                    } else {
                        e.preventDefault();
                        const parent = e.target.parentNode.parentNode.parentNode;
                        const html = `<div class="item">${e.target.value} ${type != "" ? `(${type})` : ""}</div>`
                        e.target.value = "";
                        e.target.classList.add("d-none");
                        parent.querySelector(".items--add").classList.remove("d-none");
                        parent.insertAdjacentHTML("afterend", html)
                    }
                }
            })
        })
    }

    renderItemAction () {
        this.#item.forEach((item) => {
            item.addEventListener("click", (e) => {
                if (e.target.parentNode.id == "bloc-container") {
                    document.querySelector("#salle-container").classList.remove("d-none")
                } 
                document.querySelector("#bloc-container").classList.remove("d-none")
                console.log(e.target);
                const parent = e.target.parentNode;
                parent.querySelector(".item-hoverd")?.classList.remove("item-hoverd");
                e.target.classList.add("item-hoverd")
            })
        })
        this.#item.forEach((item) => {
            item.addEventListener("mouseenter", (e) => {
                e.target.querySelector("i")?.classList.remove("d-none");
            })
        })
        this.#item.forEach((item) => {
            item.addEventListener("mouseleave", (e) => {
                console.log(e.target.querySelector("i")?.classList.add("d-none"));
            })
        })
    }

}

export default new InfraView();