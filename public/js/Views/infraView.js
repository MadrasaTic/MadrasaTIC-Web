import { getJSON, sendJSON } from "../helpers.js";
class InfraView {
    #btnAdd = document.querySelectorAll(".items_add");
    #btnEdit = document.querySelectorAll(".edit--button");
    #btnDelete = document.querySelectorAll(".delete--button")
    #items = "";
    #NEXT_INPUT_VALUE = "";

    // Fill items/add/modify tables & listen to events 
    _init () {
        // Update items table
        this.#items = document.querySelectorAll(".item");
        this.#btnEdit = document.querySelectorAll(".edit--button");
        this.#btnDelete = document.querySelectorAll(".delete--button")
        // Add event listener   
        this._renderItemsClick();
        this._renderModifyClick();
        this._renderDeleteClick();
    }

    closeAllInputsOnClick() {
        document.querySelector("#infra--container").addEventListener("click", (e) => {
            if (e.target.id != "infra--container") return ;
            this._renderCloseInputs();
        })
    }

    // Close all opened inputs
    _renderCloseInputs () {
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

    // Hide input & show add button
    _hideInputShowAdd(type) {
        const input = document.querySelector(`input[data-type="${type}"]`);
        const btnAdd = document.querySelector(`div[data-type="${type}"]`);
        input.classList.add("d-none");
        btnAdd.classList.remove("d-none");
    }

    _hideAddShowInput(type) {
        const input = document.querySelector(`input[data-type="${type}"]`);
        const btnAdd = document.querySelector(`div[data-type="${type}"]`);
        btnAdd.classList.add("d-none");
        input.classList.remove("d-none");
        input.value ="";
        input.focus();
    }

    // Get & Diplay Items
    async getAndDisplayItems (type, url) {
        try {
            const data = await getJSON(url);
            // Clear containers
            if (type == "bloc" ) document.querySelector(`#bloc--container`).innerHTML = "";
            document.querySelector(`#room--container`).innerHTML = "";
            // Add new item to table
            this._init();
            // Display New Items
            data && data.forEach((item) => {
                this._displayItems(type, item.id, item.name, item.type);
            })
        } catch (err) {
            console.error(err.message);
        } 
    }

    _displayItems (type, id, name, roomType = "") {
        const container = document.querySelector(`#${type}--container`);
        const html = `
        <div class="item d-flex fs-6" data-id="${id}" data-type="${type}">
            <span>${roomType ? `(${roomType}) ` : " "}${name}</span>
            <i class="d-none ms-2 fa-solid fa-angles-right"></i>
            <i class="text-warning fa-solid fa-pen-to-square ms-2 edit--button"></i>
            <i class="text-danger fa-solid fa-delete-left ms-1 delete--button"></i>
        </div>`
        container.insertAdjacentHTML("beforeend", html);
        this._init();
    }


    // Add
    renderAddClick () {
        this.#btnAdd.forEach((btn) => {
            btn.onclick = () => {
                const input = document.querySelector(`.${btn.dataset.type}_add--input`);
                this._hideAddShowInput(input.dataset.type);
                this._renderInputSubmit(input)
            }
        })
    }

    _renderInputSubmit(input) {
        input.onkeypress = (e) => {
            if (e.key == "Enter") {
                e.preventDefault();
                // Select the input & it's type
                const addType = input.dataset.type;
                // Hide Input & Display Add-Button                
                input.classList.add("d-none");
                // Check if two inputs
                if (input.classList.contains("has-next")) {
                    // Hide current & show next
                    const nextInput =  document.querySelector(".next-input");
                    nextInput.classList.remove("d-none");
                    nextInput.focus();
                    // Set Value
                    this.#NEXT_INPUT_VALUE = input.value;
                    this._renderInputSubmit(nextInput);
                    return;
                };
                document.querySelector(`.${input.dataset.type}_add--button`).classList.remove("d-none");
                // Return if noting is selected (expect for annexes)
                const selectedBloc = document.querySelector(".selected--bloc");
                const selectedAnnexe = document.querySelector(".selected--annexe");
                if (addType == "bloc" && !(selectedAnnexe)) return;
                if (addType == "room" && !(selectedAnnexe) && !(selectedBloc)) return;
                // Prepare Request
                const id = addType == "bloc" ? selectedAnnexe.dataset.id
                : addType == "room" ? selectedBloc.dataset.id
                : null;
                const parentType = addType == "bloc" ? "annexe"
                : addType == "room" ? "bloc"
                : null
                // Send Request & Display Item
                this._sendAddJSONRequest(addType, parentType, id, input.value);
                // Clear Input Value
                input.value = "";
            } 
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

    // Item
    _renderItemsClick() {
        this.#items.forEach((item) => {
            item.onclick = this._itemClickAction.bind(this);
        })
    }

    _itemClickAction(e, el) {
        const item = e?.target || el;
        if (item.tagName == "I") return;
        const currentSelected = item.closest("div");
        const type = currentSelected.dataset.type;
        const previousSelected = currentSelected?.parentNode?.parentNode?.querySelector(`.selected--${type}`);
        // Remove selected from previous
        previousSelected?.classList.remove(`selected--${type}`);
        // Close Modify input if open
        const input = document.querySelector(`input[data-type="${type}"`);
        if (!input.classList.contains("d-none")) this._hideInputShowAdd(type)
        // Add selected to the current
        currentSelected.classList.add(`selected--${type}`);
        // Fetch Data
        if (type == "room") return;
        const subType = type == "annexe" ? "bloc" : "room";
        this.getAndDisplayItems(subType, `/infrastructure/${subType}/listing/${currentSelected.dataset.id}`);
    }


    // Modify
    _renderModifyClick () {
        this.#btnEdit.forEach((btn) => {
            btn.onclick = (e) => {
                const editDiv = btn.closest("div");
                const type = editDiv.dataset.type;
                const input = document.querySelector(`input[data-type="${type}"]`)
                // if modify unselected input
                if (!editDiv.classList.contains(`${type}--selected`)) {
                    this._itemClickAction(null, editDiv);
                }
                // Hide button & show input
                this._hideAddShowInput(editDiv.dataset.type);
                // Prefill input value 
                input.value = editDiv.querySelector("span").textContent.trim();
                input.focus();
                // Handle submission
                this._renderModifyInputSubmit(input);
            }
        })
    }

    _renderModifyInputSubmit(input) {
        input.onkeypress = (e) => {
            if (e.key == "Enter") {
                e.preventDefault(); 
                const type = input.dataset.type;
                // Hide Input & Display Add-Button         
                this._hideInputShowAdd(type)
                // Prepare Request
                const selectedItem = document.querySelector(`.selected--${type}`);
                // Get rommType & roomName
                let inputValue = input.value;
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

    async _sendEditJSONRequest(type, id, name, roomType = "") {
        try {
            const token = document.head.querySelector('meta[name="csrf-token"]').content;
            const uploadData = {
                name: name,
                _token: token ,
            }
            if (roomType) (uploadData[`type`] = roomType);
            const editItem = await sendJSON(`/infrastructure/${type}/${id}`, uploadData);
            // Display Updated Item
            document.querySelector(`[data-id="${editItem.id}"]`).querySelector("span").textContent = roomType ? `(${editItem.type}) ${editItem.name}` :editItem.name;
        } catch (err) {
            console.log(err.message);
        }
    }

    // Delete
    _renderDeleteClick() {
        this.#btnDelete.forEach((btn) => {
            btn.onclick = (e) => {
                e.preventDefault();
                const item = e.target.closest("div");
                // Display Confirmaiton Modal   
                const deleteModal = document.querySelector("#delete--modal")
                deleteModal.classList.remove("d-none")
                // Prepare Request // If Confirmed
                document.querySelector("#confirm_delete--button").onclick = (e) => {
                    e.preventDefault();
                    deleteModal.classList.add("d-none")
                    this._sendDeleteJSONRequet(item.dataset.type, item.dataset.id);
                    return
                }
                document.querySelector("#close_delete--button").onclick = (e) => {
                    e.preventDefault();
                    deleteModal.classList.add("d-none");
                    return
                }
                document.querySelector("#cancel_delete--button").onclick = (e) => {
                    e.preventDefault();
                    deleteModal.classList.add("d-none");
                    return
                }
            }
        })
    }

    async _sendDeleteJSONRequet(type, id) {   
        const token = document.head.querySelector('meta[name="csrf-token"]').content;
        const uploadData = {
            id: id,
            _token: token,
        }
        const deletedItem = await sendJSON(`/infrastructure/${type}/delete/${id}`, uploadData);
        document.querySelector(`[data-id="${deletedItem.id}"]`).remove();
    }

}

export default new InfraView();