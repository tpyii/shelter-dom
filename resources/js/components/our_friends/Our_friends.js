import Carousel, {consts} from 'react-elastic-carousel'
import Item from "./Item";
import {Link} from "react-router-dom";
import {Modal_window} from '../modal_window/Modal_window'
import {useState, useEffect} from 'react'
import {selectAnimalsList} from '../store/getAnimalsList/selectors'
import {useDispatch, useSelector} from "react-redux";
import {getAnimals, toggleFavourit} from '../store/getAnimalsList/actions'
import LeftArrow from './assets/Arrow (2).png'
import RightArrow from './assets/Arrow (1).png'
import {Like} from '../like/Like'

export const Our_friends = () => {
    const placeholder = 'https://placehold.co/600x400'
    const dispatch = useDispatch()
    const animals = useSelector(selectAnimalsList)
    const [show, setShow] = useState(false)
    const [animalData, setAnimalData] = useState('')

    useEffect(() => {
        dispatch(getAnimals())
    }, [])

    const handleShow = () => setShow(true)
    const handleClose = () => setShow(false)

    const getAnimalDataById = (e) => {
        const value = e.target.id
        let data = animals.find(animal => animal.id === Number(value))
        setAnimalData(data)
    }

    const getLikedAnimalDataById = (id) => {
        dispatch(toggleFavourit(id))
    }

    const functionWrapper = (e) => {
        handleShow()
        getAnimalDataById(e)
    }

    const breakPoints = [
        {width: 1, itemsToShow: 1},
        {width: 550, itemsToShow: 2},
        {width: 768, itemsToShow: 3},
        {width: 1200, itemsToShow: 4},
    ];

    const myArrow = ({type, onClick, isEdge}) => {
        const pointer = type === consts.PREV ? LeftArrow.toString() : RightArrow.toString()
        return (
            <button style={{width: '58px', marginTop: '184px'}}
                    className='slider-button-next button button-circle button-secondary' onClick={onClick}
                    disabled={isEdge}>
                <img src={pointer} alt="arrow"/>
            </button>
        )
    }
    return (
        <div className='text-center ' style={{background: '#F6F6F6', paddingBottom: '100px'}}>
            <h3 style={{paddingTop: '80px'}} className="mb-5 text-center">Our friends who<br/>are looking for a
                house
            </h3>
            <div className='container'>
                <Carousel renderArrow={myArrow} breakPoints={breakPoints} pagination={false}>
                    {animals?.map(({images, name, id, isLiked}) => (
                        <Item key={id} id={id} className='d-flex justify-content-around'>
                            <div className="swiper-slide">
                                <div className="card d-flex flex-column">
                                    <Like getLikedAnimalDataById={() => getLikedAnimalDataById(id)} isLiked={isLiked}/>

                                    <img
                                        src={`${images?.length === 0 ? placeholder : images?.length && images[0]?.path
                                            .replace('public/', '')
                                            .replace('\\', '/')
                                            .replace('tmp_db/', '')}`
                                        } alt={name}/>
                                    <div
                                        className="card-content d-flex flex-column justify-content-center align-items-center">
                                        <h4>{name}</h4>
                                        <button id={id} onClick={functionWrapper}
                                                className="button button-secondary"
                                                data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">Learn more
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </Item>
                    ))}
                </Carousel>
            </div>
            <Link to="/our_pets" style={{marginTop: '60px', width: '265px', textDecoration: 'none'}}
                  className="button button-primary mx-auto mt-60 mb-100">Get to know the rest</Link>
            <Modal_window show={show} hide={handleClose} animalData={animalData}/>
        </div>
    )
}

