import {BrowserRouter, Link, Route, Routes} from "react-router-dom";
import {useEffect} from 'react'


export const NavBar = () => {

        const scrollToComponent = (e) => {
            const value = e.currentTarget.getAttribute('value')
            const element = document.getElementById(value)
            element.scrollIntoView();
        }

    return (
        <div>
            <header className="navbar background-dark">
                <div className="container">
                    <div className="navbar-logo col-auto">
                        <Link to="/" className="logo-title">Cozy House</Link>
                        <div className="logo-subtitle">Shelter for pets in Boston</div>
                    </div>
                    <div className="navbar-content col-auto align-self-center d-flex flex-column">
                        <div className="navbar-content-container">
                            <ul className="nav flex-column flex-md-row align-content-center align-items-center">
                                <li className="nav-item "><Link className='link__our' value='about' to='#about'
                                                                onClick={scrollToComponent}>About the shelter</Link>
                                </li>
                                <li className="nav-item"><Link className='link__our' to="/our_pets" className="active">Our
                                    pets</Link></li>
                                <li className="nav-item"><Link value='help' className='link__our' to="#help"
                                                               onClick={scrollToComponent}>Help the shelter</Link></li>
                                <li className="nav-item"><Link onClick={scrollToComponent} value='contacts'
                                                               className='link__our' to="#contacts">Contacts</Link></li>
                            </ul>
                        </div>
                    </div>
                    <div className="col-auto d-flex flex-column justify-content-between navbar-burger">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </header>
        </div>
    )
}
