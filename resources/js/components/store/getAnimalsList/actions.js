import {apiURL} from '../../constants/Constants'
import axios from 'axios'

export const REQUEST_ANIMALS_SUCCESS = 'GET_ANIMALS::REQUEST_ANIMALS_SUCCESS'
export const SCROLL_TO_BLOCK = 'GET_ANIMALS::SCROLL_TO_BLOCK'

export const getAnimalsSuccess = (animals) => ({
    type: REQUEST_ANIMALS_SUCCESS,
    payload: animals
})

export const getIdToScroll = (id)=>({
    type:SCROLL_TO_BLOCK,
    payload: id
})

export const getAnimals = (page, sortBy) => async (dispatch) => {
    axios.get(apiURL, {params: {page, sortBy}})
        .then(resp => dispatch({type: REQUEST_ANIMALS_SUCCESS, payload: resp.data}))
        .catch(err => console.warn(err))
}



