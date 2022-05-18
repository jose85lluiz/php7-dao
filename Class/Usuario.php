<?php


class Usuario{

	private $id_usuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

		public function getId_usuario(){

			return $this -> id_usuario;
		} 
		public function setId_usuario($value){
	        $this -> id_usuario = $value;

		}
		public function getDeslogin(){

			return $this -> deslogin;
		} 
		public function setDeslogin($value){
	        $this -> deslogin = $value;
		}


		public function getDessenha(){

			return $this -> dessenha;
		} 
		public function setDessenha($value){
	        $this -> dessenha = $value;
		}


		public function getDtcadastro(){

			return $this -> dtcadastro;
		} 
		public function setDtcadastro($value){
	        $this -> dtcadastro = $value;
		}

public function loadById($id){
$sql = new Sql();
$result = $sql -> select("SELECT * FROM tb_usuarios WHERE id_usuario =:ID",array(

":ID"=> $id));

if (isset($result[0])){

	$row = $result[0];
	$this -> setId_usuario($row['id_usuario']);
	$this -> setDeslogin($row['deslogin']);
	$this -> setDessenha($row['dessenha']);
	$this -> setDtcadastro(new DateTime($row['dtcadastro']));
    }
  }

public function __toString(){

 return json_encode(array(
 "id_usuario"=> $this -> getId_usuario(),
 "deslogin" => $this -> getDeslogin(),
 "dessenha" => $this -> getDessenha(),
 "dtcadastro"=> $this -> getDtcadastro() -> format("d/m/y H:i:s")

 ));
}

}



?>