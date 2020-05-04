export const fetchJobs = (filter = null) => axios.get('/jobs/list', {
    params: {
        filter: filter
    }
});
