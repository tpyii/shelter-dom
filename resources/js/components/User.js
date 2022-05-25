import React from 'react';
import ReactDOM from 'react-dom';
import App from './App';
import {BrowserRouter, Link, Route, Routes} from "react-router-dom";


// DOM element
if (document.getElementById('user')) {
    ReactDOM.render(<BrowserRouter><App /></BrowserRouter>, document.getElementById('user'));
}
