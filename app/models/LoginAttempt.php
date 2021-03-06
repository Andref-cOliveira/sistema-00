<?php

class LoginAttempt extends \HXPHP\System\Model{
	public static function totalDeTentativas($user_id){
		return count(self::find_all_by_user_id($user_id));
	}

	public static function tentativasRestantes($user_id){
		return intval(4-self::totalDeTentativas($user_id));
	}

	public static function registrarTentativa($user_id){
		self::create(array(
			'user_id' => $user_id
		));
	}

	public static function limparTentativas($user_id){
		self::delete_all(array(
			'conditions' =>array(
				'user_id = ?',
				$user_id
				)
			));
	}

	public static function exitemTentativas($user_id){
		return self::totalDeTentativas($user_id) <= 4? true: false;
	}
}