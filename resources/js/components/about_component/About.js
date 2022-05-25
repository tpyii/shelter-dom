import about from './assets/about-pets.png'

export const About = () => {
    return (
        <div id={'about'}>
            <div className="section">
                <div className="container">
                    <div className="about">
                        <div className="flex-column flex-md-row row">
                            <div
                                className="align-self-end col order-1 order-md-0 text-center text-md-start mt-5 mt-md-0">
                                <img src={about} alt="about-pets"/>
                            </div>
                            <div className="col mb-5 mb-md-0">
                                <h3 className="mb-5 text-center text-md-start">About the shelter<br/>“Cozy House”</h3>
                                <p>Currently we have 121 dogs and 342 cats on our hands and statistics show that only
                                    20% of them will find a family. The others will continue to live with us and will be
                                    waiting for a lucky chance to become dearly loved.</p>
                                <p>We feed our wards with the best food and make sure that they do not get sick, feel
                                    comfortable (including psychologically) and well. We are supported by 87 volunteers
                                    and 28 employees of various skill levels. About 12% of the animals are taken by the
                                    shelter staff. Taking care of the animals, they become attached to the pets and
                                    would hardly ever leave them alone.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}
