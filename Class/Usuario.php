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

public function loadById($id){        // metodo para mostrar apenas 1 usuario do banco de dados, pelo id informado no index
$sql = new Sql();
$results = $sql -> select("SELECT * FROM tb_usuarios WHERE id_usuario =:ID",array(

":ID"=> $id));

if (isset($results[0])){

	$row = $results[0];
	$this -> setData($results[0]);

    }
  }

  public static function getList(){   // metodo para listar usuarios do banco de dados , ordem por id
  	$sql = new Sql();
  	return $sql -> select("SELECT * FROM tb_usuarios ORDER BY id_usuario;");

  }
  public static function search($login){// metodo para procurar dados no banco de dados .
  	$sql = new Sql();
     return $sql -> select("SELECT * FROM  tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin",array(
     ':SEARCH' => "%".$login."%" 
    
     ));

  }


  public function update ($login, $pass){

  	$this -> setDeslogin($login);
  	$this -> setDessenha($pass);

      $sql = new Sql();

      $sql -> query("UPDATE tb_usuarios SET deslogin=:LOGIN, dessenha=:PASS WHERE id_usuario=:ID", array(
      ':LOGIN'=>$this -> getDeslogin(),
      ':PASS'=>$this -> getDessenha(),
       ':ID'=>$this -> getId_usuario()
      ));

 
  }

  public function delete(){

   $sql = new Sql();
   $sql -> query("DELETE FROM tb_usuarios WHERE id_usuario=:ID",array(
':ID'=> $this -> getId_usuario()
   
   ));

 $this ->setId_usuario(0);
 $this ->setDeslogin("");
 $this ->setDessenha("");
 $this ->setDtcadastro(new DateTime);

  } 

public function login($login,$pass){
$sql = new Sql();
$results = $sql -> select("SELECT * FROM tb_usuarios WHERE deslogin =:LOGIN AND dessenha = :PASSWORD",array(

":LOGIN"=> $login,
":PASSWORD"=> $pass));

if (isset($results[0])){

   $this -> setData($results[0]);

    } else {
     throw new exception("Login e/ou senha inválidos."); 

    }

}
public function setData($data){
    $this -> setId_usuario($data['id_usuario']);
	$this -> setDeslogin($data['deslogin']);
	$this -> setDessenha($data['dessenha']);
	$this -> setDtcadastro(new DateTime($data['dtcadastro']));

}

public function insert(){

$sql = new Sql();
$results = $sql -> select("CALL sp_usuarios_insert(:LOGIN ,:PASSWORD)",ARRAY(
 ':LOGIN'=>$this -> getDeslogin(),
 ':PASSWORD'=>$this ->getDessenha()
));

if (isset($results[0])){

	$this -> setData($results[0]);

}

}

 public function __construct($login="",$pass=""){ // ""despois das variaveis , para nao gerar conflito com outros metodos,
$this -> setDeslogin($login);                     // passa valores vazios nas variaveis $login e $pass
$this -> setDessenha($pass);

}

public function __toString(){

 return json_encode(array(
 "id_usuario"=> $this -> getId_usuario(),
 "deslogin" => $this -> getDeslogin(),
 "dessenha" => $this -> getDessenha(),
 "dtcadastro"=> $this -> getDtcadastro() -> format("d .m. Y :: H:i:s")

 ));
}

}



?>