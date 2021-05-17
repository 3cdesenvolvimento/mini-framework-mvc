Levando em consideração que estamos utilizando um servidor linux, rodando Apache.

1. Criar um repositório no GitHub

2. Criar o diretório local do projeto

3. Iniciar o Git ($ git init)

4. Vincular o projeto local ao remoto ($ git remote add origin https://github.com/USER/FILE.git)

5. Sincronizar os projetos ($ git pull origin master)

6. Iniciar o composer ($ composer init)

7. Incluir no arquivo composer.json a definição do autoloader:
```
"autoload": {
        "psr-4": {
            "app\\": "app/"
        }
    }
```

8. Gerar o arquivo de autoloader ($ composer dump)

9. Incluir o arquivo composer.lock na lista dos arquivo ignorados pelo git (.gitignore)

10. Criar a estrutura do framework:
> app/ => Onde vão ficar as classes do MVC, do core do sistema e das configurações

> public/ => Onde vão ficar os arquivos de JS, CSS e imagens (Assets) e onde fica o index.php inicial do framework

11. Configurar um domínio/site local direcionado direto para o diretório public/.

11.1 Criar um arquivo .conf no diretório de sites-available, no diretório de configurações do Apache: 
```
<VirtualHost *:80>
    DocumentRoot DIR_FRAMEWORK/public
    ServerName dominio.com
    ServerAlias www.dominio.com
    <Directory DIR_FRAMEWORK/public/>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

11.2 Executar o aplicativo a2ensite neste arquivo .conf e reiniciar o serviço.

11.3 Configurar os DNSs para identificarem o domínio (Se for apenas um domínio local, basta informar o domínio apontando para o IP 127.0.0.1 no arquivo /etc/hosts)

12 Criar o seguinte arquivo .htaccess no diretório public/:
```
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php [NC,L]

Options All -Indexes
```

13 Criar uma chave público/privada na máquina local para efetuar os push's no github sem precisar digitar uma senha

14 Depois das alterações feitas, executar:
($ git add -A)
($ git commit -m "...")
($ git push origin master)