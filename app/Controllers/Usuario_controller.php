<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Consultas_models;
Use App\Models\Usuarios_models;

use CodeIgniter\Controller;


class Usuario_controller extends BaseController{

    private $usuario;
    private $session;
    //Metodo Constructor
	public function __construct(){
           helper(['form', 'url']);
           $this->user = new Usuarios_models();
           $this->session = session();
	}
    //Metodo Que RETORNA La VISTA del REGISTRO_usuario
    public function register(){
        $data['titulo']='Registrarse';
        return view('front/head', $data).view('front/titulo').view('front/navbar').view('front/registrarse').view('front/footer');

	}
    //Metodo Que CREAR Usuario con las validaciones 
    public function create()
	{
		$inputs = $this->validate([
            'nombre'   => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'direccion' => 'required|min_length[3]',
            'email'    => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'usuario'  => 'required|min_length[3]',
            'pass'     => 'required|min_length[3]|max_length[10]'

        ],
        [
       'nombre' => [
           'required' => 'Debe ingresar un nombre.'
        ],
       'apellido' => [
        'required' => 'Debe ingresar un apellido.'
        ],
        'direccion' => [
            'required' => 'Debe ingresar un direccion.'
        ],
        'usuario' => [
            'required' => 'Debe ingresar un usuario.'
        ],
        'email' => [
            'required' => 'Debe ingresar un email.' //agregar array de errores para email en uso
        ],
        'pass' => [
            'required' => 'Debe ingresar un password.'
        ]
            ]);
        //Si NO pasa el VALIDATE retorna las vistas con los errores
		if (!$inputs) {
            $data['titulo']='Registrarse';
			return view('front/head', $data).view('front/titulo').view('front/navbar').view('front/registrarse', ['validation' => $this->validator]).view('front/footer');
		}
        //Sino Guarda
		$this->user->save([
            'nombre' => $this->request->getVar('nombre'),
            'apellido' => $this->request->getVar('apellido'),
            'direccion' => $this->request->getVar('direccion'),
            'usuario' => $this->request->getVar('usuario'),
            'email'  => $this->request->getVar('email'),
            'pass'  => password_hash($this->request->getVar('pass'), PASSWORD_BCRYPT)
        ]);
		session()->setFlashdata('success', 'Exito! Registro completado.');
        //Redirecciona
		return redirect()->to(site_url('/login'));
	}

    //Metodo que RETORNA VISTA LOGIN
    public function login(){
        $data['titulo']='Login';

		return view('front/head', $data).view('front/titulo').view('front/navbar').view('front/loggin').view('front/footer');
	}

    //Funcion que Valida los El LOGIN/ingreso

    public function loginValidate()
	{   //crea un arry inputs donde intancia las validaciones 
		$inputs = $this->validate([
			'email' => 'required|valid_email',
			'pass' => 'required|min_length[5]'
        ],
        [
            'email' => [
                'required' => 'Debe ingresar un email.'
                ],
            'pass' => [
                'required' => 'Debe ingresar un contraseña.'
                ],
		]);
        //Si no cumple con las validaciones retorna a la vista del loggin con el arrary de validaciones(errores)  
		if (!$inputs) {
            $data['titulo']='Login';
			return view('front/head', $data).view('front/titulo').view('front/navbar').view('front/loggin', ['validation' => $this->validator]).view('front/footer');
		}
        //getVar Recupera un valorunico de la db
		$email = $this->request->getVar('email');
		$password = $this->request->getVar('pass');

		$user = $this->user->where('email', $email)->first();
        
		if ($user) {
            //Recupera la contrase;a del primer email que encontro
			$pass = $user['pass'];
			$authPassword = password_verify($password, $pass);//chekea y guarda y el valor 
            //SI ES TRUE (LOG-IN)
			if ($authPassword) {
				$sessionData = [
					'id' => $user['id'],
                    'nombre' => $user['nombre'],
					'apellido' => $user['apellido'],
					'direccion' => $user['direccion'],
                    'usuario' => $user['usuario'],
                    'email' => $user['email'],
                    'perfil_id' => $user['perfil_id'],
					'loggedIn' => true,
                ];   

				$this->session->set($sessionData);
                //Y pasa al Panel
				return redirect()->to(site_url('/dashboard'));
        
			}
            //error
			session()->setFlashdata('failed', 'Error! Contraseña incorrecta');
			return redirect()->to(site_url('/login'));
		}
        //error
		session()->setFlashdata('failed', 'Error! Email no registrado!');
		return redirect()->to(site_url('/login'));
	}

    //Metodo panel control cuentas 
    public function dashboard(){
        //Si el perfil el ADM
        if(session()->get('perfil_id') == '1'){
        $consulta_model = new Consultas_models();
        $data['titulo']='ADM';
        $datos['consultas'] = $consulta_model->orderBy('id_consulta','asc')->findAll();    
		return view('front/head', $data).view('front/titulo_panel_consulta').view('front/navbar_adm').view('back/consulta/ver_consulta',$datos).view('front/footer');

        }else{ //sino

            return redirect()->to(site_url('dashboard_usuario'));
        }
	}
    //metodo VISTA de Usuario
    public function dashboard_usuario(){
        $this->session = session();
        $data['titulo']='Bienvenido';
        $nombre = session()->get('nombre');
        session()->setFlashdata('logIN', 'Bienvenido a Roll UP & WRAPS.');
		return view('front/head', $data).view('front/titulo').view('front/navbar_user',).view('front/main').view('front/footer_user');
	}

