//step 1: select an element that user will click/toggle
const clickButton = document.querySelector('.toggle-icon');

//step 2: add the click event
clickButton.addEventListener('click', () => {
    document.querySelector('body').classList.toggle('active-nav')
});
