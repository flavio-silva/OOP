#Passos para instalação do site
1. O servidor do php tem de executar na pasta public onde está o index.php
2. Criei duas classes do namespace fixtures para dividir as responsabilidades, deixando a criação das tabelas para classe DataStructure e a gravação no banco de dados com a classe Persistencia
3. A localização do arquivo que utiliza as classes acima citadas está no diretorio root como fixtures.php
4. Os dados originais estão em um array também no diretorio root como fisica.php e juridica.php. Os dois arquivos retornam um array
4. No construtor das classes Fisica e Juridica é executado o Configurator responsável por dar os sets automaticamente(Foi o único código pronto)
5. A classe clienteRepository é responsável por retornar um array de objetos do tipo fisica e juridica

