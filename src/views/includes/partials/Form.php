<?php

class Form
{
    public function __construct()
    {
        
    }

    public function text($defaultText)
    {
        echo '<input type="text" placeholder="'.$defaultText.'">' ;
    }
}
