#Passos para instala��o do site
1. O servidor do php tem de executar na pasta public onde est� o index.php
2. Criei duas classes do namespace fixtures para dividir as responsabilidades, deixando a cria��o das tabelas para classe DataStructure e a grava��o no banco de dados com a classe Persistencia
3. A localiza��o do arquivo que utiliza as classes acima citadas est� no diretorio root como fixtures.php
4. Os dados originais est�o em um array tamb�m no diretorio root como fisica.php e juridica.php. Os dois arquivos retornam um array
4. No construtor das classes Fisica e Juridica � executado o Configurator respons�vel por dar os sets automaticamente(Foi o �nico c�digo pronto)
5. A classe clienteRepository � respons�vel por retornar um array de objetos do tipo fisica e juridica

