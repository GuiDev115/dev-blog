# Dev Blog

## Sobre o Projeto

Dev Blog é uma aplicação web desenvolvida com Laravel. O objetivo do projeto é fornecer uma plataforma para a criação e gerenciamento de blogs, em enfase para criação de local para artigos privados.

## Tecnologias Utilizadas

- **PHP**: Linguagem de programação utilizada no backend.
- **Laravel**: Framework PHP utilizado para o desenvolvimento da aplicação.
- **JavaScript**: Linguagem de programação utilizada no frontend.
- **SweetAlert2**: Biblioteca JavaScript para exibição de alertas bonitos.
- **Composer**: Gerenciador de dependências para PHP.
- **NPM**: Gerenciador de pacotes para JavaScript.
- **MailTrap**: Serviço de envio de e-mails para desenvolvimento, use sua API no .env.

## Funcionalidades

- Criação e gerenciamento de posts.
- Sistema de categorias para os posts.
- Notificações com SweetAlert2.
- Interface de administração para gerenciar o conteúdo do blog.

## Instalação

1. Clone o repositório:
    ```sh
    git clone https://github.com/seu-usuario/dev-blog.git
    ```

2. Navegue até o diretório do projeto:
    ```sh
    cd dev-blog
    ```

3. Instale as dependências do PHP com o Composer:
    ```sh
    composer install
    ```

4. Instale as dependências do JavaScript com o NPM:
    ```sh
    npm install
    ```

5. Configure o arquivo `.env` com suas credenciais de banco de dados.

6. Execute as migrações do banco de dados:
    ```sh
    php artisan migrate
    ```

7. Inicie o servidor de desenvolvimento:
    ```sh
    php artisan serve
    ```

## Uso

Acesse a aplicação no navegador através do endereço `http://localhost:8000`.

## Contribuição

Contribuições são bem-vindas! Sinta-se à vontade para abrir issues e pull requests.

## Licença

Este projeto está licenciado sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.
