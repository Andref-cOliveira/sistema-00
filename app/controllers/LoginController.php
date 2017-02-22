<?php 

class LoginController extends \HXPHP\System\Controller
{
	public function __construct($configs){
		parent::__construct($configs);

		$this->load(
			'Services\Auth',
			 $configs->auth->after_login,
			 $configs->auth->after_logout,
			 true
		);

		$this->auth->redirectCheck(false);//se falso pagina privada se true pagina publica
	}


	public function logarAction(){
		$this->view->setFile('index');

		$post = $this->request->post();
		if(!empty($post)){
			$login = User::login($post);

			if($login->status === true){
				$this->auth->login($login->user->id, $login->user->username);
			} else {
				$this->load('Modules\Messages', 'auth');
				$this->messages->setBlock('alerts');
				$error = $this->messages->getByCode($login->code);

				$this->load('Helpers\Alert', $error);
			}
		}
	}
}