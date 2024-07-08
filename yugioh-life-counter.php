<?php
/**
 * Plugin Name: Yu-Gi-Oh! Life Counter
 * Description: A life counter application for Yu-Gi-Oh! card game.
 * Version: 1.1
 * Author: Void, Corp
 * License: GPL2
 */

function ygo_life_counter_enqueue_scripts() {
    wp_enqueue_style('ygo-life-counter-css', plugin_dir_url(__FILE__) . 'yugioh-life-counter.css');
    wp_enqueue_script('jquery'); // Ensure jQuery is enqueued
}
add_action('wp_enqueue_scripts', 'ygo_life_counter_enqueue_scripts');

function ygo_life_counter_shortcode() {
    ob_start();
    ?>
    <div class="ygo-counter-container">
        <h1>Yu-Gi-Oh! Life Counter</h1>
        <div class="player-container">
            <h2>Player 1</h2>
            <div class="lp-display" data-lp="8000">LP: 8000</div>
            <button class="lp-btn" data-lp-change="1000">+1000</button>
            <button class="lp-btn" data-lp-change="-500">-500</button>
            <button class="lp-btn" data-lp-change="500">+500</button>
            <button class="lp-btn" data-lp-change="-1000">-1000</button>
            <button class="lp-btn" data-lp-change="1">+1</button>
            <button class="lp-btn" data-lp-change="-1">-1</button>
        </div>
    </div>
    <script>
        jQuery(document).ready(function($) {
            console.log("Document ready. Initializing event handlers.");

            $('.lp-btn').off('click').on('click', function() {
                var change = parseInt($(this).data('lp-change'), 10);
                var $lpDisplay = $(this).siblings('.lp-display');
                var currentLP = parseInt($lpDisplay.attr('data-lp'), 10);

                console.log("Button clicked. Change: ", change);
                console.log("Current LP: ", currentLP);

                var newLP = currentLP + change;

                console.log("New LP: ", newLP);

                // Update the data attribute and text
                $lpDisplay.attr('data-lp', newLP);
                $lpDisplay.text('LP: ' + newLP);
            });
        });
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('yugioh_life_counter', 'ygo_life_counter_shortcode');
?>
