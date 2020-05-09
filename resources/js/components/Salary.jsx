import React, {useState} from 'react'
import {appendParamsToUrl, valueFromUrlParams} from "./services/helpers";


const Salary = () => {

    const [value, setValue] = useState(valueFromUrlParams('salary') || '');

    const onChangeHandler = event => {
        const value  = event.target.value;
        setValue(value);
        appendParamsToUrl('salary', value);
        appendParamsToUrl('page', 1);
        onChange(event);
    }


    return (
        <div className="single-listing">
        <aside
            className="left_widgets p_filter_widgets price_rangs_aside sidebar_box_shadow">
            <div className="small-section-tittle2">
                <h4>Filter Jobs</h4>
            </div>
            <div className="widgets_inner">
                <div className="range_item">
                    <div>{value}</div>
                    <input type='range' min="100" max="10000" value={value} onChange={onChangeHandler}/>
                </div>
            </div>
        </aside>
    </div>
    );
};

export default Salary;
