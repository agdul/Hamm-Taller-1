<?php namespace App\Filters;
$session = \Config\Services::session();
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
class Auth_adm implements FilterInterface{
     

    public function before(RequestInterface $request, $arguments = null){
    //  
        if((!session()->get('loggedIn') || session()->get('perfil_id') == 2) && session()->get('perfil_id') !== 1){
        // then redirct to login page
        return redirect()->to('/login'); 
        }
    }
//--------------------------------------------------------------------
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null){
    // Do something here
    
    }

}