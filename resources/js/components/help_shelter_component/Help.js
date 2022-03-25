import './help.css'
import vector from './assets/images/Vector.png'
import medicines from './assets/images/medicines.png'
import shampoos from './assets/images/shampoos.png'
import sleeping from './assets/images/sleeping-area.png'
import toys from './assets/images/toys.png'
import transform from './assets/images/transportation.png'
import vitamins from './assets/images/vitamins.png'
import bowls from './assets/images/bowls-and-cups.png'
import collars from './assets/images/collars-or-leashes.png'

export const Help = () => {
    return (
        <div className='help__wrapper'>
            <div className='help__title_block'>
                <h3 className='help__title'>How you can help our shelter</h3>
            </div>
            <div className='help__line'>
                <div className='help__block'><img className='help__img food' src={vector} alt='Picture'/><h4 className='help__parag'>Pet food</h4></div>
                <div className='help__block'><img className='help__img' src={transform} alt='Picture'/><h4 className='help__parag'>Transportation</h4></div>
                <div className='help__block'><img className='help__img' src={toys} alt='Picture'/><h4 className='help__parag'>Toys</h4></div>
                <div className='help__block'><img className='help__img' src={bowls} alt='Picture'/><h4 className='help__parag'>Bowls and cups</h4></div>
                <div className='help__block'><img className='help__img shampo' src={shampoos} alt='Picture'/><p h4 className='help__parag'>Shampoos</p></div>
            </div>
            <div className='help__line'>
                <div className='help__block'><img className='help__img' src={vitamins} alt='Picture'/><h4 className='help__parag'>Vitamins</h4></div>
                <div className='help__block'><img className='help__img' src={medicines} alt='Picture'/><h4 className='help__parag'>Medicines</h4></div>
                <div className='help__block'><img className='help__img' src={collars} alt='Picture'/><h4 className='help__parag'>Collars / leashes</h4></div>
                <div className='help__block'><img className='help__img' src={sleeping} alt='Picture'/><h4 className='help__parag'>Sleeping areas</h4></div>
            </div>
        </div>
    )
}
