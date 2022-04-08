import {axios} from 'axios'
import {NavBar} from '../NavBar/NavBar'
import {Footer} from '../footer_component/Footer'
import {useState, useEffect} from 'react'
import {Animals} from '../animals/Animals'
import {NavBarLigth} from '../NavBarLigth/NavBarLigth'
import {Pagination} from '../Pagination/Pagination'
import {selectAnimalsList} from '../store/getAnimalsList/selectors'
import {useDispatch, useSelector} from "react-redux";
import {getAnimals} from '../store/getAnimalsList/actions'

export const OurPets = () => {
    const [loading, setLoading] = useState(false);
    const [currentPage, setCurrentPage] = useState(1);
    const [animalsPerPage] = useState(8);
    const [lastNumber, setLastNumber] = useState();
    const dispatch = useDispatch()
    const animals = useSelector(selectAnimalsList)

    useEffect(() => {
        window.scrollTo({
            top: 0,
            behavior: "instant"
        });
    }, [])

    useEffect(() => {
        dispatch(getAnimals())
    }, [])


//     Get current posts
    const indexOfLastAnimal = currentPage * animalsPerPage;
    const indexOfFirstAnimal = indexOfLastAnimal - animalsPerPage;
    const currentAnimal = animals.slice(indexOfFirstAnimal, indexOfLastAnimal);
//
//     // Change page
    const paginate = pageNumber => setCurrentPage(pageNumber);

    const getLastNumber = (value) => {
        setLastNumber({value})
    }

    const nextPage = () => currentPage !== lastNumber.value ? setCurrentPage(prev => prev + 1) : currentPage
    const prevPage = () => currentPage !== 1 ? setCurrentPage(prev => prev - 1) : currentPage
    const firstPage = () => setCurrentPage(1)
    const lastPage = () => setCurrentPage(lastNumber.value)

    return (
        <div>
            <NavBarLigth/>
            <div className="section section-light">
                <div className="container">
                    <h3 className="mb-5 text-center">Our friends who<br/>are looking for a house</h3>
                    <Animals animals={currentAnimal} loading={loading}/>
                    <Pagination
                        animalsPerPage={animalsPerPage}
                        totalAnimals={animals.length}
                        paginate={paginate}
                        nextPage={nextPage}
                        prevPage={prevPage}
                        firstPage={firstPage}
                        lastPage={lastPage}
                        lastNum={getLastNumber}
                    />
                </div>
            </div>
            <Footer/>
        </div>

    )
}
