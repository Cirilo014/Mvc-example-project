<?php

Class Core{

    public function __construct()

    {
        
        $this->run();
    }

    public function run()
    
    {
        if(isset($_GET['pag']))

        {
            $url = $_GET['pag'];
        }

        // Possui informação após o domínio. ->www.site.com/classe/função/parametro
        if(!empty($url))
        {
          $url =  explode('/', $url);
          $controller = $url[0].'Controller'; //notícia
          array_shift($url); //usado para retirar a primeira posição d'um array.
          
          if(isset($url[0]) && !empty($url[0])) //verificando se a função existe e ñ está vazia.

          {
              $metodo = $url[0];
              array_shift($url);

          }else //caso tenha enviado somente a classe, sem método.
          
          {
                $metodo = 'index';
          }

          if(count($url) > 0 )
         
          {
            $parametros = $url;
          }

        }else //Terá apenas isto -> www.site.com/

        {
            $controller = 'homeController';
            $metodo = 'index';
        }

        $caminho = 'App/Controllers/'.$controller.'.php';
        
        if(!file_exists($caminho) && !method_exists($controller, $metodo))

        {
            $controller = 'homeController';
            $metodo = 'index';
        }

        $c = new $controller;
        call_user_func_array(array($c,$metodo), $parametros);
   
    }

        
    
}

