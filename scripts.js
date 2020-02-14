function mostrarRegistro(id){
    document.getElementById("contenedor").style.display = "none";
    document.getElementById("registro").style.display = "flex";
}

function mostrarResultados(letraEscogida){
    document.location.assign("index.php?letra="+letraEscogida);
}