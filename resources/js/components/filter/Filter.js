import {useState, useEffect, useRef} from "react";
import {useDispatch} from "react-redux";
import {getAnimals} from '../store/getAnimalsList/actions'
import '../filter/filter.css'

export const Filter = ({sort, page, breeds, types, inoc, diseases}) => {
    const [value, setValue] = useState('')
    const [age, setAge] = useState('')
    const [parasites, setParasites] = useState('')
    const [typeData, setTypeData] = useState('')
    const [breedData, setBreedsData] = useState('')
    const [inoData, setInocData] = useState('')
    const [diseaseData, setDiseasesData] = useState('')
    const selectInputRef = useRef();

    const dispatch = useDispatch()
    const [show, setShow] = useState(false)

    const showHandl = (e) => {
        setShow(() => !show)
    }

    const searchChange = ({target: {value}}) => {
        setValue(value)
    }

    useEffect(() => {
        dispatch(getAnimals(sort, page, breedData, typeData, inoData, diseaseData, age, parasites, value))
    }, [sort, page, breedData, typeData, inoData, diseaseData, age, parasites, value])


    const typeChange = ({target: {value}}) => {
        setTypeData(value)
    }

    const inocChange = ({target: {value}}) => {
        setInocData(value ? [value] : '')
    }
    const diseaseChange = ({target: {value}}) => {
        setDiseasesData(value ? [value] : '')
    }
    const breedChange = ({target: {value}}) => {
        setBreedsData(value)
    }
    const ageChange = ({target: {value}}) => {
        setAge(value)
    }
    const parasitesChange = ({target: {value}}) => {
        setParasites(value)
    }

    const clearHandler = () => {
        setDiseasesData('')
        setInocData('')
        setBreedsData('')
        selectInputRef.current
        setTypeData('')
        setParasites('')
        setAge('')
        dispatch(getAnimals(sort, page, breedData, typeData, inoData, diseaseData, age, parasites, value))

        let selects = document.querySelectorAll('select').forEach((select, index) => {
            select.options[0].selected = true
        })
    }


    return (
        <div>
            <div className='container'>
                <div className='search'>
                    <input value={value} onChange={searchChange} placeholder='Search by name' type="text"/>
                </div>
                <div style={{marginBottom: '20px'}}>
                    <button className='button button-secondary btnFilter' onClick={showHandl}>
                        FILTERS
                    </button>
                    <div className={show ? 'show' : 'noShow'} style={{justifyContent: 'space-around'}}>
                        <div style={{display:'flex', justifyContent:'space-around'}}>
                        <div className='select'>
                            <h5>BREEDS</h5>
                            <select ref={selectInputRef} onChange={breedChange}>
                                <option value='' key='empty'>Choise breed</option>
                                {breeds.map(({id, name}) => (
                                    <option value={name} key={id}>{name}</option>
                                ))}
                            </select>
                        </div>
                        <div className='select'>
                            <h5>TYPES</h5>
                            <select onChange={typeChange}>
                                <option value='' key='empty'>Choise type</option>
                                {types.map(({id, name}) => (
                                    <option value={name} key={id}>{name}</option>
                                ))}
                            </select>
                        </div>
                        <div className='select'>
                            <h5>DISEASES</h5>
                            <select onChange={diseaseChange}>
                                <option value='' key='empty'>Choise disease</option>
                                {diseases.map(({id, name}) => (
                                    <option value={id} key={id}>{name}</option>
                                ))}
                            </select>
                        </div>
                        <div className='select'>
                            <h5>INOCULATIONS</h5>
                            <select onChange={inocChange}>
                                <option value='' key='empty'>Choise inoculation</option>
                                {inoc.map(({id, name}) => (
                                    <option value={id} key={id}>{name}</option>
                                ))}
                            </select>
                        </div>
                        <div className='select'>
                            <h5>AGE</h5>
                            <select onChange={ageChange}>
                                <option value='' key='empty'>Choise age</option>
                                <option value='1'>1</option>
                                <option value='2'>2</option>
                                <option value='3'>3</option>
                                <option value='4'>4</option>
                            </select>
                        </div>
                        <div className='select'>
                            <h5>PARASITES</h5>
                            <select onChange={parasitesChange}>
                                <option value='' key='empty'>Choise parasites</option>
                                <option value='YES'>YES</option>
                                <option value='NO'>NO</option>
                            </select>
                        </div>
                        </div>
                        <div style={{marginTop:'20px'}}>
                            <button className='button button-secondary btnFilter' onClick={clearHandler}>CLEAR FILTERS</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}
