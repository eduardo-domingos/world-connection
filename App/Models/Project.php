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
    private string $image;
    
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
        
    }
    
    /**
     * Valida os dados do Projeto que serão cadastrados no banco
     * @return array
     */
    public function validInsertProject(): array
    {
        $valid = [];
        
        if(strlen($this->__get('title')) < 3 || empty(strlen($this->__get('title')))){
            $valid['title'] = 'Título inválido';
        }
        
        if(strlen($this->__get('team')) < 3 || empty(strlen($this->__get('team')))){
            $valid['team'] = 'Equipe inválido';
        }
        
        if(strlen($this->__get('summary')) < 20 || empty(strlen($this->__get('summary')))){
            $valid['summary'] = 'Resumo inválido';
        }
        
        if(strlen($this->__get('locality')) < 5 || empty(strlen($this->__get('locality')))){
            $valid['locality'] = 'Localidade inválido';
        }
        
        if(strlen($this->__get('video')) < 18 || empty($this->__get('video')) || filter_var($this->__get('video'), FILTER_SANITIZE_URL)){
            $valid['video'] = 'Vídeo inválida';
        }
        
        if(is_float($this->__get('price')) < 0.00 || empty($this->__get('price'))){
            $valid['price'] = 'Preço inválido';
        }
        
        if($this->__get('photo') !== $this->__get('photo')){
            $valid['photo'] = 'Photo inválido';
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
    
    
    
}
