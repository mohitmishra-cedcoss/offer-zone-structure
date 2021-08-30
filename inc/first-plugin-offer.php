<?php
if(!function_exists('callback_function_for_first_plugin')) {
    function callback_function_for_first_plugin() {
        ?>
            <h1>This is normal test</h1>
        <?php
    }
}

if(!function_exists('callback_function_first_plugin')) {
    function callback_function_first_plugin($events) {
        $events[] = array(
                'id' => 'deals_for_first_plugin',
                'name' => esc_html__('Deals for first plugin','textdomain'),
                'callback_function' => 'callback_function_for_first_plugin'
            );
        return $events;
    }
}
add_filter('all_events_for_the_offerzone','callback_function_first_plugin',20, 1);