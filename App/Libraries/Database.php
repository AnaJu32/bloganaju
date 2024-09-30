<?php
class Database {
    private $host = 'localhost';
    private $usuario = 'root';
    private $senha = '';
    private $banco = 'blog';
    private $porta = '3306'; 
    private $dbh;
    private $stmt;
}

public function __construct()
{
    $dsn = 'msql:host='.$this->host.';port='.$this->porta.';dbname='.$this->banco;
    $opcoes = [
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];      
}
public function __construct()
    {
        $this->dbh = new PDO($dsn, $this->usuario, $this->senha, $opcoes);
    } catch (PDOException $e) {
        print "Error!: ". $e->getMessage() . "<br/>";
        die();
    }
    public function bind($parametro, $valor, $tipo = null){
        if(is_null($tipo)):
            switch (true):
                case is_int($valor):
                    $tipo = PDO::PARAM_INT;
                    break;
                    case is_bool($valor):
                        $tipo = PDO::PARAM_BOOL;
                        break;
        case is_null($valor):
            $tipo = PDO::PARAM_NULL;
            break;
            default:
            $tipo = PDO::PARAM_STR;
        endif;
    
        $this->stmt->bindValue($parametro, $valor, $tipo);
    }
    public function executa(){
        return $this->stmt->execute();
    }