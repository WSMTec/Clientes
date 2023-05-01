<?php

/**
 * AdminPost.class [ MODEL ADMIN ]
 * Respnsável por gerenciar os posts no Admin do sistema!
 * 
 * @copyright (c) Jefferson Androcles
 */
class AdminProcess {

    private $Data;
    private $Post;
    private $Error;
    private $Result;

    //Nome da tabela no banco de dados
    const Entity = 'n_processos';

    /**
     * <b>Cadastrar o Post:</b> Envelope os dados do post em um array atribuitivo e execute esse método
     * para cadastrar o post. Envia a capa automaticamente!
     * @param ARRAY $Data = Atribuitivo
     */
    public function ExeCreate(array $Data) {
        $this->Data = $Data;

        if (empty($this->Data['id_cli']) || empty($this->Data['procn_cli'])):
            $this->Error = ["Existem campos em branco. Favor preencha os campos de CLIENTE e N° PROCESSO para cadastrar!", "blue", "lnr lnr-warning", 4000];
            $this->Result = false;
        else:
            $this->setData();
//            $this->setName();
            $this->Create();
        endif;
    }

    /**
     * <b>Atualizar Post:</b> Envelope os dados em uma array atribuitivo e informe o id de um 
     * post para atualiza-lo na tabela!
     * @param INT $PostId = Id do post
     * @param ARRAY $Data = Atribuitivo
     */
    public function ExeUpdate($PostId, array $Data) {
        $this->Post = (int) $PostId;
        $this->Data = $Data;

        if (in_array('', $this->Data)):
            $this->Error = ["Para atualizar, preencha todos os campos!", "blue", "lnr lnr-warning", 4000];
            $this->Result = false;
        else:
            $this->setData();

            $this->Update();
        endif;
    }

    /**
     * <b>Deleta Post:</b> Informe o ID do post a ser removido para que esse método realize uma checagem de
     * pastas e galerias excluinto todos os dados nessesários!
     * @param INT $PostId = Id do post
     */
    public function ExeDelete($PostId) {
        $this->Post = (int) $PostId;

        $ReadPost = new Read;
        $ReadPost->ExeRead(self::Entity, "WHERE id_proc = :post", "post={$this->Post}");

        if (!$ReadPost->getResult()):
            $this->Error = ["O processo que você tentou deletar não existe no sistema!", "red", "lnr lnr-warning", 4000];
            $this->Result = false;
        else:
            $PostDelete = $ReadPost->getResult()[0];

            $deleta = new Delete;
            $deleta->ExeDelete(self::Entity, "WHERE id_proc = :postid", "postid={$this->Post}");

            $this->Error = ["O processo foi removido com sucesso do sistema!", "green", "lnr lnr-smile", 4000];
            $this->Result = true;
        endif;
    }

    /**
     * <b>Ativa/Inativa Post:</b> Informe o ID do post e o status e um status sendo 1 para ativo e 0 para
     * rascunho. Esse méto ativa e inativa os posts!
     * @param INT $PostId = Id do post
     * @param STRING $PostStatus = 1 para ativo, 0 para inativo
     */
    public function ExeStatus($PostId, $PostStatus) {
        $this->Post = (int) $PostId;
        $this->Data['post_status'] = (string) $PostStatus;
        $Update = new Update;
        $Update->ExeUpdate(self::Entity, $this->Data, "WHERE post_id = :id", "id={$this->Post}");
    }

    /**
     * <b>Verificar Cadastro:</b> Retorna ID do registro se o cadastro for efetuado ou FALSE se não.
     * Para verificar erros execute um getError();
     * @return BOOL $Var = InsertID or False
     */
    public function getResult() {
        return $this->Result;
    }

    /**
     * <b>Obter Erro:</b> Retorna um array associativo com uma mensagem e o tipo de erro.
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

    //Obtem o ID da categoria PAI
    private function getCatParent() {
        $rCat = new Read;
        $rCat->ExeRead("tb_categories", "WHERE category_id = :id", "id={$this->Data['post_category']}");
        if ($rCat->getResult()):
            return $rCat->getResult()[0]['category_parent'];
        else:
            return null;
        endif;
    }

    //Verifica o NAME post. Se existir adiciona um pós-fix -Count
    private function setName() {
        $Where = (isset($this->Post) ? "post_id != {$this->Post} AND" : '');
        $readName = new Read;
        $readName->ExeRead(self::Entity, "WHERE {$Where} post_title = :t", "t={$this->Data['post_title']}");
        if ($readName->getResult()):
            $this->Data['post_name'] = $this->Data['post_name'] . '-' . $readName->getRowCount();
        endif;
    }

    //Cadastra o post no banco!
    private function Create() {

        $cadastra = new Create;
        $cadastra->ExeCreate(self::Entity, $this->Data);

        $this->Error = ["O processo foi cadastrado com sucesso no sistema!", "green", "lnr lnr-smile", 4000];
        $this->Result = $cadastra->getResult();
    }

    //Atualiza o post no banco!
    private function Update() {
        $Update = new Update;
        $Update->ExeUpdate(self::Entity, $this->Data, "WHERE id_proc = :id", "id={$this->Post}");
        if ($Update->getResult()):
            $this->Error = ["O processo foi atualizado com sucesso no sistema!", "green", "lnr lnr-smile", 4000];
            $this->Result = true;
        endif;
    }

}
