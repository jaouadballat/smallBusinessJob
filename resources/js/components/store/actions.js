import {fetchCategories, fetchJobs} from "../services/api";

export const getJobsList = dispatch => {
    fetchJobs(null).then(jobs => dispatch(jobDispatch(jobs)))
}

export const getCategoriesList = dispatch => {
    fetchCategories().then(categories => dispatch(categoryDispatch(categories)))
}

const jobDispatch = jobs => ({
    type: 'FETCH_JOBS',
    jobs: jobs.data
});

const categoryDispatch = categories => ({
    type: 'FETCH_CATEGORIES',
    categories: categories.data
});
