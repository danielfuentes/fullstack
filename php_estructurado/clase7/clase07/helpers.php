    <?php
    
    function dd(...$vars)
    {
        echo"<pre>";
        die(var_dump($vars));
    }

    function old($campo)
    {
        if(isset($_POST["$campo"])) {
            return $_POST["$campo"];
        }
    }










