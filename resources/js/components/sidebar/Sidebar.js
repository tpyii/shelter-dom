import {slide as Menu} from 'react-burger-menu';
import {useEffect} from 'react'
import './sidebar.css'

export const Sidebar = () => {
/*поработать со сменой цвета бургера*/
    // useEffect(() => {
    //     setTimeout(() => {
    //         const burgerBars = Array.from(document.querySelectorAll('.bm-burger-bars'))
    //         burgerBars.forEach(spanEl => {
    //                 location.pathname.includes('/our_pets') ?spanEl.classList.toggle('bm-burger-bars darkClass') : spanEl.classList.remove('darkClass bm-burger-bars')
    //             }
    //         )
    //     }, 0)
    // }, [location.hash])

    return (
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

            <a className="menu-item" href="/user">
                Registration
            </a>
        </Menu>
    );
};
