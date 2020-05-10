import React from 'react';
import {imageLink} from "./services/helpers";

const Jobs = props => {
    const { jobs } = props;
    return (
        <div className="col-xl-9 col-lg-9 col-md-8">
            <section className="featured-job-area">
                <div className="container">
                    <div className="row">
                        <div className="col-lg-12">
                            <div className="count-job mb-35">
                                <span>{jobs?.meta?.total} Jobs found</span>
                            </div>
                        </div>
                    </div>
                    {jobs?.data?.map(job => {
                        return (
                            <div className="single-job-items mb-30" key={job.id}>
                                <div className="job-items">
                                    <div className="company-img">

                                        <a href="#"><img src={imageLink(job.agency.logo)} alt={job.title} /></a>
                                    </div>
                                    <div className="job-tittle job-tittle2">
                                        <a href="#">
                                            <h4>{job.title}</h4>
                                        </a>
                                        <ul>
                                            <li>{job.agency.name}</li>
                                            <li><i className="fas fa-map-marker-alt"></i>{job.location}</li>
                                            <li>{job.salary}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div className="items-link items-link2 f-right">
                                    <a href="job_details.html">{job.contract}</a>
                                    <span>{job.postedDate}</span>
                                </div>
                            </div>
                        )
                    })}

                </div>
            </section>
        </div>
    )
}

export default Jobs;
