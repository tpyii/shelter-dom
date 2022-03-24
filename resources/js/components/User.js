import React from 'react';
import ReactDOM from 'react-dom';
import App from './App';

// DOM element
if (document.getElementById('user')) {
    ReactDOM.render(<App />, document.getElementById('user'));
}
