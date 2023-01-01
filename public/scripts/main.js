function redirect(event) {
    if(event.key === 'Enter') 
        window.location.href = 'C:/xampp/htdocs/Cerise/public/homepage.html';
}

let input = localStorage.getItem('input');

function saveName(){
    input = document.getElementById("name-input").value;
    localStorage.setItem('input', input)
    alert(input);
}

console.log(input);