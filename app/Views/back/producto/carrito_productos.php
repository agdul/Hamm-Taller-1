<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Categoria_Model;
use App\Models\Gabinete_Model;

class Carrito_Controller extends BaseController{

		public function agregar_carrito(){
			$request = \Config\Services::request();
			$cart = \Config\Services::cart();

				$cart->insert(array(
                    'id'      => $request->getPost('id_producto'),
                    'qty'     => 1,
                    'price'   => $request->getPost('precio_producto'),
                    'name'    => $request->getPost('nombre_producto'),
				));
			return redirect()->route('/pedi_ya');
		}

		public function verCarrito(){
			$data['titulo'] = 'Mi carrito';
			$cart = \Config\Services::cart();

			$cart = array('cart' => $cart);

        	return view('plantilla/head',$data).view('plantilla/nav'). view('administrador/gestionCarrito/verCarrito', $cart).view('plantilla/footer');
		}

		public function eliminarCarrito(){
			$request = \Config\Services::request();
			$cart = \Config\Services::cart();
			
			$rowid = $request->getPostGet('rowid');

			$cart ->remove($rowid);

			return redirect()->route('verCarrito');

			//id = id del producto
			//rowid = fila del producto
		}

		public function vaciarCarrito(){
			$cart = \Config\Services::cart();

			$cart->destroy();

			return redirect()->route('verCarrito');

		}
	


}
?>