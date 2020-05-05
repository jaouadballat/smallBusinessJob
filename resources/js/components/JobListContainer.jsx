import React, {Fragment} from 'react'
import JobList from './JobList'
import { useFetch } from './services/useFetch'
import {withLoader} from "./LoaderHoc";

const JobListContainer = () => {

    const  props = useFetch();
    const WithLoader = withLoader(JobList);

    return <WithLoader {...props} />
}

export default JobListContainer;
