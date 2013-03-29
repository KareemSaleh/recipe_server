<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class recipemodel extends CI_Model {

    function get_all()
    {
        $query = $this->db->get('recipes');
        return $query->result();
    }

    function insert_entry()
    {
        $this->name = $this->input->post('name', TRUE);
        $this->prep = $this->input->post('prep', TRUE);
        $this->duration = $this->input->post('duration', TRUE);
        $this->steps = $this->input->post('steps', TRUE);
        $this->mealtype = $this->input->post('mealtype', TRUE);

        return $this->db->insert('recipes', $this);
    }

    function update_entry()
    {
        $this->title   = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }
}