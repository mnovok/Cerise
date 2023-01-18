function redirect(event) {
    if(event.key === 'Enter') 
        window.location.href = 'C:/xampp/htdocs/Cerise/public/homepage.html';
}

var input = document.getElementById("name-input");
input.addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById("to-home-btn").click();
    }
});