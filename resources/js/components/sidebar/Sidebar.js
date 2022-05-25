import {slide as Menu} from 'react-burger-menu';
import {useEffect} from 'react'
import './sidebar.css'

export const Sidebar = () => {
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
            {localStorage.getItem('token') ? (
                <Menu className='myMenu' style={{display: 'none'}} right>
                    <a className="menu-item" href="/">
                        Home
                    </a>

                    <a className={location.hash.includes('#about') ? 'active' : ''} value='about' href="/#about">
                        About the shelter
                    </a>

                    <a className="menu-item" href="/our_pets">
                        Our pets
                    </a>

                    <a className="menu-item" href="/#help">
                        Help the shelter
                    </a>

                    <a className="menu-item" href="#contacts">
                        Contacts
                    </a>

                    <a className="menu-item" href="/favourites">
                        Favourites
                    </a>
                    <a className="menu-item" href="/profile">
                        Profile
                    </a>
                    <a onClick={logout} className="menu-item" href="/frontLogin">
                        Logout
                    </a>

                </Menu>

            ) : (
                <Menu className='myMenu' style={{display: 'none'}} right>
                    <a className="menu-item" href="/">
                        Home
                    </a>

                    <a className={location.hash.includes('#about') ? 'active' : ''} value='about' href="/#about">
                        About the shelter
                    </a>

                    <a className="menu-item" href="/our_pets">
                        Our pets
                    </a>

                    <a className="menu-item" href="/#help">
                        Help the shelter
                    </a>

                    <a className="menu-item" href="#contacts">
                        Contacts
                    </a>

                    <a className="menu-item" href="/registration">
                        Registration
                    </a>
                    <a className="menu-item" href="/frontLogin">
                        Login
                    </a>
                </Menu>

            )}
        </div>
    );
};
