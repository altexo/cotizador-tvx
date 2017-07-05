<?php 

  require_once 'autoload.inc.php';
  use Dompdf\Dompdf;

//echo $_POST;
  //echo json_encode($_POST);
//$currencyValue = 23.50;
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
/*Equipos Ubiqo Smart*/
  $eq_ubiqo_smart = 200.00; //USD
  $kit_instalacion = 120.00;  //USD
  $btn_panico = 70.00;  //USD
  $rf_maestro = 200.00; //USD
  $plataforma = 55.00; //MXN

  /*Termina Ubiqo Smart*/
    
  //NOrmal
  $TVX125 = 120.00; 
  $TVX887 = 140.00;
  $TVX310 = 125.00; 
  $TVX740 = 265.00;
  $TVX588d = 275.00;
  $TVX588A = 180.00;
//Precio Publico
  $TVX740_Pub = 473.00;
  $TVX125_Pub = 245.00;
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
    $cli_direccion = "";
    $n_fecha = "";
    $cli_colonia = "";
    $doc_titulo = "";
    $doc_descripcion = "";
    $doc_registro_op = "";
    $doc_representante = "";
    $doc_terminos = "";
    $ra_tel_mov = "";

    $length = 25;
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $k = substr( str_shuffle( $chars ), 0, $length );

  $tabla_contenido = "";
  $global_total = 0.00;
  $global_subtotal = 0.00;
  $folio = 0;
  if($_POST)
  {
    $doc_titulo = $_POST['doc_titulo'];
    $doc_descripcion = $_POST['doc_descripcion'];
    $doc_registro_op = $_POST['doc_registro_op'];
    $doc_representante = $_POST['doc_representante'];
    $doc_terminos = $_POST['doc_terminos'];

    $ra_tel_mov = $_POST['ra_telefono_mov'];
    $rs_ra = $_POST['razon_social'];
    $ra_direccion = $_POST['ra_direccion'];
    $ra_col = $_POST['colonia'];
    $ra_cp = $_POST['cp'];
    $ra_ciu = $_POST['ra_ciudad'];
    $ra_estado = $_POST['ra_estado'];
    $ra_correo = $_POST['ra_correo'];
    $ra_web = "";
    if (isset($_POST['ra_web'])) 
    {
      $ra_web = '<li> <label>WEB</label> </li>
          <li>'.$_POST['ra_web'].'</li>';

    }

    $cli_nombre = $_POST['nombre_cliente'];
    
    $cli_telefono = $_POST['tel_cliente'];
    
    $cli_mail = $_POST['climail'];
    $cli_direccion = $_POST['direccion_cliente'];
    $cli_cp = $_POST['cliente_cp'];
    $cli_ciudad = $_POST['cli_ciudad'];
    $cli_estado = $_POST['cli_estado'];
    $cli_colonia = $_POST['cli_colonia'];
    $fecha = $_POST['fecha'];

    $ra_nom = $_POST['ra_nombre'];
    $ra_tel = $_POST['ra_telefono'];

    $myDateTime = DateTime::createFromFormat('Y-m-d', $fecha);
    $n_fecha = $myDateTime->format('d/m/Y');
    

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($k . $_FILES["fileUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image

    if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) 
    { 
      //creamos el socket para conectar con la BD
       /* $bd_host = "localhost"; 
        $bd_usuario = "teamvoxt_manager"; 
        $bd_password = "Teamvoxhost1"; 
        $bd_base = "teamvoxt_teamvox"; 
*/
        $bd_host = "localhost"; 
        $bd_usuario = "root"; 
        $bd_password = ""; 
        $bd_base = "ejercicio";
        
        $conn = new mysqli($bd_host, $bd_usuario, $bd_password, $bd_base);
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      } 
        //hacemos una consulta para ver nuestor numero de folio 
          $query="SELECT num  FROM folio";
        $resultado= $conn->query($query);
        
        while ($mostrar= $resultado->fetch_assoc())
          {
          $folio=$mostrar['num'];
          }
            if (@$folio=="")//si el folio esta en 0 o vacio entonces valdra 1
              {
              $folio=1;
              }else 
              {
                $folio++;
              } // si vale por lo menos uno sumale uno
              $query="insert into folio (num) values ('$folio')";
                $result= $conn->query($query);  

      $ra_logo = $target_file;
      if ($_POST["licencias"] == 1) 
      {
           $tr_cont = '';
          if (isset($_POST['data']['select']['tvx_lic']) && ($_POST['data']['select']['tvx_cant'] > 0)) 
          {
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
              $round_activ = $activ;
              $round_act_tot = $round_activ * $cantidad;

              $subtotal = $round_activ + $total_mensual;
                $iva = $subtotal* 0.16;
                $prim_pago = $subtotal+$iva;

                $r_iva = round($iva, 2, PHP_ROUND_HALF_UP);
                $r_prim_pago = round($prim_pago, 2, PHP_ROUND_HALF_UP);

                $global_total = $global_total + $r_prim_pago;
                $global_subtotal = $global_subtotal + $subtotal;

            $descripcion_paquete = "<p> Licencia TeamVOX Básico Radio PTT Ilimitado, Grupos Ilimitados, Usuarios Ilimitados.  Cobertura Nacional e Internacional, GPS, Consola de Despacho para rastreo de Unidades. </p>";

                
                  $tabla_contenido .= "<tr style='background-color: #b3b3b3; color: white'>
            <td style='text-align: center;'>".$cantidad."</td>
                <td> ".$descripcion_paquete." </td>
                <td align='right'>$ ".number_format($tarifa_uni, 2, '.', ',')."</td>
                <td align='right'>$ ".number_format($total_mensual, 2, '.', ',')."</td>
                </tr>
                
            
              <tr>
                <td style='text-align: center;'></td>
                <td>Activacion</td>
                <td align='right'>$ ".number_format($round_activ, 2, '.', ',')."</td>
                <td align='right'>$ ".number_format($round_act_tot, 2, '.', ',')."</td>
              </tr>
         
              <tr>
              <td style='text-align: center;'></td>
                <td>Pago Mensual Recurrente</td>
                <td align='right'>$ ".number_format($tarifa_uni, 2, '.', ',')."</td>
                <td align='right'>$ ".number_format($total_mensual, 2, '.', ',')."</td>
              </tr> 
              <tr>
                <td></td>
                <td></td>
                <td align='right'>Subtotal</td>
                <td align='right'>$ ".number_format($subtotal, 2, '.', ',')."</td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td align='right'>IVA</td>
                <td align='right'>$ ".number_format($r_iva, 2, '.', ',')."</td>
              </tr>
              <tr style='    border-bottom: 1px solid black;'>
                <td></td>
                <td></td>
                <td align='right'>Total Primer Pago</td>
                <td align='right'>$ ".number_format($r_prim_pago, 2, '.', ',')."</td>
              </tr>";
              
           
          }
          if (isset($_POST['data']['select']['mctrl_lic']) && ($_POST['data']['select']['mctrl_cant'] > 0)) 
          {

               $cantidad = $_POST['data']['select']['mctrl_cant'];
              $activ = $_POST['data']['select']['mctrl_activ'];
              $total = ($cantidad * $MOBICONTROL)* $currencyValue;
              $tarifa_uni = $MOBICONTROL * $currencyValue;


              $roundmensualidad = round($total, 2, PHP_ROUND_HALF_UP);
              $round_tarifa_uni = round($tarifa_uni, 2, PHP_ROUND_HALF_UP);
              $round_activ = round($activ, 2, PHP_ROUND_HALF_UP);
              $total_activ = $round_activ * $cantidad;
              $round_act_tot = round($total_activ, 2, PHP_ROUND_HALF_UP);

              $subtotal = $total_activ + $roundmensualidad;
                $iva = $subtotal* 0.16;
                $prim_pago = $subtotal+$iva;

                $r_iva = round($iva, 2, PHP_ROUND_HALF_UP);
                $r_prim_pago = round($prim_pago, 2, PHP_ROUND_HALF_UP);

                $global_total = $global_total + $r_prim_pago;
                $global_subtotal = $global_subtotal + $subtotal;

                $descripcion_paquete = "Licencia MobiControl";
         

                 $trb = 'trb';
                  $tabla_contenido .= "<tr style='background-color: #b3b3b3; color: white'>
            <td style='text-align: center;'>".$cantidad."</td>
                <td> ".$descripcion_paquete." </td>
                <td align='right'>$ ".number_format($round_tarifa_uni, 2, '.', ',')."</td>
                <td align='right'>$ ".number_format($roundmensualidad, 2, '.', ',')."</td>
                </tr>
                
            
              <tr>
                <td style='text-align: center;'></td>
                <td>Activacion</td>
                <td align='right'>$ ".number_format($round_activ, 2, '.', ',')."</td>
                <td align='right'>$ ".number_format($round_act_tot, 2, '.', ',')."</td>
              </tr>
           
              <tr>
              <td style='text-align: center;'></td>
                <td>Pago Mensual Recurrente</td>
                <td align='right'>$ ".number_format($round_tarifa_uni, 2, '.', ',')."</td>
                <td align='right'>$ ".number_format($roundmensualidad, 2, '.', ',')."</td>
              </tr> 
              <tr>
                <td></td>
                <td></td>
                <td align='right'>Subtotal</td>
                <td align='right'>$ ".number_format($subtotal, 2, '.', ',')."</td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td align='right'>IVA</td>
                <td align='right'>$ ".number_format($r_iva, 2, '.', ',')."</td>
              </tr>
              <tr style='    border-bottom: 1px solid black;'>
                <td></td>
                <td></td>
                <td align='right'>Total Primer Pago</td>
                <td align='right'>$ ".number_format($r_prim_pago, 2, '.', ',')."</td>
              </tr>";
              
          }
        if (isset($_POST['data']['select']['evi_lic']) && ($_POST['data']['select']['evi_cant'] > 0)) 
        {
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
              $round_activ = $activ;
              $round_act_tot = $round_activ * $cantidad;

              $subtotal = $round_activ + $total_mensual;
                $iva = $subtotal* 0.16;
                $prim_pago = $subtotal+$iva;

                $r_iva = round($iva, 2, PHP_ROUND_HALF_UP);
                $r_prim_pago = round($prim_pago, 2, PHP_ROUND_HALF_UP);

                $global_total = $global_total + $r_prim_pago;
                $global_subtotal = $global_subtotal + $subtotal;

        
                $descripcion_paquete = "Licencia Evidence";
                 $trb = 'trb';
                  $tabla_contenido .= "<tr style='background-color: #b3b3b3; color: white'>
            <td style='text-align: center;'>".$cantidad."</td>
                <td> ".$descripcion_paquete." </td>
                <td align='right'>$ ".number_format($tarifa_uni, 2, '.', ',')."</td>
                <td align='right'>$ ".number_format($total_mensual, 2, '.', ',')."</td>
                </tr>
                
            
              <tr>
                <td style='text-align: center;'></td>
                <td>Activacion</td>
                <td align='right'>$ ".number_format($round_activ, 2, '.', ',')."</td>
                <td align='right'>$ ".number_format($round_act_tot, 2, '.', ',')."</td>
              </tr>
         
              <tr>
              <td style='text-align: center;'></td>
                <td>Pago Mensual Recurrente</td>
                <td align='right'>$ ".number_format($tarifa_uni, 2, '.', ',')."</td>
                <td align='right'>$ ".number_format($total_mensual, 2, '.', ',')."</td>
              </tr> 
              <tr>
                <td></td>
                <td></td>
                <td align='right'>Subtotal</td>
                <td align='right'>$ ".number_format($subtotal, 2, '.', ',')."</td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td align='right'>IVA</td>
                <td align='right'>$ ".number_format($r_iva, 2, '.', ',')."</td>
              </tr>
              <tr style='    border-bottom: 1px solid black;'>
                <td></td>
                <td></td>
                <td align='right'>Total Primer Pago</td>
                <td align='right'>$ ".number_format($r_prim_pago, 2, '.', ',')."</td>
              </tr>";
              
              

          }
          if (isset($_POST['data']['select']['tcall_lic']) && ($_POST['data']['select']['tcall_cant'] > 0)) 
          {

              $cantidad = $_POST['data']['select']['tcall_cant'];
              $activ = $_POST['data']['select']['tcall_activ'];
              $total = ($cantidad * $TRUSTCALL)* $currencyValue;
              $tarifa_uni = $TRUSTCALL * $currencyValue;


              $roundmensualidad = round($total, 2, PHP_ROUND_HALF_UP);
              $round_tarifa_uni = round($tarifa_uni, 2, PHP_ROUND_HALF_UP);
              $round_activ = round($activ, 2, PHP_ROUND_HALF_UP);
              $total_activ = $round_activ * $cantidad;
              $round_act_tot = round($total_activ, 2, PHP_ROUND_HALF_UP);

              $subtotal = $total_activ + $roundmensualidad;
                $iva = $subtotal* 0.16;
                $prim_pago = $subtotal+$iva;

                $global_total = $global_total + $r_prim_pago;
                $global_subtotal = $global_subtotal + $subtotal;
                
                $r_iva = round($iva, 2, PHP_ROUND_HALF_UP);
                $r_prim_pago = round($prim_pago, 2, PHP_ROUND_HALF_UP);

                $descripcion_paquete = "Licencia TrustCall";

                 $trb = 'trb';
                  $tabla_contenido .= "<tr style='background-color: #b3b3b3; color: white'>
            <td style='text-align: center;'>".$cantidad."</td>
                <td> ".$descripcion_paquete." </td>
                <td align='right'>$ ".number_format($round_tarifa_uni, 2, '.', ',')."</td>
                <td align='right'>$ ".number_format($roundmensualidad, 2, '.', ',')."</td>
                </tr>
                
            
              <tr>
                <td style='text-align: center;'></td>
                <td>Activacion</td>
                <td align='right'>$ ".number_format($activ, 2, '.', ',')."</td>
                <td align='right'>$ ".number_format($round_act_tot, 2, '.', ',')."</td>
              </tr>
            
              <tr>
              <td style='text-align: center;'></td>
                <td>Pago Mensual Recurrente</td>
                <td align='right'>$ ".number_format($round_tarifa_uni, 2, '.', ',')."</td>
                <td align='right'>$ ".number_format($roundmensualidad, 2, '.', ',')."</td>
              </tr> 
              <tr>
                <td></td>
                <td></td>
                <td align='right'>Subtotal</td>
                <td align='right'>$ ".number_format($subtotal, 2, '.', ',')."</td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td align='right'>IVA</td>
                <td align='right'>$ ".number_format($r_iva, 2, '.', ',')."</td>
              </tr>
              <tr style='    border-bottom: 1px solid black;'>
                <td></td>
                <td></td>
                <td align='right'>Total Primer Pago</td>
                <td align='right'>$ ".number_format($r_prim_pago, 2, '.', ',')."</td>
              </tr>";
          
          }


        }//Inicia Calculador de equipos
        elseif ($_POST["equipos"] == 1) 
        {

        
        
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
              $descripcion_paquete = "";
              //$descripcion_paquete = "EQUIPO ".$equipo;
              if (isset($v['tvx'])) {
                $descripcion_paquete = $descripcion_paquete."<p> Licencia TeamVOX Básico Radio PTT Ilimitado, Grupos Ilimitados, Usuarios Ilimitados.  Cobertura Nacional e Internacional, GPS, Consola de Despacho para rastreo de Unidades. </p>";
                $costo_licencias = $costo_licencias + $eq_tvx;
              }
              if (isset($v['evi'])) {
                $descripcion_paquete = $descripcion_paquete."+EVI";
                $costo_licencias = $costo_licencias + $eq_EVIDENCE;
              }
              if (isset($v['mctrl'])) {
                $descripcion_paquete = $descripcion_paquete."<p> Licencia Mobicontrol (Administración dispositivos móviles y sus aplicaciones, contenido y seguridad. ) </p>";
                $costo_licencias = $costo_licencias + $eq_MOBICONTROL;
              }
              if (isset($v['tcall'])) {
                $descripcion_paquete = $descripcion_paquete."+TCALL";
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
                    $descripcion_paquete = "<p> Equipo incluido:  TVX740 SIM DUAL Rugged unlocked Android Smart Phone </p>";
                    $costo_equipo = $TVX740*$currencyValue;
                    $monto_financiar = $TVX740*$currencyValue;  
                    $precio_publico_eq = $TVX740_Pub*$currencyValue;
              }elseif ($equipo == "TVX588d") {
                    $descripcion_paquete = "<p> Equipo incluido:  TVX558d SIM DUAL Rugged unlocked Android Smart Phone </p>";
                    $costo_equipo = $TVX588d*$currencyValue;
                    $monto_financiar = $TVX588d*$currencyValue;  
                    $precio_publico_eq = $TVX588d_Pub*$currencyValue;
              }elseif ($equipo == "TVX887") {
                    $descripcion_paquete = "<p> Equipo incluido:  TVX558d SIM DUAL Rugged unlocked Android Smart Phone </p>";
                    $costo_equipo = $TVX887*$currencyValue;
                    $monto_financiar = $TVX887*$currencyValue;  
                    $precio_publico_eq = $TVX887_Pub*$currencyValue;
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

          $tabla_contenido .='
          <br>
      <br>
          <table><tr><td style="float: left;"><p> DETALLE PAGO INICIAL - ÚNICA VEZ</p></td></tr></table>
          
           <table>
            <thead>
              <tr>
                <th>DESCRIPCIÓN</th>
                <th>CANTIDAD</th>
                <th>PRECIO/UD.</th>
                <th>IMPORTE</th>
              </tr>
            </thead>
          <tbody>
        
          <tr>
            <td>ACTIVACIÓN / CONFIGURACIÓN DE USUARIOS  Y GRUPOS<p></td>
            <td align="center">'.$cantidad.'</td>
            <td align="right">$ '.number_format($activ, 2, '.', ',').'</td>
            <td align="right">$ '.number_format($round_act_tot, 2, '.', ',').'</td>
          </tr>
          <tr>
            <td>ENGANCHE</td>
            <td align="center">'.$cantidad.'</td>
            <td align="right">$ '.number_format($round_eng_uni, 2, '.', ',').'</td>
            <td align="right">$ '.number_format($enganche, 2, '.', ',').'</td>
          </tr>
          <tr>
            <td align="left" style="float: left;">
              '.$descripcion_paquete.'
            </td>
            <td align="center">'.$cantidad.'</td>
            <td align="right">$ '.number_format($round_tarifa_uni, 2, '.', ',').'</td>
            <td align="right">$ '.number_format($roundmensualidad, 2, '.', ',').'</td>
          </tr>
          <tr>
            
            <td colspan="3" align="right"> Subtotal</td>
            <td align="right">$ '.number_format($subtotal, 2, '.', ',').'</td>
          </tr>
          <tr>
            
            <td colspan="3" align="right"> Impuestos 16.00%</td>
            <td align="right">$ '.number_format($r_iva, 2, '.', ',').'</td>
          </tr>
          <tr style="background-color: #d0d0d0; border-top: 5px solid #656464;">
            <td colspan="3" align="right"> Total</td>
            <td align="right">$ '.number_format($r_prim_pago, 2, '.', ',').'</td>
          </tr>
         
          <tr><td colspan="4" align="left" style="border: 0; padding: 10px;">Los precios son expresados en: Pesos Mexicanos</td></tr>
          <tr><td colspan="4" align="left" style="border: 0; padding: 10px;">DETALLE PAGO MENSUAL</td></tr>
          
           <thead>
          <tr>
            <th>DESCRIPCIÓN</th>
            <th>CANTIDAD</th>
            <th>PRECIO/UD.</th>
            <th>IMPORTE</th>
          </tr>
        </thead>
          <tr>
            <td style="float: left">
              '.$descripcion_paquete.'
            </td>
            <td align="center">'.$cantidad.'</td>
            <td align="right">$ '.number_format($round_tarifa_uni, 2, '.', ',').'</td>
            <td align="right">$ '.number_format($roundmensualidad, 2, '.', ',').'</td>
          </tr>
          <tr>
            
            <td colspan="3" align="right"> Subtotal</td>
            <td align="right">$ '.number_format($roundmensualidad, 2, '.', ',').'</td>
          </tr>
          <tr>
            
            <td colspan="3" align="right"> Impuestos 16.00%</td>
            <td align="right">$ '.number_format($round_iva_mensual, 2, '.', ',').'</td>
          </tr>
          <tr style="background-color: #d0d0d0; border-top: 5px solid #656464;">
            <td colspan="3" align="right"> Total</td>
            <td align="right">$ '.number_format($total_mensual_mas_iva, 2, '.', ',').'</td>
          </tr>
          </tbody>

      </table>
      
          ';


   
              $descripcion_paquete = "";
            
         
          }
          }
      }
  }





 $html = '<body>
  <style type="text/css" media="screen">

    body
    {
        font-family: "Gill Sans", "Gill Sans MT", Calibri, sans-serif;
        font-size: 8pt;
    }
    label
    {
      font-weight: bold;
      color: gray;
      font-size: 7pt;
    }
    .container
    {
      width: 100%;
      height: 100%;
      display: inline-block;

    }

    .left-side
    {
    
      width: 29%;
      height: 900px;
      float: left;
      display: inline-block;
      
    }

    .right-side
    {
      width: 69%;
      height: 100%;
     margin-left: 200px;
     
      

    }
    .left-side-container
    {
      margin-top: 5%;
    }
    .tvx_logo img
    {
      height: 70px;
      width: 300px;
      float: right;
    }
    .logo img
    {
      margin-top: 10px;
      height: 30px;
      width: 20%;
      float: left;
      
    }
    .logo
    {
      margin-bottom: 5%;
    }
    ul 
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
      width: 100%;
      
    }
     tr, td, th
    {
      border-bottom: 1px solid #c3c2c2;
      border-right: 1px solid #c3c2c2;
      
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
      margin-left: -240px;
    }
  </style>
  <!--793.700787402 X 1122.519685039-->
  <div class="container">
    <div class="tvx_logo">
      <img src="img/logo.jpg" alt="">
    </div>
    <div class="logo">
    <h4>REPRESENTANTE: </h4>
      <img src="'.$ra_logo.'">
    </div>
    <div class="left-side">
      <div class="left-side-container">
        <label class="label-rs">'.$rs_ra.'</label><br><br>

        
        <UL>
          <li><label><label>DOMICILIO</label></label></li>
          <li>'.$ra_direccion.'</li>
          <li>Col. '.$ra_col.' </li>
          <li>'.$ra_ciu.' '.", ".' '.$ra_estado.', C.P. '.$ra_cp.' </li><br><br>

          <li> <label>TELÉFONO OFICINA</label></li>
          <li>'.$ra_tel.'</li><br><br>

          <li><label>TELÉFONO MÓVIL</label></li>
          <li>'.$ra_tel_mov.'</li><br><br>

          <li> <label>CONTACTO</label> </li>
          <li>'.$ra_nom.'</li><br><br>

          <li><label>E-MAIL</label></li>
          <li>'.$ra_correo.'</li><br><br>

          '.$ra_web.'
        </UL>   
      </div>

      
    </div>
    <div class="right-side">
      <ul>
        <li><label>FECHA</label></li>
        <li>'.$n_fecha.'</li><br><br>
        
        <li><label>PARA</label></li>
        <li>'.$cli_nombre.'</li>
        <li>'.$cli_direccion.' </li>
        <li>Col '.$cli_colonia.' </li>
        <li>C.P. '.$cli_cp.', '.$cli_ciudad.',  '.$cli_estado.'</li><br><br>

        <li><label>TITULO DEL PROYECTO: '.$doc_titulo.'</label></li>
        <li><label>DESCRIPCIÓN DE PROYECTO: '.$doc_descripcion.'</label></li>
        <li><label>REGISTRO DE OPORTUNIDAD: '.$doc_registro_op.'</label></li>
        <li><label>REPRESENTANTE: '.$doc_representante.'</label></li>
        <li><label>VIGENCIA: '.$doc_terminos.' DÍAS</label></li>
        <br><br>

        <li>De acuerdo a su solicitud y según lo identificado como de su interés, presentamos la siguiente Cotización No. '.$folio.'</li>

        
      </ul><br><br>

     
       
          '.$tabla_contenido.'
    <br>
      <p>Sin más por el momento, agradeciendo su atención y preferencia,  quedo al pendiente de cualquier duda ó aclaración.</p>
      <p>Atentamente,</p>
      <p>'.$ra_nom.'</p>
    </div>
  </div>
  
</body>';
//echo $html;
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'letter');

// Render the HTML as PDF
$dompdf->render();


// Output the generated PDF to Browser
$dompdf->stream();
 ?>