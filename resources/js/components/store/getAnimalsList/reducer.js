import {REQUEST_STATUS} from "../../constants/Constants";
import {REQUEST_ANIMALS_SUCCESS} from "./actions";


export const initialState = {
    animalsList: [],
    request: {
        status: REQUEST_STATUS.IDLE,
        error: ''
    }
}

export const animalsReducer = (state = initialState, {type, payload}) => {
    switch (type) {
        case REQUEST_ANIMALS_SUCCESS:
            return {
                ...state,
                animalsList: payload,
                request: {
                    error: '',
                    status: REQUEST_STATUS.SUCCESS
                }
            }
        default:
            return state
    }
}
