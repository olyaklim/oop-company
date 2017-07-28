<?php 

class Company
{
	const NAME_COMPANY = "OOP Company";
	const MIN = 1;
	const MAX = 10;
	const COUNT_MARKING = 10;
	private $marking = '';

	//Маркировка изделий
	private function create_marking()
	{
		$this->marking = '';

		$count_letter = rand(self::MIN, self::MAX);
		$array 		= range('a','c'); 
		$count_mas 	= count($array); 
		$this->marking .= self::NAME_COMPANY + " №";

		for($i = 0; $i < self::COUNT_MARKING; $i++) {
			$random_number = rand(self::MIN, self::MAX);
			$this->marking .= $random_number;
		} 

		return;
	}

	public function get_marking()
	{
		$this->create_marking();
		return $this->marking;
	}

}

class ProductionDepartment extends Company 
{

	public function get_report($product) 
	{
		echo "марка: " . $product->get_marking() . "<br>
		отдел: " . get_class($product) . "<br>
		номера: " . $product->number_model . "<br>
		цвет: " . $product->color . "<br>
		количество колес: " . $product->wheel . "<hr>";
	}

	// покрасить
	public function paint() 
	{
		return 'red';
	}

	// вставить колеса
	public function add_wheel() 
	{
		return 2;
	}

}

class AccountantsDepartment extends Company 
{
	public $about_company = "Компания: " . self::NAME_COMPANY . "<br>
		ИНН: 523655656 <br>
		ЄДРПОУ: 10025556 <br>
		дата открытия: 07.08.2011 г <hr>";

	public function about_company() 
	{
		echo $this->about_company;
	}

}

class Document extends AccountantsDepartment 
{
	public $number_document;

	public function __construct($number_document) {
		$this->number_document = $number_document;
	}
	public function print_document() 
	{
		echo "Дркумент № " . $number_document . " от " . date("F j, Y, g:i a") . "<br>" . $this->about_company;
	}
} 

class ManagersDepartment extends Company 
{

	public function print_contact() 
	{
		echo "Компания: " . self::NAME_COMPANY . "<br>
		теелфон: company@ukr.net <br>
		факс: 044-556-22-44 <br>
		адрес: Украина, Киев, ул. Крещатик 10 <hr>";
	}

}

// делаем мотоцикл
class MotorcycleDepartment extends ProductionDepartment 
{
	public $name = "Honda";

	public $color;
	public $number_model;
	public $wheel;

	public function __construct($number_model) {
		$this->name = $name;
		$this->number_model = $number_model;
		$this->color = $this->paint();
		$this->wheel = $this->add_wheel();
		echo "<h3>Выпуск мотоцикла компании " . self::NAME_COMPANY . " </h3>";   
	}

	public function get_motorcycle() 
	{
		$this->get_report($this);
	}

}

// делаем велосипед
class BikeDepartment extends ProductionDepartment 
{
	public $name = "Honda";
	public $color;
	public $wheel;

	public function __construct() {
		$this->name = $name;
		$this->color = $this->paint();
		$this->wheel = $this->add_wheel();
		echo "<h3>Выпуск велосипеда компании " . self::NAME_COMPANY . " </h3>";   
	}

	public function get_bike() 
	{
		$this->get_report($this);
	}

}

// делаем автомобиль
class CarDepartment extends ProductionDepartment 
{
	public $name = "Mazda";
	public $color;
	public $number_model;
	public $wheel;

		// вставить 4  колеса
	public function add_wheel() 
	{
		$this->wheel = 4;
	}

	public function __construct($number_model) {
		$this->name = $name;
		$this->number_model = $number_model;
		$this->color = $this->paint();
		$this->add_wheel();
		echo "<h3>Выпуск авто компании " . self::NAME_COMPANY . " </h3>";   
	}

	public function get_сar() 
	{
		$this->get_report($this);
	}


}

echo "<hr>";

//echo (new CarDepartment("AA-35777"))->getCar();
//echo (new AccountantsDepartment())->about_company();

echo (new ManagersDepartment())->print_contact();
echo (new Document("105"))->print_document();

$my_car = new CarDepartment("AA-35777");
$my_car->get_сar();

$my_bike = new BikeDepartment("AA-35777");
$my_bike->get_bike();

$my_motorcycle = new MotorcycleDepartment("AК-777");
$my_motorcycle->get_motorcycle();

?>


<!DOCTYPE HTML>
<html lang="ru">
<html> 
<head>
	<meta charset="utf-8">
	<title>ООП</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Bootstrap -->
	<link href="stylesheet/bootstrap.min.css" rel="stylesheet">
	<link href="stylesheet/my.css" rel="stylesheet">
	
</head>
<html>
<body>

</body>
</html>