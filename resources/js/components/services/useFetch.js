import React, {useEffect, useState} from 'react';
import {fetchCategories, fetchJobs} from "./api";

export const useFetch = () => {
    const [jobs, setJobs] = useState([]);
    const [categories, setCategories] = useState([]);
    const [isLoading, setIsLoading] = useState(true);

    useEffect(() => {
        Promise.all([
            fetchJobs(),
            fetchCategories()
        ]).then(([jobs, categories]) => {
            setJobs(jobs.data);
            setCategories(categories.data)
        }).finally(() => setIsLoading(false));

    }, []);

    return  {
        isLoading,
        jobs,
        categories
    }
}
