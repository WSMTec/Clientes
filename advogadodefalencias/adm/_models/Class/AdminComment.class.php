<?php

/**
 * AdminCategory.class [ MODEL ADMIN ]
 * Responável por gerenciar as categorias do sistema no admin!
 * 
 * @copyright (c) Jefferson Androcles
 */
class AdminComment {

    private $Data;
    private $CatId;
    private $Error;
    private $Result;

    //Nome da tabela no banco de dados!
    const Entity = 'tb_comment';

    /**
     * <b>Cadastrar Categoria:</b> Envelope titulo, descrição, data e sessão em um array atribuitivo e execute esse método
     * para cadastrar a categoria. Case seja uma sessão, envie o category_parent como STRING null.
     * @param ARRAY $Data = Atribuitivo
     */
    public function ExeCreate(array $Data) {
        $this->Data = $Data;

        if (in_array('', $this->Data)):
            $this->Result = false;
            $this->Error = ['Erro ao cadastrar uma resposta, preencha todos os campos!', 'blue', 'lnr lnr-warning', 4000];
        else:
            $this->setData();
            $this->Create();
        endif;
    }

    /**
     * <b>Atualizar Categoria:</b> Envelope os dados em uma array atribuitivo e informe o id de uma
     * categoria para atualiza-la!
     * @param INT $CategoryId = Id da categoria
     * @param ARRAY $Data = Atribuitivo
     */
    public function ExeUpdate($CategoryId, array $Data) {
        $this->CatId = (int) $CategoryId;
        $this->Data = $Data;

        if (in_array('', $this->Data)):
            $this->Result = false;
            $this->Error = ['Erro ao cadastrar uma resposta, preencha todos os campos!', 'blue', 'lnr lnr-warning', 4000];
        else:
            $this->setData();
            $this->Create();
        endif;
    }

    /**
     * <b>Deleta categoria:</b> Informe o ID de uma categoria para remove-la do sistema. Esse método verifica
     * o tipo de categoria e se é permitido excluir de acordo com os registros do sistema!
     * @param INT $CategoryId = Id da categoria
     */
    public function ExeDelete($CategoryId) {
        $this->CatId = (int) $CategoryId;

        $read = new Read;
        $read->ExeRead(self::Entity, "WHERE comment_id = :delid", "delid={$this->CatId}");

        if (!$read->getResult()):
            $this->Result = false;
            $this->Error = ['Oppsss, você tentou remover um comentário que não existe no sistema!', 'blue', 'lnr lnr-warning', 4000];
        else:
            extract($read->getResult()[0]);
            $delete = new Delete;
            $delete->ExeDelete(self::Entity, "WHERE comment_id = :deletaid", "deletaid={$this->CatId}");

            $this->Result = true;
            $this->Error = ["O comentário foi removido com sucesso do sistema!", 'green', 'lnr lnr-smile', 4000];
        endif;
    }

    /**
     * <b>Verificar Cadastro:</b> Retorna TRUE se o cadastro ou update for efetuado ou FALSE se não. Para verificar
     * erros execute um getError();
     * @return BOOL $Var = True or False
     */
    public function getResult() {
        return $this->Result;
    }

    /**
     * <b>Obter Erro:</b> Retorna um array associativo com a mensagem e o tipo de erro!
     * @return ARRAY $Error = Array associatico com o erro
     */
    public function getError() {
        return $this->Error;
    }

    /*
     * ***************************************
     * **********  PRIVATE METHODS  **********
     * ***************************************
     */

    //Valida e cria os dados para realizar o cadastro
    private function setData() {
        $this->Data = array_map('strip_tags', $this->Data);
        $this->Data = array_map('trim', $this->Data);
    }

    //Verifica o NAME da categoria. Se existir adiciona um pós-fix +1
    private function setName() {
        $Where = (!empty($this->CatId) ? "category_id != {$this->CatId} AND" : '' );

        $readName = new Read;
        $readName->ExeRead(self::Entity, "WHERE {$Where} category_title = :t", "t={$this->Data['category_title']}");
        if ($readName->getResult()):
            $this->Data['category_name'] = $this->Data['category_name'] . '-' . $readName->getRowCount();
        endif;
    }

    //Verifica categorias da seção
    private function checkCats() {
        $readSes = new Read;
        $readSes->ExeRead(self::Entity, "WHERE category_parent = :parent", "parent={$this->CatId}");
        if ($readSes->getResult()):
            return false;
        else:
            return true;
        endif;
    }

    //Verifica artigos da categoria
    private function checkPosts() {
        $readPosts = new Read;
        $readPosts->ExeRead("tb_posts", "WHERE post_category = :category", "category={$this->CatId}");
        if ($readPosts->getResult()):
            return false;
        else:
            return true;
        endif;
    }

    //Cadastra a categoria no banco!
    private function Create() {
        $Create = new Create;
        $Update = new Update;
        $Create->ExeCreate(self::Entity, $this->Data);
        $Update->ExeUpdate(self::Entity, array("comment_status" => "R"), "WHERE comment_id = :catid", "catid={$this->Data['comment_answer']}");
        if ($Create->getResult()):
            $this->Result = $Create->getResult();
            $this->Error = ["<b>Sucesso:</b> A resposta foi cadastrada no sistema!", 'green', 'lnr lnr-smile', 4000];
        endif;
    }

    //Atualiza Categoria
    private function Update() {
        $Update = new Update;
        $Update->ExeUpdate(self::Entity, $this->Data, "WHERE category_id = :catid", "catid={$this->CatId}");
        if ($Update->getResult()):
            $tipo = ( empty($this->Data['category_parent']) ? 'seção' : 'categoria' );
            $this->Result = true;
            $this->Error = ["<b>Sucesso:</b> A {$tipo} {$this->Data['category_title']} foi atualizada no sistema!", 'green', 'lnr lnr-smile', 4000];
        endif;
    }

}
