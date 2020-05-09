import React from 'react';
import ContractType from "./ContractType";
import Experience from "./Experience";
import PostedDate from "./PostedDate";
import Categories from "./Categories";
import Location from "./Location";
import Salary from "./Salary";

const Filter = ({data: categories, onChange}) => (
    <div className="col-xl-3 col-lg-3 col-md-4">
        <div className="row">
            <div className="col-12">
                <div className="small-section-tittle2 mb-45">
                    <div className="ion">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            xmlnsXlink="http://www.w3.org/1999/xlink"
                            width="20px" height="12px">
                            <path fill-rule="evenodd" fill="rgb(27, 207, 107)"
                                  d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z"/>
                        </svg>
                    </div>
                    <h4>Filter Jobs</h4>
                </div>
            </div>
        </div>
        <div className="job-category-listing mb-50">

            <Categories categories={categories} onChange={onChange} />

            <ContractType onChange={onChange} />

            <Location onChange={onChange} />

            <Experience onChange={onChange} />

            <PostedDate onChange={onChange} />

            <Salary onChange={onChange} />


        </div>
    </div>
)

export default Filter;
