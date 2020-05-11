import React from 'react'
import JobList from './JobList'
import { useFetch } from './services/useFetch'
import {withLoader} from "./LoaderHoc";
import {getFilterFromUrlParams} from "./services/helpers";

const JobListContainer = () => {

    const  [{jobs, categories, isLoading}, dispatch] = useFetch();
    const WithLoader = withLoader(JobList);

    const handleChangeEvent = e => {
        const {name, value, type, id} = e.target;
        console.log({name, value, type, id})
        console.log({filter: getFilterFromUrlParams()})

    }

    const props = {
        jobs,
        categories,
        isLoading,
        dispatch,
        onChange: handleChangeEvent
    };

    return <WithLoader {...props} />
}

export default JobListContainer;
