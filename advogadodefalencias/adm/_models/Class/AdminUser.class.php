<?php

/**
 * AdminUser.class [ MODEL ADMIN ]
 * Respnsável por gerenciar os usuários no Admin do sistema!
 * 
 * @copyright (c) Jefferson Androcles
 */
class AdminUser {

    private $Data;
    private $nameUser;
    private $User;
    private $Error;
    private $Result;

    //Nome da tabela no banco de dados
    const Entity = 'tb_users';

    /**
     * <b>Cadastrar Usuário:</b> Envelope os dados de um usuário em um array atribuitivo e execute esse método
     * para cadastrar o mesmo no sistema. Validações serão feitas!
     * @param ARRAY $Data = Atribuitivo
     */
    public function ExeCreate(array $Data) {
        $this->Data = $Data;

        $this->setData();
        $this->checkData();

        if ($this->Result):
            $this->Create();
        endif;
    }

    /**
     * <b>Atualizar Usuário:</b> Envelope os dados em uma array atribuitivo e informe o id de um
     * usuário para atualiza-lo no sistema!
     * @param INT $UserId = Id do usuário
     * @param ARRAY $Data = Atribuitivo
     */
    public function ExeUpdate($UserId, array $Data) {
        $this->User = (int) $UserId;
        $this->Data = $Data;

        if (!$this->Data['user_password']):
            unset($this->Data['user_password']);
        endif;
        $this->setData();
        $this->checkData();

        if ($this->Result):
            $this->Update();
        endif;
    }

    public function ExeProfile($UserId, array $Data) {
        $this->User = (int) $UserId;
        $this->Data = $Data;

        if (!$this->Data['user_password']):
            unset($this->Data['user_password']);
        endif;

        $this->Data = array_map('strip_tags', $this->Data);
        $this->Data = array_map('trim', $this->Data);

        $this->Data['user_email'] = strtolower($this->Data['user_email']);

        $this->checkData();

        if ($this->Result):
            $this->Update();
        endif;
    }

    public function ExeRemove($UserId, array $Data) {
        $this->User = (int) $UserId;
        $this->Data = $Data;
        $this->nameUser = $this->Data['usuario_user'];
        unset($this->Data['usuario_user']);
        $this->checkRemove();
        if ($this->Result):
            $this->Update();
        endif;
    }

    /**
     * <b>Remover Usuário:</b> Informe o ID do usuário que deseja remover. Este método não permite deletar
     * o próprio perfil ou ainda remover todos os ADMIN'S do sistema!
     * @param INT $UserId = Id do usuário
     */
    public function ExeDelete($UserId) {
        $this->User = (int) $UserId;

        $readUser = new Read;
        $readUser->ExeRead(self::Entity, "WHERE user_id = :id", "id={$this->User}");

        if (!$readUser->getResult()):
            $this->Error = ['Oppsss, você tentou remover um usuário que não existe no sistema!', 'red', 'lnr lnr-warning', 4000];
            $this->Result = false;
        elseif ($this->User == $_SESSION['userlogin']['user_id']):
            $this->Error = ['Oppsss, você tentou remover seu usuário. Essa ação não é permitida!!', 'red', 'lnr lnr-warning', 4000];
            $this->Result = false;
        else:
            if ($readUser->getResult()[0]['user_level'] == 3):

                $readAdmin = $readUser;
                $readAdmin->ExeRead(self::Entity, "WHERE user_id != :id AND user_level = :lv", "id={$this->User}&lv=3");

                if (!$readAdmin->getRowCount()):
                    $this->Error = ['Oppsss, você está tentando remover o único ADMIN do sistema. Para remover cadastre outro antes!!!', 'red', 'lnr lnr-warning', 3000];
                    $this->Result = false;
                else:
                    $this->Delete();
                endif;
            else:
                $this->Delete();
            endif;
        endif;
    }

    public function ExeDeleteProfile($UserId) {
        $this->User = (int) $UserId;

        $readUser = new Read;
        $readUser->ExeRead(self::Entity, "WHERE user_id = :id", "id={$this->User}");

        if (!$readUser->getResult()):
            $this->Error = ['Oppsss, você tentou remover um usuário que não existe no sistema!', 'red', 'lnr lnr-warning', 4000];
            $this->Result = false;
        else:
            if ($readUser->getResult()[0]['user_level'] == 3):
                $readAdmin = $readUser;
                $readAdmin->ExeRead(self::Entity, "WHERE user_id != :id AND user_level = :lv", "id={$this->User}&lv=4");

                if (!$readAdmin->getRowCount()):
                    $this->Error = ['Oppsss, você está tentando remover o único ADMIN do sistema. Para remover cadastre outro antes!!!', 'red', 'lnr lnr-warning', 3000];
                    $this->Result = false;
                else:
                    $this->Delete();
                endif;
            else:
                $this->Delete();
            endif;

        endif;
    }

