FROM php:8.3-cli

# Copia os arquivos do projeto para dentro do container
COPY . /app
WORKDIR /app

# Expor a porta exigida pelo Render
EXPOSE 10000

# Comando para rodar o servidor PHP
CMD ["php", "-S", "0.0.0.0:10000"]