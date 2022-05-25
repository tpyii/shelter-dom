import {Main} from './main_page/Main'
import {OurPets} from './our_pets/OurPets'
import {Register} from './register/Register'
import {Login} from './login/Login'
import {Favourites} from './favourites/Favourites'
import {Profile} from './profile/Profile'
import {BrowserRouter, Link, Route, Routes} from "react-router-dom";
import {Provider} from "react-redux";
import {store} from '../components/store'
import '../../../templates/assets/css/style.css'
import ScrollUpButton from "react-scroll-up-button";
import {Sidebar} from '../components/sidebar/Sidebar'

const App = () => {

    const topScroll = () => {
        window.scrollTo({
            top: 0,
            behavior: "instant"
        });
    }

    return (
        <div>
            <Provider store={store}>
                <Sidebar/>
                <p style={{position:'absolute'}} onClick={topScroll}><ScrollUpButton/></p>
                <Routes>
                    <Route path='/' element={<Main/>}/>
                    <Route path='/our_pets' element={<OurPets/>}/>
                    <Route path='/registration' element={<Register/>}/>
                    <Route path='/frontLogin' element={<Login/>}/>
                    <Route path='/favourites' element={<Favourites/>}/>
                    <Route path='/profile' element={<Profile/>}/>
                </Routes>
            </Provider>
        </div>
    )
}

export default App
