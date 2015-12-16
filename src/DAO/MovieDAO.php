<?php

namespace MyMovies\DAO;

use MyMovies\Domain\movie;

class MovieDAO extends DAO
{
    
    public function findAll() {
        $sql = "select * from movie order by mov_id desc";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $movies = array();
        foreach ($result as $row) {
            $movieId = $row['mov_id'];
            $movies[$movieId] = $this->buildDomainObject($row);
        }
        return $movies;
    }

    
    protected function buildDomainObject($row) {
        $movie = new Movie();
        $movie->setId($row['mov_id']);
        $movie->setTitle($row['mov_title']);
        $movie->setDescriptionS($row['mov_description_short']);
        return $movie;
    }
    
   
    public function find($id) {
        $sql = "select * from movie where mov_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No movie matching id " . $id);
    }
    
}