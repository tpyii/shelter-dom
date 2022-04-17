import {REQUEST_STATUS} from "../../constants/Constants";
import {REQUEST_ANIMALS_SUCCESS, SCROLL_TO_BLOCK} from "./actions";


export const initialState = {
    animalsList: [],
    id: '',
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
        case SCROLL_TO_BLOCK:
            console.log(payload)
            return {
                id : payload
            }
        default:
            return state
    }
}
