<?php

require_once(__DIR__ . '/connect.php');

class API
{

    /**
     * Read table
     * 
     * @return void
     */
    public function select($id = false)
    {

        $db     = new Connect;
        $users  = array();

        if($id === false){
            $query  = 'SELECT * FROM users ORDER BY id';
        }else{
            $query  = 'SELECT * FROM users WHERE id = '.$id. ' ORDER BY id';
        }

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


// print_r($_GET);

/*******************/
//testing
if(isset($_GET['url'])) {

    $urlSplit = explode('/', $_GET['url']);

    if( $urlSplit[0] == 'users') {

        $users = new API;
        $id    = false;

        if(isset($urlSplit[1]) && is_numeric($urlSplit[1]) ){
            $id = $urlSplit[1];
        }

        echo $users->select($id);

    }

}else{
    echo 'failed';
}
/*******************/