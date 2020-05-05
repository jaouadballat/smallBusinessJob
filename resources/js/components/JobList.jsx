import React from 'react'
import Filter from "./Filter";
import Jobs from "./Jobs";

const JobList = ({jobs, categories}) => (
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

                    <Filter {...categories} />
                    <Jobs {...jobs} />

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
                                    <li className="page-item active"><a className="page-link" href="#">01</a></li>
                                    <li className="page-item"><a className="page-link" href="#">02</a></li>
                                    <li className="page-item"><a className="page-link" href="#">03</a></li>
                                    <li className="page-item"><a className="page-link" href="#"><span
                                        className="ti-angle-right"></span></a></li>
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
