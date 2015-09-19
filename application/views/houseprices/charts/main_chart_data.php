// Morris.js Charts sample data for SB Admin template

$(function() {

    // Area Chart
    Morris.Line({
        element: 'morris-area-chart',
        data: [
        <?php foreach ($house_prices as $no => $data) { ?>
        {
            date: '<?=$data['date']?>',
            price: <?=$data['price']?>,
        }, 
        <?php } ?>
        ],
        xkey: 'date',
        ykeys: ['price'],
        labels: ['Price'],
        ymin: <?=($lowest_price['price']-5000)?>,
    });

});
