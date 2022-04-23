import {REQUEST_STATUS} from "../../constants/Constants";
import {REQUEST_ANIMALS_SUCCESS, SCROLL_TO_BLOCK} from "./actions";


export const initialState = {
    animalsList: [],
    id: '',
    total: 0,
    animalsPerPage: 0,
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
                animalsList: payload.data,
                total: payload.meta.total,
                animalsPerPage: payload.meta.per_page,
                request: {
                    error: '',
                    status: REQUEST_STATUS.SUCCESS
                }
            }
        default:
            return state
    }
}
