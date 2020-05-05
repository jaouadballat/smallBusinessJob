import React from 'react';
import Loader from "./Loader";

export const withLoader = Component => ({isLoading, ...props}) =>
    (isLoading ? <Loader/> : <Component {...props} />)

