import React, {useState} from 'react'
import {appendParamsToUrl, valueFromUrlParams, debounce} from "./services/helpers";


const Salary = ({onChange}) => {

    const [value, setValue] = useState(valueFromUrlParams('salary') || '');
    const debouncedFunction = debounce((event) => {        
        onChange(event);
    }, 1000);

    
    const onChangeHandler = event => {
        const value  = event.target.value;
        setValue(value);
        appendParamsToUrl('salary', value);
        appendParamsToUrl('page', 1);
        debouncedFunction(event)
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
