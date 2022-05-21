<x-layout>
    <x-slot name="title">
        Обо мне
    </x-slot>
    <div class="container">
        <main>
            <div class="row g-4">
                <div class="col-md-7 col-lg-8">
                    <x-form class="needs-validation" method="POST"
                            action="{{ route('user.about_me.update', [$user, 'profile' => $userProfile]) }}"
                            enctype="multipart/form-data">
                        @method('PUT')
                        <div class="row g-3">
                            <img src="{{ Storage::url($userProfile->avatar) }}" class="rounded-circle"
                                 style="width: 200px; height:200px" alt="Avatar"/>
                            <div class="preview"></div>
                            <div class="col-9 g-3">
                                <div class="col-12">
                                    <label for="firstName" class="form-label">Имя</label>
                                    <input name="firstName" type="text" class="form-control" id="firstName"
                                           value="{{ $userProfile->name }}">
                                </div>
                                <div class="col-12" style="margin-top: 10px;">
                                    <label for="lastName" class="form-label">Фамилия</label>
                                    <input name="lastName" type="text" class="form-control" id="lastName"
                                           value="{{ $userProfile->surname }}">
                                </div>
                            </div>
                            <x-input id="files" type="file" name="files" label="Изменить фото профиля"
                                     accept=".jpg, .jpeg, .png" style="width: 250px" onchange="handleFiles(this.files)"/>
                            <div class="col-12">
                                <label for="nickname" class="form-label">Никнейм</label>
                                <div class="input-group has-validation">
                                    <input name="nickname" type="text" class="form-control" id="nickname"
                                           value="{{ $user->name }}">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label for="birthday_at" class="form-label">Дата рождения</label>
                                <div class="input-group has-validation">
                                    <input name="birthday_at" type="date" class="form-control" id="birthday_a"
                                           value="{{ $userProfile->birthday_at }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <input name="email" type="email" class="form-control" id="email"
                                       value="{{ $user->email }}">
                            </div>
                            <div class="col-12">
                                <label for="phone" class="form-label">Номер телефона</label>
                                <input name="phone" type="phone" class="form-control" id="phone"
                                       value="{{ $userProfile->phone }}">
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label">Адрес проживания</label>
                                <input name="address" type="text" class="form-control" id="address"
                                       value="{{ $userProfile->address }}">
                            </div>
                        </div>

                        <hr class="my-4">
                        <h4 class="mb-3">Расскажите о вас в нескольких предложениях</h4>
                        <div class="form-floating">
                            <textarea name="description" class="form-control" placeholder="Leave a comment here"
                                      id="description" style="height: 200px">{{ $userProfile->description }}</textarea>
                            <label for="description">мы будем рады узнать о том, как вы любите животных :)</label>
                        </div>
                        <hr class="my-4">
                        <button class="w-100 btn btn-primary btn-lg" type="submit">Сохранить</button>
                    </x-form>
                </div>
            </div>
        </main>
    </div>
</x-layout>

<script>
    let avatar = document.querySelector('#files').files;

    let preview = document.querySelector('.preview');

    function handleFiles(files) {
        for (let i = 0; i < files.length; i++) {
            let file = files[i];

            if (!file.type.startsWith('image/')) {
                continue
            }

            let img = document.createElement("img");
            let descr = document.createElement("p");
            descr.textContent = 'Новая аватарка';
            img.classList.add("obj");
            img.file = file;
            img.style.width="150px";
            preview.appendChild(img);
            preview.appendChild(descr);

            let reader = new FileReader();
            reader.onload = (function (aImg) {
                return function (e) {
                    aImg.src = e.target.result;
                };
            })(img);
            reader.readAsDataURL(file);
        }
    }
</script>
