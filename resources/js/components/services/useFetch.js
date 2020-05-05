import React, {useEffect, useContext} from 'react';
import {JobContext} from "../store/context";
import {getCategoriesList, getJobsList} from "../store/actions";

export const useFetch = () => {

    const [state, dispatch] = useContext(JobContext);

    useEffect(() => {

        getJobsList(dispatch);
        getCategoriesList(dispatch);

    }, []);


    return state;
}
