<?php

    // Homepage Widget Areas
    genesis_register_sidebar(array( 
        'name'=>'Sample Widget', 
        'id'=>'sample-widget', 
        'description' => 'This is to show how to create a widget', 
        'before_title'=>'<h4>',
        'after_title'=>'</h4>'
    ));
    
?>
