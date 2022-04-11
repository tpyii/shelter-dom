function disableFormEmptyElements() {
  [].forEach.call(this.elements, element => 
    !element.value 
      ? element.setAttribute('disabled', 'disabled') 
      : ''
  )
}

function sendForm() {
  disableFormEmptyElements.call(this)
  this.submit()
}

document
  .querySelectorAll('.modal-footer [type=submit]')
  .forEach(element => element.addEventListener(
    'click',
    sendForm.bind(element.closest('.modal').querySelector('form'))
  ))
