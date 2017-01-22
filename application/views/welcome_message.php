<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<!--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart(a) {
        var data = google.visualization.arrayToDataTable([
          ['Ano', 'Parâmetro', 'Média'],
          ['2002',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          [ a,  1030,      540]
        ]);

        var options = {
          title: 'Média de Passageiros por Linha',
          curveType: 'function',
          legend: { position: 'right' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(grafico2);

      function grafico2() {
        var data = google.visualization.arrayToDataTable([
          ['Ano', 'Parâmetro', 'Média'],
          ['2010',  500,       600],
          ['2020',  1000,      700],
          ['2030',  900,       1400],
          ['2040',  1030,      700]
        ]);

        var options = {
          title: 'Média de Passageiros por Linha2',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('grafico2'));

        chart.draw(data, options);
      }
    </script>-->

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
                $("#cadastrar").click(function(){
                        $.ajax({
                                url: '<?= base_url(); ?>'+'index.php/Welcome/geraGrafico',
                                type: 'POST',
                                data: $("#formulario_cadastro").serialize(),
                                success: function(data){
                                	graficos = data.split("/");
                                	grafico1 = graficos[0];
                                	grafico2 = graficos[1];
                                	$("#grafico1").attr({
                                		src: grafico1
                                	});
                                	$("#grafico2").attr({
                                		src: grafico2
                                	});
                                }
                            });
                        //return false;
                    });
            });
	</script>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="mensagem"></div>
    <form id="formulario_cadastro">
 
    <?php echo form_label('Nome', 'nome');?>
    <?php echo form_input(array(
                "name" => "nome",
                "id" => "nome",
                "type" => "text",
                "placeholder" => "Nome"
                ));?>
 
                <?php echo form_label('Sobrenome', 'nome');?>
                <?php echo form_input(array(
                "name" => "sobrenome",
                "id" => "sobrenome",
                "type" => "text",
                "placeholder" => "Sobrenome"
                ));?>
 
                <?php echo form_label('Usuario', 'usuario');?>
                <?php echo form_input(array(
                "name" => "usuario",
                "id" => "usuario",
                "type" => "text",
                "placeholder" => "Usuario"
                ));?>
 
                <?php echo form_label('Senha', 'senha');?>
                <?php echo form_password(array(
                "name" => "senha",
                "id" => "senha",
                "type" => "text",
                "placeholder" => "Senha"
                ));?>
 
                <?php echo form_input(array(
                "name" => "cadastrar",
                "id" => "cadastrar",
                "type" => "button"
                ), "Cadastrar");?>
 
    </form>
    <!--<div id="curve_chart" style="width: 900px; height: 500px; display: none;"></div>-->
    <div>
    	<img src="" alt="" id="grafico1">
    	<img src="" alt="" id="grafico2">
    </div>
</body>
</html>