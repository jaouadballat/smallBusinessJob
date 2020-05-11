import React, {useState} from 'react';
import {appendParamsToUrl, valueFromUrlParams} from "./services/helpers";

const PostedDate = ({onChange}) => {

    const [value, setValue] = useState(valueFromUrlParams('posted_date') || '');


    const dates  = [
        'Any',
        'Today',
        'Last 2 days',
        'Last 3 days',
        'Last 5 days',
        'Last 10 days',
    ];
    const onChangeHandler = event => {
        const { id: value } = event.target;
        setValue(value);
        appendParamsToUrl('posted_date', value);
        appendParamsToUrl('page', 1);
        onChange(event);
    }

    return (
        <div className="single-listing">

            <div className="select-Categories pb-50">
                <div className="small-section-tittle2">
                    <h4>Posted Within</h4>
                </div>
                {dates.map(date => (
                    <label className="container">{date}
                        <input type="checkbox" name='posted_date' id={date} value={date} checked={date === value && 'checked'} onChange={onChangeHandler} />
                        <span className="checkmark"></span>
                    </label>
                ))}
            </div>

        </div>
    );
}

export default PostedDate;
