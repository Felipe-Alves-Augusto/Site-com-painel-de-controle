var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira','Sábado'],
        datasets: [{
            label: 'Usuários Online',
            data: [12, 19, 9, 10, 12, 7,20],
            backgroundColor: [
                '#311b92',
                '#ffc107',
                '#d50000',
                '#00e676',
                '#01579b',
                '#e65100 ',
                '#f50057'
            ],
            borderColor: [
                '#311b92',
                '#ffc107',
                '#d50000',
                '#00e676',
                '#01579b',
                '#e65100 ',
                '#f50057'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});