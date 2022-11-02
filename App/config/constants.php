<?php

/**
 * Constantes do Projeto
 */

/**
 * Diretório do Site
 */
define('APP', dirname(__FILE__));

/**
 * URL do Site
 */
define('URL', 'http://localhost/world-connection');

/**
 * Nome do Site
 */
define('APP_NAME', 'Wc');

/**
 * Versão do Site
 */
define('APP_VERSION', '2.0');

/**
 * Prefixo da URL (Apache Xampp/Wamp)
 */
define('URL_PREFIX', '/world-connection');

/**
 * Gera log de erros (erros fatais e avisos) na aplicação
 * false -> apresenta os erros na interface
 * true  -> apresenta os erros no arquivo de log, na interface não apresenta nada
 */
define('DEBUG', true);
