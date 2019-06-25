$(function() {

    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "Pending",
            value: 12
        }, {
            label: "Closed",
            value: 30
        }, {
            label: "Completed",
            value: 20
        }],
        resize: true
    });

    Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: 'Jan 22',
            a: 100
        }, {
            y: 'Jan 23',
            a: 75
        }, {
            y: 'Jan 24',
            a: 50
        }, {
            y: 'Jan 25',
            a: 75
        }, {
            y: 'Jan 26',
            a: 50
        }, {
            y: 'Jan 27',
            a: 75
        }, {
            y: 'Jan 28',
            a: 100
        }],
        xkey: 'y',
        ykeys: ['a'],
        labels: ['New Inquiries'],
        hideHover: 'auto',
        resize: true
    });

});
