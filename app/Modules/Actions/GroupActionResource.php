<?php


namespace App\Modules\Actions;


class GroupActionResource extends GroupAction
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $construct;

    public function __construct(string $name, string $construct)
    {
        parent::__construct($name);
        $this->construct = $construct;

        $this->addAction(new Action("Cadastrar", $this->getConstructClassName()."@create"));
        $this->addAction(new Action("Salvar", $this->getConstructClassName()."@store"));
        $this->addAction(new Action("Editar", $this->getConstructClassName()."@edit"));
        $this->addAction(new Action("Atualizar", $this->getConstructClassName()."@update"));
        $this->addAction(new Action("Remover", $this->getConstructClassName()."@destroy"));
        $this->addAction(new Action("Consultar", $this->getConstructClassName()."@index"));
        $this->addAction(new Action("Visualizar", $this->getConstructClassName()."@show"));
    }

    private function getConstructClassName()
    {
        $arrayNames = explode('\\', $this->construct);

        return strtolower(end($arrayNames));
    }
}
