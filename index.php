<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="img/favicon.ico" type="image/x-icon">
  <title>Cotizador</title>
  <?php // define('WP_USE_THEMES', true);
//require($_SERVER['DOCUMENT_ROOT'] .  '/wp-load.php'); ?>
   <!-- Materializecss compiled and minified CSS -->
 
                        
</head>
<body>

<?php

//get_header(); ?>
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
  <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
 <!--Import Google Icon Font-->
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <!--Import Materialize-Stepper CSS -->
 <link rel="stylesheet" href="stepper/materialize-stepper.min.css">

 <!-- jQuery -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
 <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
 
 <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
 <script type="text/javascript" language="javascript" src="js/messages_es.js"></script>
 <!--Import Materialize-Stepper JavaScript -->
 <script src="stepper/materialize-stepper.min.js"></script>
 <script src="js/controler.js" type="text/javascript" charset="utf-8" async defer></script>
 <link rel="stylesheet" type="text/css" href="css/style.css">
 <link rel="stylesheet" href="Remodal-1.1.1/dist/remodal.css">
<link rel="stylesheet" href="Remodal-1.1.1/dist/remodal-default-theme.css">
<script src="Remodal-1.1.1/dist/remodal.min.js"></script>
 <style type="text/css" media="screen">
  nav
  {
    box-shadow: 0px 0px 0px;
    background-color: white;

  }
  #top-header div 
  {
    margin-top: 0px;
  }
</style>




