import {Modal} from 'react-bootstrap'
import {useState, useEffect} from 'react'
import Carousel from 'react-elastic-carousel'
import Item from "../our_friends/Item";
import './modal.css'

export const Modal_window = ({show, hide, animalData}) => {
    const placeholder = 'https://placehold.co/600x400'
    const imagesArr = animalData.images;

    const breakPoints = [
        {width: 1, itemsToShow: 1},
        {width: 550, itemsToShow: 2},
        {width: 768, itemsToShow: 3},
        {width: 1200, itemsToShow: 4},
    ];

    function getAge(dateString) {
        let today = new Date();
        let birthDate = new Date(dateString);
        let age = today.getFullYear() - birthDate.getFullYear();
        let m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }

    return (
        <Modal show={show} onHide={hide}>
            <Modal.Header closeButton>

            </Modal.Header>
            <Modal.Body>
                <div className="modal-body">
                    <div className="row m-0 h-100 flex-column flex-sm-row">
                        <div className="col h-100 item__carousel">
                            {imagesArr?.length > 1 ?
                                <Carousel >
                                    {imagesArr?.map(({images, name, id}) => (
                                        <Item key={id} className='d-flex justify-content-around'>
                                            <div className="swiper-slide">
                                                <div className="card d-flex flex-column">
                                                    <img src={`${imagesArr?.length === 0 ? placeholder : imagesArr?.length && imagesArr[0]?.path
                                                            .replace('public/', '')
                                                            .replace('\\', '/')
                                                            .replace('tmp_db/', '')}`
                                                        } alt='pic'/>
                                                </div>
                                            </div>
                                        </Item>
                                    ))}
                                </Carousel>

                                : <img style={{marginTop:'-90px'}} src={imagesArr?.length === 0 ? placeholder :
                                    imagesArr?.length && imagesArr[0].path
                                        .replace('public/', '')
                                        .replace('\\', '/')
                                        .replace('tmp_db/', '')}
                                       alt={animalData.name}
                                       className="modal-image"
                                />
                            }
                        </div>
                        <div style={{overflowY: 'auto',  height:'500px'}} className="col modal-text">
                            <div className="py-5 px-3">
                                <h3 className="mb-2">{animalData.name}</h3>
                                <h4 className="mb-5">{animalData.type} - {animalData.breed}</h4>
                                <div className="mb-5">
                                    <h5>{animalData.description}</h5>
                                    <h5>{animalData.description}</h5>
                                    <h5>{animalData.description}</h5>
                                </div>
                                <ul className="list">
                                    <li className="list-item"><strong>Age:{getAge(animalData.birthday_at)}</strong></li>
                                    <li className="list-item">
                                        <strong>Inoculations:</strong> {animalData?.inoculation?.length && animalData.inoculation[0].name}
                                    </li>
                                    <li className="list-item">
                                        <strong>Diseases: </strong> {animalData?.disease?.length && animalData.disease[0].name}
                                    </li>
                                    <li className="list-item">
                                        <strong>Parasites: </strong> {animalData.treatment_of_parasites}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </Modal.Body>
        </Modal>
    )
}
