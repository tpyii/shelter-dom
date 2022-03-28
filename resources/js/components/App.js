import {Main} from './main_page/Main'
import {OurPets} from './our_pets/OurPets'
import {BrowserRouter, Link, Route, Routes} from "react-router-dom";
import '../../../templates/assets/css/style.css'

const App = () => {
    return (
        <div>
            <Routes>
                <Route path='/' element={<Main/>}/>
                <Route path='/our_pets' element={<OurPets/>}/>
            </Routes>

        </div>
    )
}

export default App
