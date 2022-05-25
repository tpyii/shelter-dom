import katrine from '../../../../templates/assets/images/pets-katrine.png'
import jennifer from '../../../../templates/assets/images/pets-jennifer.png'
import woody from '../../../../templates/assets/images/pets-woody.png'
import katrine1 from '../../../../templates/assets/images/pets-katrine-1.png'
import timmy from '../../../../templates/assets/images/pets-timmy.png'
import charly from '../../../../templates/assets/images/pets-charly.png'
import scarlet from '../../../../templates/assets/images/pets-scarlet.png'
import katrine2 from '../../../../templates/assets/images/pets-katrine-2.png'

export const apiURL = "/api/animals";
export const apiFavourites = "api/favourites"
export const breedsUrl = '/api/breeds'
export const typeUrl = '/api/types'
export const diseasesUrl = '/api/diseases'
export const inoculationsUrl = '/api/inoculations'

export const REQUEST_STATUS = {
    IDLE: 0,
    LOADING: 1,
    SUCCESS: 2,
    FAILURE: 3
}

let animalArr = []

const fetchData = async () => {
    const response = await fetch(apiURL)
    if (response.ok) {
        const anim = await response.json();
        return animalArr = anim.data
    } else {
        alert("Ошибка HTTP: " + response.status);
    }
}
fetchData()
export {animalArr}

// export const images = [
//     {
//         id: 1,
//         type: 'Dog',
//         breed: 'Labrador',
//         url: katrine,
//         name: 'a',
//         age: '2 year',
//         inoculations: 'no',
//         diseases: 'Yes',
//         parasites: 'no'
//     },
//     {
//         id: 2,
//         type: 'Dog',
//         breed: 'Labrador',
//         url: jennifer,
//         name: 'b',
//         age: '2 year',
//         inoculations: 'no',
//         diseases: 'Yes',
//         parasites: 'no'
//     },
//     {
//         id: 3,
//         type: 'Dog',
//         breed: 'Labrador',
//         url: woody,
//         name: 'c',
//         age: '2 year',
//         inoculations: 'no',
//         diseases: 'Yes',
//         parasites: 'no'
//     },
//     {
//         id: 4,
//         type: 'Dog',
//         breed: 'Labrador',
//         url: katrine1,
//         name: 'd',
//         age: '2 year',
//         inoculations: 'no',
//         diseases: 'Yes',
//         parasites: 'no'
//     },
//     {
//         id: 5,
//         type: 'Dog',
//         breed: 'Labrador',
//         url: woody,
//         name: 'e',
//         age: '2 year',
//         inoculations: 'no',
//         diseases: 'Yes',
//         parasites: 'no'
//     },
//     {
//         id: 6,
//         type: 'Dog',
//         breed: 'Labrador',
//         url: charly,
//         name: 'f',
//         age: '2 year',
//         inoculations: 'no',
//         diseases: 'Yes',
//         parasites: 'no'
//     },
//     {
//         id: 7,
//         type: 'Dog',
//         breed: 'Labrador',
//         url: scarlet,
//         name: 'g',
//         age: '2 year',
//         inoculations: 'no',
//         diseases: 'Yes',
//         parasites: 'no'
//     },
//     {
//         id: 8,
//         type: 'Dog',
//         breed: 'Labrador',
//         url: katrine2,
//         name: 'h',
//         age: '2 year',
//         inoculations: 'no',
//         diseases: 'Yes',
//         parasites: 'no'
//     },
//     {
//         id: 9,
//         type: 'Dog',
//         breed: 'Labrador',
//         url: katrine,
//         name: 'i',
//         age: '2 year',
//         inoculations: 'no',
//         diseases: 'Yes',
//         parasites: 'no'
//     },
//     {
//         id: 10,
//         type: 'Dog',
//         breed: 'Labrador',
//         url: jennifer,
//         name: 'j',
//         age: '2 year',
//         inoculations: 'no',
//         diseases: 'Yes',
//         parasites: 'no'
//     },
//     {
//         id: 11,
//         type: 'Dog',
//         breed: 'Labrador',
//         url: woody,
//         name: 'k',
//         age: '2 year',
//         inoculations: 'no',
//         diseases: 'Yes',
//         parasites: 'no'
//     },
//     {
//         id: 12,
//         type: 'Dog',
//         breed: 'Labrador',
//         url: katrine1,
//         name: 'l',
//         age: '2 year',
//         inoculations: 'no',
//         diseases: 'Yes',
//         parasites: 'no'
//     },
//     {
//         id: 13,
//         type: 'Dog',
//         breed: 'Labrador',
//         url: katrine,
//         name: 'i',
//         age: '2 year',
//         inoculations: 'no',
//         diseases: 'Yes',
//         parasites: 'no'
//     },
//     {
//         id: 14,
//         type: 'Dog',
//         breed: 'Labrador',
//         url: jennifer,
//         name: 'j',
//         age: '2 year',
//         inoculations: 'no',
//         diseases: 'Yes',
//         parasites: 'no'
//     },
//     {
//         id: 15,
//         type: 'Dog',
//         breed: 'Labrador',
//         url: woody,
//         name: 'k',
//         age: '2 year',
//         inoculations: 'no',
//         diseases: 'Yes',
//         parasites: 'no'
//     },
//     {
//         id: 16,
//         type: 'Dog',
//         breed: 'Labrador',
//         url: katrine1,
//         name: 'l',
//         age: '2 year',
//         inoculations: 'no',
//         diseases: 'Yes',
//         parasites: 'no'
//     },
// ]
