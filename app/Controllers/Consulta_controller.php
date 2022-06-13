<?php

namespace App\Controllers;
Use App\Models\Consultas_models;
Use App\Models\Usuario_models;
use App\Models\Usuarios_models;

$db = \Config\Database::connect();
use CodeIgniter\Controller;
//$session = \Config\Services::session($config);

class Consulta_controller extends BaseController
{
   

    public function __construct(){
        helper(['form', 'url']);
        $this->consulta = new Consultas_models();
        $this->session = session();
        
    }
 
    public function agregar_consulta(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $db = \Config\Database::connect();
            $this->session = session();
            $id_session = session()->get('id');
            $consulta_model = new Consultas_models();
            $datos =[
                'id_consulta' => $this->request->getPostGet('id_consulta'),
                'usuario_id' => $id_session,
                'nombre_consulta' => $this->request->getPostGet('nombre_consulta'),
                'descripcion_consulta' => $this->request->getPostGet('descripcion_consulta')

            ];
             if($db->table('consultas')->insert($datos)){
                //mjs pantalla
                 return redirect()->to(base_url().'/dashboard');
            }else{
                 return redirect()->to(base_url().'/asd');
             }

        }
    }

    

    public function ver_consulta(){
        $consulta_model = new Consultas_models();
        $data['titulo'] = 'Consultas';
    
        $datos['consultas'] = $consulta_model->orderBy('id_consulta','asc')->findAll();
        //return view('front/head2',$data).view('front/titulo').view('front/navbar_adm'). view('back/consulta/ver_consulta',$datos).view('front/footer');
        echo view('front/head',$data);
        echo view('front/titulo');
        echo view('front/navbar_adm');
        echo view('back/consulta/ver_consulta',$datos);
        echo view('front/footer');
    }


    public function contestar_consulta(){
        //if($_SERVER["REQUEST_METHOD"] == "POST"){
           // $db = \Config\Database::connect();
            $consultas_estado = new Consultas_models();
            //$user_consulta = new Usuarios_models(); //PK consulta  Contra CP usuario
            $estado = ['contestado_consulta' => 'SI'];
            $consultas_estado->update($this->request->getPostGet('id_consulta'),$estado);
           
            // $id_session = $session->get('id');
            // $estado = 'SI';
            // $datos =[
            //     'id_consulta' => $this->request->getPostGet('id_consulta'),
            //     'usuario_id' => $id_session,
            //     'nombre_consulta' => $this->request->getPostGet('nombre_consulta'),
            //     'descripcion_consulta' => $this->request->getPostGet('descripcion_consulta'),
            //     'contestado_consulta' => $estado

            // ];

           // $db->table('consultas')->insert($datos);
              
                

        


        //$consulta_estado = $this->request->getPost();

        //$consulta_estado['contestado_consulta'] = 'SI';
        //$dato = [ 'contestado_consulta' => 'SI'
        //        ];
        //$consultas_estado->save($consulta_estado);
        //$datos =array('contestado_consulta' => $contestar->where('id_consulta','SI')->first());

        return redirect()->to(base_url().'/dashboard');
    }










}