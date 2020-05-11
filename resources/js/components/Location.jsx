import React, {useState} from 'react';
import {appendParamsToUrl, valueFromUrlParams} from "./services/helpers";

const Location = ({onChange}) => {

    const [value, setValue] = useState(valueFromUrlParams('location') || '');

    const onChangeHandler = event => {
        const value  = event.target.value;
        setValue(value);
        appendParamsToUrl('location', value);
        appendParamsToUrl('page', 1);
        onChange(event);
    }

    return (
        <div className="single-listing">
            <div className="small-section-tittle2">
                <h4>Job Location</h4>
            </div>
            <div className="select-job-items2">
                <input placeholder='Location' name='location' value={value} onChange={onChangeHandler} />
            </div>
        </div>
    );
};

export default Location;
