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

export async function loadAnnonceInfo(id) {
    try {
        const data = await getJSON(`/annonces/${id}`);
        return data;
        
    } catch (err) {
        console.error(err.message);
    } 
}

