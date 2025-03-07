# Usa a imagem oficial do PostgreSQL
FROM postgres:16

# Define a variável de ambiente para evitar prompts interativos
ENV DEBIAN_FRONTEND=noninteractive

# Copia o script de inicialização (se houver)
# COPY init.sql /docker-entrypoint-initdb.d/

# Define as configurações padrão do PostgreSQL
ENV POSTGRES_USER=$POSTGRES_USER
ENV POSTGRES_PASSWORD=$POSTGRES_PASSWORD
ENV POSTGRES_DB=$POSTGRES_DB

# Expõe a porta do PostgreSQL
EXPOSE 5432
