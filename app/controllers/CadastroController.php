<?php 

class CadastroController extends \HXPHP\System\Controller
{
	public function cadastrarAction(){
		$this->view->setFile('index');

		$this->request->setCustomFilters(array(
				'email'=>FILTER_VALIDATE_EMAIL
			));

		$cadastrarUsuario = User::cadastrar($this->request->post());

		//var_dump($this->request->post());Substitui $POST melhor segurança

		//Gerar senha

		//Obter role_id

	}
}