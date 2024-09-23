
## Endpoints do task-manager
**Todas as rotas tem o prefixo:**
```
    '/api/...'
```
Necessário entender o fluxo do projeto, siga o passo a passo

### Cadastrar-se
- Onde você cria o usuário
```
    POST '/user/create'
```
- Não criei níveis de acesso devido ao tempo, mas sem autenticar você pode editar qualquer úsuario
```
    PUT '/user/{id}' 
    DELETE '/user/{id}' 
```
### Login
- Onde você logar com o úsuario
```
    POST '/user/login'
```
- Após efetuar o login utilizando o postman para requisições, você receberá um token 
```
   {
    "status": "Authorized",
    "token": "4|g0DVvw4bwK73r67CGVdhrhG6jHBnPegL506PeMki91430537"
    }
```
- Esse token você irá utilizar no Header passando os parametros
```
   Authorization : Bearer {token passado}
```
### Criar Categória 
 - Antes de criar uma tarefa, você tem que criar uma categoria 
 ```
   POST '/category/create'
```
- Você também pode editar, deletar e visualizar categoria
 ```
   PUT '/category/id'
   DELETE '/category/id'
   GET '/categories'
   GET '/category/id'
```

### Criar Tarefa 
 - Criar tarefa 
 ```
   POST '/task/create'
```
- Você também pode editar, deletar e visualizar tarefa
 ```
   PUT '/task/id'
   DELETE '/task/id'
   GET '/tasks'
   GET '/task/id'
```
## Iniciar , pausar, despausar, finalizar tarefa
- endpoint iniciar tarefa
 ```
   GET '/start/task/id'
```
- endpoint pausar tarefa
 ```
   GET '/pause/task/id'
```
- endpoint despausar tarefa
 ```
   GET '/unpause/task/id'
```
- endpoint finalizar tarefa
 ```
   GET '/finish/task/id'
```

### Se quiser acessar todas as tarefas alocadas em uma categoria
 - Acesse o endpoint
```
   GET '/category/id'
```
