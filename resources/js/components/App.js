import {Main} from './main_page/Main'
import {OurPets} from './our_pets/OurPets'
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
                </Routes>
            </Provider>
        </div>
    )
}

export default App
