<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/estilos.css">

    <title>Organigrama C.A.P.I.(Coordinación Administración Plataformas Integradas)</title>
  </head>
  <body>
    

  <div class="container fondo">

    <h1 class="text-center">Organigrama<br> Coordinación Administración Plataformas Integradas</h1>
    
    <div class="row">
      <div class="col-2 offset-10">
        <div class="text-center">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary w-100"
          data-bs-toggle="modal" data-bs-target="#modalUsuario" id="botonCrear">
          <i class="bi bi-plus-circle-fill"> Crear</i>
</button>        
</div>
</div>
</div>
<br><br>

<div class="table-responsive">
  <table id="datos_usuario" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <!--<th>Cargo</th>-->
        <!--<th>Gerencia</th>-->
        <th>Área</th>
        <th>Teléfono Celular</th>
        <th>Email</th>
        <th>Imagen</th>
        <!--<th>Fecha de Creación</th>-->
        <th>Editar</th>
        <th>Borrar</th>
</tr>
</thead>
</table>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header azul">
        <h5 class="modal-title" id="exampleModalLabel">Crear usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
        
             
          <form method="POST" id="formulario" enctype="multipart/form-data">
             <div class="modal-content">
                <div class="modal-body">
                <label for="nombre">Ingrese el nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control"><br>

                <label for="apellido">Ingrese los apellidos</label>
                <input type="text" name="apellido" id="apellido" class="form-control"><br>

                <label for="telefono">Ingrese el número de teléfono o celular</label>
                <input type="text" name="telefono" id="telefono" class="form-control"><br>

                <label for="email">Ingrese el correo</label>
                <input type="email" name="email" id="email" class="form-control"><br>

            <!--<label for="cargo">Ingrese el cargo</label>
            <input type="text" name="cargo" id="cargo" class="form-control"><br>-->

            <!--<label for="gerencia">Ingrese la Gerencia</label>
            <input type="text" name="gerencia" id="gerencia" class="form-control"><br>-->

                <label for="area">Ingrese el Área</label>
                <input type="text" name="area" id="area" class="form-control"><br>

                <label for="imagen">Seleccione una imagen</label>
                <input type="file" name="imagen_usuario" id="imagen_usuario" class="form-control">
                <span id="imagen-subida"></span><br>

</div>

      <div class="modal-footer">
        <input type="hiddeen" name="id_usuario" id="id_usuario">
        <input type="hiddeen" name="operacion" id="operacion">
        <input type="submit" name="action" id="action" class="btn btn-success" value="Crear">
      </div>
</div>
    </form>
  </div>
</div>
</div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        $("#botonCrear").click(function(){
            $("#formulario")[0].reset();
            $(".modal-title").text("Crear Usuario");
            $("#action").val("Crear");
            $("#operacion").val("Crear");
            $("#imagen_subida").html("");
        });

        var dataTable = $('#datos_usuario').DataTable({
          "processing":true,
          "serverSide":true,
          "order":[],
          "ajax":{
              url: "obtener_registros.php",
              type: "POST"
          },
          "columnsDefs":[
            {
            "targets":[0, 3, 4],
            "orderable":false,
            },
          ]
          
        });

        //Aqui codigo para insertar

        $(document).on('submit', '#formulario', function(event){
        event.preventDefault();
        var nombre = $("#nombre").val();
        var apellido = $("#apellido").val();
        var area = $("#area").val();
        var telefono = $("#telefono").val();
        var email = $("#email").val();
        var extension = $("#imagen_usuario").val().split('.').pop().toLowerCase();

        if (extension != ''){
          if(jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1){
          alert("Formato de imagen inválido");
          $("#imagen_usuario").val('');
          return false;
        }
      }

      if(nombre != '' && apellido != '' && email != ''){
        $.ajax({
          url: "crear.php",
          method: "POST",
          data:new FormData(this),
          contentType:false,
          processData:false,
          success:function(data)
          {
            alert(data);
            $('#formulario')[0].reset();
            $('#modalUsuario').modal.hide();
            dataTable.ajax.reload();
          }
        });
      }else{
        alert("Algunos campos son obligatorios");
      }
      });

      //Funcion de editar
      $(document).on('click', '.editar', function()){
        var id_usuario = $(this).attr("id");
        $.ajax({
          url:"obtener_registro.php",
          method:"POST",
          data:{id_usuario:id_usuario},
          dataType:"json",
          success:function(data)
        {
      
        //Console.log(data):
        $('#modalUsuario').modal('show');
        $('#nombre').val(data.nombre);
        $('#apellido').val(data.apellido);
        $('#area').val(data.area);
        $('#telefono').val(data.telefono);
        $('#email').val(data.email);
        $('.modal-title').text("Editar Usuario");
        $('#id_usuario').val(id_usuario);
        $('#imagen_subida').html(data.imagen_usuario);
        $('#action').val("Editar");
        $('#operacion').val("Editar");

    },
    error: function(jqXHR, textStatus, errorTrhown) {
      console.log(textStatus, errorTrhown);
    }

  })
  });
 </script>

  </body>
</html>