    /**
     * <b>Verificar Cadastro:</b> Retorna TRUE se o cadastro ou update for efetuado ou FALSE se não.
     * Para verificar erros execute um getError();
     * @return BOOL $Var = True or False
     */
    public function getResult() {
        return $this->Result;
    }

    /**
     * <b>Obter Erro:</b> Retorna um array associativo com um erro e um tipo.
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

    private function setData() {
        $this->Data = array_map('strip_tags', $this->Data);
        $this->Data = array_map('trim', $this->Data);

        $this->Data['user_email'] = strtolower($this->Data['user_email']);
    }

    //Verifica os dados digitados no formulário
    private function checkData() {
        if (in_array('', $this->Data)):
            $this->Error = ["Existem campos em branco. Favor preencha todos os campos!", 'blue', 'lnr lnr-warning', 5000];
            $this->Result = false;
        elseif (!Check::Email($this->Data['user_email'])):
            $this->Error = ["O e-email informado não parece ter um formato válido!", 'blue', 'lnr lnr-warning', 5000];
            $this->Result = false;
        elseif (isset($this->Data['user_password']) && (strlen($this->Data['user_password']) < 5 || strlen($this->Data['user_password']) > 12)):
            $this->Error = ["A senha deve ter entre 5 e 12 caracteres!", 'blue', 'lnr lnr-warning', 4000];
            $this->Result = false;
        else:
            $this->checkEmail();
        endif;
    }

    //Verifica usuário pelo e-mail, Impede cadastro duplicado!
    private function checkEmail() {
        $Where = (isset($this->User) ? "user_id != {$this->User} AND" : '');

        $readUser = new Read;
        $readUser->ExeRead(self::Entity, "WHERE {$Where} user_email = :email", "email={$this->Data['user_email']}");

        if ($readUser->getRowCount()):
            $this->Error = ["O email informado já existe no sistema! Informe outro email!", 'blue', 'lnr lnr-warning', 7000];
            $this->Result = false;
        else:
            $this->Result = true;
        endif;
    }

    //Verifica usuário, Impede cadastro duplicado!
    private function checkRemove() {
        $readUser = new Read;
        $v = 'R';
        $readUser->ExeRead(self::Entity, "WHERE status_user = :v AND id_user = :id", "v={$v}&id={$this->User}");

        if ($readUser->getRowCount()):
            $this->Error = ["O usuário {$this->nameUser} já foi removido!", 'red', 'lnr lnr-warning', 7000];
            $this->Result = false;
        else:
            $this->createReport();
        endif;
    }

    // Cadasrtra Usuário!
    private function Create() {
        $Create = new Create;
        $this->Data['user_password'] = md5($this->Data['user_password']);

        $Create->ExeCreate(self::Entity, $this->Data);

        if ($Create->getResult()):
            $this->Error = ["O usuário <b>{$this->Data['user_name']}</b> foi cadastrado com sucesso no sistema!", 'green', 'lnr lnr-smile', 4000];
            $this->Result = $Create->getResult();
        endif;
    }

    //Atualiza Usuário!
    private function Update() {
        $Update = new Update;
        if (isset($this->Data['user_password'])):
            $this->Data['user_password'] = md5($this->Data['user_password']);
        endif;
        $Update->ExeUpdate(self::Entity, $this->Data, "WHERE user_id = :id", "id={$this->User}");
        if ($Update->getResult()):
            $this->Error = ["O usuário <b>{$this->Data['user_name']}</b> foi atualizado com sucesso!", 'green', 'lnr lnr-smile', 4000];
            $this->Result = true;
        endif;
    }

    //Remove Usuário
    private function Delete() {
        $Delete = new Delete;
        $Delete->ExeDelete(self::Entity, "WHERE user_id = :id", "id={$this->User}");
        if ($Delete->getResult()):
            $this->Error = ["Usuário removido do sistema!", 'green', 'lnr lnr-smile', 4000];
            $this->Result = true;
        endif;
    }

}
