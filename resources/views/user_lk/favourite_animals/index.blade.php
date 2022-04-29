<x-layout>
    <x-slot name="title">
        Мои любимчики
    </x-slot>

    <x-success />

    <div class='row mb-5 d-flex'>
        @foreach($animals as $animal)
            <div id="card-{{ $animal->id }}" class="card" style="width: 18rem; margin-left: 20px; margin-top: 20px; height:100%">
                <div id="carouselExampleControls-{{ $animal->id }}" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ Storage::url($animal->images[0]->path) }}" alt="#">
                        </div>
                        @for($i = 1; $i < count($animal->images); $i++)
                            <div class="carousel-item">
                                <img src="{{ Storage::url($animal->images[$i]->path) }}" alt="#">
                            </div>
                        @endfor
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls-{{ $animal->id }}" 
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls-{{ $animal->id }}"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $animal->name }}</h5>
                    <p style="margin: 0"><strong>{{ $animal->type->name }}</strong></p>
                    <p style="margin: 0"><strong>Порода: </strong>{{ $animal->breed->name }}</p>
                    <p style="margin: 0"><strong>День рождения: </strong>{{ $animal->birthday_at }}</p>
                    <p style="margin: 0"><strong>Наличие паразитов: </strong>{{ $animal->treatment_of_parasites }}</p>
                    <div class="accordion accordion-flush" id="accordionFlushExample-{{ $animal->id }}" >
                        <div class="accordion-item" >
                            <h2 class="accordion-header" id="flush-headingOne-{{ $animal->id }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" style="background-color:white; padding:5px 5px"
                                    data-bs-target="#flush-collapseOne-{{ $animal->id }}" aria-expanded="false"
                                    aria-controls="flush-collapseOne-{{ $animal->id }}">
                                    Болезни
                                </button>
                            </h2>
                            <div id="flush-collapseOne-{{ $animal->id }}" class="accordion-collapse collapse" 
                                aria-labelledby="flush-headingOne-{{ $animal->id }}" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body" style="background-color:white; padding:5px 5px">
                                    @foreach($animal->disease AS $disease)
                                        <p>{{ $disease->name }}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo-{{ $animal->id }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" style="background-color:white; padding:5px 5px"
                                    data-bs-target="#flush-collapseTwo-{{ $animal->id }}" aria-expanded="false"
                                    aria-controls="flush-collapseTwo-{{ $animal->id }}">
                                    Прививки
                                </button>
                            </h2>
                            <div id="flush-collapseTwo-{{ $animal->id }}" class="accordion-collapse collapse" 
                                aria-labelledby="flush-headingTwo-{{ $animal->id }}" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body" style="background-color:white; padding:5px 5px">
                                    @foreach($animal->inoculation AS $inoculation)
                                        <p>{{ $inoculation->name }}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree-{{ $animal->id }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" style="background-color:white; padding:5px 5px"
                                    data-bs-target="#flush-collapseThree-{{ $animal->id }}" aria-expanded="false"
                                    aria-controls="flush-collapseThree-{{ $animal->id }}">
                                    Описание
                                </button>
                            </h2>
                            <div id="flush-collapseThree-{{ $animal->id }}" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingThree-{{ $animal->id }}" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body" style="background-color:white; padding:5px 5px">
                                    <p>{{ $animal->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <x-button color="outline-danger" class="showDeleteModal" style="width: 100%; margin-top:10px"
                        data-action="{{ route('user.favourite_animals.destroy', $animal) }}"
                        data-remove="#card-{{ $animal->id }}">
                        <div>Удалить из избранного</div>
                    </x-button>
                </div>
            </div>
        @endforeach
    </div>
    <x-modal id="delete" title="Подтвердить удаление">
        <b>Подтвердить удаление записи</b>
        <x-slot name="footer">
            <x-button color="secondary" data-bs-dismiss="modal">Закрыть</x-button>
            <x-button color="primary" class="delete" data-bs-dismiss="modal">Удалить</x-button>
        </x-slot>
    </x-modal>
</x-layout>
