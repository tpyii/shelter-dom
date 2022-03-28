import puppy from './assets/images/footer-puppy.png'
import mail from './assets/images/mail.png'
import phone from './assets/images/phone.png'
import pin from './assets/images/pin.png'

export const Footer = () => {
    return (
        <footer id='contacts' className="footer">
            <div className="container">
                <div className="row text-center text-sm-start">
                    <div className="col-12 col-sm-6 col-md-4 d-flex flex-column justify-content-between mb-5 mb-sm-0">
                        <h3>For questions and suggestions</h3>
                        <h4>email@shelter.com</h4>
                        <h4>+13 674 567 75 54</h4>
                    </div>
                    <div className="col-12 col-sm-6 col-md-4 d-flex flex-column justify-content-between">
                        <h3>We are waiting for your visit</h3>
                        <h4>1 Central Street, Boston (entrance from the store)</h4>
                        <h4>18 South Park, London </h4>
                    </div>
                    <div className="align-self-end col-12 col-md-4 position-relative text-center">
                        <img src={puppy} alt="footer-puppy"/>
                    </div>
                </div>
            </div>
        </footer>
    )
}
