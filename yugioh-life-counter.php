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
    wp_enqueue_script('ygo-life-counter-js', plugin_dir_url(__FILE__) . 'yugioh-life-counter.js', array('jquery'), null, true);
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
        <div class="player-container">
            <h2>Player 2</h2>
            <div class="lp-display" data-lp="8000">LP: 8000</div>
            <button class="lp-btn" data-lp-change="1000">+1000</button>
            <button class="lp-btn" data-lp-change="-500">-500</button>
            <button class="lp-btn" data-lp-change="500">+500</button>
            <button class="lp-btn" data-lp-change="-1000">-1000</button>
            <button class="lp-btn" data-lp-change="1">+1</button>
            <button class="lp-btn" data-lp-change="-1">-1</button>
        </div>
        <div class="dice-coin-container">
            <button id="roll-dice">Roll Dice</button>
            <div id="dice-result">Dice Result: </div>
            <button id="flip-coin">Flip Coin</button>
            <div id="coin-result">Coin Result: </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('yugioh_life_counter', 'ygo_life_counter_shortcode');
?>
