import { getJSON, sendJSON } from "../helpers.js";
class InfraView {
    #btnAdd = document.querySelectorAll(".items_add");
    #btnEdit = document.querySelectorAll(".edit--button");
    #btnDelete = document.querySelectorAll(".delete--button")
    #items = "";
    #NEXT_INPUT_VALUE = "";

    init () {
        // Update items table
        this.#items = document.querySelectorAll(".item");
        this.#btnEdit = document.querySelectorAll(".edit--button");
        this.#btnDelete = document.querySelectorAll(".delete--button")
        // Add event listener   
        this._renderItemsClick();
        this._renderModifyClick();
        this._renderDeleteClick();
    }

    closeInputs () {
        const opendInputs = document.querySelectorAll("input");
        const closedAddButtons = document.querySelectorAll(".items_add");
        opendInputs.forEach((input) => {
            if (input.classList.contains("d-none")) return;
            input.classList.add("d-none")
        })
        closedAddButtons.forEach((btn) => {
            if (!btn.classList.contains("d-none")) return;
            btn.classList.remove("d-none");
        })
    }

    async getAndDisplayItems (type, url) {
        try {
            console.log("Get Data From", url);
            const data = await getJSON(url);
            // Clear containers
            if (type == "bloc" ) document.querySelector(`#bloc--container`).innerHTML = "";
            document.querySelector(`#room--container`).innerHTML = "";
            // 
            this.init();
            // Display New Items
            data && data.forEach((item) => {
                this._displayItems(type, item.id, item.name, item.type);
            })
        } catch (err) {
            console.error(err.message);
        } 
    }

