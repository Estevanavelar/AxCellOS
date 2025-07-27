
![AxCell-OS](https://raw.githubusercontent.com/RamonSilva20/axcell/master/assets/img/logo.png)

![version](https://img.shields.io/badge/version-4.45.0-blue.svg?longCache=true&style=flat-square)
![license](https://img.shields.io/badge/license-MIT-green.svg?longCache=true&style=flat-square)
![theme](https://img.shields.io/badge/theme-Matrix--Admin-lightgrey.svg?longCache=true&style=flat-square)
![issues](https://img.shields.io/github/issues/RamonSilva20/axcell.svg?longCache=true&style=flat-square)
![contributors](https://img.shields.io/github/contributors/RamonSilva20/axcell.svg?longCache=true&style=flat-square)

### Contato: contato@axcell.com.br
### [Feedback](https://github.com/RamonSilva20/axcell/discussions) - Vote ou sugira melhorias

![AxCell-OS](https://raw.githubusercontent.com/RamonSilva20/axcell/master/docs/dashboard.png)

### [Instalação](Instalacao_xampp_windows.md)

1. Faça o download dos arquivos.
2. Extraia o pacote e copie para seu webserver.
3. Rode o comando `composer install --no-dev` a partir da raiz do projeto.
4. Acesse sua URL e inicie a instalação, é bem simples, basta preencher as informações no assistente de instalação **AXCELL**.
5. Configure o email de envio no arquivo email.php.
6. Configurar cron jobs para envio de e-mail:
    ##### Enviar emails pendentes a cada 2 minutos.
    - */2 * * * * php /var/www/index.php email/process
    ##### Enviar emails com falha a cada 5 minutos.
    - */5 * * * * php /var/www/index.php email/retry

    ##### Obs: O path até o index.php (/var/www/) deve ser configurado conforme o seu ambiente


### Instalação (Docker)

1. Faça o download dos arquivos.
2. Instale o [Docker](https://docs.docker.com/install/) e o [Docker Compose](https://docs.docker.com/compose/install/).
3. Entre na pasta `docker` no seu terminal e rode o comando `docker-compose up --force-recreate`.
4. Acesse a URL `http://localhost:8000/` no navegador e inicie a instalação.
5. Na etapa de configuração use as seguintes configurações:
```
1. Por favor, insira as informações da sua conexão de banco de dados.
Host: mysql
Usuário: axcell
Senha: axcell
Banco de Dados: axcell

2. Por favor, insira as informações para sua conta de administrador.
Configure do jeito que quiser.

3. Por favor, insira a URL.
URL: http://localhost:8000/
```
6. Configure o email de envio no arquivo email.php.

    ##### Obs: Cuide da pasta `docker/data`, onde é pasta que o mysql do docker salva os arquivos. Se for deletada você perderá seu banco de dados.
    ##### Obs2: O PhpMyAdmin também e instalado e pode ser acessado em `http://localhost:8080/`.

### Instalação Automatizada (Windows 10/11)
1. Execute o Prompt de Comando ou PowerShell como Administrador;
2. Execute o comando: `PowerShell -command "& { iwr https://raw.githubusercontent.com/RamonSilva20/axcell/master/install.bat -OutFile AxCell-OS_Install.bat }; .\AxCell-OS_Install.bat"`
3. Tutorial Instalação: https://youtu.be/NgXzzBB_2bM?si=FS_R2xq_W0Jnfn33

### Instalação Automatizada (Ubuntu/Debian)
1. Abra o Terminal ou acesse seu servidor via SSH;
2. Eleve o privilégio aplicando `sudo su` (Recomendado);
3. Execute o comando: `curl -o AxCell-OS_Install.sh -L https://raw.githubusercontent.com/RamonSilva20/axcell/master/install.sh && chmod +x AxCell-OS_Install.sh && ./AxCell-OS_Install.sh`

### Atualização

1. Faça o backup dos arquivos e do banco de dados;
2. Substitua os arquivos pelos da nova versão;
3. Rode o comando `composer install --no-dev` a partir da raiz do projeto.
4. Volte as configurações nos arquivos database.php e config.php;
5. Logue no sistema como administrador e navegue até Configurações -> Sistema e clique no botão `Atualizar Banco de Dados` para atualizar seu banco de dados. Obs.: Também é possível atualizar o banco de dados via terminal rodando o comando `php index.php tools migrate` a partir da raiz do projeto;
6. Pronto, sua atualização está concluída;

### Atualização (Docker)

1. Pare o docker de rodar;
2. Faça o backup dos arquivos e do banco de dados;
3. Substitua os arquivos pelos da nova versão;
4. Volte as configurações nos arquivos database.php e config.php;
5. Entre na pasta `docker` no seu terminal e rode o comando `docker-compose up --force-recreate`;
6. Logue no sistema como administrador e navegue até Configurações -> Sistema e clique no botão `Atualizar Banco de Dados` para atualizar seu banco de dados. Obs.: Também é possível atualizar o banco de dados via terminal rodando o comando `php index.php tools migrate` a partir da raiz do projeto;
7. Pronto, sua atualização está concluída;

### Atualização via sistema

1. Primeiro é necessário atualizar manualmente o sistema para a versão v4.4.0;
2. Quando estiver nessa versão é possível atualizar o sistema clicando no botão "Atualizar Axcell" em Sistema >> Configurações;
3. Serão baixados e atualizados todos os arquivos exceto: `config.php`, `database.php` e `email.php`;

### Comandos de terminal

Para listar todos os comandos de terminal disponíveis, basta executar o comando `php index.php tools` a partir da raiz do projeto, após feita todo o processo de instalação.

### Hospedagem Parceira
Em parceria com o Projeto AxCell-OS as empresas SysmaTech e Gotek se uniram como SysGo para oferecer hospedagem de qualidade e suporte personalizado para usuários dos AxCell-OS com custo justo e confiabilidade.

Solicite sua hospedagem agora [Clique Aqui!](https://sysgo.com.br/axcell-github)

<p><img src="https://sysgo.com.br/img-externo/axcell-github.jpg" alt="SysGO - AXCELL-OS Cloud Hosting" style="width:50%;"></p>

### Frameworks/Bibliotecas
* [bcit-ci/CodeIgniter](https://github.com/bcit-ci/CodeIgniter)
* [twbs/bootstrap](https://github.com/twbs/bootstrap)
* [jquery/jquery](https://github.com/jquery/jquery)
* [jquery/jquery-ui](https://github.com/jquery/jquery-ui)
* [mpdf/mpdf](https://github.com/mpdf/mpdf)
* [Matrix Admin](http://wrappixel.com/demos/free-admin-templates/matrix-admin/index.html)
* [filp/whoops](https://github.com/filp/whoops)

### Requerimentos
* PHP = 8.1
* MySQL
* Composer

### Doações

Gosta do axcell e gostaria de contribuir com seu desenvolvimento?

Doações podem ser realizadas nos links:
* [catarse/axcell](https://www.catarse.me/axcell) - Mensal
* [kofi/axcell](https://ko-fi.com/axcell) - Exporádica

### Contribuidores
[![Contribuidores](https://contrib.rocks/image?repo=RamonSilva20/axcell)](https://github.com/RamonSilva20/axcell/graphs/contributors)

## Autor
| [<img src="https://avatars.githubusercontent.com/RamonSilva20?s=115"><br><sub>Avelar Company</sub>](https://github.com/RamonSilva20) |
| :---: |
