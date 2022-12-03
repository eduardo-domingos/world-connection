<?php

namespace App\Models;

use WC\Model\Model;
use PDO;

class Project extends Model
{
    /**
     * ID do projeto
     * @var string|int
     */
    private string|int $id;
    
    /**
     * ID do Usuário que criou o projeto
     * @var string|int
     */
    private string|int $idUser;
    
    /**
     * Título do projeto
     * @var string
     */
    private string $title;
    
    /**
     * Time/Equipe do projeto
     * @var string
     */
    private string|array $team;
    
    /**
     * Resumo sobre o projeto
     * @var string
     */
    private string $summary;
    
    /**
     * Data de criação do projeto
     * @var string
     */
    private string $date;
    
    /**
     * Caminho do vídeo (Link YouTube) sobre o projeto
     * @var string
     */
    private string $video;
    
    /**
     * Caminho da imagem sobre o projeto
     * @var string
     */
    private string $photo;
    
    /**
     * Localidade do Projeto/Equipe
     * @var string
     */
    private string $locality;
    
    /**
     * Preço do investimento do projeto
     * @var string|int|float
     */
    private string|int|float $price;
    
    /**
     * Salva o projeto
     * @return Project
     */
    public function saveProject(): Project
    {
        $sql = 'INSERT INTO projects(id_user, title, team, summary, video, image, price) 
                VALUES(:id_user, :title, :team, :summary, :video, :image, :price)';
        
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindValue(':id_user', $this->__get('idUser'));
        $stmt->bindValue(':title', $this->__get('title'));
        $stmt->bindValue(':team', $this->__get('team'));
        $stmt->bindValue(':summary', $this->__get('summary'));
        $stmt->bindValue(':video', $this->treatYoutubeUrl());
        $stmt->bindValue(':image',  md5(uniqid(time())).'.jpeg');
        $stmt->bindValue(':price', $this->treatsMoney());
        $stmt->execute();
        
        return $this;
    }


    /**
     * Trata URL do youtube
     */
    private function treatYoutubeUrl()
    {

        $cdvideo = explode("=",$this->__get('video'));

        $youtube = explode(".",$cdvideo[0]);

        if($youtube[1]=="youtube"){

            if(isset($cdvideo[2])){	

                $valor = explode("&",$cdvideo[1]);
                $etec = $valor[0];

            }else{

                $etec = $cdvideo[1];

            }	
        }

    }

    /**
     * Tratar dinheiro
     * @return float
     */
    private function treatsMoney(): float
    {
        return (float) str_replace(',' , '.', $this->__get('price'));
    }
    
    /**
     * Valida os dados do Projeto que serão cadastrados no banco
     * @return array
     */
    public function validInsertProject(): array
    {
        $valid = [];
        
        if(strlen($this->__get('title')) < 3 || empty(strlen($this->__get('title')))){
            $valid['title_error'] = 'Título inválido';
        }
        
        if(strlen($this->__get('team')) < 10 || empty(strlen($this->__get('team')))){
            $valid['team_error'] = 'Equipe inválido';
        }
        
        if(strlen($this->__get('summary')) < 20 || empty(strlen($this->__get('summary')))){
            $valid['summary_error'] = 'Resumo inválido';
        }
        
        if(strlen($this->__get('locality')) < 5 || empty(strlen($this->__get('locality')))){
            $valid['locality_error'] = 'Localidade inválido';
        }

        if(strlen($this->__get('video')) < 10 || empty($this->__get('video'))){

            if(filter_var($this->__get('video'), FILTER_SANITIZE_URL, FILTER_VALIDATE_URL)){
                $valid['video_error'] = 'Vídeo inválida';
            }
            
        }
        
        if((float) $this->__get('price') < 0.00 || empty($this->__get('price'))){
            $valid['price_error'] = 'Preço inválido';
        }
        
        if(empty($this->__get('photo'))){
            $valid['photo_error'] = 'Photo inválido';
        }   
        
        return $valid;
        
    }
    
    public function getProjects()
    {
        $sql = 'SELECT * FROM projects';
        
        $stmt = $this->db->prepare($sql);
        
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

     /**
     * GETTERS
     * @param string $attribute
     * @return mixed
     */
    public function __get(string $attribute): mixed
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
    
}
