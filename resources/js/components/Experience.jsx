import React, {useState} from 'react';
import {appendParamsToUrl, valueFromUrlParams} from "./services/helpers";

const Experience = ({onChange}) => {

    const [value, setValue] = useState(valueFromUrlParams('experience') || '');

    const experiences = [
        {label: '1-2 Years', value:'1,2'},
        {label: '2-3 Years', value:'2,3'},
        {label: '3-6 Years', value:'3,6'},
        {label: '6 Years', value:'6'},
    ];

    const onChangeHandler = event => {
        const { id: value } = event.target;
        setValue(value);
        appendParamsToUrl('experience', value);
        appendParamsToUrl('page', 1);
        onChange(event);
    }

    return (
        <div className="single-listing">

            <div className="select-Categories pt-80 pb-50">
                <div className="small-section-tittle2">
                    <h4>Experience</h4>
                </div>
                {experiences.map(experience => (
                    <label className="container">{experience?.label}
                        <input type="checkbox" name="experience" id={experience?.value} value={experience?.value} checked={experience?.value === value && 'checked'} onChange={onChangeHandler}  />
                        <span className="checkmark" />
                    </label>
                ))}
            </div>
        </div>
    );
}

export default Experience;
