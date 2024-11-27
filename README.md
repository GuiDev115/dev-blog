# Dev Blog

## Sobre o Projeto

Dev Blog é uma aplicação web desenvolvida com Laravel. O objetivo do projeto é fornecer uma plataforma para a criação e gerenciamento de blogs, em enfase para criação de local para artigos privados.

## Tecnologias Utilizadas

- **PHP**: Linguagem de programação utilizada no backend.
- **Laravel**: Framework PHP utilizado para o desenvolvimento da aplicação.
- **JavaScript**: Linguagem de programação utilizada no frontend.
- **SweetAlert2**: Biblioteca JavaScript para exibição de alertas bonitos.
- **MYSQL**: Banco de dados utilizado no projeto.
- **Composer**: Gerenciador de dependências para PHP.
- **MailTrap**: Serviço de envio de e-mails para desenvolvimento, use sua API no .env.

## Funcionalidades

- Criação e gerenciamento de posts.
- Sistema de categorias para os posts.
- Notificações com SweetAlert2.
- Interface de administração para gerenciar o conteúdo do blog.

## Instalação

1. Clone o repositório e acesse o diretório do projeto:
    ```sh
    git clone https://github.com/seu-usuario/dev-blog.git && cd dev-blog
    ```

2. Instale as dependências do PHP com o Composer:
    ```sh
    composer install
    ```

3. Execute as migrações do banco de dados:
    ```sh
    php artisan migrate
    ```

4. Inicie o servidor de desenvolvimento:
    ```sh
    php artisan serve
    ```
Obs.: Lembre-se de configurar o arquivo `.env` com as informações do seu banco de dados, e também de configurar o serviço de envio de e-mails. (Utilizei o **mailTrap** no desenvolvimento desse projeto).

## Uso

Acesse a aplicação no navegador através do endereço `http://localhost:8000`.
    
## Contribuição

Contribuições são bem-vindas! Sinta-se à vontade para abrir issues e pull requests.

## Licença

Este projeto está licenciado sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.
