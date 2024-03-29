import React from 'react'
import Filter from "./Filter";
import Jobs from "./Jobs";
import {appendParamsToUrl, getFilterFromUrlParams} from "./services/helpers";
import {getJobsList} from "./store/actions";

const renderPagination = ({current_page, last_page: pages}, dispatch) => {

    const handlePageChange = (page, dispatch) => {
        appendParamsToUrl('page', page);
        const filter = getFilterFromUrlParams();
        getJobsList(dispatch, filter)
    }

    const pagination = [];

    for(let i = 1; i < pages; i++) {
        pagination.push(
            <li className={`page-item ${current_page === i && 'active'}`} key={i}>
                <a className="page-link" onClick={() => handlePageChange(i, dispatch)}>
                    {i}
                </a>
            </li>
        );
    }

    return pagination;
}

const JobList = props => (
    <main>
        <div className="slider-area ">
            <div className="single-slider section-overly slider-height2 d-flex align-items-center"
                 data-background="assets/img/hero/about.jpg">
                <div className="container">
                    <div className="row">
                        <div className="col-xl-12">
                            <div className="hero-cap text-center">
                                <h2>Get your job</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div className="job-listing-area pt-120 pb-120">
            <div className="container">
                <div className="row">

                    <Filter {...props}  />
                    <Jobs {...props} />

                </div>
            </div>
        </div>
        <div className="pagination-area pb-115 text-center">
            <div className="container">
                <div className="row">
                    <div className="col-xl-12">
                        <div className="single-wrap d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul className="pagination justify-content-start">
                                    {props?.jobs?.meta && renderPagination(props?.jobs?.meta, props?.dispatch)}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
)

export default JobList;
