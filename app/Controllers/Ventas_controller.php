<?php
namespace App\Controllers;
use CodeIgniter\Controller;
Use App\Models\Productos_models;
Use App\Models\Usuarios_models;
Use App\Models\Vcabecera_models;

class Ventas_controller extends BaseController{
    public function __construct(){
        helper(['form', 'url']);
        $db = \Config\Database::connect();
        //$id_vc = $db->table('ventas_cabecera');
        $this->session = session();
    } 

    public function comprar(){
        //if($_SERVER["REQUEST_METHOD"] == "POST"){
            $db = \Config\Database::connect();
            $cart = \Config\Services::cart();
            $cebeza_model = new Vcabecera_Models();
            $db->table('ventas_detalle');

            $carton = $cart->contents();
            //$cartTotal = $cart('qty');
            // $cebeza = $db->table('ventas_cabecera');
            
            $id_vc = $db->table('ventas_cabecera');
            $id_vc = $db->query('SELECT id_venta_cabecera FROM ventas_cabecera LIMIT 1');
            
            // $cebeza = $cebeza_model->select('*')->join('ventas_cabecera','id_venta_cabecera = venta_id');
            //$id_prod = $db->table('productos');
            //$id_prod = $db->query('SELECT id_producto FROM productos LIMIT 1');
            
            $id_session = $this->session = session()->get('id');
            //$id_vcc = $id_vc->getRowArray();
            //$id_produc = $id_prod->getRowArray();
            
            //$total = $this->$cart->total();
            //$cantidad = $cart->total_items();
            
            
            $datos_vcabaza = [
                'id_venta_cabecera' => $this->request->getPostGet('id_venta_cabecera'),
                'fecha_venta' => true,
                'usuario_id' => $id_session,
                'total_venta' => $cart->total(),
            ];
            
            //var_dump($cebeza_model->insert($datos_vcabaza));
            $var = $cebeza_model->insert($datos_vcabaza);
            foreach($carton as $c){

                $datos_vdetalle = [
                    'venta_id' => $var,
                    'producto_id' =>  $c['id'],
                    'cantidad_venta' => $c['qty'],
                    'precio_venta' => $c['price'],
    
                ];
                $db->table('ventas_detalle')->insert($datos_vdetalle);

            }

            //var_dump($db->table('venta_detalle')->insert($datos_vdetalle));
            //var_dump($cart_qty);
            //var_dump($db->table('ventas_detalle')->insert($datos_vdetalle));
            //$id_vc = $db->table('ventas_cabecera')->insert($datos_vcabaza);  $db->table('ventas_detalle')->insert($datos_vdetalle);
                //mjs pantalla

              return redirect()->to(base_url().'/vaciar_carrito');


            


       // }
    }








}
