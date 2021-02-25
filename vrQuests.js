function vrQ(id,name, expected){
    if(id+name == id+expected){
        document.getElementById(id+expected).style.background = "#55fa7e";
        cont = (parseInt(document.getElementById('contagem').value)) + 1;
        document.getElementById('contagem').value = cont;

    }else{
        document.getElementById(id+expected).style.background = "#55fa7e";
        document.getElementById(id+name).style.background = "#fa467c";
    }
}