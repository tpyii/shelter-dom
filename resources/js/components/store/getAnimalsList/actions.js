import {apiURL, apiFavourites, inoculationsUrl, diseasesUrl, typeUrl, breedsUrl} from '../../constants/Constants'
import axios from 'axios'

export const REQUEST_ANIMALS_SUCCESS = 'GET_ANIMALS::REQUEST_ANIMALS_SUCCESS'
export const REQUEST_BREEDS_SUCCESS = 'GET_ANIMALS::REQUEST_BREEDS_SUCCESS'
export const REQUEST_TYPES_SUCCESS = 'GET_ANIMALS::REQUEST_TYPES_SUCCESS'
export const REQUEST_DISEASES_SUCCESS = 'GET_ANIMALS::REQUEST_DISEASES_SUCCESS'
export const REQUEST_INOCULATIONS_SUCCESS = 'GET_ANIMALS::REQUEST_INOCULATIONS_SUCCESS'
export const TOGGLE_FAVOURIT = "GET_ANIMALS::TOGGLE_FAVOURIT";

const animalFavouritesApi = [
    apiURL,
    apiFavourites
]

const config = {
    headers: {
        Authorization: `Bearer ${localStorage.getItem('token')}`
    },
}



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


    if (localStorage.getItem('id')) {
        config.params = params
        axios.all(animalFavouritesApi.map((favouritAnimal) => axios.get(favouritAnimal, config)))
            .then(resp => {
                const animals = resp[0].data
                const fovarites = resp[1].data.data
                fovarites.forEach(({id}) => {
                    const matchAnimal = animals.data.find((animal) => animal.id === id)
                    if (matchAnimal) {
                        matchAnimal.isLiked = true
                    }
                })
                dispatch({type: REQUEST_ANIMALS_SUCCESS, payload: {animals, fovarites}})
            })
            .catch(err => console.warn(err))
    } else {
        axios.get(apiURL, {params})
            .then(resp => dispatch({type: REQUEST_ANIMALS_SUCCESS, payload: {animals: resp.data}}))
            .catch(err => console.warn(err))
    }
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

export const toggleFavourit = (payload) => async (dispatch, getState) => {
    const newAnimalsList = [...getState().animals.animalsList];
    let newFavouritesList = [...getState().animals.favouritesList];
    const currentAnimal = newAnimalsList.find(({id}) => id === payload);

    if (currentAnimal.isLiked) {
        newFavouritesList = newFavouritesList.filter(({id}) => id !== payload);
        currentAnimal.isLiked = false;
        axios.delete(`api/favourites/${payload}`, config)
            .catch(err => console.warn(err))
    } else {
        newFavouritesList.push({...currentAnimal});
        currentAnimal.isLiked = true;
        axios.post(`api/favourites?id=${payload}`, null, config)
            .catch(err => console.warn(err))
    }


    dispatch({
        type: TOGGLE_FAVOURIT,
        payload: {newAnimalsList, newFavouritesList}
    })
}

export const signIn = (payload) => ({
    type: SIGN_IN,
    payload
});

export const signOut = (payload) => ({
    type: SIGN_OUT,
    payload
});


