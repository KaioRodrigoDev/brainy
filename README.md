<h1 align="center"> Teste Brainy</h1>

## Descrição

O Projeto tem como objetivo a conclusão do exercicio proposta pela empresa Brainy para a vaga Full-Stack JR

## Tecnologias utilizadas

-   Docker;
-   Composer;
-   Sail;
-   Filament;

## Rodando o projeto

Para rodar o repositório é necessário clonar o mesmo, dar o seguinte comando para iniciar o projeto:

1 - Clonando .env

```
  cp .env.example .env
```

2 - Instalando os pacotes com composer

```
  composer install
```

3 - gerando uma key

```
./vendor/bin/sail art key:generate
```

4 - Rodando o projeto

```
./vendor/bin/sail up -d
```

5 - Rodando as Migrations

```
./vendor/bin/sail art migrate
```

## Populando banco

Para popular o banco sera necessario o seguinte comando:

```
./vendor/bin/sail art db:seed
```

Ao Rodar os seeders havera criado:

-   2(duas) Cidades
-   3(três) Hobbies
-   5(cinco) Estados
-   1(um) Usuario

## Acessando Projeto

Para acessar o painel principal, basta ir para o /admin;
No Seeder foi criado o seguinte Usuario:

-   email: <b>test@admin.com</b>
-   senha: <b>password123</b>
