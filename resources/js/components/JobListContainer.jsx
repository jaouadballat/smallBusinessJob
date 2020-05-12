import React from 'react'
import JobList from './JobList'
import { useFetch } from './services/useFetch'
import {withLoader} from "./LoaderHoc";
import {getFilterFromUrlParams} from "./services/helpers";
import {getJobsList} from "./store/actions";

const JobListContainer = () => {

    const  [{jobs, categories, isLoading}, dispatch] = useFetch();
    const WithLoader = withLoader(JobList);

    const handleChangeEvent = () => {
        const filter = getFilterFromUrlParams();
        getJobsList(dispatch, filter);
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