    public function quienes_somos_user (){
        $data['titulo']= 'Quienes Somos';    
        echo view('front/head3',$data);
        echo view('front/titulo');
        echo view('front/navbar_user');
        echo view('front/quienes-somos');
        echo view('front/footer');
    }

    public function contacto_user (){
        $data['titulo']= 'Contacto';     
        echo view('front/head4',$data);
        echo view('front/titulo');
        echo view('front/navbar_user');
        echo view('front/contacto');
        echo view('front/footer_user');
    }

    public function comercializacion_user (){
        $data['titulo']= 'Comercializacion';    
        echo view('front/head4',$data);
        echo view('front/titulo');
        echo view('front/navbar_user');
        echo view('front/comercializacion');
        echo view('front/footer_user');
    }

    public function terminosyusos_user (){
        $data['titulo']= 'Terminos y Usos'; 
        echo view('front/head4',$data);
        echo view('front/titulo');
        echo view('front/navbar_user');
        echo view('front/terminosyusos');
        echo view('front/footer_user');
    }

  
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }


    public function eliminar_user(){
        $usuario_model = new Usuarios_models();
        $usuario_model->delete($this->request->getPostGet('id'));
        return redirect()->to(base_url().'/panel_usuarios');
    }

    public function actualizar_user(){
        $usuario_model = new Usuarios_models();
        $id_modificar = $usuario_model->where('id', $this->request->getPost('id'))->first();
        $data_actualizada = array(
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'email' => $this->request->getPost('email')
        );

        $data_actualizada ['id'] = $usuario_model->find($this->request->getPost('id'));
        $usuario_model->save($data_actualizada);
        return redirect()->to(base_url('panel_usuarios'));
    }

    public function editar_user(){
        $data['titulo']='EDITAR USUARIO';
        $idUsuario = $this->request->getPostGet('id');
        
        $usuario = new Usuarios_models();
        $datos =array('datos' => $usuario->where('id',$this->request->getPostGet('id'))->first());

        return view('front/head', $data).view('front/titulo_panel_usuario').view('front/navbar_adm').view('back/usuario/editar_usuario', $datos).view('front/footer');
    }

    public function eliminados_user($baja = 0){
        $usuarios = new Usuarios_models();
        $usuarios = $usuarios->onlyDeleted()->findAll();
        $data=['titulo'=>'USUARIOS ELIMINADOS', 'datos' => $usuarios];
        //VISTAS
        echo view('/front/head', $data);
        echo view('front/titulo');
        echo view('front/navbar_adm');
        echo view('back/usuario/eliminados_usuario', ["usuarios" => $usuarios]);
        echo view('front/footer');
    }

    public function restaurar_user(){
        $usuario_model = new Usuarios_models();
        $baja_usuario = ['baja'=> NULL];
        $usuario_model->update($this->request->getPostGet('id'),$baja_usuario);
        return redirect()->to(base_url().'/eliminados_usuario');
    }

    public function panel_usuarios() {
        $usuario_model = new Usuarios_models();
        $datos['usuarios'] = $usuario_model->orderBy('id','ASC') -> findAll();
        $data['titulo']='Panel Usuarios'; 

       echo view('front/head',$data);
       echo view('front/titulo_panel_usuario');
       echo view('front/navbar_adm');
       echo view('back/usuario/panel_usuario',$datos);
       echo view('front/footer');
   }

   
   public function add_usuario(){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $user = new Usuarios_models();

        $validacion = $this->validate([

            'nombre'   => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'direccion' => 'required|min_length[3]|max_length[25]',
            'email'    => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'usuario'  => 'required|min_length[3]',
            'pass'     => 'required|min_length[3]|max_length[10]'
            
            ],
            [
           'nombre' => [
               'required' => 'Debe ingresar un nombre.'
            ],
           'apellido' => [
            'required' => 'Debe ingresar un apellido.'
            ],
            'direccion' => [
                'required' => 'Debe ingresar un direccion.'
            ],
            'usuario' => [
                'required' => 'Debe ingresar un usuario.'
            ],
            'email' => [
                'required' => 'Debe ingresar un email.' //agregar array de errores para email en uso
            ],
            'pass' => [
                'required' => 'Debe ingresar un password.'
            ],
        ]);
 
        if(!$validacion){
            $data['titulo']='Error add suario';
			return view('front/head', $data).view('front/titulo_panel_usuario').view('front/navbar_adm').view('back/usuario/add_usuario', ['validation' => $this->validator]).view('front/footer');
		}else{
            $this->user->save([
                'nombre' => $this->request->getVar('nombre'),
                'apellido' => $this->request->getVar('apellido'),
                'direccion' => $this->request->getVar('direccion'),
                'usuario' => $this->request->getVar('usuario'),
                'email'  => $this->request->getVar('email'),
                'pass'  => password_hash($this->request->getVar('pass'), PASSWORD_BCRYPT)
            ]);
            session()->setFlashdata('success', 'Exito! Usuario completado.');
            return redirect()->to(site_url('/panel_usuarios'));
        }

        }else{
            $data['titulo']='Agregar usuario';
            return view('front/head', $data).view('front/titulo_panel_usuario').view('front/navbar_adm').view('back/usuario/add_usuario').view('front/footer');
        }


    }
}


 


