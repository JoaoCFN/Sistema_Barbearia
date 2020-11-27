var ctx = document.getElementById('chartServicos').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',
    //responsive: 'true',
    // The data for our dataset

    data: {
        labels: ['08h', '09h', '10h', '11h', '12h', '13h', '14h', '15h', '16h', '17h', '18h', ],
        pointHoverRadius: 10,
        lineRadius: 10,
        borderWidth: 10,
        datasets: [{
            label: 'Quantida de chamados no dia',
            labelColor: '#fff',
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
        labels: ['01/11', '02/11', '03/11', '04/11', '05/11', '06/11', '07/11', '08/11', '09/11', '10/11', '11/11', '12/11', '13/11', '14/11', '15/11', '16/11', ],
        pointHoverRadius: 10,
        lineRadius: 10,
        borderWidth: 10,
        datasets: [{
            label: 'Quantida de chamados no dia',
            labelColor: '#fff',
            backgroundColor: '#52BE48',
            borderColor: '#fff',
            borderColor: 'white',
            pointBackgroundColor: 'white',
            pointBorderColor: '#fff',
            pointHoverBackgroundColor: '#fff',
            pointHoverBorderColor: 'rgba(148,159,177,0.8)',
            borderWidth: 5,
            data: [65, 59, 80, 81, 56, 55, 40, 500, 200, 99, 36, 110, 340, 400, 200, 2000, 560, 450, 99, 100, 125, 75, ],
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