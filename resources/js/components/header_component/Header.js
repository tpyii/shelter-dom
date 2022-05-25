import puppy from './assets/images/start-screen-puppy.png'
import {BrowserRouter, Link, Route, Routes} from "react-router-dom";
import {OurPets} from '../our_pets/OurPets'
import {About} from '../about_component/About'
import {Footer} from '../footer_component/Footer'
import {Main} from '../main_page/Main'
import {Help} from '../help_shelter_component/Help'


export const Header = () => {
    return (
        <div>
            <div className="welcome d-flex">
                <div className="container d-flex">
                    <div className="row">
                        <div
                            className="col col-md-5 col-auto align-items-start d-flex flex-column justify-content-center mb-5 mb-md-0">
                            <h2>Not only people need a house</h2>
                            <p>We offer to give a chance to a little and nice puppy with an extremely wide and open
                                heart. He or she will love you more than anybody else in the world, you will
                                see!</p>
                            <Link to="/our_pets" className="button button-primary">Make a friend</Link>
                        </div>
                        <div className="align-items-end col col-auto col-md-7 d-flex">
                            <img className="welcome__img" src={puppy}
                                 alt="start-screen-puppy"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}
