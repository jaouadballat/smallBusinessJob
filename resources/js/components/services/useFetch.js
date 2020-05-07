import React, {useEffect, useContext} from 'react';
import {JobContext} from "../store/context";
import {getCategoriesList, getJobsList} from "../store/actions";
import {getUrlParams, getFilterFromUrlParams} from "./helpers";

export const useFetch = () => {

    const [state, dispatch] = useContext(JobContext);

    useEffect(() => {
        const params = getUrlParams();
        const filter = getFilterFromUrlParams(params)
        getJobsList(dispatch, filter);
        getCategoriesList(dispatch);

    }, []);

    return [state, dispatch];
}
