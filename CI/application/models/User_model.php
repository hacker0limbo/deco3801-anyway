<?php
 class User_model extends CI_Model{

    //sign up new user into database
    public function signup($username, $password) {
        $data = array(
            'username' => $username,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'email' => $this->input->post('email')
        );
        return $this->db->insert('user', $data);
    }

    //check if the username already been taken or not
    public function valid_username($username) {
        $query = $this->db->get_where('user', array('username' => $username));
        if(empty($query->row_array())){
            return true;
        } else {
            return false;
        }
    }

    public function check_username($username) {
        $this->db->where('username', $username);
        $result = $this->db->get('user');
        if($result->num_rows() == 1){
            return true;
        } else {
            return false;
        }
    }

    public function check_password($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $result = $this->db->get('user');

        if($result->num_rows() == 1){
            return true;
        } else {
            return false;
        }
    }

    //retrieve login user information 
    public function user_info($username) {
        $this->db->select('*')
        ->from('user')
        ->where("username='$username'");
        $user_info = $this->db->get()->row_array();
        return $user_info;
    }

    //Get user password hash
    public function get_hash($username) {
        $this->db->select('password')
                ->from('user')
                ->where("username='$username'");
        $result = $this->db->get()->row_array();
        return $result;
    }
}
?>

