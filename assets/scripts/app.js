// function lists tasks with deadline in ASC/DESC

// function submit form for edit lists ANVÄNDER JAG DEN HÄR KOLLA IGENOM DOKUMENTET
// const submitList = document.querySelectorAll($list['id']);
// document.querySelector('.submit'),
//   addEventListener('click', function () {
//     submitList.submit();
//   });

// When the user clicks on the checkbox the form will automagically submit.
const form = document.querySelector('.formCheckbox');
const task = document.querySelector('input[type=checkbox]');

task.addEventListener('click', () => form.submit());
