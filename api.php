<?php

require_once(__DIR__ . '/connect.php');

class API
{

    /**
     * Read table
     * 
     * @return void
     */
    public function select()
    {

        $db     = new Connect;
        $users  = array();
        $query  = 'SELECT * FROM users ORDER BY id';
        $result = $db->prepare($query);

        if($result->execute()){
        
            while($output = $result->fetch(PDO::FETCH_ASSOC))
            {

                $users[$output['id']] = array(
                    'id'       => $output['id'],
                    'username' => $output['username'],
                    'email'    => $output['email']
                );

            }


            return json_encode($users);

        }

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


$users = new API;

//demo ouput
echo $users->select();
//echo $users->delete();