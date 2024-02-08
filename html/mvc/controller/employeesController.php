<?php
class EmployeesController{
    private $conectar;
    private $Connection;
    public function __construct() {
		require_once  __DIR__ . "/../core/Conectar.php";
        require_once  __DIR__ . "/../model/employee.php";
        $this->conectar=new Conectar();
        $this->Connection=$this->conectar->Connection();
    }
   /**
    * Ejecuta la acción correspondiente.
    *
    */
    public function run($accion){
        switch($accion)
        {
            case "index" :
                $this->index();
                break;
            case "alta" :
                $this->crear();
                break;
            case "detalle" :
                $this->detalle();
                break;
            case "actualizar" :
                $this->actualizar();
                break;
            case "delete" :
                $this->delete();
                break;
            default:
                $this->index();
                break;
        }
    }
   /**
    * Loads the employees home page with the list of
    * employees getting from the model.
    *
    */
    public function index(){
        //We create the employee object
        $employee=new Employee($this->Connection);
        //We get all the employees
        $employees=$employee->getAll();
        //We load the index view and pass values to it
        $this->view("index",array(
            "employees"=>$employees,
            "titulo" => "PHP MVC"
        ));
    }
    /**
    * Loads the employees home page with the list of
     * employees getting from the model.
    *
    */
    public function detalle(){
        //We load the model
        $modelo = new Employee($this->Connection);
        //We recover the employee from the BBDD
        $employee = $modelo->getById($_GET["id"]);
        $phone =explode(",",$employee->phone);
        // foreach($phone as $value){
        //     echo $value." ";
        // };
        //We load the detail view and pass values to it
        $this->view("detalle",array(
            "employee"=>$employee,
            "phone"=> $phone,
            "titulo" => "Detalle Employee"
        ));
    }
   /**
    * Create a new employee from the POST parameters
     * and reload the index.php.
    *
    */
    public function crear(){
        if(isset($_POST["Name"])){
            //Creamos un usuario
            $employee=new Employee($this->Connection);
            $employee->setName($_POST["Name"]);
            //$employee->setSurname($_POST["Surname"]);
            if(isset($_POST['Surname'])){
                $employee->setSurname($_POST['Surname']);
            }else{
                $employee->setSurname("");
            }
            $employee->setEmail($_POST["email"]);
            if(isset($_POST['phone'])){
                $arrayToString = implode(',',$_POST['phone']);
                $employee->setphone($arrayToString);
            }else{
                $employee->setphone("");
            }
            $save=$employee->save();
        }
        header('Location: index.php');
    }
   /**
    * Update employee from POST parameters
     * and reload the index.php.
    *
    */
    public function actualizar(){
        if(isset($_POST["id"])){
            //We create a user
            $employee=new Employee($this->Connection);
            $employee->setId($_POST["id"]);
            $employee->setName($_POST["Name"]);
            //$employee->setSurname($_POST["Surname"]);
            if(isset($_POST['Surname'])){
                $employee->setSurname($_POST['Surname']);
            }else{
                $employee->setSurname("");
            }           
            $employee->setEmail($_POST["email"]);
            if(isset($_POST['phone'])){
                $arrayToString = implode(',',$_POST['phone']);
                $employee->setphone($arrayToString);
            }else{
                $employee->setphone("");
            }
            $save=$employee->update();
        }
        header('Location: index.php');
    }

    public function delete(){
        if(isset($_GET["id"])){
            //delete
            $employee = new Employee($this->Connection);
            $employee->deleteById($_GET["id"]);
        }
       header('Location: index.php');
    }
   /**
    * Create the view that we pass to it with the indicated data.
    *
    */
    public function view($vista,$datos){
        $data = $datos;
        require_once  __DIR__ . "/../view/" . $vista . "View.php";
    }
}
?>
