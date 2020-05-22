<?

class TipoProducto
{
    private $id;
    private $lacteos;
    private $verduras;
    private $frutas;

    public function __construct($id, $lacteos, $verduras, $frutas)
    {
        $this->id = $id;
        $this->lacteos = $lacteos;
        $this->verduras = $verduras;
        $this->frutas = $frutas;
    }

    
    public function getId()
    {
        return $this->id;
    }

    
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getLacteos()
    {
        return $this->lacteos;
    }


    public function setLacteos($lacteos)
    {
        $this->lacteos = $lacteos;

        return $this;
    }


    public function getVerduras()
    {
        return $this->verduras;
    }


    public function setVerduras($verduras)
    {
        $this->verduras = $verduras;

        return $this;
    }


    public function getFrutas()
    {
        return $this->frutas;
    }


    public function setFrutas($frutas)
    {
        $this->frutas = $frutas;

        return $this;
    }

    public function toArray()
    {
        $vars = get_object_vars($this);
        $array = array();
        foreach ($vars as $key => $value) {
            $array[ltrim($key, '_')] = $value;
        }
        return $array;
    }
}
