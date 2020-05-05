import React, {Fragment, useContext} from 'react'
import JobList from './JobList'
import { useFetch } from './services/useFetch'
import {withLoader} from "./LoaderHoc";

const JobListContainer = () => {

    const  props = useFetch();
    console.log({props})
    const WithLoader = withLoader(JobList);

    return <WithLoader {...props} />
}

export default JobListContainer;
