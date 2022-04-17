import {Main} from './main_page/Main'
import {OurPets} from './our_pets/OurPets'
import {BrowserRouter, Link, Route, Routes} from "react-router-dom";
import {Provider} from "react-redux";
import {store} from '../components/store'
import '../../../templates/assets/css/style.css'
import ScrollUpButton from "react-scroll-up-button";

const App = () => {

    return (
        <div>
            <Provider store={store}>
                <ScrollUpButton StopPosition={0} ShowAtPosition={150} AnimationDuration={500}/>
                <Routes>
                    <Route path='/' element={<Main/>}/>
                    <Route path='/our_pets' element={<OurPets/>}/>
                </Routes>
            </Provider>
        </div>
    )
}

export default App
