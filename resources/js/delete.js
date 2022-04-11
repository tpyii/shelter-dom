const deleteModal = document.getElementById('delete')

if (deleteModal) {
  deleteModal.addEventListener('show.bs.modal', event => {
    const dataset = event.target.querySelector('.delete').dataset
    dataset.action = event.relatedTarget.dataset.action
    dataset.remove = event.relatedTarget.dataset.remove
  })

  deleteModal
    .querySelector('.delete')
    .addEventListener('click', event => 
      send(event.target.dataset.action)
        .then(() => document.querySelector(event.target.dataset.remove).remove())
        .catch(error => console.log(error))
    )

  document
    .querySelectorAll('.showDeleteModal')
    .forEach(element => 
      element.addEventListener('click', () => 
        bootstrap.Modal.getOrCreateInstance(deleteModal).show(element)
      )
    )
}

function send(url) {
  return  fetch(url, {
    method: 'DELETE',
    headers: {
      'X-CSRF-TOKEN': document.head.querySelector('[name=csrf-token]').content
    }
  })
}
