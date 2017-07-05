<?php 
//echo json_encode($_POST);

  $from   = 'USD'; 
    $to     = 'MXN';
    $url = 'http://finance.yahoo.com/d/quotes.csv?e=.csv&f=sl1d1t1&s='. $from . $to .'=X';
    $handle = fopen($url, 'r');
 
    if ($handle) {
        $result = fgets($handle, 4096);
        fclose($handle);
    }
 
    $allData = explode(',',$result); 
    $currencyValue = $allData[1];
    $currencyValue = $currencyValue * 1.05;
    $currencyValue = round($currencyValue, 2, PHP_ROUND_HALF_UP);
  //$currencyValue = 23.50;

  /*Equipos Ubiqo Smart*/
  $eq_ubiqo_smart = 200.00; //USD
  $kit_instalacion = 120.00;  //USD
  $btn_panico = 70.00;  //USD
  $rf_maestro = 200.00; //USD
  $plataforma = 55.00; //MXN

  /*Termina Ubiqo Smart*/
    
  //NOrmal
  $TVX588A = 180.00;  
  $TVX730 = 235.00;
  $TVX125 = 120.00; 
  $TVX887 = 140.00;
  $TVX310 = 125.00; 
  $TVX740 = 265.00;
  $TVX588d = 275.00;
  $TVX588A = 180.00;
  //Precio Publico
  $TVX588A_Pub = 321.00;
  $TVX730_Pub = 419.00;
  $TVX740_Pub = 473.21;
  $TVX125_Pub = 223.00;
  $TVX310_Pub = 255.00;
  $TVX588d_Pub = 561.50;
  $TVX887_Pub = 284.00;
  
   $activ = 0; 
   //TVX equipos
   $eq_tvx = 7.73 * $currencyValue;    
   $eq_MOBICONTROL = 4.29 * $currencyValue;
   $eq_EVIDENCE = 7.52 * $currencyValue;   
    $eq_TRUSTCALL = 36.50 * $currencyValue;
   //Tvx solo licencias


   $tvx = 199.00;    
   $MOBICONTROL = 129;
   $EVIDENCE = 199;   
   $TRUSTCALL = 235;

//planes Datos
   $pd1M = 33.62;
   $pd2M = 50.86;
   $pd3M = 59.48;
   $pd5M = 64.66;
   $pd10M = 76.72;
  $pd50 = 85.34;
  $pd100 = 93.97;
  $pd400 = 145.69;
  $pd500 = 162.93;
  $pd1 = 206.03;
  $pd2 = 231.90;
  $pd3 = 249.14;
  $pd5 = 369.83;
  $pd10 = 499.14;
  $pd15 = 800.86;
  $pd20 = 1016.38;
  $pd30 = 1447.41;

  $pdv1000 = 171.55;
  $pdv1500 = 206.03;
  $pdv2000 = 257.76;
  $pdv3000 = 343.97;
  $pdv5000 = 430.17;
  $pdv6000 = 516.38;
  $pdv7000 = 688.79;
  $pdv9000 = 861.21;
  $pdv12000 = 1119.83;

  $ra_logo = "";
    $rs_ra = "";
    $ra_calle = "";
    $ra_col = "";
    $ra_num_ext = "";
    $ra_ciu = "";
    $ra_estado = "";
    $cli_nombre = "";
    $cli_cargo = "";
    $cli_telefono = "";
    $cli_area = "";
    $cli_mail = "";
    $folio = "1";
    $fecha = "";
    $ra_nom = "";
    $ra_tel = "";
    $ra_web = "";
    $ra_correo = "";
    $ra_cp = "";
    $ra_direccion = "";
    $cli_ciudad = "";
    $cli_estado = "";
    $n_fecha = "";
    $cli_colonia = "";

    $length = 25;
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $k = substr( str_shuffle( $chars ), 0, $length );

 $tabla_contenido = "";
 $global_total = 0.00;
            $global_subtotal = 0.00;

