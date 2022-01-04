const taskButtons = document.querySelectorAll('.taskButton');

taskButtons.forEach((taskButton) => {
  taskButton.addEventListener('click', () => {
    hiddenForm.classList.toggle('on');
  });
});
