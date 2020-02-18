<?php
    namespace Core;
    class Error
    {
        public static function errorHandler($level,$message,$final,$line)
        {
            if(error_reporting() !==0)
            {
                throw new \ErrorException($message,0,$level,$file,$line);
            }
        }
        public static function exceptionHandler($exception)
        {
            $code=$exception->getcode();
            
            if($code !=404)
            {
                $code=500;
            }
            http_response_code($code);


            if(\App\Config::SHOW_ERRORS)
            {
                echo "<h1>Fatal error</h1>";
                echo "<p>Uncaught exception: '". get_class($exception)."'</p>";
                echo "<p>Stack trace:<pre>". $exception->getTraceAsString()."</pre></p>";
                echo "<p>Thrown in '".$exception->getfile()."' on line". $exception->getLine()."</p>";
            }
            else
            {
                $log = dirname(__DIR__).'/logs/'.date('Y-m-d').'.txt';
                ini_set('error_log',$log);
                $message = "Uncaucht exception:'".get_class($exception)."'";
                $message.="With message '".$exception->getMessage()."'";
                $message.="\nStack trace:".$exception->getTraceAsString();
                $message.="\nThrow in '".$exception->getFile()."' on Line".$exception->getLine();
                error_log($message); 
                //echo "<h1> An error occurred</h1>";
               /*  if($code == 404)
                {
                    echo "<h1>Page not Found</h1>";
                }
                else
                {
                    echo "<h1> An error occurred</h1>";
                } */
                View::renderTemplate("$code.html");
            }
        }
    }
?>