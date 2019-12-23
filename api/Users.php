<?php

require_once(__DIR__ . '/connect.php');

class Users
{

    private $db;

    public function __construct()
    {
         $this->db = new Connect;
    }

    public function select($id = false)
    {

        $users = [];

        if($id === false){
            $query  = 'SELECT * FROM users ORDER BY id';
        }else{
            $query  = 'SELECT * FROM users WHERE id = '.$id. ' ORDER BY id';
        }

        $result = $this->db->prepare($query);

        if($result->execute()){
        
            // output everything for now
            // while($output = $result->fetch(PDO::FETCH_ASSOC))
            // {

            //     $users[$output['id']] = array(
            //         'id'       => $output['id'],
            //         'username' => $output['username'],
            //         'email'    => $output['email']
            //     );

            // }
            
            $output = $result->fetch(PDO::FETCH_ASSOC);
            return json_encode($output);

        }

        return [];

    }

    /**
     * Update table
     *
     * @return void
     */
    public function update()
    {

    }

    /**
     * Delete table
     *
     * @return void
     */
    public function delete()
    {

        $db     = new Connect;     
        $query  = 'TRUNCATE users';
        $result = $db->prepare($query);

        $result->execute();
        
    }

}