import React from 'react';
import ReactDOM from 'react-dom';
import JobList from './JobListContainer';
import {JobProvider} from "./store";
import City from "./City";

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

if (document.getElementById('citiesDom')) {
    ReactDOM.render(<City />, document.getElementById('citiesDom'));
}
