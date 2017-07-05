$(document).ready(function() {

    var $op1 = $('#op1').hide();
    var $op2 = $('#op2').hide();
    var $op3 = $('#op3').hide();
    var $addEquipos = $('.addEquipo').hide();

    $('#id_application_method').change(function() 
    {
        var selectedValue = $(this).val();

        if(selectedValue  === 'A') 
        {
            $(".content").children().hide();
            $op1.show();        
            $addEquipos.show();    
            $('.op_equipo').val('1');
            $('.op_lic').val('0');
            $('.op_ubsomart').val('0');
        
        }else if (selectedValue === 'B') 
        {
            $(".content").children().hide();
            $('.op_equipo').val('0');
            $('.op_lic').val('1');
            $('.op_ubsmart').val('0');
            $op2.show();
            
        }else if (selectedValue === 'C') 
        {
            $(".content").children().hide();
            $('.op_equipo').val('0');
            $('.op_lic').val('0');
            $('.op_ubsmart').val('1');
            $op3.show();

        }
        else {
            $aerialTr.hide();
            $groundSprayTr.hide();
        }
    });

    //Ejecucion de funciones
    $(function() 
    {
        enable_tvx();
        $("#tvx-group").click(enable_tvx);
    });
    
    $(function() 
    {
        enable_evi();
        $("#evi-group").click(enable_evi);
    });

    $(function() 
    {
        enable_mctrl();
        $("#mctrl-group").click(enable_mctrl);
    });
       
    $(function() 
    {
        enable_tcall();
        $("#tcall-group").click(enable_tcall);
    });

//Funciones de licencias activ - disable
    function enable_tvx() 
    {     
        if (this.checked) 
        {
            $("input#tvx-group-op").removeAttr("disabled");
            $("input#tvx-group-op").attr("required", true);
        }else 
        {
            $("input#tvx-group-op").attr("disabled", true);
            $("input#tvx-group-op").removeAttr("required");
            $('input#tvx-group-op').removeClass('invalid');
            $("input#tvx-group-op").val("");
            $('input#tvx-group-op').removeClass('valid');
        }
    }
     
    function enable_evi() 
    {
        if (this.checked) 
        {
            $("input#evi-group-op").removeAttr("disabled");
            $("input#evi-group-op").attr("required", true);
        } else 
        {
            $("input#evi-group-op").attr("disabled", true);
            $("input#evi-group-op").removeAttr("required");
            $('input#evi-group-op').removeClass('invalid');
            $("input#evi-group-op").val("");
            $('input#evi-group-op').removeClass('valid');
        }
    }

    function enable_tcall() 
    {
        if (this.checked) 
        {
            $("input#tcall-group-op").removeAttr("disabled");
            $("input#tcall-group-op").attr("required", true);
        } else 
        {
            $("input#tcall-group-op").attr("disabled", true);
            $("input#tcall-group-op").removeAttr("required");
            $('input#tcall-group-op').removeClass('invalid');
            $("input#tcall-group-op").val("");
            $('input#tcall-group-op').removeClass('valid');

        }
    }
    
    function enable_mctrl() 
    {
        if (this.checked) 
        {
            $("input#mctrl-group-op").removeAttr("disabled");
            $("input#mctrl-group-op").attr("required", true);
        } else 
        {
            $("input#mctrl-group-op").attr("disabled", true);
            $("input#mctrl-group-op").removeAttr("required");
            $('input#mctrl-group-op').removeClass('invalid');
            $("input#mctrl-group-op").val("");
            $('input#mctrl-group-op').removeClass('valid');
        }
    }
    
    var equipment_array = ['TVX125', 'TVX310', 'TVX740', 'TVXS88', 'OUTERFONE - S17', 'OUTERFONE - S18'];
 	var equipment_img = [];


 
	$.each(equipment_array, function(val, text) {
		$('#equipos').append( $('<option></option>').val(val).html(text) )
	}); 
 var n = 0;
$('.add').click(function() {
    n++;
    $('#op1:last').after('<div class="row" id="op1" style="margin-bottom: 50px;"><div  class="col s12 blue-tvx "><a  class="right btn-floating btn-small red pulse remove delete"><i class="material-icons">delete</i></a><h5 class="white-text text-white"> SELECCIONE SUS OPCIONES </h5></div><input type="hidden" name="id" value="1"><div class="input-field col s6" ><input  name="data[select'+n+'][cantidad_eq]" type="number" min="0" max="999" class="validate paquetes" required><label for="password">Cantidad de equipos</label></div><div class="input-field col s6 " ><select class="icons browser-default paquetes"  required id="equipos" name="data[select'+n+'][equipo]"><option value="" disabled selected>Equipo</option><option value="TVX125">TVX125</option><option value="TVX310">TVX310</option><option value="TVX740">TVX740</option><option value="TVX730" >TVX730</option><option value="TVX588d">TVX588d</option><option value="TVX588A" >TVX588A</option><option value="TVX887" >TVX887</option></select><label></label></div><div class="input-field col s12" style="padding-bottom: 15px;"><label >Licencias:</label></div><div class="input-field col s6" ><p><input  type="checkbox" id="test5'+n+'" name="data[select'+n+'][tvx]" class="paquetes" /><label for="test5'+n+'">TeamVOX</label></p><p><input  type="checkbox" id="test6'+n+'" name="data[select'+n+'][evi]" class="paquetes" /><label for="test6'+n+'">Evidence</label></p><p><input  type="checkbox" id="test7'+n+'"  name="data[select'+n+'][mctrl]" class="paquetes" /><label for="test7'+n+'">MobiControl</label></p><p><input  type="checkbox" id="test8'+n+'"  name="data[select'+n+'][tcall]" class="paquetes" /><label for="test8'+n+'">TrustCall</label></p></div><div class="input-field col s6" ><input id="" name="data[select'+n+'][activ]" type="number" min="0" max="350" class="validate paquetes" required><label for="activacion">Monto de activación para licencias</label></div><div class="input-field col s6"><select class="browser-default paquetes" name="data[select'+n+'][plan]" id=""><optgroup label="Plan datos"> <option selected="true" disabled="disabled">Planes </option><option value="22">Plan de datos 1 MB $  33.62 MXN</option><option value="23">Plan de datos 2 MB $  50.86 MXN</option><option value="24">Plan de datos 3 MB $  59.48 MXN</option> <option value="25">Plan de datos 5 MB $  64.66 MXN</option><option value="26">Plan de datos 10 MB $  76.72 MXN</option><option value="1">Plan de datos 50 MB $  85.34 MXN</option><option value="2">Plan de datos 100 MB  $ 93.97 MXN</option><option value="3">Plan de datos 400 MB  $ 145.69 MXN</option><option value="4">Plan de datos 500 MB  $ 162.93 MXN</option><option value="5">Plan de datos 1 GB  $ 206.03 MXN</option><option value="6">Plan de datos 2 GB  $ 231.90 MXN</option><option value="7">Plan de datos 3 GB  $ 289.00 MXN</option><option value="8">Plan de datos 5 GB  $ 369.83 MXN</option><option value="18">Plan de datos 10 GB  $ 499.14 MXN</option><option value="19">Plan de datos 15 GB  $ 800.86 MXN</option><option value="20">Plan de datos 20 GB  $ 1016.38 MXN</option><option value="21">Plan de datos 30 GB  $ 1447.41 MXN</option></optgroup><optgroup label="Plan voz y datos"><option value="9">TELCEL MAX SIN LIMITE 1000 4G (1.75 GB) $ 171.55 MXN</option><option value="10">TELCEL MAX SIN LIMITE 1500 4G (2.25 GB) $ 206.03 MXN</option><option value="11">TELCEL MAX SIN LIMITE 2000 4G (2.75 GB) $ 275.76 MXN</option><option value="12">TELCEL MAX SIN LIMITE 3000 4G (3.75 GB) $ 343.97 MXN</option><option value="13">TELCEL MAX SIN LIMITE 5000 4G (5.75 GB) $ 430.17 MXN</option><option value="14">TELCEL MAX SIN LIMITE 6000 4G (7.75 GB) $ 516.38 MXN</option><option value="15">TELCEL MAX SIN LIMITE 7000 4G (8.75 GB) $ 688.79 MXN</option><option value="16">TELCEL MAX SIN LIMITE 9000 4G (11.50 GB) $ 904.31 MXN</option><option value="17">TELCEL MAX SIN LIMITE 12000 4G (15.50 GB) $ 162.93 MXN</option></optgroup></select><label></label></div><div class="input-field col s6"><select class="icons browser-default paquetes" id="" required name="data[select'+n+'][plazo]" id=""><option selected="true" disabled="disabled">Plazo</option> <option value="6">6</option><option value="12">12</option><option value="24">24</option><option value="36">36</option></select><label></label></div><div class="divider"></div></div>');
});
 
$(".remodal-close").on("click", function(){
    $(".r").remove();
    $(".empty").empty();
});
 
$('.content').on('click','.remove',function() {
    $(this).closest("#op1").remove();
});
       


        $('body').on('click', '.prev_final', function(){
            // Get the form data. This serializes the entire form. pritty easy huh!
            var form = new FormData($('#quote_form')[0]);
            console.log(form)
            // Make the ajax call
            $.ajax({
                url: 'php/prev_eq.php',
                type: 'POST',
                dataType: 'json',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    if(myXhr.upload){
                        myXhr.upload.addEventListener('progress',progress, false);
                    }
                    
                    return myXhr;
                },
                //add beforesend handler to validate or something
                //beforeSend: functionname,
                success: function (res) {

                    console.log(res.data);
                    console.log(res);
                    var response_global = res.global;
                    var img = $('<img class="r" src="uploads/'+response_global.logo+'"></img>');
                    $(".logo_prev").append(img);
                       $.each(res.data, function(key, value) {
                        
                        var tabla_contenido = $('<p>DETALLE PAGO INICIAL - ÚNICA VEZ </p><table><thead><tr><th style="">DESCRIPCIÓN</th><th>CANTIDAD</th><th>PRECIO/UD.</th><th>IMPORTE</th></tr></thead><tbody><tr><td>ACTIVACIÓN / CONFIGURACIÓN DE USUARIOS  Y GRUPOS<p></td><td align="center">'
                            +value.cantidad+'</td><td align="right">$ ' 
                            +value.activacion_unitaria+'</td><td align="right">$ '
                            +value.activacion_total+'</td></tr><tr><td>ENGANCHE</td><td align="center">'
                            +value.cantidad+'</td><td align="right">$ '
                            +value.enganche_unitario+'</td><td align="right">$ '
                            +value.enganche_total+'</td></tr><tr><td>'
                            +value.descripcion_paquete+'</td><td align="center">'
                            +value.cantidad+'</td><td align="right">$ '
                            +value.mensualidad_unitaria+'</td><td align="right">$ '
                            +value.mensualidad_total+'</td></tr><tr><td colspan="3" align="right"> Subtotal</td><td align="right">$ '
                            +value.subtotal+'</td></tr><tr><td colspan="3" align="right"> Impuestos 16.00%</td><td align="right">$ '
                            +value.iva+'</td></tr><tr style="background-color: #d0d0d0; border-top: 5px solid #656464;"><td colspan="3" align="right"> Total</td><td align="right">$ '
                            +value.total_primer_pago+'</td></tr><tr></tbody></table><p>Los precios son expresados en: Pesos Mexicanos</p><p>DETALLE PAGO MENSUAL</p><table><thead><tr><th>DESCRIPCIÓN</th><th>CANTIDAD</th><th>PRECIO/UD.</th><th>IMPORTE</th></tr></thead><tbody><tr><td>'
                            +value.descripcion_paquete+'</td><td align="center">'
                            +value.cantidad+'</td><td align="right">$ '
                            +value.mensualidad_unitaria+'</td><td align="right">$ '
                            +value.mensualidad_total+'</td></tr><tr><td colspan="3" align="right"> Subtotal</td><td align="right">$ '
                            +value.mensualidad_total+'</td></tr><tr><td colspan="3" align="right"> Impuestos 16.00%</td><td align="right">$ '
                            +value.iva_mensual+'</td></tr><tr style="background-color: #d0d0d0; border-top: 5px solid #656464;"><td colspan="3" align="right"> Total</td><td align="right">$ '
                            +value.iva_mensual_total+'</td></tr></tbody></table><br><br><br>');





                        $("#prev_tabla_contenido").append(tabla_contenido);
                        console.log(tabla_contenido);

                    });
                  //RA
                    var ra_telefono_mov = $ ('#ra_telefono_mov').val();
                    var ra_telefono = $('#ra_telefono').val();
                    var ra_nombre = $("#ra_nombre").val();
                    var ra_razon_social = $('#razon_social').val();   
                    var direccion = $('#ra_direccion').val();               
                    var ra_cp = $('#cp').val();
                    var ra_colonia = $('#colonia').val();
                    var ra_estado = $('#ra_estado').val();
                    var ra_ciudad = $('#ra_ciudad').val();                                      
                    var ra_delegacion = $('#ra_del').val();
                    var ra_correo = $('#ra_correo').val();
                    var ra_web = $('#ra_web').val();

                    var doc_titulo = $("#doc_titulo").val();
                    var doc_descripcion = $('#doc_descripcion').val();
                    var doc_registro_op = $('#doc_registro_op').val();
                    var doc_representante = $('#doc_representante').val();
                    var doc_terminos = $('#doc_terminos').val();
                    
                    //Cliente
                    //var cli_razon_social = $('#razon_social_cliente').val();
                    //var cli_rfc = $('#rfc_cliente').val();                   
                    var cli_nombre = $('#nombre_cliente').val();
                    var cli_direccion = $('#direccion_cliente').val();
                    var cli_colonia = $('#cli_colonia').val();
                    var cli_estado = $('#cli_estado').val();
                    var cli_ciudad = $('#cli_ciudad').val();
                    var cli_cp = $('#cliente_cp').val();
                    var cli_telefono = $('#tel_cliente').val();
                    var fecha = $('#fecha_del_docum').val();
                   
                    $('#prev_ra_telefono_mov').append(ra_telefono_mov);
                    $('#prev_ra_direccion').append(direccion);
                    $('#prev_ra_colonia').append('Col. '+ra_colonia);
                    $('#prev_ra_rs').append(ra_razon_social);
                    $('.prev_ra_rs').append(ra_razon_social);
                    $('#prev_ciu_est_cp').append(ra_ciudad+', '+ra_estado+ '<br>C.P. '+ra_cp);
                    $('#prev_ra_tel').append(ra_telefono);
                    $('#prev_ra_nombre').append(ra_nombre);
                    $('.prev_ra_nombre').append(ra_nombre);
                    $('#prev_web').append(ra_web);
                    $('#prev_titulo').append('<label>TÍTULO DEL PROYECTO: </label>'+doc_titulo);
                    $('#prev_descripcion').append('<label>DESCRIPCIÓN DE PROYECTO: </label>'+doc_descripcion);
                    $('#prev_registro_op').append('<label>REGISTRO DE OPORTUNIDAD: </label>'+doc_registro_op);
                    $('#prev_representante').append('<label>REPRESENTANTE: </label>'+doc_representante);
                    $('#prev_terminos').append('<label>TÉRMINOS: </label>'+doc_terminos);


                    $('#prev_fecha').append(fecha);
                    $('#prev_cli_nombre').append(cli_nombre);
                    $('#prev_cli_direccion').append(cli_direccion);
                    $('#prev_cli_colonia').append('Col. '+cli_colonia);
                    $('#prev_cli_cp_ciu_est').append('C.P. '+cli_cp+' '+cli_ciudad+', '+cli_estado);




                },
                 error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                   
                },
                //add error handler for when a error occurs if you want!
                //error: errorfunction,
                data: form,
                // this is the important stuf you need to overide the usual post behavior
                cache: false,
                contentType: false,
                processData: false
            });
        });
         function progress(e){
        if(e.lengthComputable){
            //this makes a nice fancy progress bar
            $('progress').attr({value:e.loaded,max:e.total});
        }
    }


      $('body').on('click', '.calcular', function(){
        var n = 0;
            // Get the form data. This serializes the entire form. pritty easy huh!
            var form = new FormData($('#quote_form')[0]);
            for (var pair of form.entries()) {
    console.log(pair[0]+ ', ' + pair[1]); 
}
            // Make the ajax call
            $.ajax({
                url: 'php/calculador.php',
                type: 'POST',
                dataType: 'json',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    if(myXhr.upload){
                        myXhr.upload.addEventListener('progress',progress, false);
                    }
                    
                    return myXhr;
                },
                //add beforesend handler to validate or something
                //beforeSend: functionname,
                success: function (res) {

                    console.log(res.data);
                    console.log(res);
                    var response_global = res.global;
                       $.each(res.data, function(key, value) {
                        n++;
                        var tabla_contenido = $('<p style="background-color: orange; color: white;">Paquete #'+n+'</p><p>DETALLE PAGO INICIAL - ÚNICA VEZ </p><table style="font-size: 7pt;"><thead><tr><th style="">DESCRIPCIÓN</th><th>CANTIDAD</th><th>PRECIO/UD.</th><th>IMPORTE</th></tr></thead><tbody><tr><td>ACTIVACIÓN / CONFIGURACIÓN DE USUARIOS  Y GRUPOS<p></td><td style="text-align: center">'
                            +value.cantidad+'</td><td style="text-align: right">$ ' 
                            +value.activacion_unitaria+'</td><td style="text-align: right">$ '
                            +value.activacion_total+'</td></tr><tr><td>ENGANCHE</td><td style="text-align: center">'
                            +value.cantidad+'</td><td style="text-align: right">$ '
                            +value.enganche_unitario+'</td><td style="text-align: right">$ '
                            +value.enganche_total+'</td></tr><tr><td>'
                            +value.descripcion_paquete+'</td><td style="text-align: center">'
                            +value.cantidad+'</td><td style="text-align: right">$ '
                            +value.mensualidad_unitaria+'</td><td style="text-align: right">$ '
                            +value.mensualidad_total+'</td></tr><tr><td colspan="3" style="text-align: right"> Subtotal</td><td style="text-align: right">$ '
                            +value.subtotal+'</td></tr><tr><td colspan="3" style="text-align: right"> Impuestos 16.00%</td><td style="text-align: right">$ '
                            +value.iva+'</td></tr><tr style="background-color: #d0d0d0; border-top: 5px solid #656464;"><td colspan="3" style="text-align: right"> Total</td><td style="text-align: right">$ '
                            +value.total_primer_pago+'</td></tr><tr></tbody></table><p>Los precios son expresados en: Pesos Mexicanos</p><p>DETALLE PAGO MENSUAL</p><table style="font-size: 7pt;"><thead><tr><th>DESCRIPCIÓN</th><th>CANTIDAD</th><th>PRECIO/UD.</th><th>IMPORTE</th></tr></thead><tbody><tr><td>'
                            +value.descripcion_paquete+'</td><td style="text-align: center">'
                            +value.cantidad+'</td><td style="text-align: right">$ '
                            +value.mensualidad_unitaria+'</td><td style="text-align: right">$ '
                            +value.mensualidad_total+'</td></tr><tr><td colspan="3" style="text-align: right"> Subtotal</td><td style="text-align: right">$ '
                            +value.mensualidad_total+'</td></tr><tr><td colspan="3" style="text-align: right"> Impuestos 16.00%</td><td style="text-align: right">$ '
                            +value.iva_mensual+'</td></tr><tr style="background-color: #d0d0d0; border-top: 5px solid #656464;"><td colspan="3" style="text-align: right"> Total</td><td style="text-align: right">$ '
                            +value.iva_mensual_total+'</td></tr></tbody></table><br><br><br>');





                        $("#calcular_tabla_contenido").append(tabla_contenido);
                        console.log(tabla_contenido);

                    });

                },
                 error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                   
                },
                //add error handler for when a error occurs if you want!
                //error: errorfunction,
                data: form,
                // this is the important stuf you need to overide the usual post behavior
                cache: false,
                contentType: false,
                processData: false
            });
        });
         function progress(e){
        if(e.lengthComputable){
            //this makes a nice fancy progress bar
            $('progress').attr({value:e.loaded,max:e.total});
        }
    }


