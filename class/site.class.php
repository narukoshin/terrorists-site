<?php
        class Site {
        /**
         * @var bool
         */
        private bool $error = false;
        /**
         * @var string
         */
        private string $errorMessage;
        /**
         * @var bool
         */
        private $post = false;
        /**
         * @var string
         */
        public string $password;
        public function __construct(){
            if ($_SERVER["REQUEST_METHOD"] == "POST") return $this->post = (object)$_POST;
        }
        /**
         * trying to log in
         * 
         * @return void
         */
        public function try_login(){
            if ($this->post) {
                if (!isset($this->post->password)) return;
                if ($this->password != $this->post->password) return $this->set_error("Wrong passphrase");
            }
        }
        /**
         * Setting an error message
         * 
         * @param string $error     An error message
         * @return void
         */
        private function set_error(string $error){
            $this->error = true;
            $this->errorMessage = $error;
        }
        /**
         * Checking if there is any error if no, returning alse, if the error is true, returning object
         * 
         * @return false|object
         */
        public function has_error(){
            if ($this->error){
                return (object)[
                    "message" => $this->errorMessage
                ];
            }
            return false;
        }
        /**
         * Setting the password
         * 
         * @param string $password
         * @return $this
         */
        public function set_password(string $password): object {
            $this->password = $password;
            return $this;
        }
    }