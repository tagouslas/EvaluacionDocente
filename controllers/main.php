<? 
    class main extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->render('main/index');
            //echo '<p>A new controller Main has created.</p>';
        }

        function saludo(){
            echo '<p>You are executed the saludo fonction.</p>';
        }

    }
?>