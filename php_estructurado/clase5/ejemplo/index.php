<!--Programa creado para mis alumnos de DH
Sólo para que vean en tiempo de ejecución como enviamos los
datos que el usuario escribe de un archivo a otro
Autor: MSc. Ángel Daniel Fuentes Segura-->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>trabajando con Formulario</title>
    <!--<link rel="stylesheet" href="css/estilos.css">-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/master.css">
 
</head>

<body>
<div class="container-fluid bg-light">
  <div class="row">
    <div class="col">
      <fieldset class="form-group" border=1>
        <legend class="col-form-label col-xs-8 "><h2>Formulario de registro de datos</h2></legend> 
      <form  action="calculo_aumento.php" method="post" name="captura_aumento" target="_blank">
        <div class="form-grop" class="col-xs-8">
          <label class="col-xs-8">DNI:</label>
          <div class="col-xs-8">
            <input class="form-control" name="dni" type="text" id="dni" size="12" maxlength="12" required  placeholder="Su DNI no debe exceder de ocho (8) digitos"/>
          </div>
        </div>  
        <div class="form-group" class="col-sm-12">
          <label class="col-sm-12">Nombre:</label>
          <div class="col-sm-12">
            <input class="form-control" name="nombre" type="text" id="nombre" size="30" maxlength="30" required />
          </div>
        </div>  
        <div class="form-group">
        <label class="col-sm-12">Apellido:</label>
        <div class="col-sm-12">
          <input class="form-control" name="apellido" type="text" id="apellido" size="30" maxlength="30" required />
        </div>  
        <fieldset class="form-group">
            <legend class="col-form-label col-sm-12 pt-2">Indique Genero:</legend>
        <div class="form-check" class="col-sm-12">
            <input class="form-check-input" type="radio" name="sexo" id="sexo1" value="Masculino" >
            <label class="col-sm-12"  class="form-check-label" for="sexo1">
              Masculino
            </label>
          </div>
          <div class="form-check" class="col-sm-12">
            <input class="form-check-input" type="radio" name="sexo" id="sexo2" value="Femenino">
            <label  class="col-sm-12" class="form-check-label" for="sexo2">
              Femenino
            </label>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="radio" name="sexo" id="sexo3" value="Otro">
              <label class="col-sm-12" class="form-check-label" for="sexo3">
                Otro
              </label>
            </div>
          </fieldset>

          <fieldset class="form-group">
              <legend class="col-form-label col-sm-12 pt-2">Seleccione la educación Culminada:</legend>
            
            <div class="form-check" class="col-sm-12">
              <input class="form-check-input" type="checkbox" name="educacion[]"  id="check1" value="Primaria">
              <label class="col-sm-12" class="form-check-label" for="check1">
                Primaria
              </label>
            </div>
            <div class="form-check" class="col-sm-12">
              <input class="form-check-input" type="checkbox" name="educacion[]"  id="check2" value="Secundaria">
              <label class="col-sm-12" class="form-check-label" for="check2">
                Secundaria
              </label>
            </div>    
            <div class="form-check">
              <input class="form-check-input" type="checkbox"  name="educacion[]" id="check3" value="Universitaria">
              <label class="col-sm-12" class="form-check-label" for="check3">
                Universitaria
              </label>
            </div>  
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="educacion[]"  id="check4" value="Postgrado">
              <label class="col-sm-12" class="form-check-label" for="check4">
                Postgrado
              </label>   
            </div>  
          </fieldset>
          <fieldset class="form-group">
              <legend class="col-form-label col-sm-12 pt-2"></legend>
          <div class="form-group col-md-12">
            <select class="col-sm-12" class="custom-select" name="departamento">
              <option class="col-sm-12" disabled selected hidden>Seleccione Departamento</option>
              <option class="col-sm-12" value="Sistemas">Sistemas</option>
              <option class="col-sm-12" value="RRHH">Recursos Humanos</option>
              <option class="col-sm-12" value="Contabilidad">Contabilidad</option>
              <option class="col-sm-12" value="Compras">Compras</option>
              <option class="col-sm-12" value="Finanzas">Finanzas</option>
            </select>
          </div>  
          </fieldset>

          <div class="form-grop col-sm-12 pt-2">
            <label >Sueldo:</label>
            <div >
              <input class="form-control" name="sueldo" type="text" id="sueldo" size="20" maxlength="20" />
            </div>
          </div>
          <div class="form-grop col-sm-12 pt-2">
            <label >Porcentaje de Aumento:</label>
            <div >
              <input class="form-control" name="aumento" type="text" id="aumento" size="3" maxlength="3" />
            </div>
          </div>
          <div class="form-grop" class="col-sm-12">
            <label class="col-sm-12">Observaciones:</label>
            <div class="col-sm-12">
              <textarea class="col-sm-12" id="textoarea" name="observaciones" id="observaciones" cols="100"></textarea>
            </div>
          </div>
          <div class="form-group row" class="col-sm-12">
            <div class="col-sm-12  pt-2">
              <button type="submit" class="btn btn-primary">Enviar</button>
            
              <button type="reset" class="btn btn-success">Restablecer</button>
            </div>
          </div>
      </form>
      </fieldset>

    </div>
  </div>
</div>  
<script src="js/bootstrap.min.js"></script>
</body>
</html>
