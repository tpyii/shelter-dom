import {apiURL, inoculationsUrl, diseasesUrl, typeUrl, breedsUrl} from '../../constants/Constants'
import axios from 'axios'

export const REQUEST_ANIMALS_SUCCESS = 'GET_ANIMALS::REQUEST_ANIMALS_SUCCESS'
export const REQUEST_BREEDS_SUCCESS = 'GET_ANIMALS::REQUEST_BREEDS_SUCCESS'
export const REQUEST_TYPES_SUCCESS = 'GET_ANIMALS::REQUEST_TYPES_SUCCESS'
export const REQUEST_DISEASES_SUCCESS = 'GET_ANIMALS::REQUEST_DISEASES_SUCCESS'
export const REQUEST_INOCULATIONS_SUCCESS = 'GET_ANIMALS::REQUEST_INOCULATIONS_SUCCESS'

export const getAnimalsSuccess = (animals) => ({
    type: REQUEST_ANIMALS_SUCCESS,
    payload: animals
})

export const getAnimals = (sortBy, page, breed, type, inoculations, diseases, age, treatment_of_parasites, name) => async (dispatch) => {
    const params = {
        sortBy,
        page,
        breed,
        type,
        inoculations,
        diseases: diseases?.length ? diseases : '',
        age,
        treatment_of_parasites,
        name
    }

    const paramsKeys = Object.keys(params)

    Object.values(params).forEach((param, index) => {
        if (!param) {
            delete params[paramsKeys[index]]
        }
    })


    axios.get(apiURL, {params})
        .then(resp => dispatch({type: REQUEST_ANIMALS_SUCCESS, payload: resp.data}))
        .catch(err => console.warn(err))
}

export const getBreeds = () => async (dispatch) => {
    axios.get(breedsUrl)
        .then(resp => dispatch({type: REQUEST_BREEDS_SUCCESS, payload: resp.data}))
        .catch(err => console.warn(err))
}

export const getTypes = () => async (dispatch) => {
    axios.get(typeUrl)
        .then(resp => dispatch({type: REQUEST_TYPES_SUCCESS, payload: resp.data}))
        .catch(err => console.warn(err))
}

export const getDiseases = () => async (dispatch) => {
    axios.get(diseasesUrl)
        .then(resp => dispatch({type: REQUEST_DISEASES_SUCCESS, payload: resp.data}))
        .catch(err => console.warn(err))
}

export const getInoculations = () => async (dispatch) => {
    axios.get(inoculationsUrl)
        .then(resp => dispatch({type: REQUEST_INOCULATIONS_SUCCESS, payload: resp.data}))
        .catch(err => console.warn(err))
}


