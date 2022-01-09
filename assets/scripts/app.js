// alert text

// When the user clicks on the checkbox the form will automagically submit.
const form = document.querySelector('.formCheckbox');
const task = document.querySelector('input[type=checkbox]');

task.addEventListener('click', () => form.submit());
