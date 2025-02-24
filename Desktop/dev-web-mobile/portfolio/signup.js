document.addEventListener("DOMContentLoaded", function () {
    const registerForm = document.querySelector(".register"); 
    const registerBtn = document.querySelector(".btn");

    registerBtn.addEventListener("click", function (event) {
        event.preventDefault();

        
        const username = document.querySelector(".username input").value.trim();
        const email = document.querySelector(".email input").value.trim();
        const password = document.querySelector(".pass input").value.trim();
        const gender = document.querySelector("input[name='gender']:checked");

        
        let errors = [];

        if (username === "") {
            errors.push("Le nom d'utilisateur est requis.");
        }

        
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!email.match(emailPattern)) {
            errors.push("L'email n'est pas valide.");
        }

        
        const passwordPattern = /^(?=.*[A-Z])(?=.*\d).{8,}$/;
        if (!password.match(passwordPattern)) {
            errors.push("Le mot de passe doit contenir au moins 8 caractères, une majuscule et un chiffre.");
        }

        
        if (!gender) {
            errors.push("Veuillez sélectionner votre genre.");
        }

        
        if (errors.length > 0) {
            alert(errors.join("\n")); 
        } else {
            alert("Inscription réussie ! 🎉\nBienvenue, " + username + " !");
            window.location.href = "login.html"; 
            
        }
    });
});
