# Projeto "HELPER"

O projeto "HELPER" é um sistema que permite a criação, exibição e gerenciamento de doações. Ele consiste em vários arquivos e funcionalidades que são descritos a seguir:

## 💻 Pré-requisitos

Antes de começar, verifique se você atendeu aos seguintes requisitos:

* Versão mais recente instalada das linguagens e ferramentas: `<Javascript>`
* Você tem uma máquina `<Windows / Linux / Mac>`

## Arquivos e Funcionalidades

1. **`cadastro_donations.php`**

   Este arquivo permite que os usuários cadastrem doações no sistema. Ele coleta informações sobre a doação, como título, descrição, categoria, endereço, estado, imagem e, se aplicável, uma meta em reais. As doações são armazenadas no banco de dados.

2. **`conn.php`**

   Este arquivo é responsável por configurar a conexão com o banco de dados MySQL. Ele define as credenciais, como nome de usuário, senha, nome do banco de dados e host.

3. **`donations.php`**

   Este arquivo exibe um catálogo de doações com base em filtros, como estado, categoria e pesquisa por nome. Ele consulta o banco de dados para recuperar doações que correspondem aos critérios especificados e as exibe no HTML.

4. **`login.php`**

   Este arquivo lida com o processo de login dos usuários. Recebe o email e a senha do formulário, verifica se as credenciais são válidas consultando o banco de dados e, se for bem-sucedido, redireciona o usuário para a página inicial.

5. **`home.html`**

   Esta é a página inicial do sistema, onde os usuários são redirecionados após o login bem-sucedido. Não foi fornecido um código-fonte explícito, mas a página parece ser a página principal do sistema.

## Considerações Gerais

- Os arquivos PHP estão estruturados de forma a lidar com operações específicas, como cadastro, login e exibição de doações.
- É importante garantir que os arquivos de configuração, como `conn.php`, estejam corretamente configurados com as informações de conexão com o banco de dados.
- O código PHP usa funções e consultas SQL para interagir com o banco de dados e realizar a lógica de negócios necessária para cada funcionalidade.

## 🛠️ Construído com


* [Netbeans](https://netbeans.apache.org/) - IDE utilizada.
* [Java](https://www.java.com/pt-BR/) - Linguagem de programação utilizada.
* [JUnit](https://junit.org/junit5/) - Framework.

## 🤝 Colaboradores

Pessoas que contribuíram para este projeto:

<table>
  <tr>
    <td align="center">
      <a href="#">
        <img src="https://avatars.githubusercontent.com/u/77749469?v=4" width="100px;"/><br>
        <sub>
          <b>José Ramos</b>
        </sub>
      </a>
    </td>
  </tr>
</table>
