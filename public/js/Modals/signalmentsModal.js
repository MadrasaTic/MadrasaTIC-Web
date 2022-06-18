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