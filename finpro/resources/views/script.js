console.log('hello')

function selectUserType(userType) {
    const buttons = document.querySelectorAll('.user-type-button');

    buttons.forEach(button => {
    button.addEventListener('click', () => {
    // Remove the active class from all buttons
    buttons.forEach(btn => btn.classList.remove('active'));
    // Add the active class to the clicked button
    button.classList.add('active');
        });
    });
    // Add the active class to the selected button
    const selectedButton = document.querySelector(`.user-type-button.${userType}`);
    selectedButton.classList.add('active');

    const inputUserStatus =document.getElementById('user_type')
    inputUserStatus.value = userType    
}
    
