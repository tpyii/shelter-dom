import {useState, useEffect} from 'react'
import {Modal_window} from '../modal_window/Modal_window'
import {Like} from '../like/Like'
import {useDispatch} from "react-redux";
import {toggleFavourit} from '../store/getAnimalsList/actions'


export const Animals = ({animals, loading}) => {
    const [show, setShow] = useState(false)
    const [animalData, setAnimalData] = useState('')
    const dispatch = useDispatch()
    const placeholder = 'https://placehold.co/600x400'

    if (loading) {
        return <h2>Loading...</h2>;
    }

    const handleShow = () => setShow(true)
    const handleClose = () => setShow(false)

    const getAnimalDataById = (e) => {
        const value = e.target.id
        setAnimalData(animals.find(animal => animal.id === Number(value)))
    }


    const functionWrapper = (e) => {
        handleShow()
        getAnimalDataById(e)
    }

    const getLikedAnimalDataById = (id) => {
        dispatch(toggleFavourit(id))
    }

    return (
        <div className='row mb-5'>
            {animals.map(({id, name, images, isLiked}) => (
                <div key={id} className="col col-lg-3 mb-3">
                    <div className="card d-flex flex-column mr-3">
                        <Like getLikedAnimalDataById={() => getLikedAnimalDataById(id)} isLiked={isLiked} />
                        <img src={`${images?.length === 0 ? placeholder : images?.length && images[0]?.path
                            .replace('public/', '')
                            .replace('\\', '/')
                            .replace('tmp_db/', '')}`
                        }
                             alt={name}
                        />
                        <div
                            className="card-content d-flex flex-column justify-content-center align-items-center">
                            <h4>{name}</h4>
                            <button id={id} onClick={functionWrapper} className="button button-secondary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Learn more
                            </button>
                        </div>
                    </div>
                </div>

            ))}
            <Modal_window show={show} hide={handleClose} animalData={animalData}/>
        </div>
    );
};

