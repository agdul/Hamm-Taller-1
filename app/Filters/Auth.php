<?php namespace App\Filters;
$session = \Config\Services::session();
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
class Auth implements FilterInterface{
     

    public function before(RequestInterface $request, $arguments = null){
    // if user not logged in
        if(!session()->get('loggedIn')){
        // then redirct to login page
        return redirect()->to('/login'); 
        }
    }
//--------------------------------------------------------------------
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null){
    // Do something here
    
    }

}