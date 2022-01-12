// When the user clicks on the checkbox the form will automagically submit.
const forms = document.querySelector('.formCheckbox');
const tasks = document.querySelectorAll('input[type=checkbox]');

function completedTasks(event) {
  event.target.parentNode.submit();
}

tasks.forEach((task) => {
  task.addEventListener('click', completedTasks);
});