<!--<a href="#modal">Call the modal with data-remodal-id="modal"</a>-->
<div class="container" style="margin-top: 5%;">
  <form action="" method="POST" enctype="multipart/form-data" id="quote_form" accept-charset="utf-8">
  
  
  <ul class="stepper">
     <li class="step active">
        <div class="step-title waves-effect">Tipo de Cotización</div>
        <div class="step-content">
           <div class="row">         
              <div class="input-field col s12 m6 centered">
                <select class="icons" id="id_application_method" required>
                  <option value="" disabled selected>Tipo de cotización</option>
                  <option value="A" >Paquetes en venta financiada</option>
                  <option value="B" >Licencias</option>
                  <!--<option value="C">Paquete Ubiqo Smart financiado</option>-->
                 
                </select>
                <label>Seleccioné su opción</label>
              </div>
              <!--<div class="input-field col s12">
                 <input id="email" name="email" type="email" class="validate" required>
                 <label for="first_name">Your e-mail</label>

              </div>-->
           </div>
           <div class="step-actions">
              <button class="waves-effect waves-dark btn next-step">CONTINUAR</button>
           </div>
        </div>
     </li>
     <li class="step">
        <div class="step-title waves-effect">Paso 2</div>
        <div class="step-content">
        
         
        <div class="content">
          <input type="hidden" name="equipos" class="op_equipo paquetes" value="0">
         
          <div class="col s12 addEquipo">
         
              <div class="fixed-action-btn">
                <a class="btn-floating btn-large  light-blue darken-4  add">
                  <i class="large material-icons">add</i>
                </a> 
              </div>
            </div>
        <!--Opcion de Equipos -->
          <div class="row" id="op1" style="margin-bottom: 50px;">
        <!-- <div class="col s12 inner">
           
         </div>-->
          <div  class="col s12 blue-tvx ">
             <a  class="right btn-floating btn-small red  remove delete"><i class="material-icons">delete</i>
              </a>
              <h5 class="white-text text-white"> SELECCIONE SUS OPCIONES </h5>
          </div>
            
    
            <div class="input-field col s6" >
              <input  name="data[select][cantidad_eq]" type="number" min="1" max="999" class="validate paquetes" required>
              <label for="password">Cantidad de equipos</label>
            </div>
            <div class="input-field col s6 " >
              <select class="browser-default icons paquetes"  required id="" name="data[select][equipo]">

                <option value="" disabled selected>Equipo</option>
                <option value="TVX125" >TVX125</option>
                <option value="TVX310" >TVX310</option>
                <option value="TVX740" >TVX740</option>
                <option value="TVX730" >TVX730</option>
                <option value="TVX588d" >TVX588D</option>
                <option value="TVX588A" >TVX588A</option>
                <option value="TVX887" >TVX887</option>                
              </select>
                <label></label>
            </div>
            <div class="input-field col s12" style="padding-bottom: 15px;">
              <label >Licencias:</label> 
            </div>   
            <div class="input-field col s6" >
              <p>
                <input  type="checkbox" id="test5" name="data[select][tvx]" class="paquetes" />
                <label for="test5">TeamVOX</label>
              </p>
              <p>
                <input  type="checkbox" id="test6" name="data[select][evi]" class="paquetes" />
                <label for="test6">Evidence</label>
              </p>
              <p>
                <input  type="checkbox" id="test7"  name="data[select][mctrl]" class="paquetes" />
                <label for="test7">MobiControl</label>
              </p>
              <p>
                <input  type="checkbox" id="test8"  name="data[select][tcall]" class="paquetes" />
                <label for="test8">TrustCall</label>
              </p>
            </div>
            <div class="input-field col s6" >
              <input id="" name="data[select][activ]" type="number" min="0" max="350" class="validate paquetes" required>
              <label for="activacion">Monto de activación para licencias</label>
            </div>
            <div class="input-field col s6">
              <select class="browser-default paquetes" name="data[select][plan]" id="" >
                <optgroup label="Plan datos">
                  <option selected="true" disabled="disabled">Planes </option>
                  <option value="22">Plan de datos 1 MB $  33.62 MXN</option>
                  <option value="23">Plan de datos 2 MB $  50.86 MXN</option>
                  <option value="24">Plan de datos 3 MB $  59.48 MXN</option>
                  <option value="25">Plan de datos 5 MB $  64.66 MXN</option>
                  <option value="26">Plan de datos 10 MB $  76.72 MXN</option>
                  <option value="1">Plan de datos 50 MB $  85.34 MXN</option>
                  <option value="2">Plan de datos 100 MB  $ 93.97 MXN</option>
                  <option value="3">Plan de datos 400 MB  $ 145.69 MXN</option>
                  <option value="4">Plan de datos 500 MB  $ 162.93 MXN</option>
                  <option value="5">Plan de datos 1 GB  $ 206.03 MXN</option>
                  <option value="6">Plan de datos 2 GB  $ 231.90 MXN</option>
                  <option value="7">Plan de datos 3 GB  $ 249.14 MXN</option>
                  <option value="8">Plan de datos 5 GB  $ 369.83 MXN</option>
                  <option value="18">Plan de datos 10 GB  $ 499.14 MXN</option>
                  <option value="19">Plan de datos 15 GB  $ 800.86 MXN</option>
                  <option value="20">Plan de datos 20 GB  $ 1016.38 MXN</option>
                  <option value="21">Plan de datos 30 GB  $ 1447.41 MXN</option>
                </optgroup>
                <optgroup label="Plan voz y datos">
                  <option value="9">TELCEL MAX SIN LIMITE 1000 4G (1.75 GB) $ 171.55 MXN</option>
                  <option value="10">TELCEL MAX SIN LIMITE 1500 4G (2.25 GB) $ 206.03 MXN</option>
                  <option value="11">TELCEL MAX SIN LIMITE 2000 4G (2.75 GB) $ 275.76 MXN</option>
                  <option value="12">TELCEL MAX SIN LIMITE 3000 4G (3.75 GB) $ 343.97 MXN</option>
                  <option value="13">TELCEL MAX SIN LIMITE 5000 4G (5.75 GB) $ 430.17 MXN</option>
                  <option value="14">TELCEL MAX SIN LIMITE 6000 4G (7.75 GB) $ 516.38 MXN</option>
                  <option value="15">TELCEL MAX SIN LIMITE 7000 4G (8.75 GB) $ 688.79 MXN</option>
                  <option value="16">TELCEL MAX SIN LIMITE 9000 4G (11.50 GB) $ 904.31 MXN</option>
                  <option value="17">TELCEL MAX SIN LIMITE 12000 4G (15.50 GB) $ 162.93 MXN</option>
                </optgroup>
              </select>
              <label></label>
            </div>
            <div class="input-field col s6">
              <select class="icons browser-default paquetes" id="" required name="data[select][plazo]" id="">
                <option selected="true" disabled="disabled">Plazo</option> 
                <option value="6">6</option>
                <option value="12">12</option>
                <option value="24">24</option>
                <option value="36">36</option>    
              </select>
                <label></label>
            </div>
                   
          </div>
           <div class="row" id="op1">
            
          </div>

            


         <!--Opcion Licencias--> 
          <div class="row" id="op2">
           <input type="hidden" name="licencias" class="op_lic paquetes" value="0">
          <div class="row">
            <div class="input-field col s2" >

              <p>
                <input  type="checkbox" id="tvx-group" name="data[select][tvx_lic]" class="paquetes" />
                <label for="tvx-group">TeamVOX</label>
              </p>
            </div>
            <div class="input-field col s2">
              <input id="tvx-group-op" name="data[select][tvx_cant]" type="number" min="0" max="999" class="validate paquetes" required>
              <label for="activacion">Cantidad</label>
            </div>

            <div class="input-field col s6">
              <input id="tvx-group-op" name="data[select][tvx_activ]" type="number" min="0" max="350" class="validate paquetes" required>
              <label for="activacion">Monto de activación para TeamVOX</label>
            </div>
         
          </div>
          <div class="row">
            <div class="input-field col s2" >
              <p>
                <input  type="checkbox" id="evi-group" name="data[select][evi_lic]" class="paquetes" />
                <label for="evi-group">Evidence</label>
              </p>
            </div>
            <div class="input-field col s2">
              <input id="evi-group-op" name="data[select][evi_cant]" type="number" min="0" max="999" class="validate paquetes" required>
              <label for="activacion">Cantidad</label>
            </div>
            <div class="input-field col s6">
              <input id="evi-group-op" name="data[select][evi_activ]" type="number" min="0" max="350" class="validate paquetes" required>
              <label for="activacion">Monto de activación para Evidence</label>
            </div>
         
          </div>
          <div class="row">
            <div class="input-field col s2" >
              <p>
                <input  type="checkbox" id="mctrl-group" name="data[select][mctrl_lic]" class="paquetes" />
                <label for="mctrl-group">MobiControl</label>
              </p>
            </div>
            <div class="input-field col s2">
              <input id="mctrl-group-op" name="data[select][mctrl_cant]" type="number" min="0" max="999" class="validate paquetes" required>
              <label for="activacion">Cantidad</label>
            </div>
            <div class="input-field col s6">
              <input id="mctrl-group-op" name="data[select][mctrl_activ]" type="number" min="0" max="350" class="validate paquetes" required>
              <label for="activacion">Monto de activación para MobiControl</label>
            </div>
         
          </div>
                 <div class="row">
            <div class="input-field col s2" >
              <p>
                <input  type="checkbox" id="tcall-group" name="data[select][tcall_lic]" class="paquetes" />
                <label for="tcall-group">TrustCall</label>
              </p>
               </div>
                 <div class="input-field col s2">
              <input id="tcall-group-op" name="data[select][tcall_cant]" type="number" min="0" max="999" class="validate paquetes" required>
              <label for="activacion">Cantidad</label>
            </div>
            <div class="input-field col s6">
              <input id="tcall-group-op" name="data[select][tcall_activ]" type="number" min="0" max="350" class="validate paquetes" required>
              <label for="activacion">Monto de activación para TrustCall</label>
            </div>

         
          </div>
         
          </div>
          <div id="op3">
            <div class="row">
                <input type="hidden" name="ubiqo_smart" class="op_ubsmart paquetes" value="0">
                <div class="col s12">
                  <div class="input-field col s6" >
                    <input  name="data[select][cantidad_ubsmart]" type="number" min="1" max="999" class="validate paquetes" required>
                    <label for="password">Cantidad de equipos Ubiqo Smart</label>
                  </div>
                  <div class="input-field col s6" >
                    <select class="icons browser-default paquetes" id="" required name="data[select][plazo_ubsmart]" id="">
                      <option value="" disabled selected>Plazo</option> 
                      <option value="6">6</option>
                      <option value="12">12</option>
                      <option value="24">24</option>  
                      <option value="24">36</option>  
                    </select>          
                 </div> 
                <div class="input-field col s12" >
                  <p>
                    <input  type="checkbox" id="kit-group" name="data[select][ub_kit_inst]" class="paquetes" />
                    <label for="kit-group">Kit de instalación</label>
                  </p>
                </div>
                <div class="input-field col s12" >
                  <p>
                    <input  type="checkbox" id="btn-pan-group" name="data[select][ub_btn_panico]" class="paquetes" />
                    <label for="btn-pan-group">Boton de pánico</label>
                  </p>
                </div>
                <div class="input-field col s12" >
                  <p>
                    <input  type="checkbox" id="rf-maestro-group" name="data[select][ub_rf_maestro]" class="paquetes" />
                    <label for="rf-maestro-group">RF Maestro</label>
                  </p>
                </div>                                
            </div>   
          </div>
          </div>
          </div>
          <!--Termina Opcion de Licencias-->     
           <div class="step-actions">
           
               <!--<a class="waves-effect waves-light btn terminar" href="#modal"><i class="material-icons left">visibility</i>Previsualizar</a>-->
               <a class="waves-effect waves-light btn calcular" href="#modal_calculador">CALCULAR</a>
              <button class="waves-effect waves-dark btn next-step">CONTINUAR</button>
              <button class="waves-effect waves-dark btn-flat previous-step">REGRESAR</button>

           </div>
        </div>
     </li>
     <li class="step">
        <div class="step-title waves-effect">Paso 3</div>
        <div class="step-content">
        <!--Datos del Documento-->
        <div class="col s12">
          <div class="row">
            <div class="input-field col s6">
              <input  id="doc_titulo" type="text" name="doc_titulo" class="validate paquetes" required="">
              <label for="doc_titulo">Título de proyecto</label>
            </div>
            <div class="input-field col s6">
              <input  id="doc_descripcion" type="text" class="doc_descripcion" name="doc_descripcion" class="validate paquetes" required>
              <label for="doc_descripcion">Descripción de proyecto</label>
            </div>
            <div class="input-field col s6">
              <input  id="doc_registro_op" type="text" name="doc_registro_op" class="validate paquetes" required="">
              <label for="doc_registro_op">Registro de oportunidad</label>
            </div>
            <div class="input-field col s6">
              <input  id="doc_representante" type="text" class="doc_representante" name="doc_representante" class="validate paquetes" required>
              <label for="doc_representante">Vendedor</label>
            </div>
            <div class="input-field col s6">
              <input  id="doc_terminos" type="text" class="doc_terminos" name="doc_terminos" class="validate paquetes" required>
              <label for="doc_terminos">Vigencia</label>
            </div>
          </div>  
        </div>
        <!--Aqui terminan datos del documento-->
         <div class="col s12"><p>Datos del distribuidor</p></div>
          <div class="row">
              <div class="input-field col s6">
                <input  id="ra_nombre" type="text" name="ra_nombre" class="validate paquetes" required="">
                <label for="ra_nombre">Nombre Comercial</label>
              </div>
                <div class="input-field col s6">
                <input  id="razon_social" type="text" class="razon_social" name="razon_social" class="validate paquetes" required>
                <label for="razon_social">Razón Social</label>
              </div>
           </div>
             <div class="row">
             <div class="input-field col s6">
                <input  id="ra_direccion" name="ra_direccion" type="text" class="validate paquetes" required>
                <label for="ra_direccion">Dirección ( Calle y No. )</label>
              </div>
               <div class="input-field col s6">
                <input  id="colonia" type="text" name="colonia" class="validate paquetes" required>
                <label for="colonia">Colonia</label>
              </div>
             
                
           </div>
             <!--<div class="row">
              <div class="input-field col s6">
                <input  id="no_ext" type="text" name="no_ext" class="validate paquetes" required>
                <label for="no_ext">No. Exterior</label>
              </div>
                <div class="input-field col s6">
                <input  id="No. Interior (Opcional)" type="text" name="no_interior" class="validate paquetes" >
                <label for="No. Interior (Opcional)">No. Interior (Opcional)</label>
              </div>
           </div>-->
             <div class="row">
             
              <div class="input-field col s6">
                <input  id="cp" type="text" name="cp" class="validate paquetes" required>
                <label for="cp">Código Postal</label>
              </div>
              <div class="input-field col s6">
               <!-- <input  id="ra_estado" type="text" class="validate paquetes" name="ra_estado"  required>
                <label for="ra_estado">Estado</label>-->
                <select class="" id="ra_estado" required id="" name="ra_estado">
                  <option value="" disabled selected>Estado</option>
                </select>
              </div>
               
           </div>
           <div class="row">
              
                <div class="input-field col s6">
                <input  id="ra_ciudad" type="text" class="validate paquetes" name="ra_ciudad" required>
                <label for="ra_ciudad">Ciudad</label>
              </div>
              <div class="input-field col s6">
                <input  id="ra_del" type="text" name="ra_del" class="validate paquetes" required>
                <label for="ra_del">Delegación</label>
              </div>
           </div>
             <div class="row">
              
               <div class="input-field col s6">
                <input  id="ra_telefono" type="text" name="ra_telefono" class="validate paquetes" required>
                <label for="ra_telefono">Telefono</label>
              </div>
                <div class="input-field col s6">
                <input  id="ra_telefono_mov" type="text" name="ra_telefono_mov" class="validate paquetes" required>
                <label for="ra_telefono_mov">Telefono Móvil</label>
              </div>
              <div class="row">
             
                
                <div class="input-field col s6">
                  <input  id="ra_web" type="text" name="ra_web" class="validate paquetes" >
                  <label for="ra_web">Página Web (Opcional)</label>
                </div>
                 <div class="input-field col s6">
                  <div class="file-field input-field">
                  <small>Las dimensiones del logo no deben exceder de 200 de altura y 340 de ancho.</small>
                    <div class="btn">
                      
                      <span>subir Logo</span>
                      <input type="file" id="fileUpload" name="fileUpload" class="paquetes" accept="image/x-png,image/gif,image/jpeg" >
                     
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate paquetes"  type="text">
                    </div>
                  </div>
              </div>  
           </div>
               
           </div>
           <div class="row">
            <div class="input-field col s6">
                  <input  id="ra_correo" type="text" class="validate paquetes" name="ra_correo" required>
                  <label for="ra_correo">Correo electrónico RA</label>
                </div>
             
           </div>
           <div class="col s12"><p>Datos del cliente</p></div>
             <div class="row">
             <!-- <div class="input-field col s6">
                <input  id="razon_social_cliente" type="text" name="razon_social_cliente" class="validate paquetes" required>
                <label for="razon_social_cliente">Razón Social</label>
              </div>-->
              <div class="input-field col s6">
                <input  id="nombre_cliente" type="text" name="nombre_cliente" class="validate paquetes" required>
                <label for="nombre_cliente">Nombre</label>
              </div>
                <div class="input-field col s6">
                <input  id="direccion_cliente" type="text" name="direccion_cliente" class="validate paquetes" required>
                <label for="direccion_cliente">Dirección ( Calle y No. )</label>
              </div>
           </div>
            <div class="row">
              <div class="input-field col s6">
                <input  id="cli_colonia" type="text" name="cli_colonia" class="validate paquetes" required>
                <label for="cli_colonia">Colonia</label>
              </div>
              <div class="input-field col s6">
                <select class="" id="cli_estado" required id="" name="cli_estado">
                  <option value="" disabled selected>Estado</option>
                </select>  
              </div>
           </div>
              <div class="row">
              <div class="input-field col s6">
                <input  id="cli_ciudad" type="text" name="cli_ciudad" class="validate paquetes" required>
                <label for="cli_ciudad">Ciudad</label>
              </div>
                <div class="input-field col s6">
                  <input type="text" name="cliente_cp" class="validate" required>
                  <label for="cliente_cp">Código Postal</label>
              </div>
           </div>
             <div class="row">
              <!--<div class="input-field col s6">
                <input  id="nombre_cliente" type="text" name="nombre_cliente" class="validate paquetes" required>
                <label for="nombre_cliente">Nombre</label>
              </div>-->
                <div class="input-field col s6">
                  <input  id="tel_cliente" type="text" name="tel_cliente" class="validate paquetes" required>
                  <label for="tel_cliente">Telefono</label>
                </div>
                <div class="input-field col s6">
                  <input type="date" class="" name="fecha" required="" id="fecha_del_docum">
              </div>
           </div>
          
             <div class="row">
              <div class="input-field col s6">
                  <input  id="climail" type="email" name="climail" class="validate paquetes" required>
                  <label for="climail">Enviar a correo</label>

              </div>
                <div class="input-field col s6">
                  
              </div>
           </div>
           <div class="step-actions">
            <a class="waves-effect waves-light btn prev_final" href="#modal_final"><i class="material-icons left">visibility</i>Previsualizar</a>
            <!--<input type="subbmit" class="waves-effect waves-light btn" name="Enviar" id="upload" onclick="this.form.action='send_quote.php'" value="Enviar">
           <input type="button" class="waves-effect waves-light btn" name="Descargar" id="upload" onclick="this.form.action='test.php'" value="Descargar">-->
         <!-- <input type="button" class="waves-effect waves-light btn" name="Enviar" id="upload" onclick="this.form.action='send_quote.php'" value="Enviar">-->
          <a class="waves-effect waves-light btn" id="send" ><i class="material-icons left">send</i>Enviar</a>
           <a class="waves-effect waves-light btn" id="upload" ><i class="material-icons left"></i>Descargar</a>
           <!--<span id="upload">Enviar</span>
              <!--<button class="waves-effect waves-dark btn" id="upload" type="submit">SUBMIT</button>-->
           </div>
        </div>
     </li>
  </ul>
  </form>
