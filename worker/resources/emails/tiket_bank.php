<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <title>User Contact</title>
    </head>
    <body>
        <div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;">
            <h1>Parabéns  <strong><?php echo urldecode($_GET["username"]); ?></strong>!!</h1>
            
            <p>Agora você só precisa finalizar o pagamento do seu boleto e seguir as instruções abaixo para que sua conta comece a receber o serviço contratado. Siga com atenção os seguintes passos:</p>

            <p>1) Baixe o boleto bancário clicando <a href="<?php echo urldecode($_GET["ticket_link"]); ?>"> AQUI</a> e efetue o pagamento antes do vencimento.</p>

            <p>2) Você já pode acessar o sistema Dumbu para configurar sua conta e iniciar sua captação de seguidores. Após 2 dias, caso não haja a confirmação do pagamento, sua conta será pausada até que o pagamento seja reconhecido. </p>

            <p>O link para acessar o sistema só pode ser usado <b>UMA VEZ</b>. Para isso, clique <a  href="<?php echo urldecode($_GET["access_link"]); ?>"> AQUI</a>
                Qualquer dúvida contate nosso atendimento acessando <a href="www.dumbu.pro">www.dumbu.pro</a></p>
            <p>Att. Equipe Dumbu</p>
        </div>
    </body>
</html>
