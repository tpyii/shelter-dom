import {Header} from '../header_component/Header'
import {About} from '../about_component/About'
import {Our_friends} from '../our_friends/Our_friends'
import {Help} from '../help_shelter_component/Help'
import {Donation} from '../donation_component/Donation'
import {Footer} from '../footer_component/Footer'
import {NavBar} from '../NavBar/NavBar'

export const Main = () => {
    return (
        <>
            <NavBar/>
            <Header/>
            <About/>
            <Our_friends/>
            <Help/>
            <Donation/>
            <Footer/>
        </>
    )
}
