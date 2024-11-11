<script type="text/javascript">
    

    google.charts.load('current', {'packages':['corechart']});
    
    google.charts.setOnLoadCallback(drawChart);
    

    
    function drawChart() {
      // Criação da tabela de dados para o gráfico

      const metodo_um = document.getElementById("metodo_um").value;
      const metodo_dois = document.getElementById("metodo_dois").value;
      
      const info_um = parseInt(document.getElementById("info1").value);
      const info_dois = parseInt(document.getElementById("info2").value);

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Sexo');
      data.addColumn('number', 'Porcentagem');
      data.addRows([
        ['Masculino', info_um],
        ['Feminino', info_dois],
      ]);
      
      // Opções do gráfico
      var options = {
        'title': 'Porcentagem de sexo por alunos',
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