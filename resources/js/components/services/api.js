export const fetchJobs = (filter) => axios.get('/jobs/list', {
    params: filter
});

export const fetchCategories = () => axios.get('/categories');
