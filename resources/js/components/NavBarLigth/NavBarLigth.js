import {BrowserRouter, Link, Route, Routes} from "react-router-dom";
import {getIdToScroll} from '../store/getAnimalsList/actions'
import {useLocation, useRef} from 'react-router-dom';
import {useSelector} from "react-redux";
import {useEffect, useState} from 'react'
import {selectLogined} from '../store/getAnimalsList/selectors'

import './NavBarLight.css'

export const NavBarLigth = () => {
    const location = useLocation();
    const userLogin = JSON.parse(localStorage.getItem('login'))

    const urlRunner = (href) => {
        window.location.href = href
    }

    const scrollToComponent = (e) => {
        const value = e.currentTarget.getAttribute('value')
        const element = document.getElementById(value)
        element.scrollIntoView();
    }

    const config = {
        headers: {
            Authorization: `Bearer ${localStorage.getItem('token')}`
        },
    }

    const logout = () => {
        localStorage.clear()
        axios.post('api/logout', {}, config)
    }

    return (
        <div>
            <header className="navbar background-darkl">
                <div className="container">
                    <Link to="/" className="navbar-logo col-auto">
                        <div className="logo-titlel cozy_light">Cozy House</div>
                        <div className="logo-subtitlel">Shelter for pets in Boston</div>
                    </Link>
                    <div className="navbar-content col-auto align-self-center d-flex flex-column">
                        <div className="navbar-content-container">
                            <ul className="nav flex-column flex-md-row align-content-center align-items-center">
                                <li className="nav-item"><Link onClick={() => urlRunner('/#about')}
                                                               className={location.hash.includes('/#about') ? 'active' : ''}
                                                               to='/#about'>About the shelter</Link>
                                </li>
                                <li className="nav-item"><Link
                                    className={location.hash === ('#our_pets') || location.hash === '' ? 'active' : ''}
                                    to="#our_pets">Our
                                    pets</Link></li>
                                <li className="nav-item"><Link onClick={() => urlRunner('/#help')}
                                                               className={location.hash.includes('#help') ? 'active' : ''}
                                                               to="">Help the shelter</Link></li>
                                <li className="nav-item">
                                    <Link onClick={scrollToComponent}
                                          className={location.hash.includes('#contacts') ? 'active' : ''}
                                          value='contacts' to="#contacts">Contacts</Link>
                                </li>
                                {userLogin === true ? (<>
                                        <li style={{marginLeft: '35px'}}><Link
                                            className={location.hash.includes('#registration') ? 'active' : ''}
                                            to='/profile'>Profile</Link></li>
                                        <li style={{marginLeft: '35px'}}><Link
                                            className={location.hash.includes('#login') ? 'active' : ''}
                                            to='/favourites'>Favourites</Link></li>
                                        <li onClick={logout} style={{marginLeft: '35px'}}><Link
                                            className={location.hash.includes('#login') ? 'active' : ''}
                                            to=''>Logout</Link></li>
                                    </>) :
                                    (<>
                                            <li style={{marginLeft: '35px'}}><Link
                                                onClick={() => urlRunner('/registration')}
                                                className='link__our'
                                                to=''>Register</Link></li>
                                            <li style={{marginLeft: '35px'}}><Link onClick={() => urlRunner('/frontLogin')}
                                                                                   className='link__our'
                                                                                   to=''>Login</Link></li>
                                        </>
                                    )
                                }
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
        </div>
    )
}
