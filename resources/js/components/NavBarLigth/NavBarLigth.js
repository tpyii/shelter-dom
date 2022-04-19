import {BrowserRouter, Link, Route, Routes} from "react-router-dom";
import {useDispatch} from "react-redux"
import {getIdToScroll} from '../store/getAnimalsList/actions'
import './NavBarLight.css'

export const NavBarLigth = () => {
    const dispatch = useDispatch();

    const getId = (id) => {
        dispatch(getIdToScroll(id))
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
                                <li className="nav-item"><Link onClick={()=>window.location.href='/#about'} className='link__our' to="#">About the shelter</Link>
                                </li>
                                <li className="nav-item"><Link className='link__our' to="#">Our
                                    pets</Link></li>
                                <li className="nav-item"><Link onClick={()=>window.location.href='/#help'} className='link__our' to="#">Help the shelter</Link></li>
                                <li className="nav-item">
                                    <Link onClick={()=>window.location.href='/#contacts'} className='link__our' value='contacts' to="">Contacts</Link>
                                </li>
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
