import {useEffect, useMemo} from 'react'
import axios from 'axios'
import {useSelector, useDispatch} from 'react-redux'
import {selectFavour} from '../store/getAnimalsList/selectors'
import {NavBar} from '../NavBar/NavBar'
import {getAnimals, toggleFavourit} from '../store/getAnimalsList/actions'

export const Favourites = () => {
    const favourits = useSelector(selectFavour)

    const dispatch = useDispatch()

    useMemo(() => {
        dispatch(getAnimals())
    }, [favourits.length])

    const getLikedAnimalDataById = (id) => {
        dispatch(toggleFavourit(id))
    }

    return (
        < div style={{
            background: 'url(/images/noise_transparent@2x.png?e39085a…), radial-gradient(100% 215.42% at 0% 0%, #5B483A 0%, #262425 100%), #211F20'
        }}>
            <NavBar/>
            <div style={{textAlign: 'center'}}><h2 style={{color: 'white'}}>Favourites</h2></div>
            <div className='container' style={{display: 'flex', justifyContent: 'space-around', flexWrap: 'wrap', textAlign: 'center'}}>

                {favourits.length !== 0?(
                    favourits?.map(({
                                         id,
                                         name,
                                         images,
                                         birthday_at,
                                         breed,
                                         description,
                                         type,
                                         treatment_of_parasites,
                                         disease,
                                         inoculation,
                                         isLiked
                                     }) => (
                        <div key={id} style={{
                            width: '300px',
                            backgroundColor: '#F1CDB3',
                            border: '1px solid black',
                            borderRadius: '5%',
                            padding: '10px',
                            boxSizing: 'border-box',
                            marginTop: '30px',
                            marginBottom: '150px'
                        }}>
                            <h4>{name}</h4>
                            <img src={`${images?.length === 0 ? placeholder : images?.length && images[0]?.path
                                .replace('public/', '')
                                .replace('\\', '/')
                                .replace('tmp_db/', '')}`
                            }
                                 alt={name}
                            />
                            <div style={{marginTop: '10px', borderRadius: '5%'}}>
                                <div><strong>Type:</strong> {type}</div>
                                <div><strong>Breed:</strong>{breed}</div>
                                <div><strong>Birthday:</strong>{birthday_at}</div>
                                <div><strong>Parasites:</strong>{treatment_of_parasites}</div>
                                <div>
                                    <details>
                                        <summary><strong>Вisease:</strong></summary>
                                        {disease[0].name}</details>
                                </div>
                                <div>
                                    <details>
                                        <summary><strong>Inoculation:</strong></summary>
                                        {inoculation[0].name}
                                    </details>
                                </div>
                                <div>
                                    <details>
                                        <summary><strong>Description:</strong></summary>
                                        {description}
                                    </details>
                                </div>
                            </div>
                            <button onClick={() => getLikedAnimalDataById(id)} style={{marginTop: '15px'}}
                                    className='btn btn-danger'>Delete
                            </button>
                        </div>
                    ))
                ):(
                    <div style={{height:'100vh'}}><h1 style={{color:'white'}}>You don't have any favorites yet</h1></div>
                )}

            </div>
        </div>
    )
}
