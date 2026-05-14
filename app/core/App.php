<?php
class App{
    protected $controller = "homeController";
    protected $action = "index";
    protected $param = [];

    public function __construct()
    {
        // echo "Hello form app class constructor!";
        // echo "URL sau khi xử lý: " . implode(', ', $this->urlProcess());
        // echo "<br>";
        // var_dump($this->urlProcess());

        $urlProcess = $this -> urlProcess();
        if(isset($urlProcess[0])){
            if(file_exists('../app/controllers/' . $urlProcess[0] . 'Controller.php')){
                $this -> controller = $urlProcess[0].'Controller';
                unset($urlProcess[0]);
            }
        }
        require_once '../app/controllers/' . $this -> controller . '.php';
        $this -> controller = new $this -> controller;
        if(isset($urlProcess[1])){
            if(method_exists($this -> controller, $urlProcess[1])){
                $this -> action = $urlProcess[1];
                unset($urlProcess[1]);
            }
        }
        $this -> param = $urlProcess ? array_values($urlProcess) : [];
        call_user_func_array([$this -> controller, $this -> action], $this -> param);
    }

    public function urlProcess()
    {
        $url = $_GET['url'] ?? '';
        $url = rtrim($url, '/');    
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $urlSegments = explode('/', $url);
        return $urlSegments;
    }
}
?>