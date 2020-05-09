import React from 'react';
import {categoryFromUrl} from "./services/helpers";

const Categories = ({onChange, categories}) => {

    const onChangeHandler = event => {
        const value  = event.target.value;
        categoryFromUrl(value);
        onChange(event);
    }

    return (
        <div className="single-listing">
            <div className="small-section-tittle2">
                <h4>Job Category</h4>
            </div>
            <div className="select-job-items2">
                <select name="category" onChange={onChangeHandler}>
                    <option value="" >All categories</option>
                    {categories && categories.map(categorie => <option value={categorie.title} key={categorie.id}>{categorie.title}</option>)}
                </select>
            </div>
        </div>
    );
}

export default Categories;
