<?php
use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\View;
use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\Redirect;

class AdminController extends BaseAuthController
{
    public function index()
    {
        $this->loginFilterByRole('admin');
        $aeroportos = aeroporto::all();

        return View::make('admin.index', ['aeroportos'=>$aeroportos]);
    }

    public function GestaoAero()
    {
        $this->loginFilterByRole('admin');
        $aeroportos = aeroporto::all();

        return View::make('admin.gestaoAero', ['aeroportos'=>$aeroportos]);
    }

    public function getAeroportoForm()
    {
        $this->loginFilterByRole('admin');
        return View::make('admin.aeroAdd');
    }


    public function aeroUpdate($id)
    {
        $this->loginFilterByRole('admin');

        $aeroporto = Aeroporto::find([$id]);

        if (is_null($aeroporto)) {
        } else {
            return View::make('admin.aeroUpdate', ['aeroporto' => $aeroporto]);
        }
    }

    public function doUpdateAero($id)
    {
        $this->loginFilterByRole('admin');

        $aeroporto = Aeroporto::find([$id]);
        $aeroporto->update_attributes(Post::getAll());

        $aeroporto->save();
        Redirect::toRoute('admin/GestaoAero');
    }

    public function aeroportosAdd()
    {
        $this->loginFilterByRole('admin');
        $aeroporto = new Aeroporto(Post::getAll());

        if ($aeroporto->is_valid()) {
            $aeroporto->save();
            Redirect::toRoute('admin/GestaoAero');
        } else {
            Redirect::flashToRoute('admin/aeroportosAdd', ['aeroporto' => $aeroporto]);
        }
    }

    public function AeroEliminar($id)
    {
        $this->loginFilterByRole('admin');

        $aeroporto = Aeroporto::find([$id]);
        $aeroporto->delete();
        Redirect::toRoute('admin/GestaoAero');
    }

    public function Funcionarios()
    {
        $this->loginFilterByRole('admin');

        $operador = User::all(array('conditions' => array('role != ?', 'passageiro')));


        return View::make('admin.funcionarios', ['operador' => $operador]);
    }

    public function funcioUpdate($id)
    {
        $this->loginFilterByRole('admin');

        $operador = User::find([$id]);

        if (is_null($operador)) {
        } else {
            return View::make('admin.funcioUpdate', ['operador' => $operador]);
        }
    }

    public function doUpdateFuncio($id)
    {
        $this->loginFilterByRole('admin');

        $operador = User::find([$id]);
        $operador->update_attributes(Post::getAll());

        if($operador->is_valid()){
            $operador->save();
            Redirect::toRoute('admin/Funcionario');
        } else {
            Redirect::flashToRoute('admin/funcioUpdate', ['operador' => $operador]);
        }
    }

    public function funcionarioForm()
    {
        $this->loginFilterByRole('admin');

        return View::make('admin.funcioAdd');
    }

    public function funcioAdd()
    {
        $this->loginFilterByRole('admin');

        $operador = new User(Post::getAll());

        if($operador->is_valid()){
            $operador->save();
            Redirect::toRoute('admin/Funcionario');
        } else {
            //redirect to form with data and errors
            Redirect::flashToRoute('admin/funcionarioForm', ['operador' => $operador]);
        }
    }

    public function funcioEliminar($id)
    {
        $this->loginFilterByRole('admin');

        $operador = User::find([$id]);
        $operador->delete();
        Redirect::toRoute('admin/Funcionario');
    }
}