import React, {Fragment, useContext} from 'react'
import JobList from './JobList'
import { useFetch } from './services/useFetch'
import {withLoader} from "./LoaderHoc";

const JobListContainer = () => {

    const  [{jobs, categories, isLoading}, dispatch] = useFetch();
    const WithLoader = withLoader(JobList);

    const props = {
        jobs,
        categories,
        isLoading
    };

    return <WithLoader {...props} />
}

export default JobListContainer;
