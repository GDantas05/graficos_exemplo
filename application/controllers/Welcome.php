<?php
header("Access-Control-Allow-Origin: *");
defined('BASEPATH') OR exit('No direct script access allowed');
include($_SERVER['DOCUMENT_ROOT']."/graficos/application/controllers/pChart/class/pData.class.php");
include($_SERVER['DOCUMENT_ROOT']."/graficos/application/controllers/pChart/class/pDraw.class.php");
include($_SERVER['DOCUMENT_ROOT']."/graficos/application/controllers/pChart/class/pImage.class.php");

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function geraGrafico()
	{
		//print_r(dirname(__FILE__));exit;
		$data = new pData();

		$data->addPoints(array(3,6,8,4), "Bernardo");
		$data->addPoints(array(5,7,3,9), "Carlos");
		$data->addPoints(array(8,7,8,10), "Diego");

		$data->addPoints(array("1 Bim","2 Bim","3 Bim","4 Bim"), "Bimestre");

		$data->setAbscissa("Bimestre");
		$data->setAxisName(0, "Notas");

		$imagem = new pImage(1280, 720, $data);

		$imagem->setFontProperties(array("FontName" => dirname(__FILE__)."/pChart/fonts/verdana.ttf", "FontSize" => 9));	
		$imagem->setGraphArea(60, 40, 600, 300);
		$imagem->drawScale();
		$imagem->drawLineChart();

		$imagem->drawPlotChart(array("DisplayValues" => true, "PlotBorder" => true));

		$imagem->drawLegend(580, 850, array("Mode" => LEGEND_VERTICAL));
		$imagem->render("grafico.png");

		//GRAFICO2
		$data = new pData();

		$data->addPoints(array(3,6,8), "Gabriel");
		$data->addPoints(array(5,7,3), "Maria Eduarda");
		$data->addPoints(array(8,7,8), "Antônio Carlos");

		$data->addPoints(array("1 Bim","2 Bim","3 Bim","4 Bim"), "Bimestre");

		$data->setAbscissa("Bimestre");
		//$data->setAxisName(0, "Notas");

		$imagem = new pImage(1280, 720, $data);

		$imagem->setFontProperties(array("FontName" => dirname(__FILE__)."/pChart/fonts/verdana.ttf", "FontSize" => 9));	
		$imagem->setGraphArea(60, 40, 600, 300);
		$imagem->drawScale();
		$imagem->drawLineChart();

		$imagem->drawPlotChart(array("DisplayValues" => true, "PlotBorder" => true));

		$imagem->drawLegend(580, 850, array("Mode" => LEGEND_VERTICAL));
		$imagem->render("grafico2.png");

		echo 'grafico.png'.'/'.'grafico2.png';
	}
}
