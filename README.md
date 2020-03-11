# Sistema de exemplo para criação de API sem utilização de framework.
## Visão Geral
Este produto possui dois serviços totalmente separados, ambos em php.  O primeiro é uma API que está configurado para rodar na porta 8080 e outro um exemplo de front rodando na porta 80 (Caso não queira testar somente pela API).

## Pastas 

- \ : O arquivo docker-compose.yml que será utilizado para levantar os ambientes, este README e as pastas:
    - docker : 
        - Arquivo Dockerfile para subir ambos os ambiente.
    - documents:   
        - banco.sql: Script de geração das tabelas
        - dse.postman_collection.json: Exportação das rotas do Postman.
        - dse.postman_environment.json:  Exportação do ambiente para as rotas do Postman
        - product.db: backup do banco sqlite.
    - src:
        - API
            - classes: classes principais para gerenciamento das rotas
            - controllers: classes de camada de controller.
            - models: classes de regras de negócio
            - library: libs de apoio.
    - view:
        - Client para acesso a api caso não queira fazer pelo postman.
        
## Levantar o serviço:
``` docker-compose up -d ```

## Derrubar o serviço:
``` docker-compose down ```

## Acesso ao client
``` locahost ``` (porta 80)

## Aceso a API:
- Rotas:

    - Tipos de produto
        - Listagem 

            ```GET:: localhost:8080/product_type```
        - visualizar 1 tipo de produto 

            ```GET:: localhost:8080/product_type/<<id>>```
        - Adicionar

            ```POST:: localhost:8080/product_type```
        - Editar 

            ```PUT:: localhost:8080/product_type/<<id>>```
        - Remover 

            ```DELETE:: localhost:8080/product_type/<<id>>```
    
    - Produtos
        - Listagem 

            ```GET:: localhost:8080/product```
        - visualizar 1 tipo de produto 

            ```GET:: localhost:8080/product/<<id>>```
        - Adicionar

            ```POST:: localhost:8080/product```
        - Editar 

            ```PUT:: localhost:8080/product/<<id>>```
        - Remover 

            ```DELETE:: localhost:8080/product/<<id>>```
    - Vendas
        - Listagem 

            ```GET:: localhost:8080/sale```
        - visualizar 1 tipo de produto 

            ```GET:: localhost:8080/sale/<<id>>```
        - Adicionar

            ```POST:: localhost:8080/sale```
        - Editar 

            ```PUT:: localhost:8080/sale/<<id>>```
        - Remover 

            ```DELETE:: localhost:8080/sale/<<id>>```
