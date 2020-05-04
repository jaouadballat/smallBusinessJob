import React from 'react';
import ReactDOM from 'react-dom';
import JobList from './JobList';

function App() {
    return (
        <JobList />
    );
}

export default App;

if (document.getElementById('job-list')) {
    ReactDOM.render(<App />, document.getElementById('job-list'));
}
