<?php
/*
=============================================================================
ATIVIDADE 3 - RECURSOS MODERNOS DA POO NO PHP
Tema Escolhido: 1. Constructor Property Promotion
=============================================================================

1. O QUE É?
O Constructor Property Promotion (Promoção de Propriedades do Construtor) é um 
recurso que permite declarar e inicializar as propriedades de uma classe de forma 
simultânea, diretamente nos parâmetros do construtor (__construct).
-> Versão do PHP: Foi introduzido oficialmente no PHP 8.0.

2. PARA QUE SERVE?
Ele serve para eliminar o "boilerplate code" (códigos repetitivos). Antes, o 
programador precisava repetir o nome da variável várias vezes (na declaração, 
no parâmetro e na atribuição). Esse recurso limpa o arquivo, reduz linhas de 
código e melhora muito a legibilidade do projeto.

3. COMO FUNCIONA NA PRÁTICA? (Código ativo abaixo)
4. COMO FARÍAMOS SEM ELE? (Código antigo comentado abaixo)

5. QUANDO UTILIZAR?
É ideal para classes que servem principalmente para carregar dados, como Models, 
Entidades de Banco de Dados ou DTOs (Data Transfer Objects). Por exemplo, em uma 
aplicação web, ao receber os dados de um formulário de cadastro de usuário (Nome, 
Email, Senha), usamos esse recurso para criar o objeto do usuário instantaneamente 
e de forma muito limpa antes de salvá-lo no banco.
*/

// =============================================================================
// 4. COMO FARÍAMOS SEM ELE? (JEITO ANTIGO - COMENTADO)
// =============================================================================
/*
class ProdutoAntigo {
    // Tinha que declarar as propriedades aqui
    public string $nome;
    public float $preco;

    // Tinha que receber os parâmetros aqui
    public function __construct(string $nome, float $preco) {
        // Tinha que fazer a atribuição manual de cada uma
        $this->nome = $nome;
        $this->preco = $preco;
    }
}
*/

// =============================================================================
// 3. COMO FUNCIONA NA PRÁTICA? (JEITO MODERNO - ATIVO)
// =============================================================================

class Produto {
    // Declaramos o modificador de acesso (public) direto no parâmetro do construtor.
    // O PHP cria a propriedade e faz a atribuição automaticamente!
    public function __construct(
        public string $nome,
        public float $preco,
        public int $quantidade = 1 // Aceita valores padrão normalmente
    ) {
        // O corpo do construtor fica limpo e vazio, sem a necessidade de $this->nome = $nome;
    }
}

// --- TESTANDO O CÓDIGO NO NAVEGADOR ---
echo "<pre>"; // Formata o texto para ficar organizado na tela
echo "=== TESTANDO O CONSTRUCTOR PROPERTY PROMOTION (PHP 8+) ===\n\n";

// Instanciando a classe usando o novo recurso
$item = new Produto("Teclado Mecânico", 250.00);

// Exibindo os valores para provar que funcionou
echo "Produto criado com sucesso:\n";
echo "Nome: " . $item->nome . "\n";
echo "Preço: R$ " . number_format($item->preco, 2, ',', '.') . "\n";
echo "Quantidade: " . $item->quantidade . "\n";
echo "</pre>";
?>
