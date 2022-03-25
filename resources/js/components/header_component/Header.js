import './header.css'
import puppy from './assets/images/start-screen-puppy.png'


export const Header = () => {
    return (
        <div className='header__wrapper'>
            <header className="navbar">
                <div className="container">
                    <div className="navbar-logo col-auto">
                        <a href="/" className="logo-title">Cozy House</a>
                        <div className="logo-subtitle">Shelter for pets in Boston</div>
                    </div>
                    <div className="navbar-content col-auto align-self-center d-flex flex-column">
                        <div className="navbar-content-container">
                            <ul className="nav flex-column flex-md-row align-content-center align-items-center">
                                <li className="nav-item"><a href="#">About the shelter</a></li>
                                <li className="nav-item"><a href="#" className="active">Our pets</a></li>
                                <li className="nav-item"><a href="#">Help the shelter</a></li>
                                <li className="nav-item"><a href="#">Contacts</a></li>
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
            <div className='header__block'>
                <div>
                    <div className='header__title__block'><h3 className='header__title'>Not only people need a house</h3></div>
                    <div className='header__parag__block'><p className='header__parag'>We offer to give a chance to a little and nice puppy with an extremely wide and open heart. He or she will love you more than anybody else in the world, you will see!</p></div>
                    <div><button className='header__btn'>Make a friend</button></div>
                </div>
                <div className='header__img__block'><img src={puppy} alt="puppy"/></div>
            </div>
        </div>
    )
}
