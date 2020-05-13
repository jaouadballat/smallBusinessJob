import {fetchCategories, fetchJobs} from "../services/api";
import {FETCH_CATEGORIES, FETCH_JOBS, LOADING} from "./types";

export const getJobsList = (dispatch, filter = null) => {
    dispatch(loadingDispatch());
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

const loadingDispatch = () => ({
    type: LOADING,
});
