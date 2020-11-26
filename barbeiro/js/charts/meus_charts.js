var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',
    // The data for our dataset
    data: {
        labels: ['08h', '09h', '10h', '11h', '12h', '13h', '14h', '15h', '16h', '17h', '18h', ],

        pointHoverRadius: 10,
        lineRadius: 10,
        borderWidth: 10,
        datasets: [{
            label: 'Quantida de chamados no dia',
            backgroundColor: '#52BE48',
            borderColor: '#fff',
            borderColor: 'white',
            pointBackgroundColor: 'white',
            pointBorderColor: '#fff',
            pointHoverBackgroundColor: '#fff',
            pointHoverBorderColor: 'rgba(148,159,177,0.8)',
            borderWidth: 5,
            data: [65, 59, 80, 81, 56, 55, 40, 33, 22, 45, 85, 65, 75],
            borderWidth: 5,
            lineWidth: 5,
            pointRadius: 5,
            label: 'Serviços diarios',
        }]
    },
    options: {

        layout: {
            padding: {
                left: 15,
                right: 15,
                top: 20,
                bottom: 10
            }
        },
        legend: {
            display: false,
        },
        scales: {
            xAxes: [{
                gridLines: {
                    display: false,
                    legend: true,
                    lineWidth: 2,
                },
                ticks: {
                    display: false,
                }
            }],
            yAxes: [{
                gridLines: {
                    display: false,
                    lineWidth: 2,
                },
                ticks: {
                    display: false,
                    beginAtZero: false,
                    mode: 'dataset'
                },
            }],
            /* xAxes: [{
                 ticks: {
                     display: false,
                     beginAtZero: false
                 },
             }]*/
        },
    }
});