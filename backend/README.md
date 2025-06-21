# Backend Vouch

Este projeto demonstra a comunicação entre uma interface web e um daemon PHP em background utilizando **Message Queue (IPC)**. O objetivo é enviar dados de um formulário web para um daemon, que então insere esses dados em um banco de dados SQLite e retorna uma resposta.

##  Tecnologias utilizadas

- PHP (com extensões `sysvmsg` e `PDO SQLite`)
- SQLite
- Message Queue (IPC nativo do PHP)
- Apache, Nginx ou servidor embutido do PHP

## 📄 Estrutura do projeto

```
/backend
├── index.php       # Formulário web para enviar dados
├── form.php        # Processa o envio e recebe a resposta
├── daemon.php      # Daemon que roda em background
├── database.db     # Banco de dados SQLite (estrutura criada, sem dados)
├── init_db.php     # Script para criar a estrutura do banco
└── README.md       # Este arquivo
```

##  Como executar

1. Clone o repositório:

```bash
git clone 
cd backend
```

2. Crie o banco (se necessário):

```bash
php init_db.php
```

3. Execute o daemon em background:

```bash
php daemon.php
```

4. Inicie um servidor PHP embutido (ou utilize Apache/Nginx):

```bash
php -S localhost:8000
```

5. Acesse no navegador:

```
http://localhost:8000/index.php
```

6. Envie dados e veja a resposta do daemon.

##  Dependências PHP

- Ative as extensões no `php.ini`:

```ini
extension=sysvmsg
extension=pdo_sqlite
```

##  Observação

O arquivo `database.db` está incluído apenas com a estrutura da tabela `registros`. Dados serão inseridos conforme o uso da aplicação.

---

Desenvolvido por **Gabriel Dzuman** para Vouch Soluções. 