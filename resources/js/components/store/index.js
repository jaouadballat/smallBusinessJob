import React, {useReducer} from 'react'
import {reducer} from "./reducer";
import {JobContext} from "./context";

export const JobProvider = ({children}) => {
    const initialState = {
        categories: [],
        jobs: [],
        isLoading: true
    };
    const [state, dispatch] = useReducer(reducer, initialState);
    return (
        <JobContext.Provider  value={[state, dispatch]}>
            {children}
        </JobContext.Provider>
    )
}





