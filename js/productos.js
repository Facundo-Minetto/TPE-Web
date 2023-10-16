"use strict"
let arrCategoriasProductos = document.querySelectorAll('.categorias-productos');
let arrCards = document.querySelectorAll('.card');

for(let i = 0; i < arrCategoriasProductos.length; i++){
    arrCategoriasProductos[i].addEventListener('click', ()=>{
        let idCategoria = arrCategoriasProductos[i].getAttribute("id");
        organizarXCategorias(idCategoria);
    });
}

function organizarXCategorias(id){
    removeNoMostrar();
    if(id != 0){
        for(let i = 0; i < arrCards.length; i++){
            let categoryNum = arrCards[i].getAttribute('categoryID');
            if(categoryNum != id){
                arrCards[i].classList.add('noMostrar');
            }
        }
    }
}

function removeNoMostrar(){
    for(let i = 0; i < arrCards.length; i++){
        arrCards[i].classList.remove('noMostrar');
    }
}