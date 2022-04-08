iziToast.settings({
    timeout: 10000,
    resetOnHover: true,
    icon: 'material-icons',
    transitionIn: 'flipInX',
    transitionOut: 'flipOutX',
});
function displayInfoMessage() {
    iziToast.info({
        position:"topRight",
        title: 'Hello',
        message: 'Welcome!',
    });
}
function displaySuccessMessage(title,message) {
    iziToast.success({
        position:"topRight",
        title: title,
        message: message,
    });
}
function displayWarningMessage() {
    iziToast.warning({
        position:"topRight",
        title: title,
        message: message,
    });
}
function displayErrorMessage() {
    iziToast.error({
        position:"topRight",
        title: 'Error',
        message: 'Illegal operation',
    });
}