</div>
<!--Modal Final del Documento-->
  <div class="remodal" data-remodal-id="modal_final" data-remodal-options="closeOnOutsideClick: false" style="margin-top: 15%;">
  <button data-remodal-action="close" class="remodal-close"></button>

         <style type="text/css" media="screen">

    .containerm
    {
        font-family: "Gill Sans", "Gill Sans MT", Calibri, sans-serif;
        font-size: 8pt;
        text-align: left;
    }
    .containerm label
    {
      font-weight: bold;
      color: gray;
      font-size: 7pt;
      text-align: left;
    }
    .containerm
    {
      width: 100%;
      height: 100%;
      display: inline-block;
      margin-bottom: 60px;

    }

    .left-side
    {
    
      width: 29%;
      height: 900px;
      margin-top: 80px;
      display: inline-block;
      
    }

    .right-side
    {
      width: 69%;
      height: 900px;
      float: right;
      display: inline-block;
      

    }
    .left-side-container
    {
      margin-top: 7%;
    }
    .logo
    {
      height: 100px;
      width: 100%;
      
    }
    .ul 
    {
      list-style: none;
      margin-left: -10px;
    }
    .label-rs
    {
      font-size: 11pt;
      font-weight: lighter;
      color: black;
    }
    .label-ra
    {
      font-weight: lighter;
    }
    thead tr
    {
      background-color: gray;
      color: white;
      font-size: 7pt;
    }
    table
    {
          width: 110%;
    margin-left: -40px;
      
    }
     tr, td, th
    {
      border-bottom: 1px solid #c3c2c2;
      border-right: 1px solid #c3c2c2;
      
    }
    th
    {
    padding-left: 10px;
    text-align: center;
    padding-right: 10px;
    padding-bottom:  0PX;
    padding-top:  0PX;
    }
    table td
    {
      padding: 2px;

    }
    table
    {
      border-collapse: collapse;
    }
    .right-side ul
    {
      margin-left: 0px;
    }
    .logo-tvx 
    {
      margin-top: -112px;
      float: right;
    }
  </style>
  <!--793.700787402 X 1122.519685039-->
  <div class="containerm">
  <label>REPRESENTANTE</label>
    <div class="logo logo_prev empty">
      
    </div>
    <div class="logo-tvx">
      <img src="img/logo.jpg" alt="">
    </div>
    <div class="left-side">
      <div class="left-side-container ul">
        <label class="label-rs empty" id="prev_ra_rs"></label><br><br>

        
        <UL>
          <li><label><label>DOMICILIO</label></label></li>
          <li class="empty" id="prev_ra_direccion"></li>
          <li class="empty" id="prev_ra_colonia"></li>
          <li class="empty" id="prev_ciu_est_cp"></li><br><br>

          <li> <label>TELÉFONO OFICINA</label></li>
          <li class="empty" id="prev_ra_tel"></li><br><br>

          <li><label>TELÉFONO MÓVIL</label></li>
          <li class="empty" id="prev_ra_telefono_mov"></li><br><br>

          <li> <label>CONTACTO</label> </li>
          <li class="empty" id="prev_ra_nombre"></li><br><br>

          <li><label>E-MAIL</label></li>
          <li class="empty" id="prev_web"></li><br><br>
        </UL>   
      </div>

      
    </div>
    <div class="right-side ul">
      <ul>
        <li><label>FECHA</label></li>
        <li class="empty" id="prev_fecha"></li><br><br>
        
        <li><label>PARA</label></li>
        <li class="empty" id="prev_cli_nombre"></li>
        <li class="empty" id="prev_cli_direccion"></li>
        <li class="empty" id="prev_cli_colonia"></li>
        <li class="empty" id="prev_cli_cp_ciu_est"></li><br><br>

        <li class="empty" id="prev_titulo"></li>
        <li class="empty" id="prev_descripcion"></li>
        <li class="empty" id="prev_registro_op"></li>
        <li class="empty" id="prev_representante"></li>
        <li class="empty" id="prev_terminos"></li>
        <br><br>

        <li>De acuerdo a su solicitud y según lo identiﬁcado como de su interés, presentamos la siguiente Cotización No. ---</li>

        <br><br>
        </ul>
        <div class="empty" id="prev_tabla_contenido">
          
        </div>

       <!-- <li>DETALLE PAGO INICIAL - ÚNICA VEZ </li>
      <br><br>

      <table>
        <thead>
          <tr>
            <th>DESCRIPCIÓN</th>
            <th>CANTIDAD</th>
            <th>PRECIO/UD.</th>
            <th>IMPORTE</th>
          </tr>
        </thead>
        <tbody class="empty" id="prev_tabla_contenido">
          
        </tbody>
      </table>--><br><br>
      <p>Sin más por el momento, agradeciendo su atención y preferencia,  quedo al pendiente de cualquier duda ó aclaración.</p>
    <p>Atentamente,</p>
     <ul style="margin-bottom: 30px;">
      <li class="empty prev_ra_nombre" ></li><br>
      <li class="empty prev_ra_rs"></li>
    </ul>
    
    
   </div>
  
    <br><br><br><br><br><br>
  </div>
  
