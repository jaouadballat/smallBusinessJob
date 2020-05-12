import {FETCH_CATEGORIES, FETCH_JOBS} from "./types";

export const reducer = (state, action) => {
    switch (action.type) {
        case FETCH_CATEGORIES:
            return {
                ...state,
                categories: action.categories,
                isLoading: false
            }
        case FETCH_JOBS:
            return {
                ...state, jobs: action.jobs,
                isLoading: false
            }
        default:
            return state;
    }
}
