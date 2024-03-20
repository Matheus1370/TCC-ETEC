<?php
    $res2 = $mysqli->query("SELECT * FROM MediaSemana") or die($mysqli->error);
    
?>
<div id="curve_chart"></div>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
          ['Dias', 'Media'], 
          <?php
                $res2 = $mysqli->query("SELECT * FROM MediaSemana") or die($mysqli->error);
        
                while ($dados = $res2->fetch_assoc()) {
                    $dia = $dados['nome'];
                    $media = $dados['frequencia'];
               
         
                 ?>
         
                ["<?php echo $dia ?>", <?php echo $media ?>],
            
        
            <?php } ?>
        ]);

        var options = {
            backgroundColor: 'transparent',
            legend: 'none',
          title: '',
            colors:['#FF1300'],
          curveType: 'none',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
</script>