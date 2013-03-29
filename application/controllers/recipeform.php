<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RecipeForm extends CI_Controller {

	public function index()
	{
		$this->load->view('add_recipe');
	}
}