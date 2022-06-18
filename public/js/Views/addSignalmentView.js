
class addSignalementView {

    #selectedAnnexe = "Annexes";
    #selectedBloc = "Blocs";
    #selectedRoom = "Salles";


    addHandlerLoadAnnexe(handler, type, url) {
        window.addEventListener("load", () => {
            handler(type, url)
        })
    }

    addHandlerAnnexeChange(handler, type, url) {
        const annexeSelect = document.querySelector("#annexe--select");
        annexeSelect.addEventListener("change", () => {
            const selectedOption = annexeSelect.options[annexeSelect.selectedIndex];
            if (!selectedOption) return
            const blocsUrl = url + selectedOption.value
            handler(type, blocsUrl)
            // Filtrage Code
            this.#selectedAnnexe = selectedOption.text;
            // If Categories Reset
            if (this.#selectedAnnexe == "Annexes") return;
            // First Cards not Match Condition
            const notMatchCardTAB = Array.from(document.querySelectorAll(".cardDiv")).filter(card => card.dataset.annexe && card.dataset.annexe != selectedOption.text);
            notMatchCardTAB.forEach(card => card.classList.add("d-none"));
        })
        annexeSelect.addEventListener("click", () => {
            const selectedOption = annexeSelect.options[annexeSelect.selectedIndex];
            if (!selectedOption) return
            const blocsUrl = url + selectedOption.value
            handler(type, blocsUrl)
            // Filtrage Code
            this.#selectedAnnexe = selectedOption.text;
            // If Categories Reset
            if (this.#selectedAnnexe == "Cites") return;
            // First Cards not Match Condition
            const notMatchCardTAB = Array.from(document.querySelectorAll(".cardDiv")).filter(card => card.dataset.annexe && card.dataset.annexe != selectedOption.text);
            notMatchCardTAB.forEach(card => card.classList.add("d-none"));
        })
    }

    addHandlerBlocChange(handler, type, url) {
        const blocSelect = document.querySelector("#bloc--select");
        blocSelect.addEventListener("change", () => {
            const selectedOption = blocSelect.options[blocSelect.selectedIndex];
            if (!blocSelect) return
            const roomsUrl = url + selectedOption.value
            handler(type, roomsUrl)
            // Filtrage Code
            this.#selectedBloc = selectedOption.text;
            // If Categories Reset
            if (this.#selectedAnnexe == "Annexes" || this.#selectedBloc == "Blocs") return;
            // First Cards not Match Condition
            const notMatchCardTAB = Array.from(document.querySelectorAll(".cardDiv")).filter(card => card.dataset.bloc && card.dataset.bloc != selectedOption.text);
            notMatchCardTAB.forEach(card => card.classList.add("d-none"));
        })
        blocSelect.addEventListener("click", () => {
            const selectedOption = blocSelect.options[blocSelect.selectedIndex];
            if (!blocSelect) return
            const roomsUrl = url + selectedOption.value
            handler(type, roomsUrl)
            // Filtrage Code
            this.#selectedBloc = selectedOption.text;
            // If Categories Reset
            if (this.#selectedAnnexe == "Annexes" || this.#selectedBloc == "Blocs") return;
            // First Cards not Match Condition
            const notMatchCardTAB = Array.from(document.querySelectorAll(".cardDiv")).filter(card => card.dataset.bloc && card.dataset.bloc != selectedOption.text);
            notMatchCardTAB.forEach(card => card.classList.add("d-none"));
        })
    }

    adHandlerSalleChange(handler) {
        document.querySelector("#room--select").addEventListener("change", (e) => {
            // Filtrage Code
            const selectedOption = e.target.options[e.target.selectedIndex];
            this.#selectedRoom = selectedOption.text;
            // If Categories Reset
            if (this.#selectedAnnexe == "Annexes" || this.#selectedBloc == "Blocs" || this.#selectedRoom == "Salles") return;
            // First Cards not Match Condition
            const notMatchCardTAB = Array.from(document.querySelectorAll(".cardDiv")).filter(card => card.dataset.room && card.dataset.room != selectedOption.text);
            notMatchCardTAB.forEach(card => card.classList.add("d-none"));
        })
    }

    renderInfraOptions(data, type) {
        if (type == "annexe") {
            const blocSelect = document.querySelector(`#annexe--select`)
            blocSelect.innerHTML = "";
            const html = `<option value="reset" selected>Cites</option>`
            blocSelect.insertAdjacentHTML("afterbegin", html)
        }
        if (type == "bloc") {
            const blocSelect = document.querySelector(`#bloc--select`)
            blocSelect.innerHTML = "";
            const html = `<option value="reset" selected>Blocs</option>`
            blocSelect.insertAdjacentHTML("afterbegin", html)
        }
        if (type == "room") {
            const blocSelect = document.querySelector(`#room--select`)
            blocSelect.innerHTML = "";
            const html = `<option value="reset" selected>Salles</option>`
            blocSelect.insertAdjacentHTML("afterbegin", html)
        }
        data.forEach(item => {
            const select = document.querySelector(`#${type}--select`);
            const html = `<option value="${item.id}">${item.name}</option>`;
            select.insertAdjacentHTML("beforeend", html)
        })
    }


}

export default new addSignalementView()