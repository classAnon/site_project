const hamburgerButton = document.getElementById('hamburger')
const navList = document.getElementById('nav-list')

function toogleButton() {
    navList.classList.toggle('show')
}

hamburgerButton.addEventListener('click', toogleButton)


function submitForm(form){
    swal({
        title: "Are you sure?",
        text: "This form will be submitted",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((isOkay) => {
        if (isOkay) {
            swal("Succesfully submitted!", {
                icon: "success",
              });
            form.submit();
            location.reload();
        }
    });

    return false;
}