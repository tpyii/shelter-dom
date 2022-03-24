import './App.css';
import {Header} from "./components/header_component/Header";
import {About} from "./components/about_component/About";
import {Help} from "./components/help_shelter_component/Help";
import {Footer} from "./components/footer_component/Footer";
import {Donation} from "./components/donation_component/Donation";
import {Our_friends} from "./components/our_friends/Our_friends";
import './components/header_component/header.css'

function App() {
    return (
        <div className="App">
            <Header/>
            <About/>
            <Our_friends/>
            <Help/>
            <Donation/>
            <Footer/>
        </div>
    );
}

export default App;
