import React, {useEffect, useContext} from 'react';
import {JobContext} from "../store/context";
import {getCategoriesList, getJobsList} from "../store/actions";
import {getUrlParams, getFilterFromUrlParams, appendParamsToUrl} from "./helpers";

export const useFetch = () => {

    const [state, dispatch] = useContext(JobContext);

    useEffect(() => {
        const params = getUrlParams();
        if(!params.has('page')) {
            appendParamsToUrl('page', 1)
        }
        const filter = getFilterFromUrlParams()
        getJobsList(dispatch, filter);
        getCategoriesList(dispatch);

    }, []);

    return [state, dispatch];
}
