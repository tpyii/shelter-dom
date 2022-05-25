function toggleShowPassword(e) {
    e.preventDefault();
    
    [].forEach.call(
        this.parentElement.children, 
        element => element.classList.toggle('d-none')
    )

    this.closest('.input-group').querySelector('input').type = 
        this.classList.contains('show-password')
            ? 'text'
            : 'password'
}

document
  .querySelectorAll('.show-password, .hide-password')
  .forEach(element => element.addEventListener(
      'click',
      toggleShowPassword.bind(element)
  ))
