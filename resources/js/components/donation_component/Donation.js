import './donation.css'
import dog from './assets/images/donation-dog.png'
import card from './assets/images/credit-card.svg'

export const Donation = () => {
    return (
        <div className='donation__wrapper'>
            <div className='donation__content'>
                <div className='donation__dog'><img src={dog} alt="dog"/></div>
                <div>
                    <div className='donation__title__block'><h3 className='donation__title'>You can also make a donation</h3></div>
                    <div className='donation__parag__block'><p className='donation__parag'>Name of the bank / Type of bank account</p></div>
                    <div className='donation__card__block'><img className='donation__card__pic' src={card} alt="card"/><p className='donation__card__text'>8380 2880 8028 8791 7435</p></div>
                    <div className='donation__description__block'><p className='donation__description__text'>Legal information and lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a
                        ipsum at libero sagittis dignissim sed ac diam. Praesent ultrices maximus tortor et vulputate.
                        Interdum et malesuada fames ac ante ipsum primis in faucibus.</p></div>
                </div>
            </div>

        </div>
    )
}
