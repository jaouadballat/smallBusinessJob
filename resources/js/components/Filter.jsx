import React from 'react';
import ContractType from "./ContractType";
import Experience from "./Experience";
import PostedDate from "./PostedDate";
import Categories from "./Categories";

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

            <div className="single-listing">
                <div className="small-section-tittle2">
                    <h4>Job Location</h4>
                </div>
                <div className="select-job-items2">
                    <select name="select">
                        <option value="">Anywhere</option>
                        <option value="">Category 1</option>
                        <option value="">Category 2</option>
                        <option value="">Category 3</option>
                        <option value="">Category 4</option>
                    </select>
                </div>

                <Experience onChange={onChange} />

            </div>
            <div className="single-listing">

                <PostedDate onChange={onChange} />

            </div>
            <div className="single-listing">
                <aside
                    className="left_widgets p_filter_widgets price_rangs_aside sidebar_box_shadow">
                    <div className="small-section-tittle2">
                        <h4>Filter Jobs</h4>
                    </div>
                    <div className="widgets_inner">
                        <div className="range_item">
                            <input type="text" className="js-range-slider" value=""/>
                            <div className="d-flex align-items-center">
                                <div className="price_text">
                                    <p>Price :</p>
                                </div>
                                <div className="price_value d-flex justify-content-center">
                                    <input type="text" className="js-input-from" id="amount"
                                           readOnly/>
                                    <span>to</span>
                                    <input type="text" className="js-input-to" id="amount"
                                           readOnly/>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
)

export default Filter;
