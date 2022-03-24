import {Header} from './header_component/Header'
import {Footer} from './footer_component/Footer'
import {About} from './about_component/About'
import {Our_friends} from './our_friends/Our_friends'
import {Help} from './help_shelter_component/Help'
import {Donation} from './donation_component/Donation'

const App = () => {
    return (
        <div>
            <Header/>
            <About/>
            <Our_friends/>
            <Help/>
            <Donation/>
            <Footer/>
        </div>
    )
}

export default App
