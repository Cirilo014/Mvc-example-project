<?php

Class homeController extends Controller{
    public function index($valor_1)

    {
        /**
         * Buscar as informações no BD
         * Chamar uma View
         * Fazer a junção de Back-end com Front-end
         */


         /*
        $u = new usuario();
        $dados = $u->getDadosUsuario();
        */


        $this->carregarTemplate('home');
    }
}