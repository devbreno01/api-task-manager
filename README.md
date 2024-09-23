
# API Task Manager

API feita devido a minha participação no teste técnico (w5i)


## O que foi pedido:

Solução para controle de tarefas:\
Operações: \
    - Cadastro de categoria da tarefa\
    - Cadastro de responsável\
    - Cadastro de tarefa, vinculando categoria e responsável\
    \
    - Iniciar tarefa (data e hora)\
    - não pode iniciar uma tarefa se ela já foi finalizada\
    \
    - Pausar tarefa (data e hora)\
        - não pode pausar uma tarefa se ela não foi iniciada\
        - não pode pausar uma tarefa se ela já foi finalizada\
        \
    - Finalizar tarefa (data e hora) e valor de cobrança\
        - não pode finalizar uma tarefa se ela não foi inicializada\
        - não pode finalizar uma tarefa se ela já foi finalizada\
        \
    - Demonstrar tarefas com categoria, responsável e suas movimentações de Início, Pausa e Finalização, demonstrando o tempo gasto.

## Pastas
.
├── app                            
│   ├── Http             
│   │   ├── Controllers  
│   │   │   └── Api -------->**Onde lidaremos com requisições**\
│   ├── Models --------> **Lida com operações no banco**          
│   ├── Providers        
│   ├── Repositories   
│   ├── Resources        
│   └── Services  ----> **Lidamos com a logica e rn**       
   

├── routes                   
│   ├── api.php     **Rotas do nosso sistema**               
└── ...

## Lógicas que acrescentei 
- Impossibilidade de despausar tarefa, se a tarefa não foi pausada
- Se a tarefa já foi iniciada, não há como iniciar de novo 
- Você pode fianlizar uma tarefa sem necessáriamente pausar e despausa-la 

## Endpoints 
- Os endpoints estão com livre acesso para no arquivo: "endpoints.md"
    - 
    


