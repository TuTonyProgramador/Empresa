<?php
    include 'proveedor.php';
    
    class Producto {
        // Miembro privados de la clase
        private string $codigoProducto;
        private string $descripcion;
        private float $precio;
        private int $stock;
        private Proveedor $proveedor;

        // Constructor
        public function __construct(string $codigoProducto, string $descripcion, float $precio, int $stock, Proveedor $proveedor) {
            $this->codigoProducto = $codigoProducto;
            $this->descripcion = $descripcion;
            $this->precio = $precio;
            $this->stock = $stock;
            $this->proveedor = $proveedor;
        }

        // Propiedad asociada al miembro privado $codigoProducto
        public function getCodigoProducto(): string {
            return $this->codigoProducto;
        }
        public function setCodigoProducto(string $codigoProducto): void {
            $this->codigoProducto = $codigoProducto;
        }

        // Propiedad asociada al miembro privado $descripcion
        public function getDescripcion(): string {
            return $this->descripcion;
        }
        public function setDescripcion(string $descripcion): void {
            $this->descripcion = $descripcion;
        }

        // Propiedad asociada al miembro privado $precio
        public function getPrecio(): float {
            return $this->precio;
        }
        public function setPrecio(float $precio): void {
            $this->precio = $precio;
        }

        // Propiedad asociada al miembro privado $stock
        public function getStock(): int {
            return $this->stock;
        }
        public function setStock(int $stock): void {
            $this->stock = $stock;
        }

        // Propiedad asociada al miembro privado $proveedor
        public function getProveedor(): Proveedor {
            return $this->proveedor;
        }
        public function setProveedor(Proveedor $proveedor): void {
            $this->proveedor = $proveedor;
        }

        // Metodo toString de la clase
        public function __toString(): string {
            return "Código Producto: " . $this->codigoProducto . "<br>" .
                "Descripción: " . $this->descripcion . "<br>" .
                "Precio: " . $this->precio . "<br>" .
                "Stock: " . $this->stock . "<br>" .
                "Proveedor: " . $this->proveedor . "<br>";
        }        
    }
?>