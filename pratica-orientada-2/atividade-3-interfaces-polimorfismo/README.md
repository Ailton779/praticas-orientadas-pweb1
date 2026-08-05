# Atividade 3 — Interfaces e Polimorfismo

**Objetivo:** criar uma interface `Avaliavel` e implementá-la nas classes
`Aluno` e `Professor`, demonstrando polimorfismo ao executar o mesmo
método para objetos diferentes.

## Estrutura

atividade-3-interfaces-polimorfismo/
├── Avaliavel.php ← interface com o contrato avaliar()
├── Aluno.php ← implementa Avaliavel (critério: nota)
├── Professor.php ← implementa Avaliavel (critério: avaliação de desempenho)
├── index.php ← demonstração de polimorfismo
└── README.md


## Conceitos aplicados

- **Interface (`interface Avaliavel`)** — define um contrato: qualquer
  classe que implemente `Avaliavel` é obrigada a ter um método
  `avaliar(): string`. A interface não implementa nada, só exige a
  assinatura do método.
- **Implementação de interface (`implements`)** — tanto `Aluno` quanto
  `Professor` declaram `implements Avaliavel` e fornecem sua própria versão
  de `avaliar()`.
- **Polimorfismo** — em `index.php`, um único array (`$avaliaveis`) guarda
  objetos `Aluno` e `Professor` misturados. O código percorre esse array e
  chama `$item->avaliar()` **sem saber o tipo exato de cada objeto** — cada
  um responde com sua própria lógica:
  - `Aluno::avaliar()` → baseado na nota (Aprovado / Recuperação / Reprovado)
  - `Professor::avaliar()` → baseado na avaliação de desempenho (Excelente /
    Satisfatório / Insatisfatório)
- **Verificação de tipo (`instanceof`)** — usado em `index.php` apenas para
  exibir o nome do tipo na tabela (`Aluno` ou `Professor`), sem afetar a
  lógica de avaliação em si, que continua polimórfica.
- **Encapsulamento e tipagem forte** — mantidos nas duas classes, seguindo
  o mesmo padrão das atividades anteriores (`declare(strict_types=1)`,
  propriedades privadas, validação nos setters).

## Como executar

```bash
cd atividade-3-interfaces-polimorfismo
php -S localhost:8000
```
Acesse `http://localhost:8000` no navegador.

## Casos de teste sugeridos

- Observar a tabela com Alunos e Professores intercalados, cada um exibindo
  um resultado diferente de `avaliar()` mesmo sendo chamado da mesma forma
  no código.
- Alterar as notas/avaliações no array de `index.php` e verificar que o
  resultado muda de acordo com o critério de cada classe.
- Tentar criar um `Aluno` ou `Professor` com valor fora do intervalo 0–10 →
  deve lançar `InvalidArgumentException`.
