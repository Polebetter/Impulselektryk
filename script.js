function sendMail() {
    let parms = {
        name: document.getElementById("name").value,
        email: document.getElementById("email").value,
        message: document.getElementById("message").value,
    };
    emailjs.send("service_2hdunp3", "template_hkwb8vq", parms).then(function (res) {
        alert("email wysłany pomyślnie!");
    }).catch(function (err) {
        alert("Spróbuj ponownie później!");
    });
}