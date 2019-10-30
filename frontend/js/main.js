
    var resultado = document.getElementById('resultados');
    
    function get(parametro){
        fetch('http://localhost:8080/api/backend/'+parametro)
        .then(valor=>valor.json())
        .then(valor=>{            
            table(valor);            
        });
    }

    function filtrar(){
        var id = document.getElementById('campo').value;
        fetch('http://localhost:8080/api/backend/'+id)
        .then(valor=>valor.json())
        .then(valor =>{
            table(valor);
        })
    }


    function table(datos){
        resultado.innerHTML ='';
        for(let dato of datos){
            resultado.innerHTML +=`
            <tr>
                <th scope="row">${dato.id}</th>
                <td>${dato.nombre}</td>
                <td>${dato.apellido}</td>
                <td>${dato.edad}</td>
            </tr>
            `;
        }
    }



    function eliminar(){
        var id = document.getElementById('campoEliminar').value;
        fetch('http://localhost:8080/api/backend/eliminar;'+id)
        get('empleados');
    }

    //Envio de datos
    
    var formulario = document.getElementById('formulario');
    var respuesta = document.getElementById('respuesta');

    formulario.addEventListener('submit', function(e){
        e.preventDefault();
        var datosPost = new FormData(formulario); 
        fetch('http://localhost:8080/api/backend/post.php',{
            method: "POST",
            body: datosPost
        })
        .then(res => res.json())
        .then( values =>{
            if(values === 'error'){
                respuesta.innerHTML = `
                
                <div class="alert alert-danger"  role="alert">
                    Llena todos los campos
                </div>
                `
            }else{
                respuesta.innerHTML = `                
                <div class="alert alert-primary" role="alert">
                    ${values}
                </div>
                `
            }
        })
    })



    


























