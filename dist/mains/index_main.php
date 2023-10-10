<?php
    class IndexMain {
        private $essentials;

        public function __construct($essentials) {
            $this->essentials = $essentials;
        }

        public function index() {
            print ($this->essentials->getHeader("Home") . file_get_contents("home.html") . $this->essentials->getFooter(""));
            // print(file_get_contents("home.html"));
        }
    }
?>