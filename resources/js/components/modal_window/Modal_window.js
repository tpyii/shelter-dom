import katrine from '../../../../templates/assets/images/pets-katrine.png'

export const Modal_window = () => {
    return (
        <div className="modal fade" id="exampleModal" tabIndex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div className="modal-dialog">
                <div className="modal-content">
                    <div className="modal-header">
                        <button className="button button-circle button-secondary" data-bs-dismiss="modal">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M7.42618 6.00003L11.7046 1.72158C12.0985 1.32775 12.0985 0.689213 11.7046 0.295433C11.3108 -0.0984027 10.6723 -0.0984027 10.2785 0.295433L5.99998 4.57394L1.72148 0.295377C1.32765 -0.098459 0.68917 -0.098459 0.295334 0.295377C-0.0984448 0.689213 -0.0984448 1.32775 0.295334 1.72153L4.57383 5.99997L0.295334 10.2785C-0.0984448 10.6723 -0.0984448 11.3108 0.295334 11.7046C0.68917 12.0985 1.32765 12.0985 1.72148 11.7046L5.99998 7.42612L10.2785 11.7046C10.6723 12.0985 11.3108 12.0985 11.7046 11.7046C12.0985 11.3108 12.0985 10.6723 11.7046 10.2785L7.42618 6.00003Z"
                                      fill="#292929"/>
                            </svg>
                        </button>
                    </div>
                    <div className="modal-body">
                        <div className="row m-0 h-100 flex-column flex-sm-row">
                            <div className="col h-100">
                                <img src={katrine} alt="pets-katrine" className="modal-image"/>
                            </div>
                            <div className="col h-100 modal-text">
                                <div className="py-5 px-3">
                                    <h3 className="mb-2">Jennifer</h3>
                                    <h4 className="mb-5">Dog - Labrador</h4>
                                    <div className="mb-5">
                                        <h5>Jennifer is a sweet 2 months old Labrador that is patiently waiting to find
                                            a new forever home. This girl really enjoys being able to go outside to run
                                            and play, but won't hesitate to play up a storm in the house if she has all
                                            of her favorite toys.</h5>
                                        <h5>Jennifer is a sweet 2 months old Labrador that is patiently waiting to find
                                            a new forever home. This girl really enjoys being able to go outside to run
                                            and play, but won't hesitate to play up a storm in the house if she has all
                                            of her favorite toys.</h5>
                                        <h5>Jennifer is a sweet 2 months old Labrador that is patiently waiting to find
                                            a new forever home. This girl really enjoys being able to go outside to run
                                            and play, but won't hesitate to play up a storm in the house if she has all
                                            of her favorite toys.</h5>
                                    </div>
                                    <ul className="list">
                                        <li className="list-item"><strong>Age:</strong> 2 months</li>
                                        <li className="list-item"><strong>Inoculations:</strong> none</li>
                                        <li className="list-item"><strong>Diseases: </strong> none</li>
                                        <li className="list-item"><strong>Parasites: </strong> none</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
)
}
