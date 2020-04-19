<?php


/**Verifica se tem dados no arrayy POST. */
function havePost()
{
    return count($_POST) > 0 ? true : false;
}

/**Traduz a prioridade da tarefa para exibição. 1 = Baixa, 2 = Média e 3 = Alta */
function translatesPriority($cod)
{
    $priority = '';

    switch ($cod) {
        case 1:
            $priority = 'Baixa';
            break;

        case 2:
            $priority = 'Média';
            break;

        default:
            $priority = 'Alta';
            break;
    }

    return $priority;
}

function translateDateDatabase($date)
{
    if ($date == '')
        return '';

    $aux = explode("/", $date);

    if (count($aux) != 3)
        return $date;

    $new_date = DateTime::createFromFormat('d/m/Y', $date);
    return $new_date->format('Y-m-d');
}


/**Traduz um data no formato pt-br para objeto da classe DateTime */
function translateDateBrToObject($date)
{
    if ($date == '')
        return '';

    $aux = explode("/", $date);

    if (count($aux) != 3)
        return $date;

    return DateTime::createFromFormat('d/m/Y', $date); 
}

/**Traduz a data do banco para o formato de data d/m/Y  */
function translateDateShow($date)
{
    if ($date == '' or $date == '0000-00-00')
        return '';


    $aux = explode("-", $date);

    if (count($aux) != 3) {
        return $date;
    }

    $data_object = DateTime::createFromFormat('Y-m-d', $date);
    return $data_object->format('d/m/Y'); // return string
}

/**verifica/retorna se a tarefa foi concluida: 0 => não e 1 => sim.  */
function translateHigh($data)
{
    return $data == 0 ? 'Não' : 'Sim';
}

function checkDateTerm($date)
{
    $default = '/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/';
    $result = preg_match($default, $date);

    if ($result == 0) {
        return false;
    }

    $data = explode('/', $date);

    $day = $data[0];
    $month = $data[1];
    $year = $data[2];

    $result = checkdate($month, $day, $year);

    return $result;
}

/** Verifica a extensão do arquivo(.pdf e .zip) com regex e salva ele no sistema de arquivos. */
function checkAnexo($anexo)
{
    $default = '/^.+(\.pdf|\.zip)$/';
    $result = preg_match($default, $anexo['name']);

    if ($result == 0) {
        return false;
    }

    move_uploaded_file(
        $anexo['tmp_name'],
         __DIR__ . "/../anexos/{$anexo['name']}"
    );

    return true;
}

/**envia e-mail */
function sendEmail(Task $task)
{
    require  __DIR__ . '/../libs/PHPMailer/src/PHPMailer.php';  
    require  __DIR__ . '/../libs/PHPMailer/src/Exception.php';
    require  __DIR__ . '/../libs/PHPMailer/src/SMTP.php';

    $email = new PHPMailer\PHPMailer\PHPMailer;

    try {
        $email->isSMTP(); // define o tipo de conexão, nesse caso SMTP.
        $email->Host = "smtp.gmail.com"; // define o endereço de servidor.
        $email->Port = 587; //define a porta para conexão.
        $email->SMTPSecure = 'tls'; //define a criptografia.
        $email->SMTPAuth = true; //define que é necessário autenticar no smtp com usuário e senha.
        $email->Username = EMAIL_SENDER; // email para autenticação
        $email->Password = EMAIL_SENDER_PASSWORD; //password para autenticação.
        $email->setFrom(EMAIL_SENDER, "Avisador de Tarefas"); //define o remetente do e-mail.
        $email->addAddress(EMAIL_RECIPIENT); // define o destinatário do e-mail.
        $email->Subject = "Aviso da tarefa: {$task->getName()}"; //define o assunto do e-mail.

        $body = prepareEmailBody($task); //prepara o conteúdo do e-mail.
        $email->msgHTML($body);

        // adiciona os anexos
        foreach ($task->getAnexos() as $anexo) {
            $email->addAttachment( __DIR__ . "/../anexos/{$anexo->getFile()}");
        }


        if (!$email->send()) {
            addLog($email->ErrorInfo);
        }

        return true;
    } catch (Exception $e) {
        addLog($email->ErrorInfo);
        return true;
    }
}

/**prepara o conteúdo do e-mail(template) para ser enviado. Usando output buffer*/
function prepareEmailBody(Task $task)
{
    ob_start(); //Liga o buffer de saída e bloqueia saídas de dados para o navegador.

    include __DIR__ . '/../views/template_email.php'; //inclui o arquivo no buffer.

    $body = ob_get_contents(); //pega o conteúdo do buffer e coloca na váriavel body. 

    ob_end_clean(); //Limpa o conteúdo do buffer e desliga o buffer. 

    return $body;
}


/** Adiciona a mensagem no log do sistema. */
function addLog($msg)
{
    $date_msg = date('Y-m-d H:i:s');
    $msg = "{$date_msg} {$msg}\n";

    file_put_contents('log.txt', $msg, FILE_APPEND);
}


/** Cria um array com os indices que devem ser exibidos no menu da paginação. */
function createIndixesPagination($page, $totalPages, $limit = 6){
    $indexes = array();
    
    if ($totalPages <= $limit){
        for($i = 1; $i <= $totalPages; $i++){
            $indexes[] = $i;
        }
    }else{
        if($page <= 3){
            $indexes = [
                0 => 1,
                1 => 2,
                2 => 3,
                3 => 4,
                4=> '+',
                5=> $totalPages
            ];
        }elseif($page >= $totalPages - 2){
            $indexes = [
                0 => 1,
                1 => '-',
                2 => $totalPages - 3,
                3 => $totalPages - 2,
                4=> $totalPages - 1,
                5=> $totalPages
            ];
        }else{
            $indexes = [
                0 => 1,
                1 => '-',
                2 => $page - 1,
                3 => $page,
                4=> $page + 1,
                5=> '+',
                6=> $totalPages
            ];
        }
    }

    return $indexes;
}

/** Obtem o valor de exibição da variável value no menu da paginação.*/
function getValuePagination($value){
    if($value == '+' || $value == '-'){
        return '...';
    }

    return $value;
}


/** Obtem o próximo valor da página na paginação.*/
function getNextValuePagination($value, $page){
    if($value == '+'){
        return $page + 2;
    }elseif ($value == '-'){
        return $page - 2;
    }else{
        return $value;
    }
}