    _renderItemsClick() {
        this.#items.forEach((item) => {
            item.onclick = (e) => {
                // if (e.target.classList.contains("delete--button")) return;
                const currentSelected = e.target.closest("div");
                const type = currentSelected.dataset.type;
                const previousSelected = currentSelected?.parentNode?.parentNode?.querySelector(`.selected--${type}`);
                // Remove selected from previous
                previousSelected?.classList.remove(`selected--${type}`);
                // Add selected to the current
                currentSelected.classList.add(`selected--${type}`);
                // Fetch Data
                if (type == "room") return;
                const subType = type == "annexe" ? "bloc" : "room";
                this.getAndDisplayItems(subType, `/infrastructure/${subType}/listing/${currentSelected.dataset.id}`);
            }
        })
    }

    renderAddClick () {
        this.#btnAdd.forEach((btn) => {
            btn.onclick = (e) => {
                const el = e.target.closest("div");
                const input = document.querySelector(`.${el.dataset.type}_add--input`);
                el.classList.add("d-none");
                input.classList.remove("d-none");
                input.value ="";
                input.focus();
                this._renderInputSubmit(input)
            }
        })
    }

    _renderModifyClick () {
        this.#btnEdit.forEach((btn) => {
            btn.onclick = (e) => {
                const type = e.target.closest("div").dataset.type;
                const input = document.querySelector(`.${type}_add--input`);
                document.querySelector(`.${type}_add--button`).classList.add("d-none");
                input.classList.remove("d-none");
                input.value = e.target.closest("div").querySelector("span").textContent.trim();
                input.focus();
                this._renderModifyInputSubmit(input);
            }
        })
    }

    _renderDeleteClick() {
        this.#btnDelete.forEach((btn) => {
            btn.onclick = (e) => {
                const item = e.target.closest("div");
                // Display Confirmaiton Modal

                // Prepare Request
                this._sendDeleteJSONRequet(item.dataset.type, item.dataset.id);
            }
        })
    }

    _renderInputSubmit(input) {
        input.onkeypress = (e) => {
            if (e.key == "Enter") {
                const curInput = e.target;
                const addType = curInput.dataset.type;
                e.preventDefault();
                // Hide Input & Display Add-Button                
                curInput.classList.add("d-none");
                // Check if two inputs
                if (curInput.classList.contains("has-next")) {
                    // Hide current & show next
                    const nextInput =  document.querySelector(".next-input");
                    nextInput.classList.remove("d-none");
                    nextInput.focus();
                    // Set Value
                    this.#NEXT_INPUT_VALUE = curInput.value;
                    this._renderInputSubmit(nextInput);
                    return;
                };
                document.querySelector(`.${input.dataset.type}_add--button`).classList.remove("d-none");
                // Prepare Request
                const selectedAnnexe = document.querySelector(".selected--annexe");
                const selectedBloc = document.querySelector(".selected--bloc");
                const id = addType == "bloc" ? selectedAnnexe.dataset.id
                : addType == "room" ? selectedBloc.dataset.id
                : null;
                const parentType = addType == "bloc" ? "annexe"
                : addType == "room" ? "bloc"
                : null
                // Send Request
                this._sendAddJSONRequest(addType, parentType, id, curInput.value);
                // Re-Render

            } 
        }
    }

    _renderModifyInputSubmit(input) {
        input.onkeypress = (e) => {
            if (e.key == "Enter") {
                const curInput = e.target;
                e.preventDefault();
                // Hide Input & Display Add-Button                
                curInput.classList.add("d-none");
                document.querySelector(`.${input.dataset.type}_add--button`).classList.remove("d-none");
                // Prepare Request
                const type = curInput.dataset.type;
                const selectedItem = document.querySelector(`.selected--${type}`);
                //
                let inputValue = curInput.value;
                let roomType = "";
                if (input.dataset.type == "room") {
                    roomType = inputValue.match(/\((.*)\)/)[1].trimStart() || "";
                    inputValue = inputValue.match(/\)(.*)/)[1].trim();
                } 
                // Send Request
                this._sendEditJSONRequest(type, selectedItem.dataset.id, inputValue, roomType);
            }
        }
    }

    _sendDeleteJSONRequet(type, id) {   
        const token = document.head.querySelector('meta[name="csrf-token"]').content;
        const uploadData = {
            id: id,
            _token: token,
        }
        sendJSON(`/infrastructure/${type}/delete/${id}`, uploadData);

        document.querySelector(`[data-id="${id}"]`).remove();


    }

    async _sendEditJSONRequest(type, id, name, roomType = "") {
        try {
            const token = document.head.querySelector('meta[name="csrf-token"]').content;
            const uploadData = {
                name: name,
                _token: token ,
            }
            if (roomType) (uploadData[`type`] = roomType);
            console.log("Edit Request", uploadData);
            const editItem = await sendJSON(`/infrastructure/${type}/${id}`, uploadData);
            // Display Updated Item
            document.querySelector(`[data-id="${editItem.id}"]`).querySelector("span").textContent = roomType ? `(${editItem.type}) ${editItem.name}` :editItem.name;
        } catch (err) {
            console.log(err.message);
        }
    }

    async _sendAddJSONRequest (addType, parentType, id, name) {
        try {
            const token = document.head.querySelector('meta[name="csrf-token"]').content;
            const uploadData = {
                name: name,
                _token: token
            }
            id && (uploadData[`${parentType}_id`] = id);
            if (this.#NEXT_INPUT_VALUE) {            
                (uploadData[`type`] = this.#NEXT_INPUT_VALUE) ;
                this.#NEXT_INPUT_VALUE = "";
            }
            // Display New Item
            const newItem = await sendJSON(`/infrastructure/${addType}`, uploadData);
            this._displayItems(addType , newItem.id ,newItem.name, newItem.type);
        } catch (err) {
            console.log(err.message);
        }
    }

    _displayItems (type, id, name, roomType = "") {
        const container = document.querySelector(`#${type}--container`);
        const html = `<div class="item d-flex" data-id="${id}" data-type="${type}">
            <span>${roomType ? `(${roomType}) ` : " "}${name}</span>
            <i class="d-none ms-2 fa-solid fa-angles-right"></i>
            <i class="fa-solid fa-pen-to-square  ms-2 edit--button"></i>
            <i class="fa-solid fa-delete-left ms-1 delete--button"></i>
        </div>`
        container.insertAdjacentHTML("beforeend", html);
        this.init();
    }


}

export default new InfraView();
