

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<div id="infos">
  <input type="number" value="<?= $info_dois ?>" id="info_dois">
  <input type="number" value="<?= $info_um ?>" id="info_um" >
</div>


<style>
  #infos {
    display: none;
  }

</style>

<script type="text/javascript">
    

    google.charts.load('current', {'packages':['corechart']});
    
    google.charts.setOnLoadCallback(drawChart);
    

    
    function drawChart() {
      // Criação da tabela de dados para o gráfico

      
      const info_um = parseInt(document.getElementById("info_um").value);
      const info_dois = parseInt(document.getElementById("info_dois").value);

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Sexo');
      data.addColumn('number', 'Porcentagem');
      data.addRows([
        ['Masculino', info_um],
        ['Feminino', info_dois],
      ]);
      
      // Opções do gráfico
      var options = {
        'title': 'Porcentagem por gênero:',
        'width': 500,
        'height': 300
      };
      
      // Criação e desenho do gráfico
      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
    </script>
    
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>