<?php
class nav_debug
{
        public $common_hdr = 'a default value';
        public $dir_path = 'dir_path NOT SET';
        public $script_name = 'script_name NOT SET';
        public $debug_mode = 'off';

        function prt_comments()
        {
                //echo '$this is defined (';
                //echo get_class($this);
                //echo ")\n";

        //
        //The following is a heredoc
        //care should be taking when makng any changs. Last line
        //(EOT;) has to be on a seperate line
        //
                if ($this->debug_mode == "on")
                {
echo <<<EOT

<!--
This comments block is dynamically generated for debugging purposes-
In  $this->script_name:  [ $this->dir_path ].
-->

EOT;
                } else {
                        echo <<<EOT
<!-- Debug mode is "off". to turn it on, set [ debug_mode: "on" ] in nav_config.json -->

EOT;
                }
        }
}
?>
