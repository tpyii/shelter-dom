import {REQUEST_STATUS} from "../../constants/Constants";
import {REQUEST_ANIMALS_SUCCESS,REQUEST_BREEDS_SUCCESS,REQUEST_TYPES_SUCCESS,REQUEST_INOCULATIONS_SUCCESS,REQUEST_DISEASES_SUCCESS} from "./actions";


export const initialState = {
    animalsList: [],
    breedsList:[],
    typesList:[],
    inocList:[],
    diseasesList:[],
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
        case REQUEST_BREEDS_SUCCESS:
            return {
                ...state,
                breedsList: payload.data
            }
        case REQUEST_TYPES_SUCCESS:
            return {
                ...state,
                typesList: payload.data
            }
        case REQUEST_INOCULATIONS_SUCCESS:
            return {
                ...state,
                inocList: payload.data
            }
        case REQUEST_DISEASES_SUCCESS:
            return {
                ...state,
                diseasesList: payload.data
            }
        default:
            return state
    }
}
