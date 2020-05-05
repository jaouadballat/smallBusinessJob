import React, {Fragment, useState, useEffect} from 'react'
import JobList from './JobList'
import {fetchJobs} from "./services/api";

const JobListContainer = () => {

    const [jobs, setJobs] = useState([]);
    const [isLoading, setIsLoading] = useState(true);

    useEffect(() => {
        fetchJobs().then(({data}) => {
            setJobs(data);
            setIsLoading(false)
        })
    }, [])

    return (
        <Fragment>
           {isLoading ? "Loading......." : <JobList {...jobs} />}
        </Fragment>
    )
}

export default JobListContainer;
