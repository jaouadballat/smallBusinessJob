import React, {useState} from 'react';
import {appendParamsToUrl, getUrlParams, valueFromUrlParams} from "./services/helpers";

const ContractType = ({onChange}) => {
    const types = [
        'Full time',
        'Part time',
        'Remote',
        'Freelance'
    ];

    const [value, setValue] = useState(valueFromUrlParams('contract') || '');

    const handleChangeEvent = (event) => {
        const { id: value } = event.target;
        setValue(value);
        appendParamsToUrl('contract', value);
        appendParamsToUrl('page', 1);
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
                        <input type="checkbox" id={type} name='contract' value={type} checked={type === value && 'checked'} onChange={handleChangeEvent}/>
                        <span className="checkmark"></span>
                    </label>
                ))}
            </div>
        </div>
    );
};

export default ContractType;
