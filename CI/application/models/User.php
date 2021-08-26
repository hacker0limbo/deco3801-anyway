<?php
 class User extends CI_Model{

    public function signup($username, $password) {
        $data = array(
            'username' => $username,
            'password' => $password,
            'email' => $this->input->post('email')
        );
        return $this->db->insert('user', $data);
    }

    
}
?>

