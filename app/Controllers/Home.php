<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index (){
        $data['titulo']= 'Principal';
        echo view('front/head',$data);
        echo view('front/titulo');
        echo view('front/navbar');
        echo view('front/main');
        echo view('front/footer');
    }
    public function inicio (){
        $data['titulo']= 'Inicio';
        echo view('front/head',$data);
        echo view('front/titulo');
        echo view('front/navbar_adm');
        echo view('front/main');
        echo view('front/footer');
    }

    public function loggin (){
        $data['titulo']= 'Login';
        echo view('front/head',$data);
        echo view('front/titulo');
        echo view('front/navbar');
        echo view('front/loggin');
        echo view('front/footer');
    }

    public function pedi_ya (){
        $data['titulo']= 'Pedi Ya';
        echo view('front/head2',$data);
        echo view('front/titulo');
        echo view('front/navbar');
        echo view('front/pedi-ya');
        echo view('front/footer');
    }

    public function pedi_ya_user (){
        $data['titulo']= 'Pedi Ya';
        echo view('front/head2',$data);
        echo view('front/titulo');
        echo view('front/navbar_user');
        echo view('front/pedi-ya');
        echo view('front/footer');
    }

    public function quienes_somos (){
        $data['titulo']= 'Quienes Somos';    
        echo view('front/head3',$data);
        echo view('front/titulo');
        echo view('front/navbar');
        echo view('front/quienes-somos');
        echo view('front/footer');
    }

    public function contacto (){
        $data['titulo']= 'Contacto';     
        echo view('front/head4',$data);
        echo view('front/titulo');
        echo view('front/navbar');
        echo view('front/contacto');
        echo view('front/footer');
    }

    public function comercializacion (){
        $data['titulo']= 'Comercializacion';    
        echo view('front/head4',$data);
        echo view('front/titulo');
        echo view('front/navbar');
        echo view('front/comercializacion');
        echo view('front/footer');
    }

    public function terminosyusos (){
        $data['titulo']= 'Terminos y Usos'; 
        echo view('front/head4',$data);
        echo view('front/titulo');
        echo view('front/navbar');
        echo view('front/terminosyusos');
        echo view('front/footer');
    }

    public function tablas (){
        $data['titulo']= 'PANEL ADM'; 
        echo view('front/head',$data);
        //echo view('front/navbar_adm');
        echo view('front/tables');
        //echo view('front/footer');
    }

}