$response[] = array('empty' => 0);
    if($_POST)
    {
    if ($_POST["licencias"] == 1) 
      {
          
          if (isset($_POST['data']['select']['tvx_lic']) && ($_POST['data']['select']['tvx_cant'] > 0)) {
              $cantidad = $_POST['data']['select']['tvx_cant'];
              $activ = $_POST['data']['select']['tvx_activ'];
              //$total = ($cantidad * $tvx)* $currencyValue;
              $tarifa_uni = $tvx * $currencyValue;

              //$roundmensualidad = round($total, 2);
              //$round_tarifa_uni = round($tarifa_uni, 2);
              if ($tarifa_uni > 199) {
                $tarifa_uni = 199;
              }
              //Nuevo total no pasa de 199
              $total_mensual = ($cantidad * $tarifa_uni);
              $round_activ = round($activ);
              $total_activ = $round_activ * $cantidad;

              $subtotal = $total_activ + $total_mensual;
                $iva = $subtotal* 0.16;
                $prim_pago = $subtotal+$iva;

                $r_iva = round($iva, 2, PHP_ROUND_HALF_UP);
                $r_prim_pago = round($prim_pago, 2, PHP_ROUND_HALF_UP);

                $global_total = $global_total + $r_prim_pago;
                $global_subtotal = $global_subtotal + $subtotal;  

                $iva_mensual = $total_mensual * 0.16;
                $round_iva_mensual = round($iva_mensual, 2, PHP_ROUND_HALF_UP);
                $total_mensual_mas_iva = $total_mensual + $round_iva_mensual;

              $response["data"][] = 
              array('descripcion_paquete' => '<p> Licencia TeamVOX Básico Radio PTT Ilimitado, Grupos Ilimitados, Usuarios Ilimitados.  Cobertura Nacional e Internacional, GPS, Consola de Despacho para rastreo de Unidades. </p>',
                'mensualidad_unitaria' => number_format($tarifa_uni, 2, '.', ','),
                  'cantidad' => $cantidad,
                  'mensualidad_total' => number_format($total_mensual, 2, '.', ','),
                  'activacion_unitaria' => number_format($round_activ, 2, '.', ','),
                  'enganche_unitario' => 0, 
                  'enganche_total' => 0,
                  'activacion_total' => number_format($total_activ, 2, '.', ','),
                  'subtotal' => number_format($subtotal, 2, '.', ','),
                  'iva' => number_format($r_iva, 2, '.', ','),
                  'total_primer_pago' => number_format($r_prim_pago, 2, '.', ','),
                  'iva_mensual' => number_format($round_iva_mensual, 2, '.', ','),
                  'iva_mensual_total' => number_format($total_mensual_mas_iva, 2, '.', ','), 
               

                  );
              
           
          }if (isset($_POST['data']['select']['mctrl_lic']) && ($_POST['data']['select']['mctrl_cant'] > 0)) {

               $cantidad = $_POST['data']['select']['mctrl_cant'];
              $activ = $_POST['data']['select']['mctrl_activ'];
              $total = ($cantidad * $MOBICONTROL)* $currencyValue;
              $tarifa_uni = $MOBICONTROL * $currencyValue;


              $roundmensualidad = round($total, 2, PHP_ROUND_HALF_UP);
              $round_tarifa_uni = round($tarifa_uni, 2, PHP_ROUND_HALF_UP);
              $round_activ = round($activ, 2, PHP_ROUND_HALF_UP);
              $total_activ = $round_activ * $cantidad;

              $subtotal = $total_activ + $roundmensualidad;
                $iva = $subtotal* 0.16;
                $prim_pago = $subtotal+$iva;

                $r_iva = round($iva, 2, PHP_ROUND_HALF_UP);
                $r_prim_pago = round($prim_pago, 2, PHP_ROUND_HALF_UP);

                $global_total = $global_total + $r_prim_pago;
                $global_subtotal = $global_subtotal + $subtotal;


                $iva_mensual = $total_mensual * 0.16;
                $round_iva_mensual = round($iva_mensual, 2, PHP_ROUND_HALF_UP);
                $total_mensual_mas_iva = $total_mensual + $round_iva_mensual;

                      $response["data"][] = 
              array('descripcion_paquete' => '<p> Licencia Mobicontrol (Administración dispositivos móviles y sus aplicaciones, contenido y seguridad. ) </p>',
                'mensualidad_unitaria' => number_format($tarifa_uni, 2, '.', ','),
                  'cantidad' => $cantidad,
                  'mensualidad_total' => number_format($total_mensual, 2, '.', ','),
                  'activacion_unitaria' => number_format($round_activ, 2, '.', ','),
                  'enganche_unitario' => 0, 
                  'enganche_total' => 0,
                  'activacion_total' => number_format($total_activ, 2, '.', ','),
                  'subtotal' => number_format($subtotal, 2, '.', ','),
                  'iva' => number_format($r_iva, 2, '.', ','),
                  'total_primer_pago' => number_format($r_prim_pago, 2, '.', ','),
                  'iva_mensual' => number_format($round_iva_mensual, 2, '.', ','),
                  'iva_mensual_total' => number_format($total_mensual_mas_iva, 2, '.', ','), 
               

                  );
              
          }
        if (isset($_POST['data']['select']['evi_lic']) && ($_POST['data']['select']['evi_cant'] > 0)) {
              $cantidad = $_POST['data']['select']['evi_cant'];
              $activ = $_POST['data']['select']['evi_activ'];
              //$total = ($cantidad * $tvx)* $currencyValue;
              $tarifa_uni = $EVIDENCE * $currencyValue;

              //$roundmensualidad = round($total, 2);
              //$round_tarifa_uni = round($tarifa_uni, 2);
              if ($tarifa_uni > 199) {
                $tarifa_uni = 199;
              }
              //Nuevo total no pasa de 199
              $total_mensual = ($cantidad * $tarifa_uni);
              $round_activ = round($activ, 2, PHP_ROUND_HALF_UP);
              $total_activ = $round_activ * $cantidad;

              $subtotal = $total_activ + $total_mensual;
                $iva = $subtotal* 0.16;
                $prim_pago = $subtotal+$iva;

                $r_iva = round($iva, 2, PHP_ROUND_HALF_UP);
                $r_prim_pago = round($prim_pago, 2, PHP_ROUND_HALF_UP);

                 $global_total = $global_total + $r_prim_pago;
                $global_subtotal = $global_subtotal + $subtotal;


                $iva_mensual = $total_mensual * 0.16;
                $round_iva_mensual = round($iva_mensual, 2, PHP_ROUND_HALF_UP);
                $total_mensual_mas_iva = $total_mensual + $round_iva_mensual;


              $response["data"][] = 
              array('descripcion_paquete' => '<p> Licencia Evidence Básico Radio PTT Ilimitado, Grupos Ilimitados, Usuarios Ilimitados.  Cobertura Nacional e Internacional, GPS, Consola de Despacho para rastreo de Unidades. </p>',
                'mensualidad_unitaria' => number_format($tarifa_uni, 2, '.', ','),
                  'cantidad' => $cantidad,
                  'mensualidad_total' => number_format($total_mensual, 2, '.', ','),
                  'activacion_unitaria' => number_format($round_activ, 2, '.', ','),
                  'enganche_unitario' => 0, 
                  'enganche_total' => 0,
                  'activacion_total' => number_format($total_activ, 2, '.', ','),
                  'subtotal' => number_format($subtotal, 2, '.', ','),
                  'iva' => number_format($r_iva, 2, '.', ','),
                  'total_primer_pago' => number_format($r_prim_pago, 2, '.', ','),
                  'iva_mensual' => number_format($round_iva_mensual, 2, '.', ','),
                  'iva_mensual_total' => number_format($total_mensual_mas_iva, 2, '.', ','), 
               

                  );

          }if (isset($_POST['data']['select']['tcall_lic']) && ($_POST['data']['select']['tcall_cant'] > 0)) {

               $cantidad = $_POST['data']['select']['tcall_cant'];
              $activ = $_POST['data']['select']['tcall_activ'];
              $total = ($cantidad * $TRUSTCALL)* $currencyValue;
              $tarifa_uni = $TRUSTCALL * $currencyValue;


              $roundmensualidad = round($total, 2, PHP_ROUND_HALF_UP);
              $round_tarifa_uni = round($tarifa_uni, 2, PHP_ROUND_HALF_UP);
              $round_activ = round($activ, 2, PHP_ROUND_HALF_UP);
              $total_activ = $round_activ * $cantidad;

              $subtotal = $total_activ + $roundmensualidad;
                $iva = $subtotal* 0.16;
                $prim_pago = $subtotal+$iva;

                 $global_total = $global_total + $r_prim_pago;
                $global_subtotal = $global_subtotal + $subtotal;

                
                $iva_mensual = $total_mensual * 0.16;
                $round_iva_mensual = round($iva_mensual, 2, PHP_ROUND_HALF_UP);
                $total_mensual_mas_iva = $total_mensual + $round_iva_mensual;

                $r_iva = round($iva, 2, PHP_ROUND_HALF_UP);
                $r_prim_pago = round($prim_pago, 2, PHP_ROUND_HALF_UP);
                  $response["data"][] = 
                  $response["data"][] = 
              array('descripcion_paquete' => '<p>Licencia TrustCall (Encripción de llamadas de Voz y mensajería de textos AES256bits)</p>',
                'mensualidad_unitaria' => number_format($tarifa_uni, 2, '.', ','),
                  'cantidad' => $cantidad,
                  'mensualidad_total' => number_format($total_mensual, 2, '.', ','),
                  'activacion_unitaria' => number_format($round_activ, 2, '.', ','),
                  'enganche_unitario' => 0, 
                  'enganche_total' => 0,
                  'activacion_total' => number_format($total_activ, 2, '.', ','),
                  'subtotal' => number_format($subtotal, 2, '.', ','),
                  'iva' => number_format($r_iva, 2, '.', ','),
                  'total_primer_pago' => number_format($r_prim_pago, 2, '.', ','),
                  'iva_mensual' => number_format($round_iva_mensual, 2, '.', ','),
                  'iva_mensual_total' => number_format($total_mensual_mas_iva, 2, '.', ','), 
               

                  );
          }


        }//Inicia Calculador de equipos
        elseif ($_POST["equipos"] == 1) {
          
            
            foreach ($_POST["data"] as $v)
            {   
              
              
                
            $act_tot = 0.00;
          $eng_uni = 0;
          $subtotal = 0;
          $iva = 0;
          $prim_pago = 0;
                  



              $monto_financiar = 0;  
              $costo_equipo = 0;
            $plan = "";
              $tarifa_unitaria = 0;
              $activ = 0;
            $enganche = 0;
              $costo_licencias = 0;
            $total_plan = 0;
              $total_mensual = 0;
              $base_de_renta = 0;
              $mensualidad_equipo = 0;
              $mensualidad_total = 0;
              $precio_publico_eq = 0;

               if(isset($v['plan'])) {
                $plan = $v['plan'];

              } 
              if (isset($v['activ'])) {
                $activ = $v['activ'];
              }
              if (isset($v['plazo'])) {
                $plazo_contrato = $v['plazo'];
              }
              if (isset($v['cantidad_eq'])) {
                $cantidad = $v['cantidad_eq'];
              }
              if (isset($v['equipo'])) {
                 $equipo = $v['equipo'];
              }
              
              $descripcion_paquete = "";
              //$descripcion_paquete = "EQUIPO ".$equipo;
              if (isset($v['tvx'])) {
                $descripcion_paquete = $descripcion_paquete."<p> Licencia TeamVOX Básico Radio PTT Ilimitado, Grupos Ilimitados, Usuarios Ilimitados.  Cobertura Nacional e Internacional, GPS, Consola de Despacho para rastreo de Unidades. </p>";
                $costo_licencias = $costo_licencias + $eq_tvx;
              }
              if (isset($v['evi'])) {
                $descripcion_paquete = $descripcion_paquete."<p> Licencia Evidence Básico Radio PTT Ilimitado, Grupos Ilimitados, Usuarios Ilimitados.  Cobertura Nacional e Internacional, GPS, Consola de Despacho para rastreo de Unidades. </p>";
                $costo_licencias = $costo_licencias + $eq_EVIDENCE;
              }
              if (isset($v['mctrl'])) {
                $descripcion_paquete = $descripcion_paquete."<p> Licencia Mobicontrol (Administración dispositivos móviles y sus aplicaciones, contenido y seguridad. ) </p>";
                $costo_licencias = $costo_licencias + $eq_MOBICONTROL;
              }
              if (isset($v['tcall'])) {
                $descripcion_paquete = $descripcion_paquete."<p>Licencia TrustCall (Encripción de llamadas de Voz y mensajería de textos AES256bits)</p>";
                $costo_licencias = $costo_licencias + $eq_TRUSTCALL;
              }

              if ($equipo == "TVX125") {
                    $descripcion_paquete = $descripcion_paquete . "<p> Equipo incluido:  TVX125 SIM DUAL Rugged unlocked Android Smart Phone </p>";
                    $costo_equipo = $TVX125*$currencyValue;
                    $monto_financiar = $TVX125*$currencyValue;  
                    $precio_publico_eq = $TVX125_Pub*$currencyValue;
              }elseif ($equipo == "TVX310") {
                    $descripcion_paquete = $descripcion_paquete . "<p> Equipo incluido:  TVX310 SIM DUAL Rugged unlocked Android Smart Phone </p>";
                    $costo_equipo = $TVX310*$currencyValue;
                    $monto_financiar = $TVX310*$currencyValue;  
                    $precio_publico_eq = $TVX310_Pub*$currencyValue;
              }elseif ($equipo == "TVX740") {
                    $descripcion_paquete = $descripcion_paquete ."<p> Equipo incluido:  TVX740 SIM DUAL Rugged unlocked Android Smart Phone </p>";
                    $costo_equipo = $TVX740*$currencyValue;
                    $monto_financiar = $TVX740*$currencyValue;  
                    $precio_publico_eq = $TVX740_Pub*$currencyValue;
              }elseif ($equipo == "TVX588d") {
                    $descripcion_paquete = $descripcion_paquete ."<p> Equipo incluido:  TVX558d SIM DUAL Rugged unlocked Android Smart Phone </p>";
                    $costo_equipo = $TVX588d*$currencyValue;
                    $monto_financiar = $TVX588d*$currencyValue;  
                    $precio_publico_eq = $TVX588d_Pub*$currencyValue;
              }elseif ($equipo == "TVX887") {
                    $descripcion_paquete = $descripcion_paquete ."<p> Equipo incluido:  TVX558d SIM DUAL Rugged unlocked Android Smart Phone </p>";
                    $costo_equipo = $TVX887*$currencyValue;
                    $monto_financiar = $TVX887*$currencyValue;  
                    $precio_publico_eq = $TVX887_Pub*$currencyValue;
              }
              elseif ($equipo == "TVX730") {
                    $descripcion_paquete = $descripcion_paquete ."<p> Equipo incluido:  TVX730 SIM DUAL Rugged unlocked Android Smart Phone </p>";
                    $costo_equipo = $TVX730*$currencyValue;
                    $monto_financiar = $TVX730*$currencyValue;  
                    $precio_publico_eq = $TVX730_Pub*$currencyValue;
              }
              elseif ($equipo == "TVX588A") {
                    $descripcion_paquete = $descripcion_paquete ."<p> Equipo incluido:  TVX588A SIM DUAL Rugged unlocked Android Smart Phone </p>";
                    $costo_equipo = $TVX588A*$currencyValue;
                    $monto_financiar = $TVX588A*$currencyValue;  
                    $precio_publico_eq = $TVX588A_Pub*$currencyValue;
              }



              /*elseif ($equipo == "OUTERFONE - S17") {
                    $costo_equipo = $S17*$currencyValue;
                    $monto_financiar = $S17*$currencyValue;  
                    $precio_publico_eq = $S17_Pub*$currencyValue;
              }
              elseif ($equipo == "OUTERFONE - S18") {
                    $costo_equipo = $S18*$currencyValue;
                    $monto_financiar = $S18*$currencyValue;  
                    $precio_publico_eq = $S18_Pub*$currencyValue;
              }*/

              
              if ($plan == "1") {
                $total_plan = $pd50;
                $descripcion_paquete = $descripcion_paquete."<p> INTERNET 50 MB TECHO BAJO </p>";
              }elseif ($plan == "2") {
                $total_plan = $pd100;
                $descripcion_paquete . "<p> INTERNET 100 MB TECHO BAJO </p>";
              }
              elseif ($plan == "3") {
                $total_plan = $pd400;
                $descripcion_paquete = $descripcion_paquete . "<p> INTERNET 400 MB TECHO BAJO </p>";
              }elseif ($plan == "4") {
                $total_plan = $pd500;
                $descripcion_paquete = $descripcion_paquete . "<p> INTERNET 500 MB TECHO BAJO </p>";
              }
              elseif ($plan == "5") {
                $total_plan = $pd1;
                $descripcion_paquete = $descripcion_paquete . "<p> INTERNET 1 GB TECHO BAJO </p>";
              }elseif ($plan == "6") {
                $total_plan = $pd2;
                $descripcion_paquete = $descripcion_paquete . "<p> INTERNET 2 GB TECHO BAJO </p>";
              }elseif ($plan == "7") {
                $total_plan = $pd3;
                $descripcion_paquete = $descripcion_paquete . "<p> INTERNET 3 GB TECHO BAJO </p>";
              }elseif ($plan == "8") {
                $total_plan = $pd5;
                $descripcion_paquete = $descripcion_paquete . "+PDatos 5 GB";
              }elseif ($plan == "9") {
                $total_plan = $pdv1000;
                $descripcion_paquete = $descripcion_paquete . "<p> TELCEL MAX SIN LIMITES EMPRESARIAL 4G 1000, Minutos y SMS incluidos Sin Frontera (México, E.U.A. y Canadá)</p>";
              }elseif ($plan == "10") {
                $total_plan = $pdv1500;
                $descripcion_paquete = $descripcion_paquete . "<p> TELCEL MAX SIN LIMITES EMPRESARIAL 4G 1500, Minutos y SMS incluidos Sin Frontera (México, E.U.A. y Canadá)</p>";
              }elseif ($plan == "11") {
                $total_plan = $pdv2000;
                $descripcion_paquete = $descripcion_paquete . "<p> TELCEL MAX SIN LIMITES EMPRESARIAL 4G 2000, Minutos y SMS incluidos Sin Frontera (México, E.U.A. y Canadá)</p>";
              }elseif ($plan == "12") {
                $total_plan = $pdv3000;
                $descripcion_paquete = $descripcion_paquete . "<p> TELCEL MAX SIN LIMITES EMPRESARIAL 4G 3000, Minutos y SMS incluidos Sin Frontera (México, E.U.A. y Canadá)</p>";
              }elseif ($plan == "13") {
                $total_plan = $pdv5000;
                $descripcion_paquete = $descripcion_paquete . "<p> TELCEL MAX SIN LIMITES EMPRESARIAL 4G 5000, Minutos y SMS incluidos Sin Frontera (México, E.U.A. y Canadá)</p>";
              }elseif ($plan == "14") {
                $total_plan = $pdv6000;
                $descripcion_paquete = $descripcion_paquete . "<p> TELCEL MAX SIN LIMITES EMPRESARIAL 4G 6000, Minutos y SMS incluidos Sin Frontera (México, E.U.A. y Canadá)</p>";
              }elseif ($plan == "15") {
                $total_plan = $pdv7000;
                $descripcion_paquete = $descripcion_paquete . "<p> TELCEL MAX SIN LIMITES EMPRESARIAL 4G 7000, Minutos y SMS incluidos Sin Frontera (México, E.U.A. y Canadá)</p>";
              }elseif ($plan == "16") {
                $total_plan = $pdv9000;
                $descripcion_paquete = $descripcion_paquete . "<p> TELCEL MAX SIN LIMITES EMPRESARIAL 4G 9000, Minutos y SMS incluidos Sin Frontera (México, E.U.A. y Canadá)</p>";
              }elseif ($plan == "17") {
                $total_plan = $pdv12000;
                $descripcion_paquete = $descripcion_paquete . "<p> TELCEL MAX SIN LIMITES EMPRESARIAL 4G 12000, Minutos y SMS incluidos Sin Frontera (México, E.U.A. y Canadá)</p>";
              }
              elseif ($plan == "18") {
                $total_plan = $pd10;
                $descripcion_paquete = $descripcion_paquete . "<p> INTERNET 10 GB TECHO BAJO </p>";
              }
              elseif ($plan == "19") {
                $total_plan = $pd15;
                $descripcion_paquete = $descripcion_paquete . "<p> INTERNET 15 GB TECHO BAJO </p>";
              }
              elseif ($plan == "20") {
                $total_plan = $pd20;
                $descripcion_paquete = $descripcion_paquete . "<p> INTERNET 20 GB TECHO BAJO </p>";
              }
              elseif ($plan == "21") {
                $total_plan = $pd30;
                $descripcion_paquete = $descripcion_paquete . "<p> INTERNET 30 GB TECHO BAJO </p>";
              }
              elseif ($plan == "22") {
                $total_plan = $pd1M;
                $descripcion_paquete = $descripcion_paquete . "<p> INTERNET 1 MB TECHO BAJO </p>";
              }
              elseif ($plan == "23") {
                $total_plan = $pd2M;
                $descripcion_paquete = $descripcion_paquete . "<p> INTERNET 2 MB TECHO BAJO </p>";
              }
              elseif ($plan == "24") {
                $total_plan = $pd3M;
                $descripcion_paquete = $descripcion_paquete . "<p> INTERNET 3 MB TECHO BAJO </p>";
              }
              elseif ($plan == "25") {
                $total_plan = $pd5M;
                $descripcion_paquete = $descripcion_paquete . "<p> INTERNET 5 MB TECHO BAJO </p>";
              }
              elseif ($plan == "26") {
                $total_plan = $pd10M;
                $descripcion_paquete = $descripcion_paquete . "<p> INTERNET 10 MB TECHO BAJO </p>";
              }

              $monto_financiar = $costo_equipo;
              $financiamiento = $costo_equipo * 0.01;
              $plazo_amortizacion = $financiamiento*18;
              $margen = ($costo_equipo/(1- 0.15)) - $costo_equipo;
              $base_de_renta = $costo_equipo + $plazo_amortizacion + $margen;
              $mensualidad_equipo = $base_de_renta / $plazo_contrato;
              $mensualidad_total = ($mensualidad_equipo+$costo_licencias+$total_plan)*$cantidad;
              $tarifa_unitaria = $mensualidad_equipo+$costo_licencias+$total_plan;
                  
              $enganche = ($precio_publico_eq * 0.10)*$cantidad;
              $descripcion_paquete = $descripcion_paquete ." Plazo Forzoso ". $plazo_contrato . " Meses. ( 1 de ".$plazo_contrato." )" ;
         
              $roundmensualidad = round($mensualidad_total, 2, PHP_ROUND_HALF_UP);
              $roundenganche = round($enganche, 2, PHP_ROUND_HALF_UP);
              $round_tarifa_uni = round($tarifa_unitaria, 2, PHP_ROUND_HALF_UP);
        
                //Se realizan operaciones
          $act_tot = $activ * $cantidad;
          $eng_uni = $enganche / $cantidad;
          $subtotal = $act_tot + $roundenganche + $roundmensualidad;
          $iva = $subtotal* 0.16;
          $prim_pago = $subtotal+$iva;
          //Round
          $round_act_tot = round($act_tot, 2, PHP_ROUND_HALF_UP);
          $round_eng_uni = round($eng_uni, 2, PHP_ROUND_HALF_UP);
          $r_iva = round($iva, 2, PHP_ROUND_HALF_UP);
          $r_prim_pago = round($prim_pago, 2, PHP_ROUND_HALF_UP);
          //Global costs
          $global_total = $global_total + $r_prim_pago;
          $global_subtotal = $global_subtotal + $subtotal;
          $iva_mensual = $roundmensualidad * 0.16;
          $round_iva_mensual = round($iva_mensual, 2, PHP_ROUND_HALF_UP);
          $total_mensual_mas_iva = $roundmensualidad + $round_iva_mensual;





                $response["data"][] = array(
                'enganche_unitario' => number_format($round_eng_uni, 2, '.', ','),
                'enganche_total' => number_format($enganche, 2, '.', ','),
                'cantidad' => $cantidad,
                'descripcion_paquete' => $descripcion_paquete,
                'mensualidad_total' => number_format($roundmensualidad, 2, '.', ','),
                'mensualidad_unitaria' => number_format($round_tarifa_uni, 2, '.', ','),
                'activacion_unitaria' => number_format($activ, 2, '.', ','),
                'activacion_total' => number_format($round_act_tot, 2, '.', ','),
                'subtotal' => number_format($subtotal, 2, '.', ','),
                'iva' => number_format($r_iva, 2, '.', ','),
                'total_primer_pago' => number_format($r_prim_pago, 2, '.', ','),
                'iva_mensual' => number_format($round_iva_mensual, 2, '.', ','),
                'iva_mensual_total' => number_format($total_mensual_mas_iva, 2, '.', ','), 
               
                );


               
              }
        }
        
          
                
        }
    
$response["global"] = array(
           
            'global_total' => number_format($global_total, 2, '.', ','),
            'global_subtotal' => number_format($global_subtotal, 2, '.', ',')
            );

echo json_encode($response);




 ?>