import katrine from '../../../../templates/assets/images/pets-katrine.png'
import jennifer from '../../../../templates/assets/images/pets-jennifer.png'
import woody from '../../../../templates/assets/images/pets-woody.png'
import timmy from '../../../../templates/assets/images/pets-timmy.png'
import Carousel from 'react-elastic-carousel'
import Item from "./Item";

export const Our_friends = () => {
    const images = [katrine, jennifer, woody, timmy]
    const breakPoints = [
        {width: 1, itemsToShow: 1},
        {width: 550, itemsToShow: 2},
        {width: 768, itemsToShow: 3},
        {width: 1200, itemsToShow: 4},
    ];
    return (
        <div className='container' style={{background :'#F6F6F6'}}>
            <Carousel breakPoints={breakPoints}>
                <Item className='d-flex justify-content-around'>

                    <div className="swiper-slide">
                        <div className="card d-flex flex-column">
                            <img src={katrine} alt="pets-katrine"/>
                            <div
                                className="card-content d-flex flex-column justify-content-center align-items-center">
                                <h4>Katrine</h4>
                                <button className="button button-secondary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Learn more
                                </button>
                            </div>
                        </div>
                    </div>
                </Item>
                <Item>
                    <div className="swiper-slide">
                        <div className="card d-flex flex-column">
                            <img src={jennifer} alt="pets-katrine"/>
                            <div
                                className="card-content d-flex flex-column justify-content-center align-items-center">
                                <h4>Jennifer</h4>
                                <button className="button button-secondary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Learn more
                                </button>
                            </div>
                        </div>
                    </div>
                </Item>
                <Item>
                    <div className="swiper-slide">
                        <div className="card d-flex flex-column">
                            <img src={woody} alt="pets-katrine"/>
                            <div
                                className="card-content d-flex flex-column justify-content-center align-items-center">
                                <h4>Woody</h4>
                                <button className="button button-secondary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Learn more
                                </button>
                            </div>
                        </div>
                    </div>

                </Item>
                <Item className='d-flex justify-content-around'>
                    <div className="swiper-slide">
                        <div className="card d-flex flex-column">
                            <img src={timmy} alt="pets-katrine"/>
                            <div
                                className="card-content d-flex flex-column justify-content-center align-items-center">
                                <h4>Timmy</h4>
                                <button className="button button-secondary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Learn more
                                </button>
                            </div>
                        </div>
                    </div>
                </Item>
            </Carousel>
        </div>
    )
}
