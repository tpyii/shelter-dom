import {useEffect} from 'react'

export const Pagination = ({
                               animalsPerPage,
                               totalAnimals,
                               paginate,
                               nextPage,
                               firstPage,
                               prevPage,
                               lastPage,
                               lastNum,
                               currentPage
                           }) => {
    const pageNumbers = [];
    const leftArr = '<<';
    const rightArr = '>>';
    const arl = '<'
    const arr = '>'

    for (let i = 1; i <= Math.ceil(totalAnimals / animalsPerPage); i++) {
        pageNumbers.push(i);
    }
    useEffect(() => {
        lastNum(pageNumbers.length)
    }, [pageNumbers.length,totalAnimals])

    const lastPageNumb = pageNumbers.length

    return (
        <div className="d-flex justify-content-center">
            <div className="row justify-content-center">
                <div className="col-auto d-flex mr-3">
                    <button disabled={currentPage===1} onClick={firstPage} style={{marginRight: '10px'}}
                            className="button button-circle button-paginator button-secondary"> {leftArr} </button>

                    <button disabled={currentPage===1} onClick={prevPage} style={{marginRight: '10px'}}
                            className="button button-circle button-paginator button-secondary"> {arl} </button>

                    {pageNumbers.map((number, index) => (
                        <button onClick={() => paginate(number)} key={index} style={{marginRight: '10px'}}
                                className={currentPage === number? 'active button button-circle button-paginator button-secondary': 'button button-circle button-paginator button-secondary'}>
                            {number}
                        </button>
                    ))}
                    <button disabled={currentPage===lastPageNumb} onClick={nextPage} style={{marginRight: '10px'}}
                            className="button button-circle button-paginator button-secondary"> {arr} </button>

                    <button disabled={currentPage===lastPageNumb} onClick={lastPage} style={{marginRight: '10px'}}
                            className="button button-circle button-paginator button-secondary"> {rightArr} </button>
                </div>
            </div>
        </div>
    );
};
