import {BrowserRouter, Link, Route, Routes} from "react-router-dom";
import './NavBarLight.css'

export const NavBarLigth = () => {
    return (
        <div>
            <header className="navbar background-darkl">
                <div className="container">
                    <div className="navbar-logo col-auto">
                        <Link to="/" className="logo-titlel cozy_light">Cozy House</Link>
                        <div className="logo-subtitlel">Shelter for pets in Boston</div>
                    </div>
                    <div className="navbar-content col-auto align-self-center d-flex flex-column">
                        <div className="navbar-content-container">
                            <ul className="nav flex-column flex-md-row align-content-center align-items-center">
                                <li className="nav-item"><Link className='link__our' to="#">About the shelter</Link>
                                </li>
                                <li className="nav-item"><Link className='link__our' to="#" className="active">Our
                                    pets</Link></li>
                                <li className="nav-item"><Link className='link__our' to="#">Help the shelter</Link></li>
                                <li className="nav-item"><Link className='link__our' to="#">Contacts</Link></li>
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
