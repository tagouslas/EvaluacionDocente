<? 
    class main extends Controller{
        function __construct(){
            parent::__construct();
            //echo '<p>A new controller Main has created.</p>';
        }

        function render(){
            $this->view->render('main/index');
        }

        function saludo(){
            echo '<p>You are executed the saludo fonction.</p>';
        }

    }
?>