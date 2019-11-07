<?php

class Database
{

    public $link;
    public $querry;

    public function querry_to_database($querry)
    {
        $link = mysqli_connect("127.0.0.1", "c90814qu_efko", "samson#2017", "c90814qu_efko");
        $sql = mysqli_query($link, $querry);
        mysqli_close($link);
        return $sql;
    }
}
