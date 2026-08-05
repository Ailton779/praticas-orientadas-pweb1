# Atividade 4 — Classe Abstrata e Trait

**Objetivo:** criar uma classe abstrata `Pessoa`, implementar herança nas
classes `Aluno` e `Professor`, e utilizar uma trait para reutilização de
código.

## Estrutura

atividade-4-classe-abstrata-trait/
├── Pessoa.php ← classe abstrata (base para herança)
├── ValidacaoIntervalo.php ← trait de validação, reutilizada por Aluno e Professor
├── Aluno.php ← herda de Pessoa, usa a trait
├── Professor.php ← herda de Pessoa, usa a trait
├── index.php ← demonstração de herança e trait
└── README.md


## Conceitos aplicados

- **Classe abstrata (`abstract class Pessoa`)** — não pode ser instanciada
  diretamente (`new Pessoa(...)` geraria erro). Serve apenas como base para
  outras classes. Define o que é comum a qualquer pessoa do sistema (o
  `nome`) e declara o método `abstract public function apresentar(): string`,
  que **obriga** toda subclasse a implementar sua própria versão.
- **Herança (`extends`)** — `Aluno extends Pessoa` e
  `Professor extends Pessoa`. Ambos reaproveitam o construtor e o
  `getNome()` de `Pessoa` através de `parent::__construct($nome)`, e cada
  um implementa `apresentar()` com seu próprio texto.
- **Trait (`use ValidacaoIntervalo`)** — como `Aluno` e `Professor` já usam
  herança para `Pessoa` (e PHP não permite herança múltipla de classes), a
  trait resolve o compartilhamento do método `validarIntervalo()` entre as
  duas classes, evitando duplicar a mesma lógica de validação em ambas.
- **Encapsulamento e tipagem forte** — mantidos em todas as classes
  (`declare(strict_types=1)`, propriedades privadas/protegidas, validação
  nos setters via trait).

## Diferença entre Atividade 3 e Atividade 4

Na Atividade 3, `Aluno` e `Professor` eram independentes, ligados apenas
pela interface `Avaliavel`. Nesta atividade, eles passam a ter uma
**hierarquia de herança em comum** (`Pessoa`), além de compartilhar código
concreto (a validação) via trait — mostrando duas formas diferentes de
reutilização/relação entre classes em PHP.

## Como executar

```bash
cd atividade-4-classe-abstrata-trait
php -S localhost:8000
```
Acesse `http://localhost:8000` no navegador.

## Casos de teste sugeridos

- Observar a lista com Alunos e Professores, cada um exibindo seu próprio
  texto de `apresentar()`.
- Tentar instanciar `Pessoa` diretamente (ex: `new Pessoa("Teste")`) →
  PHP lança um erro de "Cannot instantiate abstract class".
- Criar um `Aluno` ou `Professor` com valor fora do intervalo 0–10 →
  `InvalidArgumentException` disparada pela trait `ValidacaoIntervalo`,
  reaproveitada por ambas as classes.
