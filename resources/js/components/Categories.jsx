import React,{useState} from 'react';
import {appendParamsToUrl, getUrlParams, valueFromUrlParams} from "./services/helpers";

const Categories = ({onChange, categories}) => {

    const [value, setValue] = useState(valueFromUrlParams('category') || '');

    const onChangeHandler = event => {
        const value  = event.target.value;
        setValue(value);
        appendParamsToUrl('category', value);
        appendParamsToUrl('page', 1);
        onChange(event);
    }

    return (
        <div className="single-listing">
            <div className="small-section-tittle2">
                <h4>Job Category</h4>
            </div>
            <div className="select-job-items2">
                <select name="category" onChange={onChangeHandler} value={value}>
                    <option value="" >All categories</option>
                    {categories && categories.map(categorie => <option value={categorie.title} key={categorie.id}>{categorie.title}</option>)}
                </select>
            </div>
        </div>
    );
}

export default Categories;
