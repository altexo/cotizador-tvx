<?php 

$currencyValue = 23.50;
    
//NOrmal
   $F25 = 120; 
   $S17 = 120; 
   $S18 = 180; 
   $RG310 = 125; 
   $RG740 = 265.00;
   $S88 = 275;
//Precio Publico
   $RG740_Pub = 473.21;
   $F25_Pub = 244.90;
   //$S17_Pub =
   $S18_Pub = 367.35;
   $RG310_Pub = 255.10;
   $S88_Pub = 561.22;

   $activ = 0; 
   //TVX equipos
   $eq_tvx = 7.73 * $currencyValue;    
   $eq_MOBICONTROL = 4.29 * $currencyValue;
   $eq_EVIDENCE = 6.08 * $currencyValue;   
   $eq_TRUSTCALL = 36.50 * $currencyValue;
   //Tvx solo licencias


   $tvx = 8.50;    
   $MOBICONTROL = 5.45;
   $EVIDENCE = 8.50;   
   $TRUSTCALL = 36.50;
//planes Datos
  $pd50 = 99;
  $pd100 = 109;
  $pd400 = 169;
  $pd500 = 189;
  $pd1 = 239;
  $pd2 = 269;
  $pd3 = 289;
  $pd5 = 429;

  $pdv1000 = 171.55;
  $pdv1500 = 206.03;
  $pdv2000 = 257.76;
  $pdv3000 = 343.97;
  $pdv5000 = 430.17;
  $pdv6000 = 516.38;
  $pdv7000 = 688.79;
  $pdv9000 = 904.31;
  $pdv12000 = 1168.93;

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

    $length = 25;
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $k = substr( str_shuffle( $chars ), 0, $length );

 $tabla_contenido = "";
 $global_total = 0.00;
            $global_subtotal = 0.00;

    if($_POST)
    {
      $target_dir = "../uploads/";
        $target_file = $target_dir . basename($k . $_FILES["fileUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image

    if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) 
    {       
      if ($_POST["licencias"] == 1) 
      {
        
        }elseif ($_POST["equipos"] == 1) {
          $ra_logo = $target_file;
            $rs_ra = $_POST['razon_social'];
            $ra_calle = $_POST['calle'];
            $ra_col = $_POST['colonia'];
            $ra_num_ext = $_POST['no_ext'];
            $ra_ciu = $_POST['ra_ciudad'];
            $ra_estado = $_POST['ra_estado'];
            $cli_nombre = $_POST['nombre_cliente'];
            $cli_cargo = $_POST['cargo_cliente'];
            $cli_telefono = $_POST['tel_cliente'];
            $cli_area = $_POST['area_cliente'];
            $cli_mail = $_POST['climail'];
            $folio = "1";
            $fecha = $_POST['fecha'];
            $ra_nom = $_POST['ra_nombre'];
            $ra_tel = $_POST['ra_telefono'];
            
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

                $plan = $v['plan'];  
                $activ = $v['activ'];
                $plazo_contrato = $v['plazo'];
                $cantidad = $v['cantidad_eq'];
                $equipo = $v['equipo'];
                $descripcion_paquete = "EQUIPO ".$equipo;
                if ($equipo == "TVX125") {
                    $costo_equipo = $F25*$currencyValue;
                      $monto_financiar = $F25*$currencyValue;  
                      $precio_publico_eq = $F25_Pub*$currencyValue;
                }elseif ($equipo == "TVX310") {
                      $costo_equipo = $RG310*$currencyValue;
                      $monto_financiar = $RG310*$currencyValue;  
                      $precio_publico_eq = $RG310_Pub*$currencyValue;
                }elseif ($equipo == "TVX740") {
                      $costo_equipo = $RG740*$currencyValue;
                      $monto_financiar = $RG740*$currencyValue;  
                      $precio_publico_eq = $RG740_Pub*$currencyValue;
                }elseif ($equipo == "TVXS88") {
                      $costo_equipo = $S88*$currencyValue;
                      $monto_financiar = $S88*$currencyValue;  
                      $precio_publico_eq = $S88_Pub*$currencyValue;
                }elseif ($equipo == "OUTERFONE - S17") {
                      $costo_equipo = $S17*$currencyValue;
                      $monto_financiar = $S17*$currencyValue;  
                      $precio_publico_eq = $S17_Pub*$currencyValue;
                }
                elseif ($equipo == "OUTERFONE - S18") {
                      $costo_equipo = $S18*$currencyValue;
                      $monto_financiar = $S18*$currencyValue;  
                      $precio_publico_eq = $S18_Pub*$currencyValue;
                }

                if (isset($v['tvx'])) {
                    $descripcion_paquete = $descripcion_paquete."+TVX";
                    $costo_licencias = $costo_licencias + $eq_tvx;
                }
                
                if (isset($v['evi'])) {
                    $descripcion_paquete = $descripcion_paquete."+EVI";
                    $costo_licencias = $costo_licencias + $eq_EVIDENCE;
                }
              
                  if (isset($v['mctrl'])) {
                    $descripcion_paquete = $descripcion_paquete."+MCTRL";
                    $costo_licencias = $costo_licencias + $eq_MOBICONTROL;
                }
              
                if (isset($v['tcall'])) {
                    $descripcion_paquete = $descripcion_paquete."+TCALL";
                    $costo_licencias = $costo_licencias + $eq_TRUSTCALL;
                }
              
                if ($plan == "1") {
                    $total_plan = $pd50;
                    $descripcion_paquete = $descripcion_paquete."+PDatos 50 MB";
              
                }elseif ($plan == "2") {
                    $total_plan = $pd100;
                    $descripcion_paquete . "+PDatos 100 MB";
                }
                elseif ($plan == "3") {
                    $total_plan = $pd400;
                    $descripcion_paquete = $descripcion_paquete . "+PDatos 400 MB";
                }elseif ($plan == "4") {
                    $total_plan = $pd500;
                    $descripcion_paquete = $descripcion_paquete . "+PDatos 500 MB";
                }
                elseif ($plan == "5") {
                    $total_plan = $pd1;
                    $descripcion_paquete = $descripcion_paquete . "+PDatos 1 GB";
                }elseif ($plan == "6") {
                    $total_plan = $pd2;
                    $descripcion_paquete = $descripcion_paquete . "+PDatos 2 GB";
                }elseif ($plan == "7") {
                    $total_plan = $pd3;
                    $descripcion_paquete = $descripcion_paquete . "+PDatos 3 GB";
                }elseif ($plan == "8") {
                  $total_plan = $pd5;
                    $descripcion_paquete = $descripcion_paquete . "+PDatos 5 GB";
                }elseif ($plan == "9") {
                    $total_plan = $pdv1000;
                    $descripcion_paquete = $descripcion_paquete . "+Telcel 1000 4G";
                }elseif ($plan == "10") {
                    $total_plan = $pdv1500;
                    $descripcion_paquete = $descripcion_paquete . "+Telcel 1500 4G";
                }elseif ($plan == "11") {
                    $total_plan = $pdv2000;
                  $descripcion_paquete = $descripcion_paquete . "+Telcel 2000 4G";
                }elseif ($plan == "12") {
                    $total_plan = $pdv3000;
                    $descripcion_paquete = $descripcion_paquete . "+Telcel 3000 4G";
                }elseif ($plan == "13") {
                    $total_plan = $pdv5000;
                    $descripcion_paquete = $descripcion_paquete . "+Telcel 5000 4G";
                }elseif ($plan == "14") {
                    $total_plan = $pdv6000;
                    $descripcion_paquete = $descripcion_paquete . "+Telcel 6000 4G";
                }elseif ($plan == "15") {
                  $total_plan = $pdv7000;
                    $descripcion_paquete = $descripcion_paquete . "+Telcel 7000 4G";
                }elseif ($plan == "16") {
                    $total_plan = $pdv9000;
                    $descripcion_paquete = $descripcion_paquete . "+Telcel 9000 4G";
                }elseif ($plan == "17") {
                    $total_plan = $pdv12000;
                    $descripcion_paquete = $descripcion_paquete . "+Telcel 12000 4G";
                }

              //$total_plan = ($total_plan/$currencyValue);
              //$costo_equipo = $S17;
                $monto_financiar = $costo_equipo;
                $financiamiento = $costo_equipo * 0.01;
                $plazo_amortizacion = $financiamiento*18;
                $margen = ($costo_equipo/(1- 0.15)) - $costo_equipo;
                $base_de_renta = $costo_equipo + $plazo_amortizacion + $margen;
                $mensualidad_equipo = $base_de_renta / $plazo_contrato;
                $mensualidad_total = ($mensualidad_equipo+$costo_licencias+$total_plan)*$cantidad;
                $tarifa_unitaria = $mensualidad_equipo+$costo_licencias+$total_plan;
                    
                $enganche = ($precio_publico_eq * 0.10)*$cantidad;
                $descripcion_paquete = $descripcion_paquete ." Plazo ". $plazo_contrato . " Meses";
           
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
               
                );


                $descripcion_paquete = "";
              }
        }
        
          
                
        }
    }
$response["global"] = array(
            'logo' => $target_file,
            'global_total' => number_format($global_total, 2, '.', ','),
            'global_subtotal' => number_format($global_subtotal, 2, '.', ',')
            );

echo json_encode($response);




 ?>