<? 
    class Errors extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->message = 'Error interna.';
            $this->view->render('error/index');
        }
    }
?>