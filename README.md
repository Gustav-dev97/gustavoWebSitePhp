# gustavoWebSitePhp

----------------------------------------------------------------------------------------------------------------------------------

Olá, sou o Gustavo, este projeto é uma galeria de fotos e utiliza PHP e um pouquinho de JavaScript para realizar o 'submit' 
de um contato obtidos de um 'form' .html, a partir disso ele enviará a mensagem por e-mail (ao proprietário do site) e registrar em
um banco de dados, também utilizei alguns framework's WEB como o Bootstrap, Lightbox e o Glider.js para o design e responsividade da
página. 
	O código foi comentado em cada etapa do desenvolvimento para facilitar sua compreensão, para isso basta executar 
o arquivo que já deixei pronto no seu MySQL Workbench ou no phpMyAdmin: 

	  <Criar_tbl.sql>

----------------------------------------------------------------------------------------------------------------------------------

Para usar a funcionalidade de enviar as informações por e-mail é necessário 
ativar a opção 'Acesso a app menos seguro' em sua conta google, para isso basta ir em:

  	-> Conta/Segurança/Acesso a app menos seguro  

 E marcar a opção como ativado (Permitir aplicativos menos seguros: ATIVADA)

 Também é necessário substituir os campos abaixo com o seu email e senha de login (caso você deseje testar a funcionalidade): 

	Linha 39| $mail->Username = "seu.email@gmail.com";
	Linha 40| $mail->Password = "SuaSenha";
	Linha 47| $mail->addAddress("seu.email@gmail.com");

----------------------------------------------------------------------------------------------------------------------------------
Obs: O projeto por utilizar multiplas instancias do glider.js foi inicializar o objeto Glider para cada elemento no qual 
deseja que ele seja executado. O autor do glide.js disponibizou o codigo abaixo resolvido na 'issue' #24:
 
	https://github.com/NickPiscitelli/Glider.js/issues/24

  Meus sinceros agradecimentos :)

----------------------------------------------------------------------------------------------------------------------------------

Se precisar entrar em contato comigo pode encontrar pelos meios de comunicação abaixo:

	  e-Mail: gustavo.dev97@gmail.com
	  GitHub: github.com/Gustav-dev97

	  Muito Obrigado! 


