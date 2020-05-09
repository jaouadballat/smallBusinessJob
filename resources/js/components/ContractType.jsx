import React, {useState} from 'react';
import {appendParamsToUrl, getUrlParams, valueFromUrlParams} from "./services/helpers";

const ContractType = ({onChange}) => {
    const types = [
        'Full Time',
        'Part Time',
        'Remote',
        'Freelance'
    ];

    const [value, setValue] = useState(valueFromUrlParams('contract') || '');

    const handleChangeEvent = (event) => {
        const { id: value } = event.target;
        appendParamsToUrl('contract', value);
        setValue(value);
        onChange(event);
    }

    return (
        <div className="single-listing">
            <div className="select-Categories pt-80 pb-50">
                <div className="small-section-tittle2">
                    <h4>Job Type</h4>
                </div>
                {types.map(type => (
                    <label className="container">
                        {type}
                        <input type="checkbox" id={type} name='Contract' value={value} checked={type === value && 'checked'} onChange={handleChangeEvent}/>
                        <span className="checkmark"></span>
                    </label>
                ))}
            </div>
        </div>
    );
};

export default ContractType;
