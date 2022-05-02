import {axios} from 'axios'
import {NavBar} from '../NavBar/NavBar'
import {Footer} from '../footer_component/Footer'
import {useState, useEffect, useMemo} from 'react'
import {Animals} from '../animals/Animals'
import {NavBarLigth} from '../NavBarLigth/NavBarLigth'
import {Pagination} from '../Pagination/Pagination'
import {selectAnimalsList, selectPerPage, selectTotal, selectBreeds,selectTypes, selectDiseases, selectInoc} from '../store/getAnimalsList/selectors'
import {useDispatch, useSelector} from "react-redux";
import {getAnimals,getBreeds, getTypes, getInoculations, getDiseases} from '../store/getAnimalsList/actions'
import {Filter} from '../filter/Filter'

export const OurPets = () => {
    const [loading, setLoading] = useState(false);
    const [currentPage, setCurrentPage] = useState(1);
    const [lastNumber, setLastNumber] = useState();
    const [sortBy, setSortBy] = useState('ask');
    const dispatch = useDispatch()
    const animals = useSelector(selectAnimalsList)
    const total = useSelector(selectTotal)
    const animalsPerPage = useSelector(selectPerPage)
    const breedsList = useSelector(selectBreeds)
    const typesList = useSelector(selectTypes)
    const diseasesList = useSelector(selectDiseases)
    const inocList = useSelector(selectInoc)

    useEffect(() => {
        window.scrollTo({
            top: 0,
            behavior: "instant"
        });
        dispatch(getBreeds())
        dispatch(getTypes())
        dispatch(getInoculations())
        dispatch(getDiseases())
    }, [])

    useMemo(() => {
        dispatch(getAnimals(currentPage, sortBy, breedsList,typesList,diseasesList,inocList))
    }, [currentPage])




//     Get current posts
    const indexOfLastAnimal = currentPage * animalsPerPage;
    const indexOfFirstAnimal = indexOfLastAnimal - animalsPerPage;

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
                    <div className='pets'>
                        <h3 className="mb-5 text-center">Our friends who<br/>are looking for a house</h3>
                        <Filter sort={sortBy} page={currentPage} breeds={breedsList} types={typesList} inoc={inocList} diseases={diseasesList}/>
                        <Animals animals={animals} loading={loading}/>
                        <Pagination
                            animalsPerPage={animalsPerPage}
                            totalAnimals={total}
                            paginate={paginate}
                            nextPage={nextPage}
                            prevPage={prevPage}
                            firstPage={firstPage}
                            lastPage={lastPage}
                            lastNum={getLastNumber}
                            currentPage={currentPage}
                        />
                    </div>
                </div>
            </div>
            <Footer/>
        </div>

    )
}
