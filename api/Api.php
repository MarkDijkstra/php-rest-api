<?php

require_once(__DIR__ . '/connect.php');

class API
{
    private $db;

    public function __construct()
    {
        $this->db = new Connect;
    }

    /**
     * Read table
     * 
     * @return void
     */
    public function select()
    {

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
        
    }

}