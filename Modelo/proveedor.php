<?php
    class Proveedor {
        // Miembro privados de la clase
        private string $codigoProveedor;
        private string $pwd;
        private string $nombre;
        private string $apellidos;
        private string $email;
        private array $producto;

        // Constructor
        public function __construct(string $codigoProveedor, string $pwd, string $nombre, string $apellidos, string $email) {
            $this->codigoProveedor = $codigoProveedor;
            $this->pwd = $pwd;
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->email = $email;
            $this->producto = [];
        }

        // Propiedad asociada al miembro privado $codigoProveedor
        public function getCodigoProveedor(): string {
            return $this->codigoProveedor;
        }
        public function setCodigoProveedor(string $codigoProveedor): void {
            $this->codigoProveedor = $codigoProveedor;
        }

        // Propiedad asociada al miembro privado $pwd
        public function getPwd(): string {
            return $this->pwd;
        }
        public function setPwd(string $pwd): void {
            $this->pwd = $pwd;
        }

        // Propiedad asociada al miembro privado $nombre
        public function getNombre(): string {
            return $this->nombre;
        }
        public function setNombre(string $nombre): void {
            $this->nombre = $nombre;
        }

        // Propiedad asociada al miembro privado $apellidos
        public function getApellidos(): string {
            return $this->apellidos;
        }
        public function setApellidos(string $apellidos): void {
            $this->apellidos = $apellidos;
        }

        // Propiedad asociada al miembro privado $email
        public function getEmail(): string {
            return $this->email;
        }
        public function setEmail(string $email): void {
            $this->email = $email;
        }

        // Propiedad asociada al miembro privado $producto
        public function getProductos(): array {
                return $this->producto;
        }
        public function setProductos(array $producto): void {
            $this->producto = $producto;
        }
    }
?>