import {apiURL} from '../../constants/Constants'
import axios from 'axios'

export const REQUEST_ANIMALS_SUCCESS = 'GET_ANIMALS::REQUEST_ANIMALS_SUCCESS'

export const getAnimalsSuccess = (animals) => ({
    type: REQUEST_ANIMALS_SUCCESS,
    payload: animals
})

export const getAnimals = () => async (dispatch) => {
    axios.get(apiURL)
        .then(resp => dispatch({type: REQUEST_ANIMALS_SUCCESS, payload: resp.data.data}))
        .catch(err => console.warn(err))
}



