<?php
namespace App\Controllers;
use CodeIgniter\Controller;
Use App\Models\Productos_models;

class Carrito_controller extends BaseController{
		public function __construct(){
        helper(['form', 'url']);
        //$this->consulta = new Carrito_models();
        $this->session = session();
        
    }

		public function agregar_carrito(){
			$request = \Config\Services::request();
			$cart = \Config\Services::cart();
				
				$cart->insert(array(
                    'id'      => $request->getPost('id_producto'),
                    'qty'     => 1,
                    'price'   => $request->getPost('precio_producto'),
                    'name'    => $request->getPost('nombre_producto'),
				));


				
			session()->setFlashdata('success', 'Producto agregado al carrito');
			return redirect()->route('pedi_ya');
		}

		public function ver_carrito(){
			$data['titulo'] = 'Mi Carrito';
			$cart = \Config\Services::cart();

			$cart = array('cart' => $cart);
        	return view('front/head2',$data).view('front/titulo').view('front/navbar_user'). view('back/carrito/ver_carrito', $cart).view('front/footer');
		}

		public function eliminar_producto_carrito(){
			$request = \Config\Services::request();
			$cart = \Config\Services::cart();
			
			$rowid = $request->getPostGet('rowid');

			$cart ->remove($rowid);

			return redirect()->route('ver_carrito');

			//id = id del producto
			//rowid = fila del producto
		}

		public function vaciar_carrito(){
			$cart = \Config\Services::cart();

			$cart->destroy();

			return redirect()->route('ver_carrito');

		}

		public function comprar(){
			$cart = \Config\Services::cart();


		}
	


}
?>