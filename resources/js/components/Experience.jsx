import React from 'react';

const Experience = ({onChange}) => (
    <div className="select-Categories pt-80 pb-50">
        <div className="small-section-tittle2">
            <h4>Experience</h4>
        </div>
        <label className="container">1-2 Years
            <input type="checkbox" name="[1-2]" onChange={onChange}  />
            <span className="checkmark" />
        </label>
        <label className="container">2-3 Years
            <input type="checkbox" checked="checked active" name="[2-3]" onChange={onChange}  />
            <span className="checkmark" />
        </label>
        <label className="container">3-6 Years
            <input type="checkbox" name="[3-6]" onChange={onChange}  />
            <span className="checkmark"></span>
        </label>
        <label className="container">6-more..
            <input type="checkbox" name="6" onChange={onChange}  />
            <span className="checkmark"></span>
        </label>
    </div>
);

export default Experience;
