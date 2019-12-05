
function creerStatistique(label,data,$intervalle)
{
    var titre;
     if(intervalle=="jour")  {titre='Nombre de visiteur par jour'};
    if(intervalle=="mois") titre='Nombre de visiteur par mois';
    if(intervalle=="annee") titre='Nombre de visiteur par annee';


    var ctx = document.getElementById('myChart').getContext('2d');
 var myBarChart = new Chart(ctx, {
    type: 'bar',
    responsive: true,
    data: {
      labels:[],
        datasets: [{
            label: 'Nombre de visiteur',
            backgroundColor: 'rgb(127, 183, 171)',
            borderColor: 'rgb(127, 183, 171)',
           data:[],
        }]
    },
    options: {
        title: {
            display: true,
            text: titre
        },
                scales: {
                     xAxes: [{
                    //barPercentage: 1,
                   // categoryPercentage: 1,
                    maxBarThickness: 100,
                    ticks: {
                        source: "labels"
                    }
                }],
            yAxes: [{

                ticks: {
                    beginAtZero: true,
                    stepSize: 1,
                    maxTicksLimit: 10,
                    
                }
            }]
        }
              }
});

    for(var i=0;i<data.length;i++)
    {
    myBarChart.data.labels.push(label[i]);
    myBarChart.data.datasets.forEach((dataset) => {
    dataset.data.push(data[i]);
    });
    myBarChart.update();
    }


}

function ajouterDonnees(chart, label, data)
{
    for(var i=0;i<data.length;i++)
    {
    chart.data.labels.push(label);
    chart.data.datasets.forEach((dataset) => {
    dataset.data.push(data);
    });
    chart.update();
    }
}

