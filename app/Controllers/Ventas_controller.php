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
            $cart_qty = $cart->contents('qty');
            $cart_price = $cart->contents('price');
            //$cartTotal = $cart('qty');
            $id_vc = $db->table('ventas_cabecera');
            $id_vc = $db->query('SELECT id_venta_cabecera FROM ventas_cabecera LIMIT 1');

            $id_prod = $db->table('productos');
            $id_prod = $db->query('SELECT id_producto FROM productos LIMIT 1');

            $id_session = $this->session = session()->get('id');
            $id_vcc = $id_vc->getRowArray();
            $id_produc = $id_prod->getRowArray();

            //$total = $this->$cart->total();
            //$cantidad = $cart->total_items();
            $datos_vdetalle = [
                'id_venta_detalle' => $this->request->getPostGet('id_venta_detalle'),
                'venta_id' => $id_vcc['id_venta_cabecera'],
                'producto_id' =>  $id_produc['id_producto'],
                'cantidad_venta' => $cart_qty,
                'precio_venta' => $cart_price,
                'total_venta' => $cart->total(),

            ];



            $datos_vcabaza = [
                'id_venta_cabecera' => $this->request->getPostGet('id_venta_cabecera'),
                'fecha_venta' => true,
                'usuario_id' => $id_session,
                'total_venta' => $cart->total(),
            ];


            $db->table('ventas_cabecera')->insert($datos_vcabaza);  $db->table('ventas_detalle')->insert($datos_vdetalle);
                //mjs pantalla
                 return redirect()->to(base_url().'/dashboard');


            


       // }
    }








}
