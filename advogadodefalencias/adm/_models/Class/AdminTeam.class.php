<?php

/**
 * AdminPost.class [ MODEL ADMIN ]
 * Respnsável por gerenciar os posts no Admin do site!
 * 
 * @copyright (c) Jefferson Androcles
 */
class AdminTeam {

    private $Data;
    private $Post;
    private $Error;
    private $Result;

    //Nome da tabela no banco de dados
    const Entity = 'tb_team';

    /**
     * <b>Cadastrar o Post:</b> Envelope os dados do post em um array atribuitivo e execute esse método
     * para cadastrar o post. Envia a capa automaticamente!
     * @param ARRAY $Data = Atribuitivo
     */
    public function ExeCreate(array $Data) {
        $this->Data = $Data;

        if (empty($this->Data['team_title']) || empty($this->Data['team_function']) || empty($this->Data['team_email'])):
            $this->Error = ["Existem campos em branco. Favor preencha os campos de NOME, E-MAIL e FUNÇÃO para cadastrar!", "blue", "lnr lnr-warning", 4000];
            $this->Result = false;
        else:
            $this->setData();

            if ($this->Data['team_cover']):
                $uplaod = new Upload('../../uploads/');
                $uplaod->Image($this->Data['team_cover'], $this->Data['team_name'], null, 'adv');
            endif;

            if (isset($uplaod) && $uplaod->getResult()):
                $this->Data['team_cover'] = $uplaod->getResult();
                $this->Create();
            else:
                $this->Data['team_cover'] = null;
                $this->Create();
            endif;
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

        if (empty($this->Data['team_title']) || empty($this->Data['team_function']) || empty($this->Data['team_email'])):
            $this->Error = ["Existem campos em branco. Favor preencha os campos de NOME, E-MAIL e FUNÇÃO. ( Foto não precisa ser enviada! )", "blue", "lnr lnr-warning", 4000];
            $this->Result = false;
        else:
            $this->setData();
//            $this->setName();

            $read = new Read;
            $read->ExeRead(self::Entity, "WHERE team_id = :post", "post={$this->Post}");
            if (is_array($this->Data['team_cover'])):
                $capa = '../../uploads/' . $read->getResult()[0]['team_cover'];
                if (file_exists($capa) && !is_dir($capa)):
                    unlink($capa);
                endif;

                $uploadCapa = new Upload('../../uploads/');
                $uploadCapa->Image($this->Data['team_cover'], $this->Data['team_name'], null, 'adv');
            endif;

            if (isset($uploadCapa) && $uploadCapa->getResult()):
                $this->Data['team_cover'] = $uploadCapa->getResult();
                $this->Update();
            else:
                unset($this->Data['team_cover']);
                $this->Update();
            endif;
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
        $ReadPost->ExeRead(self::Entity, "WHERE team_id = :post", "post={$this->Post}");

        if (!$ReadPost->getResult()):
            $this->Error = ["O advogado que você tentou deletar não existe no site!", "red", "lnr lnr-warning", 4000];
            $this->Result = false;
        else:
            $PostDelete = $ReadPost->getResult()[0];
            if (file_exists('../../uploads/' . $PostDelete['team_cover']) && !is_dir('../../uploads/' . $PostDelete['team_cover'])):
                unlink('../../uploads/' . $PostDelete['team_cover']);
            endif;

            $deleta = new Delete;
            $deleta->ExeDelete(self::Entity, "WHERE team_id = :postid", "postid={$this->Post}");

            $this->Error = ["O advogado <b>{$PostDelete['team_title']}</b> foi removido com sucesso do site!", "green", "lnr lnr-smile", 4000];
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
        $this->Data['team_status'] = (string) $PostStatus;
        $Update = new Update;
        $Update->ExeUpdate(self::Entity, $this->Data, "WHERE team_id = :id", "id={$this->Post}");
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
        $Cover = $this->Data['team_cover'];
        $Format = $this->Data['team_formation'];
        $Content = $this->Data['team_content'];
        unset($this->Data['team_cover'], $this->Data['team_content'], $this->Data['team_formation']);

        $this->Data = array_map('strip_tags', $this->Data);
        $this->Data = array_map('trim', $this->Data);

        $this->Data['team_name'] = Check::Name($this->Data['team_title']);
        if (!isset($this->Post)) {
            $this->Data['team_registration'] = date("Y-m-d H:i");
        }
        $this->Data['team_cover'] = $Cover;
        $this->Data['team_formation'] = $Format;
        $this->Data['team_content'] = $Content;
    }

    //Cadastra o post no banco!
    private function Create() {
        $Create = new Create;
        $Create->ExeCreate(self::Entity, $this->Data);

        if ($Create->getResult()):
            $this->Error = ["O Advogado <b>{$this->Data['team_title']}</b> foi cadastrado com sucesso no site!", 'green', 'lnr lnr-smile', 4000];
            $this->Result = $Create->getResult();
        endif;
    }

    //Atualiza o post no banco!
    private function Update() {
        $Update = new Update;
        $Update->ExeUpdate(self::Entity, $this->Data, "WHERE team_id = :id", "id={$this->Post}");
        if ($Update->getResult()):
            $this->Error = ["O Advogado <b>{$this->Data['team_title']}</b> foi atualizado com sucesso no site!", "green", "lnr lnr-smile", 4000];
            $this->Result = true;
        endif;
    }

}
