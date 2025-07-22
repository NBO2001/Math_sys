var resg = [];
var rgErros = [];

function showModal(message){
    var overlay = document.getElementById('modal-overlay');
    var msg = document.getElementById('modal-message');
    msg.innerHTML = message;
    overlay.classList.add('show');
}

function hideModal(){
    document.getElementById('modal-overlay').classList.remove('show');
}

function vrQ(id, name, expected){
    if(resg.indexOf(id) != -1){
        // already answered
    }else{
        resg.push(id);
        var correctEl = document.getElementById(id + expected);
        var selectedEl = document.getElementById(id + name);
        if(id + name == id + expected){
            correctEl.style.background = "#55fa7e";
        }else{
            rgErros.push(id);
            correctEl.style.background = "#55fa7e";
            selectedEl.style.background = "#fa467c";
        }
    }
}

function ctnResu(){
    totalQts = resg.length;
    errorsCtn = rgErros.length;
    hitsCtn = totalQts - errorsCtn;
    document.getElementById("result").innerHTML = hitsCtn + " / " + totalQts;
    var message = "Acertos: " + hitsCtn + "<br>Erros: " + errorsCtn;
    showModal(message);
    window.scrollTo(0, 0);
}

function btnIni(){
    window.location='formulario';
}
