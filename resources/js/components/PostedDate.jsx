import React from 'react';

const PostedDate = ({onChange}) => (
    <div className="select-Categories pb-50">
        <div className="small-section-tittle2">
            <h4>Posted Within</h4>
        </div>
        <label className="container">Any
            <input type="checkbox" onChange={onChange} />
            <span className="checkmark"></span>
        </label>
        <label className="container">Today
            <input type="checkbox" checked="checked active" />
            <span className="checkmark"></span>
        </label>
        <label className="container">Last 2 days
            <input type="checkbox" />
            <span className="checkmark"></span>
        </label>
        <label className="container">Last 3 days
            <input type="checkbox" />
            <span className="checkmark"></span>
        </label>
        <label className="container">Last 5 days
            <input type="checkbox" />
            <span className="checkmark"></span>
        </label>
        <label className="container">Last 10 days
            <input type="checkbox" />
            <span className="checkmark"></span>
        </label>
    </div>
);

export default PostedDate;
