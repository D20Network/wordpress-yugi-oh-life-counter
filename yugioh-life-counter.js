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

    $('#roll-dice').off('click').on('click', function() {
        var result = Math.floor(Math.random() * 6) + 1;
        console.log("Dice roll result: ", result);
        $('#dice-result').text('Dice Result: ' + result);
    });

    $('#flip-coin').off('click').on('click', function() {
        var result = Math.random() < 0.5 ? 'Heads' : 'Tails';
        console.log("Coin flip result: ", result);
        $('#coin-result').text('Coin Result: ' + result);
    });
});

