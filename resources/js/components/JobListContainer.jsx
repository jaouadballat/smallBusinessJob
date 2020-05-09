import React from 'react'
import JobList from './JobList'
import { useFetch } from './services/useFetch'
import {withLoader} from "./LoaderHoc";

const JobListContainer = () => {

    const  [{jobs, categories, isLoading}, dispatch] = useFetch();
    const WithLoader = withLoader(JobList);

    const handleChangeEvent = e => {
        const {name, value, type} = e.target;
        console.log({name, value, type})

    }

    const props = {
        jobs,
        categories,
        isLoading,
        dispatch,
        handleChangeEvent
    };

    return <WithLoader {...props} />
}

export default JobListContainer;
