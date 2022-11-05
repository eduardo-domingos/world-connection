<?php

namespace App\Models;

use WC\Model\Model;
use PDO;

class User extends Model
{
    /**
     * Id do usuário
     * @var int
     */
    private int $id;
    
    /**
     * Nome do usuário
     * @var string
     */
    private string $name;
    
    /**
     * Email do usuário
     * @var string
     */
    private string $email;
    
    /**
     * Telefone do usuário
     * @var string
     */
    private string $phone;
    
    /**
     * CNPJ/CPF do usuário
     * @var string
     */
    private string $cpfCnpj;
    
    /**
     * Senha do usuário
     * @var string
     */
    private string $password;
    
    /**
     * Repetir senha do usuário
     * @var string
     */
    private string $repeatPassword;
    
    /**
     * Tipo de Pessoa (CPF, CNPJ)
     * @var string
     */
    private string $typePerson; 
    
    /**
     * GETTERS
     * @param string $attribute
     * @return string
     */
    public function __get(string $attribute): string
    {
        return $this->$attribute;
    }
    
    /**
     * SETTERS
     * @param string $attribute
     * @param mixed $value
     * @return void
     */
    public function __set(string $attribute, mixed $value): void
    {
        $this->$attribute = $value;
    }
    
    /**
     * Cadastra o usuário
     * @return User
     */
    public function insertUser(): User
    {
        
        $sql = 'INSERT INTO users(name, email, phone, cpf_cnpj, password, type_person) 
                VALUES(:name, :email, :phone, :cpf_cnpj, :password, :type_person)';
        
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindValue(':name', $this->__get('name'));
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':phone', $this->__get('phone'));
        $stmt->bindValue(':cpf_cnpj', $this->__get('cpfCnpj'));
        $stmt->bindValue(':password', password_hash($this->__get('password'), PASSWORD_DEFAULT));
        $stmt->bindValue(':type_person', $this->__get('typePerson'));
        $stmt->execute();
        
        return $this;
        
    }
    
    /**
     * Valida os dados do usuário que serão cadastrados no banco
     * @return array
     */
    public function validInsertUser(): array
    {
        $valid = [];
        
        if(strlen($this->__get('name')) < 3){
            $valid['name_error'] = 'O nome deve ter no mínimo 3 caracteres';
        }elseif(empty($this->__get('name'))){
            $valid['name_error'] = 'Preencha o campo nome';
        }
        
        if(filter_var($this->__get('email'), FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL) === false){
            $valid['email_error'] = 'Email inválido';
        }elseif(empty($this->__get('email'))){
            $valid['email_error'] = 'Preencha o campo e-mail';
        }elseif(count($this->getUserByEmail()) != 0){
            $valid['email_error'] = 'O e-mail informado já está cadastrado';
        }
        
        if(empty($this->__get('phone'))){
            $valid['phone_error'] = 'Preencha o campo celular';
        }elseif(strlen($this->__get('phone')) < 14){
            $valid['phone_error'] = 'Celular inválido';
        }elseif(count($this->getUserByPhone()) != 0){
            $valid['phone_error'] = 'O celular informado já está cadastrado';
        }
        
        $qntdCpfCnpj = ($this->__get('typePerson') === 'CPF') ? 14 : 18;
        
        if(empty($this->__get('cpfCnpj'))){
            if($qntdCpfCnpj === 14){
                $valid['cpf_error'] = 'Preencha o campo cpf';
            }else{
                $valid['cnpj_error'] = 'Preencha o campo cnpj';
            }
        }elseif(strlen($this->__get('cpfCnpj') < 14)){
            $valid['cpf_error'] = 'CPF inválido';
        }elseif(strlen($this->__get('cpfCnpj') < 18)){
            $valid['cnpj_error'] = 'CNPJ inválido';
        }elseif(count($this->getUserByCpfOrCnpj()) != 0){
            if($qntdCpfCnpj === 14){
                $valid['cpf_error'] = 'O cpf informado já está cadastrado';
            }else{
                $valid['cnpj_error'] = 'O cnpj informado já está cadastrado';
            }
        }
        
        if(strlen($this->__get('password')) < 8){
            $valid['password_error'] = 'A senha deve ter no mínimo 8 caracteres';
        }elseif(empty($this->__get('password'))){
            $valid['password_error'] = 'Preencha o campo senha';
        }
        
        if(empty($this->__get('repeatPassword'))){
            $valid['repeatPassword_error'] = 'Confirme a senha';
        }elseif($this->__get('password') !== $this->__get('repeatPassword')){
            $valid['repeatPassword_error'] = ' As senhas são diferentes';
        } 
        
        return $valid;
        
    }
   
    /**
     * Retorna o usuário com base no email
     * @return array
     */
    public function getUserByEmail(): array
    {
        
        $sql = "SELECT 
                    id_user, name, email
                FROM
                    users
                WHERE
                    email = :email;";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Retorna o usuário com base no CPF/CNPJ
     * @return array
     */
    public function getUserByCpfOrCnpj(): array
    {

        $sql = "SELECT 
                    id_user, name, email
                FROM
                    users
                WHERE
                    cpf_cnpj = :cpf_cnpj;";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':cpf_cnpj', $this->__get('cpfCnpj'));
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_OBJ);

    }

    /**
     * Retorna usuário com base no telefone
     * @return array
     */
    public function getUserByPhone(): array
    {

        $sql = "SELECT 
                    id_user, name, email
                FROM
                    users
                WHERE
                    phone = :phone;";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':phone', $this->__get('phone'));
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_OBJ);

    }
    
    /**
     * Efetua o login, verifica se o usuário e senha existe no banco
     * @return array|bool
     */
    public function autentication(): User|bool
    {
        $sql = "SELECT 
                    id_user, 
                    name, 
                    email,
                    password
                FROM
                    users
                WHERE
                    email = :email";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->execute();
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if(!empty($user) && password_verify($this->__get('password'), $user['password'])){
            
            $this->__set('id', $user['id_user']);
            $this->__set('email', $user['email']);
            $this->__set('name', $user['name']);
            
            return $this;
            
        }else{
            return false;
        }
        
    }
    
    /**
     * Retorna todos os dados do usuário
     * @return User|array
     */
    public function getUserProfileById(): User|array
    {
        
        $sql = "SELECT 
                    *
                FROM
                    users
                WHERE
                    id_user = :id";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->execute();
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if(!empty($user)){
            
            $this->__set('id', $user['id_user']);
            $this->__set('name', $user['name']);
            $this->__set('email', $user['email']);
            $this->__set('cpfCnpj', $user['cpf_cnpj']);
            $this->__set('phone', $user['phone']);
            $this->__set('password', $user['password']);
            $this->__set('typePerson', $user['type_person']);
            
            return $this;
            
        }else{
            return false;
        }
        
    }
    
}
