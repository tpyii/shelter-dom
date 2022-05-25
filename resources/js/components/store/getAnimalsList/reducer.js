import {REQUEST_STATUS} from "../../constants/Constants";
import {store} from '../../store/index'
import {
    REQUEST_ANIMALS_SUCCESS,
    REQUEST_BREEDS_SUCCESS,
    REQUEST_TYPES_SUCCESS,
    REQUEST_INOCULATIONS_SUCCESS,
    REQUEST_DISEASES_SUCCESS,
    TOGGLE_FAVOURIT,
} from "./actions";


export const initialState = {
    animalsList: [],
    breedsList: [],
    typesList: [],
    inocList: [],
    diseasesList: [],
    favouritesList: [],
    total: 0,
    animalsPerPage: 0,
    request: {
        status: REQUEST_STATUS.IDLE,
        error: ''
    }
}

export const animalsReducer = (state = initialState, {type, payload, favourit}) => {
    switch (type) {
        case REQUEST_ANIMALS_SUCCESS:
            return {
                ...state,
                animalsList: payload.animals.data,
                total: payload.animals.meta.total,
                animalsPerPage: payload.animals.meta.per_page,
                favouritesList: payload.fovarites || [],
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

        case TOGGLE_FAVOURIT:
            return {
                ...state,
                favouritesList: payload.newFavouritesList,
                animalsList: payload.newAnimalsList

            };

        default:
            return state
    }
}

