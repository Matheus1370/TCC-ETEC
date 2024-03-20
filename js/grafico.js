google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

    var data = google.visualization.arrayToDataTable([
    ['', '',{ role: 'style' },'',{ role: 'style' }],
    ['Segunda-Feira', 510, 'color: RGB(175,19,19); opacity: 1;', 600, 'color: RGB(216, 77, 77); opacity: 1;'],
    ['Terça-Feira', 370, 'color: RGB(175,19,19); opacity: 1;', 600, 'color: RGB(216, 77, 77); opacity: 1;'],
    ['Quarta-Feira', 260, 'color: RGB(175,19,19); opacity: 1;', 600, 'color: RGB(216, 77, 77); opacity: 1;'],
    ['Quinta-Feira', 200, 'color: RGB(175,19,19); opacity: 1;', 600, 'color: RGB(216, 77, 77); opacity: 1;'],
    ['Sexta-Feira', 350, 'color: RGB(175,19,19); opacity: 1;', 600, 'color: RGB(216, 77, 77); opacity: 1;']
    ]);

    var options = {
        backgroundColor: 'transparent',
        chartArea: {width: '100%'},
        chartArea: {height: '50%'},
        textStyle: {
        color: 'red'
        },
        
        hAxis: {
        textStyle: {
        color: 'white'
        },
        },
        vAxis: {
            title: 'City'  && {textStyle:{
            color: 'red'
        }},
            textStyle:{
            color: 'white',
            backgroundColor: 'red'
        },
        titletextStyle:{ color: 'red'},
        subtitle: {textStyle:{ color: 'red'}}
        },
        legend:'none',
        
        
    };

    var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}