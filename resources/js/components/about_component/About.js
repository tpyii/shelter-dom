import about from './assets/about-pets.png'
import './about.css'

export const About = () => {
    return (
        <div className='about__wrapper'>
            <div className='about__img__block'><img src={about} alt="about_pets"/></div>
            <div className='about__content'>
                <div className='about__title__block'><h3 className='about__title'>About the shelter “Cozy House”</h3></div>
                <div className='about__parag__block top_parag'>
                    <p className='about__parag '>Currently we have 121 dogs and 342 cats on our hands and statistics show that only 20% of them
                        will find a family. The others will continue to live with us and will be waiting for a lucky
                        chance
                        to become dearly loved.
                    </p>
                </div>
                <div className='about__parag__block'>
                    <p className='about__parag'>We feed our wards with the best food and make sure that they do not get sick, feel comfortable
                        (including psychologically) and well. We are supported by 87 volunteers and 28 employees of
                        various
                        skill levels. About 12% of the animals are taken by the shelter staff. Taking care of the
                        animals,
                        they become attached to the pets and would hardly ever leave them alone.
                    </p>
                </div>
            </div>
        </div>
    )
}
