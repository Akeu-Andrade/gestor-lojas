<?php


namespace App\Http\Controllers\Web\Administracao;

use App\Business\Relatorio\RelatorioAbstract;
use App\Http\Controllers\BaseController;
use App\Modules\ClassHelper;
use App\Modules\Module;
use App\View\Modal\ModalHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RelatoriosController extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->setPages(10);
        $this->setFolderView("administracao.relatorios");
        $this->setName("Relatórios");
        $this->setUrl("administracao/relatorios");
    }

    public function index()
    {
        $modulesComRelatorio = [];
        foreach (config('modules') as $module) {
            /**
             * @var Module $objModule
             */
            $objModule = new $module();

            if (!empty($objModule->getReports())){
                /**
                 * @var RelatorioAbstract $report
                 */
                foreach ($objModule->getReports() as $report) {
                    if (Auth::user()->hasAccessToReport($report->getId())) {
                        $modulesComRelatorio[ClassHelper::getBaseFromObject($objModule)]["reports"][] = $report;
                        $modulesComRelatorio[ClassHelper::getBaseFromObject($objModule)]["module"] = $objModule;
                    }
                }
            }
        }

        return \view($this->getFolderView() . ".index", [
            'url'=> $this->getUrl(),
            'modules' => $this->paginate($modulesComRelatorio),
        ]);
    }

    /**
     * @param array $array
     * @return array
     */
    private function paginate(array $array): array
    {
        $paginate = [];

        for ($i = 1; $i <= $this->getPages(); $i++){
            $page = $i;
            $total = count( $array );

            if ($total >= $this->getPages()){
                $limit = (int) round($total/$this->getPages());
                $totalPages = ceil( $total/ $limit );
                $page = max($page, 1);
                $page = min($page, $totalPages);
                $offset = ($page - 1) * $limit;
                if( $offset < 0 ) $offset = 0;

                $paginate[$i] = array_slice( $array, $offset, $limit );
            }else {
                $paginate[$i] = $array;
                break;
            }
        }

        return $paginate;
    }

    /**
     * @param String $module
     * @param String $report
     * @return JsonResponse
     * @throws \Throwable
     */
    public function filtroRelatorio(String $module, String $report): JsonResponse
    {
        /**
         * @var Module $moduleClass
         */
        $moduleClass = ClassHelper::getModuleByName($module);
        $reportClass = $moduleClass->getReportByName($report);

        $url = route('admin.relatorios.report', [$module, $report]);

        $filtro = $reportClass->getFilterView()->render();

        $corpoModal = \view("components.relatorios.filtro_relatorio", [
                'filtro' => $filtro,
                'url' => $url
        ])->render();

        $modal = new ModalHelper($reportClass->getNome(), $corpoModal);

        return response()->json($modal);
    }

    /**
     * @param Request $request
     * @param String $module
     * @param String $report
     * @return RedirectResponse|mixed
     * @throws \Exception
     */
    public function gerarRelatorio(Request $request, String $module, String $report)
    {
        $moduleClass = ClassHelper::getModuleByName($module);
        $reportClass = $moduleClass->getReportByName($report);

        if(app()->environment() === 'production')
        {
            try {
                return $reportClass->gerar($request);
            } catch (\Exception $e) {
                $request->session()->flash('error', $e->getMessage());
                return back();
            }
        }

        return $reportClass->gerar($request);
    }
}
