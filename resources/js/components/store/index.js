import {applyMiddleware, combineReducers, compose, createStore} from "redux";
import thunk from "redux-thunk";

import {animalsReducer} from '../store/getAnimalsList/reducer';

const composeEnhancers = window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ || compose;
export const store = createStore(
    combineReducers({
        animals: animalsReducer,
    },),
    composeEnhancers(applyMiddleware(thunk))
);
