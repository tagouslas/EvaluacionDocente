<? 
    class View{
        function __construct()
        {
            // echo '<p>A new view has created.</p>';
        }
        function render($nombre){
            require 'views/'.$nombre.'.php';
        }
    }
?>