</div>
<!--Aqui termina Modal Final-->
<!--Modal Calculador-->
  <div class="remodal" data-remodal-id="modal_calculador" data-remodal-options="closeOnOutsideClick: false" style="margin-top: 15%; 
    padding: 30px;
">
  <button data-remodal-action="close" class="remodal-close"></button>

         <style type="text/css" media="screen">

    .containerm
    {
        font-family: "Gill Sans", "Gill Sans MT", Calibri, sans-serif;
        font-size: 8pt;
        text-align: left;
    }
    .containerm label
    {
      font-weight: bold;
      color: gray;
      font-size: 7pt;
      text-align: left;
    }
    .containerm
    {
      width: 100%;
      height: 100%;
      display: inline-block;
      margin-bottom: 60px;

    }

    .left-side
    {
    
      width: 29%;
      height: 900px;
      margin-top: 80px;
      display: inline-block;
      
    }

    .right-side
    {
      width: 69%;
      height: 900px;
      float: right;
      display: inline-block;
      

    }
    .left-side-container
    {
      margin-top: 7%;
    }
    .logo
    {
      height: 100px;
      width: 100%;
      
    }
    .ul 
    {
      list-style: none;
      margin-left: -10px;
    }
    .label-rs
    {
      font-size: 11pt;
      font-weight: lighter;
      color: black;
    }
    .label-ra
    {
      font-weight: lighter;
    }
    thead tr
    {
      background-color: gray;
      color: white;
      font-size: 7pt;
    }
    table
    {
          width: 110%;
    margin-left: -40px;
      
    }
     tr, td, th
    {
      border-bottom: 1px solid #c3c2c2;
      border-right: 1px solid #c3c2c2;
      
    }
    th
    {
    padding-left: 10px;
    text-align: center;
    padding-right: 10px;
    padding-bottom:  0PX;
    padding-top:  0PX;
    }
    table td
    {
      padding: 2px;

    }
    table
    {
      border-collapse: collapse;
      font-size: 7pt-,
    }
    .right-side ul
    {
      margin-left: 0px;
    }
    .logo-tvx 
    {
      margin-top: -112px;
      float: right;
    }
  </style>
    <div class="empty" id="calcular_tabla_contenido" style="padding: 40px;">
          
        </div>

  
