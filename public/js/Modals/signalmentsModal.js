import {getJSON, sendJSON} from '../helpers.js';

export const state = {
    signalment: {},
    search: {
        query: "",
        results: [],
        page: 1,
        resultPerPage: RES_PER_PAGE,
    },
    bookmarks: [],
}