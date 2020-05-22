<?

class Compras
{
    private $id;
    private $fecha_compra;
    private $cantidad_compra;
    private $idusers;
    private $idproducts;

    public function __construct($id, $fecha_compra, $cantidad_compra, $idusers, $idproducts)
    {
        $this->id = $id;
        $this->fecha_compra = $fecha_compra;
        $this->cantidad_compra = $cantidad_compra;
        $this->idusers = $idusers;
        $this->idproducts = $idproducts;
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


    public function getFecha_compra()
    {
        return $this->fecha_compra;
    }


    public function setFecha_compra($fecha_compra)
    {
        $this->fecha_compra = $fecha_compra;

        return $this;
    }


    public function getCantidad_compra()
    {
        return $this->cantidad_compra;
    }


    public function setCantidad_compra($cantidad_compra)
    {
        $this->cantidad_compra = $cantidad_compra;

        return $this;
    }


    public function getIdusers()
    {
        return $this->idusers;
    }


    public function setIdusers($idusers)
    {
        $this->idusers = $idusers;

        return $this;
    }


    public function getIdproducts()
    {
        return $this->idproducts;
    }


    public function setIdproducts($idproducts)
    {
        $this->idproducts = $idproducts;

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