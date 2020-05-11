import {fetchCategories, fetchJobs} from "../services/api";
import {FETCH_CATEGORIES, FETCH_JOBS} from "./types";

export const getJobsList = (dispatch, filter = null) => {
    fetchJobs(filter).then(jobs => dispatch(jobDispatch(jobs)))
}

export const getCategoriesList = dispatch => {
    fetchCategories().then(categories => dispatch(categoryDispatch(categories)))
}

const jobDispatch = jobs => ({
    type: FETCH_JOBS,
    jobs: jobs.data
});

const categoryDispatch = categories => ({
    type: FETCH_CATEGORIES,
    categories: categories.data
});
