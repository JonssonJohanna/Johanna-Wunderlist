const taskButtons = document.querySelectorAll('.taskButton');
const hiddenForm = document.querySelector('.hiddenForm');

taskButtons.forEach((taskButton) => {
  taskButton.addEventListener('click', () => {
    hiddenForm.classList.toggle('on');
  });
});
