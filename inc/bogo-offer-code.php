<?php
if(!function_exists('callback_function_for_deals_of_day')) {
    function callback_function_for_deals_of_day() {
        ?>
            <h1>This is normal test</h1>
        <?php
    }
}


if(!function_exists('callback_function_for_deals_for_test3')) {
    function callback_function_for_deals_for_test3() {
        ?>
            <h1>This is normal test</h1>
        <?php
    }
}
if(!function_exists('callback_function_for_events')) {
    function callback_function_for_events($events) {
        $events[] = array(
            'id' => 'deals_of_the_day',
            'name' => esc_html__('Deals Of Day','textdomain'),
            'callback_function' => 'callback_function_for_deals_of_day'
        );
        $events[] = array(
            'id' => 'test3',
            'name' => esc_html__('Test3','textdomain'),
            'callback_function' => 'callback_function_for_deals_for_test3'
        );
            
        return $events;
    }
}
add_filter('all_events_for_the_offerzone','callback_function_for_events',10, 1);