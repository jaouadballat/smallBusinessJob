import React, {useState} from 'react';
import {appendParamsToUrl} from "./services/helpers";
import City from "./City";

const Location = ({onChange}) => {

    const onChangeHandler = city => {
        appendParamsToUrl('location', city);
        appendParamsToUrl('page', 1);
        onChange(city);

    }

    return (
        <div className="single-listing">
            <div className="small-section-tittle2">
                <h4>Job Location</h4>
            </div>
            <City onChange={onChangeHandler} />
        </div>
    );
};

export default Location;
