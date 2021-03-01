var resg = [];
var rgErros = [];
function vrQ(id,name, expected){
    if(resg.indexOf(id) != -1){
        
    }else{
        resg.push(id);
        if(id+name == id+expected){
            document.getElementById(id+expected).style.background = "#55fa7e";    
        }else{
            rgErros.push(id);
            document.getElementById(id+expected).style.background = "#55fa7e";
            document.getElementById(id+name).style.background = "#fa467c";
        }
    }
}
function ctnResu(){
    totalQts = resg.length;
    errorsCtn = rgErros.length;
    hitsCtn = totalQts - errorsCtn;
    document.getElementById("result").innerHTML = hitsCtn + " / " + totalQts;
    window.scrollTo(0, 0);
}

function btnIni(){
        window.location='formulario';
}
