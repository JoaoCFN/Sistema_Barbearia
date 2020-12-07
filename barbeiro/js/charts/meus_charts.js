var ctx = document.getElementById('chartServicos').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',
    // The data for our dataset
    data: {
        labels: ['01/12', '02/12', '03/12', '04/12', '05/12', '06/12', '07/12', '08/12', '09/12', '10/12', '12/12', '12/12', '13/12', '14/12', '15/12'],
        pointHoverRadius: 10,
        lineRadius: 10,
        borderWidth: 10,
        datasets: [{
            label: 'Quantida de chamados no dia:',
            labelColor: '#fff',
            backgroundColor: '#52BE48',
            borderColor: '#fff',
            borderColor: 'white',
            pointBackgroundColor: 'white',
            pointBorderColor: '#fff',
            pointHoverBackgroundColor: '#fff',
            pointHoverBorderColor: 'rgba(148,159,177,0.8)',
            borderWidth: 5,
            data: [10, 23, 25, 12, 45, 12, 11, 9, 26, 54, 36, 32, 34, 60, 45],
            borderWidth: 5,
            lineWidth: 5,
            pointRadius: 5,
            label: 'Serviços diarios',
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
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
                    display: true,
                    legend: true,
                    lineWidth: 2,
                },
                ticks: {
                    fontColor: "white",
                    display: true,
                }
            }],
            yAxes: [{
                gridLines: {
                    display: true,
                    lineWidth: 2,
                },
                ticks: {
                    fontColor: "white",
                    display: true,
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

var ctx2 = document.getElementById('chartLucros').getContext('2d');
var chart = new Chart(ctx2, {
    // The type of chart we want to create
    type: 'line',
    // The data for our dataset
    data: {
        labels: ['01/11', '02/11', '03/11', '04/11', '05/11', '06/11', '07/11', '08/11', '09/11', '10/11', '11/11', '12/11', '13/11', '14/11', '15/11' ],
        pointHoverRadius: 10,
        lineRadius: 10,
        borderWidth: 10,
        datasets: [{
            label: 'Lucro mensal do dia:',
            labelColor: '#fff',
            backgroundColor: '#52BE48',
            borderColor: '#fff',
            borderColor: 'white',
            pointBackgroundColor: 'white',
            pointBorderColor: '#fff',
            pointHoverBackgroundColor: '#fff',
            pointHoverBorderColor: 'rgba(148,159,177,0.8)',
            borderWidth: 5,
            data: [99, 123, 156, 110, 340, 123, 200, 654, 560, 450, 888, 500, 694, 880, 760],
            borderWidth: 5,
            lineWidth: 5,
            pointRadius: 5,
            label: 'Lucro mensal',
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
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
                    display: true,
                    legend: true,
                    lineWidth: 2,
                },
                ticks: {
                    fontColor: "white",
                    display: true,
                }
            }],
            yAxes: [{
                gridLines: {
                    display: true,
                    lineWidth: 2,
                },
                ticks: {
                    fontColor: "white",
                    display: true,
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