import {getJSON, sendJSON} from '../helpers.js';


export const state = {
    signalment: {},
    selectedAnnexeID: 1,
    selectedBlocID: 1,
    search: {
        query: "",
        results: [],
        page: 1,
        // resultPerPage: RES_PER_PAGE,
    },
    bookmarks: [],
}

// Post Function 
export async function deleteSignalment(id) {
    try {
        const token = document.head.querySelector('meta[name="csrf-token"]').content;
        const uploadData = {
            id: id,
            _token: token,
        }
        const resp = await sendJSON(`/signalments/delete/${id}`, uploadData);
        return resp
    } catch (err) {
        console.error(err.message)
    }
}

export async function addSignalmentRapport(data) {
    try {
        console.log(data.signalement_id);
        const token = document.head.querySelector('meta[name="csrf-token"]').content;
        const url = `/signalments/${data.signalement_id}/report`;
        const uploadData = data;
        delete uploadData.signalement_id;
        uploadData._token = token;
        console.log(uploadData);
        const resp = await sendJSON(url, uploadData);
        console.log(resp);
        return resp
    } catch(err) {
        console.error(err.message)
    }
}


// Get Functions
export async function loadInfra(type, url) {
    try {
        const data = await getJSON(url);
        return data;
        
    } catch (err) {
        console.error(err.message);
    } 
}


export async function loadSignalmentInfo(id) {
    try {
        const data = await getJSON(`/signalments/${id}`);
        return data;
    } catch (err) {
        console.error(err.message)
    }
}

export async function loadRapportInfo(id) {
    try {
        const data = await getJSON(`/signalments/${id}/report`);
        return data
    } catch (err) {
        console.error(err.message)
    }
}