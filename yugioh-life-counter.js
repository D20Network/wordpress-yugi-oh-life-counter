jQuery(document).ready(function($) {
    $('.lp-btn').click(function() {
        var change = parseInt($(this).data('lp-change'));
        var $lpDisplay = $(this).siblings('.lp-display');
        var currentLP = parseInt($lpDisplay.data('lp'));
        var newLP = currentLP + change;
        $lpDisplay.data('lp', newLP).text('LP: ' + newLP);
    });

    $('#roll-dice').click(function() {
        var result = Math.floor(Math.random() * 6) + 1;
        $('#dice-result').text('Dice Result: ' + result);
    });

    $('#flip-coin').click(function() {
        var result = Math.random() < 0.5 ? 'Heads' : 'Tails';
        $('#coin-result').text('Coin Result: ' + result);
    });
});
