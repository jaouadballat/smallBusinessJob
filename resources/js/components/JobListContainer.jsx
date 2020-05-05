import React, {Fragment, useState, useEffect} from 'react'
import Filter from './Filter';
import Jobs from './Jobs';
import JobList from './JobList'
import {fetchJobs} from "./services/api";

const JobListContainer = () => {

    const [jobs, setJobs] = useState([]);

    useEffect(() => {
        fetchJobs().then(({data}) => setJobs(data.data))
    }, [])

    const props = {
        jobs,
    }

    return (
        <Fragment>
            <JobList {...props} />
        </Fragment>
    )
}

export default JobListContainer;
