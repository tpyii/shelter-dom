import katrine from '../../../../templates/assets/images/pets-katrine.png'
import {Modal} from 'react-bootstrap'
import {useState, useEffect} from 'react'
import './modal.css'

export const Modal_window = ({show, hide, animalData}) => {
    const placeholder = 'https://placehold.co/600x400'

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
            <Modal.Body style={{overflowY: 'auto'}}>
                <div className="modal-body">
                    <div className="row m-0 h-100 flex-column flex-sm-row">
                        <div className="col h-100">
                            <img src={animalData?.images?.length === 0 ? placeholder :
                            animalData?.images?.length && animalData.images[0].path
                                .replace('public/', '')
                                .replace('\\', '/')
                                .replace('tmp_db/', '')}
                                 alt={animalData.name}
                                 className="modal-image"
                            />
                        </div>
                        <div className="col h-100 modal-text">
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
