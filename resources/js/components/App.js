import React from 'react';
import ReactDOM from 'react-dom';
import JobList from './JobListContainer';
import {JobProvider} from "./store";

function App() {
    return (
        <JobProvider>
            <JobList />
        </JobProvider>
    );
}

export default App;

if (document.getElementById('job-list')) {
    ReactDOM.render(<App />, document.getElementById('job-list'));
}
