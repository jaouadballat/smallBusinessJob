import React from 'react';

const ContractType = ({onChange}) => {
    const types = [
        'Full Time',
        'Part Time',
        'Remote',
        'Freelance'
    ];
    return (
        <div className="select-Categories pt-80 pb-50">
            <div className="small-section-tittle2">
                <h4>Job Type</h4>
            </div>
            {types.map(type => (
                <label className="container">
                    {type}
                    <input type="checkbox" id={type} name={type} checked="checked active" onChange={onChange}/>
                    <span className="checkmark"></span>
                </label>
            ))}
        </div>
    );
};

export default ContractType;
