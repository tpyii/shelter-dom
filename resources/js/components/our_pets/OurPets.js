import {NavBar} from '../NavBar/NavBar'
import {Footer} from '../footer_component/Footer'

import katrine from '../../../../templates/assets/images/pets-katrine.png'
import jennifer from '../../../../templates/assets/images/pets-jennifer.png'
import woody from '../../../../templates/assets/images/pets-woody.png'
import katrine1 from '../../../../templates/assets/images/pets-katrine-1.png'
import timmy from '../../../../templates/assets/images/pets-timmy.png'
import charly from '../../../../templates/assets/images/pets-charly.png'
import scarlet from '../../../../templates/assets/images/pets-scarlet.png'
import katrine2 from '../../../../templates/assets/images/pets-katrine-2.png'
import {NavBarLigth} from '../NavBarLigth/NavBarLigth'

import axios from 'axios'

export const OurPets = () => {
    fetch('GET: /api/animals')
        .then(response => response.json())
        .then(data => console.log(data));

    return (
        <div>
            <NavBarLigth/>
            <div className="section section-light">
                <div className="container">
                    <div className="pets">
                        <h3 className="mb-5 text-center">Our friends who<br/>are looking for a house</h3>
                        <div className="row mb-5">
                            <div className="col col-lg-3 mb-3">
                                <div className="card d-flex flex-column">
                                    <img src={katrine} alt="pets-katrine"/>
                                    <div
                                        className="card-content d-flex flex-column justify-content-center align-items-center">
                                        <h4>Katrine</h4>
                                        <button className="button button-secondary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">Learn more
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div className="col col-lg-3 mb-3">
                                <div className="card d-flex flex-column">
                                    <img src={jennifer} alt="pets-jennifer"/>
                                    <div
                                        className="card-content d-flex flex-column justify-content-center align-items-center">
                                        <h4>Jennifer</h4>
                                        <button className="button button-secondary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">Learn more
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div className="col col-lg-3 mb-3">
                                <div className="card d-flex flex-column">
                                    <img src={woody} alt="pets-woody"/>
                                    <div
                                        className="card-content d-flex flex-column justify-content-center align-items-center">
                                        <h4>Woody</h4>
                                        <button className="button button-secondary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">Learn more
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div className="col col-lg-3 mb-3">
                                <div className="card d-flex flex-column">
                                    <img src={katrine1} alt="pets-sophia"/>
                                    <div
                                        className="card-content d-flex flex-column justify-content-center align-items-center">
                                        <h4>Sophia</h4>
                                        <button className="button button-secondary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">Learn more
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div className="col col-lg-3 mb-3">
                                <div className="card d-flex flex-column">
                                    <img src={timmy} alt="pets-timmy"/>
                                    <div
                                        className="card-content d-flex flex-column justify-content-center align-items-center">
                                        <h4>Timmy</h4>
                                        <button className="button button-secondary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">Learn more
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div className="col col-lg-3 mb-3">
                                <div className="card d-flex flex-column">
                                    <img src={charly} alt="pets-charly"/>
                                    <div
                                        className="card-content d-flex flex-column justify-content-center align-items-center">
                                        <h4>Charly</h4>
                                        <button className="button button-secondary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">Learn more
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div className="col col-lg-3 mb-3">
                                <div className="card d-flex flex-column">
                                    <img src={scarlet} alt="pets-scarlett"/>
                                    <div
                                        className="card-content d-flex flex-column justify-content-center align-items-center">
                                        <h4>Scarlett</h4>
                                        <button className="button button-secondary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">Learn more
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div className="col col-lg-3 mb-3">
                                <div className="card d-flex flex-column">
                                    <img src={katrine2} alt="pets-freddie"/>
                                    <div
                                        className="card-content d-flex flex-column justify-content-center align-items-center">
                                        <h4>Freddie</h4>
                                        <button className="button button-secondary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">Learn more
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="d-flex justify-content-center">
                            <div className="row justify-content-center">
                                <div className="col-auto">
                                    <button className="button button-circle button-paginator button-secondary" disabled>

                                    </button>
                                </div>
                                <div className="col-auto">
                                    <button className="button button-circle button-paginator button-secondary" disabled>

                                    </button>
                                </div>
                                <div className="col-auto">
                                    <button
                                        className="button button-circle button-paginator button-secondary active">1
                                    </button>
                                </div>
                                <div className="col-auto">
                                    <button className="button button-circle button-paginator button-secondary">2
                                    </button>
                                </div>
                                <div className="col-auto">
                                    <button className="button button-circle button-paginator button-secondary">3
                                    </button>
                                </div>
                                <div className="col-auto">
                                    <button className="button button-circle button-paginator button-secondary">>
                                    </button>
                                </div>
                                <div className="col-auto">
                                    <button className="button button-circle button-paginator button-secondary">>>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <Footer/>
        </div>

    )
}
