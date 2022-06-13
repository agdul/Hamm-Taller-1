<?php

namespace App\Controllers;

Use App\Models\Productos_models;

use CodeIgniter\Controller;

class Producto_controller extends BaseController{
    private $session;

    public function __construct(){
        helper(['form', 'url']);
        $this->user = new Productos_models();
        $this->session = session();
    }

    public function panel_productos() {
        $producto_model = new Productos_models();
        $datos['productos'] = $producto_model->orderBy('id_producto','ASC') -> findAll();
        $data['titulo']='Panel Productos'; 

       echo view('front/head',$data);
       echo view('front/titulo_panel_productos');
       echo view('front/navbar_adm');
       echo view('back/producto/panel_productos',$datos);
       echo view('front/footer');


    }

    public function add_producto(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $post = $this->request->getPost();
            $producto_model = new Productos_models();

            if($producto_model->save($post)){
                //si guardo retornar al panel
                return redirect()->to(base_url().'/panel_productos');
            }
            //$data["errores"] = $usuario_model->errors();
        }
        $data['titulo']='Add producto';
        echo view('front/head', $data);
        echo view('front/titulo_panel_productos'); 
        echo view('front/navbar_adm');
        echo view('back/producto/add_productos', $data);
        echo view('front/footer'); 
    }
    

    public function insertar_producto(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $producto_model = new Productos_models();
            $img_nueva = $this->request->getFile('img_producto');
            
            $validacion = $this->validate([
                "categoria_id" => "required",
                "nombre_producto" => "required",
                "precio_producto" => "required",
                "stock_producto" => "required",
                "descripcion_producto" => "required",
                "img_producto" => "uploaded[img_producto]|max_size[img_producto,4096]|is_image[img_producto]" 
            ], 
            [   "categoria_id" => [
                    "required" => "Debe ingresar un categoria."
                ],
                "nombre_producto" => [
                    "required" => "Debe ingresar una nombre."
                ],
                "precio_producto" => [
                    "required" => "Debe ingresar un precio."
                ],
                "stock_producto" => [
                    "required" => "Debe ingresar el stock."
                ],
                "descripcion_producto" => [
                    "required" => "Debe ingresar una descripción."
                ],
                "img_producto" => ["uploaded"=>"Debe ingresar una imagen.","max_size"=>"Debe ingresar una imagen mas chica.","is_image"=>"Debe ingresar una imagen jpg/png."]
            ]);
            
            
            if($validacion){
            
                $var_datos = $this->request->getPost();
                $nombre_img = $img_nueva->getRandomName();    
                $var_datos ['img_producto'] = $nombre_img;
                $producto_model->save($var_datos);
                $img_nueva->move(ROOTPATH . 'assets/uploads', $nombre_img); 
                session()->setFlashdata('success', 'Producto agregado correctamente!!');
                return redirect()->to(site_url('/panel_productos'))->withInput()->with('previewImage', $nombre_img);
                //return redirect()->to(base_url('panel_productos'));

            
                
            }else{
                $datos["errores"] = $this->validator->getErrors();
                $data['titulo']='ERROR';
                session()->setFlashdata('failed', 'No se puedo agregar el producto');
                echo view('front/head', $data); 
                echo view('front/titulo_panel_productos');
                echo view('front/navbar_adm');
                echo view('back/producto/add_productos', $datos);
                echo view('front/footer');
                //return redirect()->to(site_url('/add_producto'));
            }
        }
        
    }

    public function eliminar_producto(){
        $producto_model = new Productos_models();
        $producto_model->delete($this->request->getPostGet('id_producto'));
        return redirect()->to(base_url().'/panel_productos');
    }

    public function no_stock_productos($baja_producto = 0){
        $productos = new Productos_models();
        $productos = $productos->onlyDeleted()->findAll();
        $data=['titulo'=>'PRODUCTOS ELIMINADOS', 'datos' => $productos];
        //VISTAS
        echo view('/front/head', $data);
        echo view('front/titulo');
        echo view('front/navbar_adm');
        echo view('back/producto/no_stock_productos', ["productos" => $productos]);
        echo view('front/footer');
    }


    public function editar_producto(){
            $data['titulo']='EDITAR PRODUCTO';
            $idProducto = $this->request->getPostGet('id_producto');
        
            $productos = new Productos_models();
            $datos =array('datos' => $productos->where('id_producto',$this->request->getPostGet('id_producto'))->first());
    
            return view('front/head', $data).('front/titulo_producto').view('front/navbar_adm').view('back/producto/editar_producto', $datos).view('front/footer');
        
    }

    public function actualizar_producto(){
        $producto_model = new Productos_models();
        
        $datos = $this->request->getPost();

        $img_nueva = $this->request->getFile('img_producto');
        var_dump($img_nueva);
        if($img_nueva->isValid()){
            $datos ['img_producto'] = $img_nueva->getName();
            $img_nueva->move(ROOTPATH.'assets/uploads');
        }
        
        $id_modificar = $producto_model->where('id_producto', $this->request->getPost('id_producto'))->first();
        $producto_model->update($id_modificar, $datos);
        return redirect()->to(base_url('panel_productos'));
    }

    public function restaurar_producto(){
        $producto_model = new Productos_models();
        $baja = ['baja_producto'=> NULL];
        $producto_model->update($this->request->getPostGet('id_producto'),$baja);
        return redirect()->to(base_url().'/no_stock_productos');
    }


    public function mostrar_productos(){
        $productos = new Productos_models();

        $datos['productos'] = $productos->orderBy('id_producto','asc')->findAll();

        if(session()->get('loggedIn')){

        $data['titulo']='PEDI YA!';

            echo view('front/head2', $data); 
            echo view('front/titulo');
            echo view('front/navbar_user');
            echo view('front/pedi-ya', $datos);
            echo view('front/footer');
        } else{
            $data['titulo']='PEDI YA!';

            echo view('front/head2', $data); 
            echo view('front/titulo');
            echo view('front/navbar');
            echo view('front/pedi-ya', $datos);
            echo view('front/footer');
        }
    }



}