# Sobre o projeto
Este projeto é um TCC (Trabalho de Conclusão de Curso) que consiste em um web site com modelo de investimento equity crowdfunding, para projetos, ou seja, se você possuí uma ideia, porém não possuí recurso financeiro para tal, essa plataforma talvez possa ajudar

# Tecnologias Utilizadas
* PHP   => 8.1.11.
* MySQL => 8.0.30.
* HTML5.
* CSS3.
* JavaScript.
* Bootstrap 4.6.

# Especificações Técnicas
* MVC
* Orientação a Objetos
* PDO
* Composer (autoload)
* PHPDOC
* PSRs
* URL amigávies (Class/Method/Params)
* htaccess (Para redirecionamento e Bloquear acesso as pastas)
* Padrão de Projeto Singleton
* Ajax (Fetch API)

# Observações
Como o código desse projeto está sendo refatorado(refeito), o projeto ainda não está pronto e nem todas as telas estão 100% funcionais.

Para o projeto funcionar é necessário ter o composer instalado e executar o código abaixo, dentro da pasta do projeto
~~~
composer install
~~~
esse comando irá instalar todas bibliotecas utilizadas no projeto.

A pasta vendor/WC, contém um modelo de mini framework que foi desenvolvido manualmente

O Projeto está configurado para funcionar no Wampp/Xampp/Lamp
Se for utilizar o site com o servidor embutido do PHP
~~~
php -S localhost:9000
~~~
é necessário acessar a pasta App -> config -> constants e informar a porta utilizada na constante URL, exemplo:
define('URL', 'http://localhost:9000/world-connection'); .

# Equipe
* Eduardo Domingos
* Gabrel Boneti
* Leonardo Ribeiro
