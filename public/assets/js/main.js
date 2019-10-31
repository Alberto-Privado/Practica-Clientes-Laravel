(function(){
    let form = document.querySelectorAll('.destroy');
    
        for(var i = form.length -1; i >=0 ; i-- ){
            form[i].addEventListener('click', function(event){ 
                let confirmacion = confirm('¿Quiere borrar el producto?');
            if (!confirmacion){
                event.preventDefault();
            }    
            });
   
        }
})();