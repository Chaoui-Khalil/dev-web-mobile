document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); 
    
    let errorMessages = []; 
    
    
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;

    
    if (!username) {
        errorMessages.push("Le nom d'utilisateur est requis.");
    }

    if (!password) {
        errorMessages.push("Le mot de passe est requis.");
    }

    
    let errorMessagesDiv = document.getElementById("errorMessages");
    if (errorMessages.length > 0) {
        errorMessagesDiv.innerHTML = errorMessages.join("<br>");
    } else {
        alert("Connexion réussie !");
       
    }
});
