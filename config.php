<?php

/**
 * Arquivo responsável pela configuração da aplicação.
 * 
 * Defina todas as constantes antes de executar a aplicação.
 *  
 * A lib PHPMailer precisa configurar os campos de e-mail remetente, senha do remetente e o e-mail do destinátario.
 * 
 */

//  define("BD_USER", "");    
//  define("BD_PASSWORD", ""); 
//   define("BD_DSN", "");
//  define("EMAIL_RECIPIENT", ""); 
//  define("EMAIL_SENDER", ""); 
//  define("EMAIL_SENDER_PASSWORD", "");


// Acesso ao banco de dados.
define("BD_USER", "manager_tasks");
define("BD_PASSWORD", "E7A4aYTPk80RpCwc");
define("BD_DSN", "mysql:dbname=tasks;host=localhost");



// e-mail de notificação
// define("EMAIL_RECIPIENT", "lucasmoreiraeditor@gmail.com");
define("EMAIL_RECIPIENT", "rafael.ssilva03@gmail.com");
// define("EMAIL_RECIPIENT", "ricardo-santos-ribeiro@hotmail.com"); 
// define("EMAIL_RECIPIENT", "hamiltonsantosribeiro@hotmail.com"); 

// email do remetente
define("EMAIL_SENDER", "manager.tasks800@gmail.com");
define("EMAIL_SENDER_PASSWORD", "osXQB9M9H5Uw");