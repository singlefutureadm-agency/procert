🧩 Projeto PHP - Estrutura MVC (Procert)

Este projeto foi desenvolvido em PHP utilizando o padrão MVC (Model-View-Controller), com foco em organização, escalabilidade e facilidade de manutenção.
A estrutura segue o modelo Procert, garantindo separação clara entre camadas e pastas bem definidas para cada responsabilidade.

🗂️ Estrutura de Diretórios
|-- public/
|   |-- assets/
|   |-- uploads/
|   |-- index.html
|
|-- vendor/
|
|-- core/
|
|-- config/
|
|-- app/
|   |-- controllers/
|   |-- models/
|   |-- views/
|       |-- templates/

📁 Descrição das Pastas
public/

Pasta pública acessível pelo navegador.
Contém todos os arquivos estáticos e ponto de entrada do sistema.

assets/ → arquivos estáticos (CSS, JS, imagens).

uploads/ → arquivos enviados pelo usuário (imagens, documentos, etc).

index.html → arquivo inicial do sistema (ou ponto de entrada principal do front-end).

vendor/

Contém as dependências gerenciadas pelo Composer.
É criada automaticamente após rodar composer install.

⚠️ Nunca edite arquivos dentro desta pasta.

core/

Camada base do framework MVC.
Inclui classes essenciais como:

Controller Base – classe pai de todos os controladores.

Model Base – manipulação genérica de banco de dados.

Router – responsável por direcionar as requisições às rotas corretas.

config/

Contém arquivos de configuração do projeto, como:

config.php → constantes de conexão com o banco de dados (host, usuário, senha, nome).

Definições globais de ambiente (URL base, timezone, debug, etc).

app/

Camada principal da aplicação, dividida nas três partes do padrão MVC:

controllers/ → classes responsáveis por lidar com requisições e regras de negócio.

models/ → classes que representam as entidades e fazem a comunicação com o banco de dados.

views/ → arquivos responsáveis pela renderização das páginas.

Dentro de views/

templates/ → componentes visuais reutilizáveis (ex: header.php, footer.php, navbar.php).