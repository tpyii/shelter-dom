import './footer.css'
import puppy from './assets/images/footer-puppy.png'
import mail from './assets/images/mail.png'
import phone from './assets/images/phone.png'
import pin from './assets/images/pin.png'

export const Footer = () => {
    return (
        <div className='footer__wrapper'>
            <div>
                <div className='footer__title__block left'><h3 className='footer__title'>For questions and suggestions</h3></div>
                <div className='footer__contacts top__left'><img className='footer__contacts__img' src={mail} alt="mail"/><p className='footer__parag'>email@shelter.com</p></div>
                <div className='footer__contacts bottom__left'><img className='footer__contacts__img' src={phone} alt="phone"/><p className='footer__parag'>+13 674 567 75 54</p></div>
            </div>
            <div>
                <div className='footer__title__block right'><h3 className='footer__title'>We are waiting for your visit</h3></div>
                <div className='footer__contacts top__right'><img className='footer__contacts__img pin' src={pin} alt="mail"/><p className='footer__parag pic__parag'>1 Central Street, Boston (entrance from the store)</p></div>
                <div className='footer__contacts bottom__right'><img className='footer__contacts__img pin' src={pin} alt="phone"/><p className='footer__parag pic__parag'>18 South Park, London </p></div>
            </div>
            <div className='puppy__block'><img src={puppy} alt="puppy"/></div>
        </div>
    )
}
