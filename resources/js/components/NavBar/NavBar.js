import {BrowserRouter, Link, Route, Routes} from "react-router-dom";
import {useEffect, useState} from 'react'
import axios from 'axios'
import {useSelector} from "react-redux";
import {selectLogined} from '../store/getAnimalsList/selectors'
import {slide as Menu} from 'react-burger-menu'
import {useLocation, useRef} from 'react-router-dom';
import Sidebar from "react-sidebar";
import '../../../../templates/assets/css/style.css'


export const NavBar = () => {
    const location = useLocation();
    const config = {
        headers: {
            Authorization: `Bearer ${localStorage.getItem('token')}`
        },
    }

    const userLogin = JSON.parse(localStorage.getItem('login'))


    const scrollToComponent = (e) => {
        const value = e.currentTarget.getAttribute('value')
        const element = document.getElementById(value)
        element.scrollIntoView();
    }

    const logout = () => {
        localStorage.clear()
        axios.post('api/logout', {}, config)
    }

    return (
        <header className="navbar background-dark">
            <div className="container">
                <div className='navbar-logo col-auto'>
                    <Link to='/' className={location.hash.includes('') ? 'active' : !'active'}>
                        <div className="logo-title">Cozy House</div>
                        <div className="logo-subtitle">Shelter for pets in Boston</div>
                    </Link>
                </div>
                <div className="navbar-content col-auto align-self-center d-flex flex-column">
                    <div className="navbar-content-container">
                        <ul className="nav flex-column flex-md-row align-content-center align-items-center">
                            <li className="nav-item "><Link
                                className={location.hash.includes('#about') ? 'active' : ''} value='about'
                                to='/#about'
                                onClick={scrollToComponent}>About the shelter</Link>
                            </li>
                            <li className="nav-item"><Link
                                className={location.hash.includes('/our_pets') ? 'active' : ''} to="/our_pets">Our
                                pets</Link></li>
                            <li className="nav-item"><Link value='help'
                                                           className={location.hash.includes('#help') ? 'active' : ''}
                                                           to="/#help"
                                                           onClick={scrollToComponent}>Help the shelter</Link></li>
                            <li className="nav-item"><Link onClick={scrollToComponent} value='contacts'
                                                           className={location.hash.includes('#contacts') ? 'active' : ''}
                                                           to="/#contacts">Contacts</Link></li>
                            {userLogin === true ? (
                                <>
                                    <li style={{marginLeft: '35px'}}><Link
                                        className={location.hash.includes('/profile') ? 'active' : ''}
                                        to='/profile'>Profile</Link></li>
                                    <li style={{marginLeft: '35px'}}><Link
                                        className={location.hash.includes('/favourites') ? 'active' : ''}
                                        to='/favourites'>Favourites</Link></li>
                                    <li style={{marginLeft: '35px'}}><Link onClick={logout}
                                        className={location.hash.includes('#login') ? 'active' : ''}
                                        to='/frontLogin'>Logout</Link></li>
                                </>) : (
                                <>
                                    <li style={{marginLeft: '35px'}}><Link
                                        className={location.hash.includes('/registration') ? 'active' : ''}
                                        to='/registration'>Register</Link></li>
                                    <li style={{marginLeft: '35px'}}><Link
                                        className={location.hash.includes('/frontLogin') ? 'active' : ''}
                                        to='/frontLogin'>Login</Link></li>
                                </>
                            )
                            }
                        </ul>
                    </div>
                </div>
            </div>
        </header>
    )
}
