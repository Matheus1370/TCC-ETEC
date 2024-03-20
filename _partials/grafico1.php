<?php 
    $res = $mysqli->query("SELECT * FROM PESSOA") or die($mysqli->error);
    

    $a = 0;
    $b = 0;
    $c = 0;
    $d = 0;
    $e = 0;
    $f = 0;

    while($linha = $res->fetch_assoc()){
        if($linha['Cod_Funcao'] == 1){
            $a++;
        }elseif($linha['Cod_Funcao'] == 2){
            $b++;
        }elseif($linha['Cod_Funcao'] == 3){
            $c++;
        }elseif($linha['Cod_Funcao'] == 4){
            $d++;
        }elseif($linha['Cod_Funcao'] == 5){
            $e++;
        }elseif($linha['Cod_Funcao'] == 6){
            $f++;
        }else{}
    }
?>
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
        
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Master',     <?php echo $a; ?>],
            ['Coordenador',      <?php echo $b; ?>],
            ['Secretário',  <?php echo $c; ?>],
            ['Professor', <?php echo $d; ?>],
            ['Funcionário',    <?php echo $e; ?>],
            ['Aluno',    <?php echo $f; ?>]
        ]);

        var options = {
            title: '',
            colors:['#ff0100','#ec0100','#d80100','#c50000','#b20000','#fa1c0b'],
            pieHole: 0.3,
            backgroundColor: 'transparent'
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
        }
    </script>
    <div id="donutchart"></div>