<?php
    /**
     * Created by PhpStorm.
     * User: vinicius.psilva
     * Date: 24/02/2017
     * Time: 17:33
     */

    namespace App\Controller;



    use Core\BaseController;
    use Core\ViewBase;
    use Core\BaseModel;
    use App\Model\AlunoModel;
    use MongoDB\Driver\Query;

    class homeController extends BaseController
    {

        public function index(){
            ViewBase::view('Index/index.tpl');
        }
        public function show($id, $request){
            echo $id," --- ","<br/>";
            echo $request->get->id;
        }


    }