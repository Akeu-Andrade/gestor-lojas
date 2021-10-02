<?php


namespace App\Business\Relatorio;


use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\View\View;

abstract class RelatorioAbstract
{
    /**
     * @param string $view
     * @param array $data
     * @return PDF
     */
    protected function loadView(string $view, array $data = [])
    {
        return PDF::loadView($view, $data);
    }

    /**
     * @return string
     */
    abstract public function getNome(): string;

    /**
     * @param Request $request
     * @return mixed
     */
    abstract public function gerar(Request $request);
    abstract public function getFilterView(): View;
    abstract public function getId(): String;
}