$('.optionBox').on('click','.remove',function() {
    $(this).parent().fadeOut("slow");
});
 

    var states =  [
    'AGUASCALIENTES',
    'BAJA CALIFORNIA NORTE',
    'BAJA CALIFORNIA SUR',
    'COAHUILA',
    'CHIHUAHUA',
    'COLIMA',
    'CAMPECHE',
    'CHIAPAS',
    'DISTRITO FEDERAL',
    'DURANGO',
    'GUERRERO',
    'GUANAJUATO',
    'HIDALGO',
    'JALISCO',
    'MICHOACAN',
    'MORELOS',
    'MEXICO',
    'NAYARIT',
    'NUEVO LEON',
    'OAXACA',
    'PUEBLA',
    'QUERETARO',
    'QUINTANA ROO',
    'SINALOA',
    'SAN LUIS POTOSI',
    'SONORA',
    'TAMAULIPAS',
    'TABASCO',
    'TLAXCALA',
    'VERACRUZ',
    'YUCATAN',
    'ZACATECAS'
    ]

    $.each(states, function(val, text) {
        $('#ra_estado').append( $('<option></option>').val(text).html(text) )
    }); 
      $.each(states, function(val, text) {
        $('#cli_estado').append( $('<option></option>').val(text).html(text) )
    }); 







});