</div>
<!--/Modal Calculador-->
<script>
$("#upload").click(function() {
    $(this).closest("form").attr("action", "test.php");     
    var fileUpload = $("#fileUpload")[0];
 
        //Check whether the file is valid Image.
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif)$");
        if (regex.test(fileUpload.value.toLowerCase())) {
            //Check whether HTML5 is supported.
            if (typeof (fileUpload.files) != "undefined") {
                //Initiate the FileReader object.
                var reader = new FileReader();
                //Read the contents of Image File.
                reader.readAsDataURL(fileUpload.files[0]);
                reader.onload = function (e) {
                    //Initiate the JavaScript Image object.
                    var image = new Image();
                    //Set the Base64 string return from FileReader as source.
                    image.src = e.target.result;
                    image.onload = function () {
                        //Determine the Height and Width.
                        var height = this.height;
                        var width = this.width;
                        if (height > 100 || width > 340) {
                            alert("Las dimensiones del logo no deben exceder de 340 de altura y 100 de anchura");
                            //$('#fileUpload').showError('error message');
                            return false;
                        }else{
                                         
                           //alert("Uploaded image has valid Height and Width.");
                        $('.stepper').submitStepper();
                        return true;
                        }
                    };
                }
            } else {
                alert("This browser does not support HTML5.");
                return false;
            }
        } else {
            alert("Por favor, ingrese una imagen valida.");
            return false;
        }
});
$("#send").click(function() {
    $(this).closest("form").attr("action", "send_quote.php");     
        var fileUpload = $("#fileUpload")[0];
 
        //Check whether the file is valid Image.
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif)$");
        if (regex.test(fileUpload.value.toLowerCase())) {
            //Check whether HTML5 is supported.
            if (typeof (fileUpload.files) != "undefined") {
                //Initiate the FileReader object.
                var reader = new FileReader();
                //Read the contents of Image File.
                reader.readAsDataURL(fileUpload.files[0]);
                reader.onload = function (e) {
                    //Initiate the JavaScript Image object.
                    var image = new Image();
                    //Set the Base64 string return from FileReader as source.
                    image.src = e.target.result;
                    image.onload = function () {
                        //Determine the Height and Width.
                        var height = this.height;
                        var width = this.width;
                        if (height > 100 || width > 340) {
                            alert("Las dimensiones del logo no deben exceder de 340 de altura y 100 de anchura");
                            //$('#fileUpload').showError('error message');
                            return false;
                        }else{
                                                
                           //alert("Uploaded image has valid Height and Width.");
                        $('.stepper').submitStepper();
                        return true;
                        }
                    };
                }
            } else {
                alert("This browser does not support HTML5.");
                return false;
            }
        } else {
            alert("Por favor, ingrese una imagen valida.");
            return false;
        }
});



  $('.datepicker').pickadate({
     //firstDay: true
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
  $('.datepicker').pickadate({
        firstDay: true
    });
$(function(){
   $('.stepper').activateStepper();
});

  $(document).ready(function() {
    $('select').material_select();
  });

</script>
</body>
</html>