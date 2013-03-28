<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class api extends CI_Controller {
	public function __construct()
   {
        parent::__construct();
        $this->load->model('recipemodel');
   }

	public function index()
	{
		echo "Please use correct function.";
	}

	public function recipes() 
	{
		$output = new stdClass();
		$output->breakfast = array();
		$output->lunch = array();
		$output->dinner = array();
		$output->dessert = array();

		$recipes = $this->recipemodel->get_all();
		foreach ($recipes as $value) {
			// TODO: I Should not be storing lists in a String format. 
			// Should probably make a prep and steps table.
			$value->id = json_decode($value->id);
			$value->duration = json_decode($value->duration);
			$value->prep = json_decode($value->prep);
			$value->steps = json_decode($value->steps);

			switch ($value->mealtype) {
				case 'Breakfast':
					array_push($output->breakfast, $value);
					break;
				case 'Lunch':
					array_push($output->lunch, $value);
					break;
				case 'Dinner':
					array_push($output->dinner, $value);
					break;
				case 'Dessert':
					array_push($output->dessert, $value);
					break;
				default:
					$output = null;
					break;

			if($output == null)
				break;
			}
		}

		if($output != null) 
		{	
			$this->output->set_status_header('200');
			$this->output->set_output(json_encode($output));
		}
		else
		{
			$this->output->set_status_header('500');
			echo "Error building JSON.";
		}
	}

	public function recipe($id) 
	{
		
	}

	public function add()
	{
		$isOK = $this->recipemodel->insert_entry();

		if($isOK)
		{		
			$this->output->set_status_header('200');
			$this->output->set_output(json_encode($output));
		}
		else
		{
			$this->output->set_status_header('500');
			echo "Error adding item with name " . $this->input->post('name');
		}
	}

	public function remove()
	{
		
	}
}