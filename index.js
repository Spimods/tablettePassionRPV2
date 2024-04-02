const loginForm = document.getElementById("login-form");
const loginButton = document.getElementById("login-form-submit");
const loginErrorMsg = document.getElementById("login-error-msg");
var a = 0

document.getElementById("login-form-submit").disabled = false;

function startTimer(duration, display) {
    var timer = duration,  seconds;
    document.getElementById("login-form-submit").disabled = true;
    setInterval(function () {
        seconds = parseInt(timer % 60, 10);
        seconds = seconds < 10 ? "0" + seconds : seconds;
        display.textContent = 'Trop de tentative, veuillez patienter ' + seconds + ' secondes';
        if (--timer < 0) {
            document.getElementById("login-form-submit").disabled = false;
            timer = 0
            a = 0
            document.getElementById("time").style.display = "none" ; 
        }
    }, 1000);
}

// ne pas modifier
loginButton.addEventListener("click", (e) => {
    e.preventDefault();
    const password = loginForm.password.value;
    loginErrorMsg.style.display = "none";
    document.getElementById("login-form-submit").disabled = false;



// pour modification de mot de passe, modifier 1er mots :

var secu = {
    'mdpstaff':{'href':'staff/index.html'},
    'mdpLSPD':{'href':'LSPD/index.html'},
    'mdpEMS':{'href':'EMS/index.html'},
    'mdpcarmax':{'href':'carmax/index.html'},
    'mdppatrol':{'href':'patrol/index.html'},
    'mdpweazel':{'href':'weazel/index.html'},
    'mdpgouvernement':{'href':'gouvernement/index.html'},
    'mdpgouv':{'href':'gouvernement/indexgouv.html'},
    'mdpjuge':{'href':'gouvernement/indexjuge.html'},
    'mdpgouvgouv':{'href':'gouvernement/index.html'},
    'mdptaxi':{'href':'taxi/index.html'},
    'mdptaxipatron':{'href':'taxi/indexpatron.html'},
    'mdpassodomi':{'href':'assodomi/index.html'},
};


if (password in secu) {
    loginErrorMsg.style.display = "none";
    window.location.href=secu[password].href;
}
else
{
    if (a >= 3){
        document.getElementById("time").style.display = "block" ; 
        display = document.querySelector('#time');
        startTimer(30, display);
        loginErrorMsg.style.display = "none";
    } else {
        b = a + 1
        a = b
        loginErrorMsg.style.display = "block";
        document.getElementById("login-form-submit").disabled = false;
        document.getElementById("time").style.display = "none" ; 
    }
}


})