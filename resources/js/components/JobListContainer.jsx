import React, {Fragment} from 'react'
import JobList from './JobList'
import { useFetch } from './services/useFetch'

const JobListContainer = () => {

    const {isLoading, ...props} = useFetch();

    return (
        <Fragment>
           {isLoading ? "Loading......." : <JobList {...props} />}
        </Fragment>
    )
}

export default JobListContainer;
