<?php

namespace MyMovie\DAO;

use MyMovie\Domain\Category;

class CategoryDAO extends DAO 
{

    private $categoryDAO;

    public function setCategoryDAO(CategoryDAO $categoryDAO) {
        $this->categoryDAO = $categoryDAO;
    }

    public function findAllBycategory($categoryId) {

        $category = $this->categoryDAO->find($categoryId);

        $sql = "select mov_id, mov_description_short from movie where cat_id=? order by mov_id";
        $result = $this->getDb()->fetchAll($sql, array($categoryId));

        $comments = array();
        foreach ($result as $row) {
            $movId = $row['mov_id'];
            $movie = $this->buildDomainObject($row);

            $movie->setcategory($category);
            $movies[$comId] = $movie;
        }
        return $movies;
    }

    public function save(Movie $movie) {

        $commentData = array(

            'mov_id' => $movie->getcategory()->getId(),

            'mov_description_short' => $movie->getMovie()

            );


        if ($movie->getId()) {

            $this->getDb()->update('movie', $movieData, array('mov_id' => $movie->getId()));

        } else {


            $this->getDb()->insert('mov', $movieData);


            $id = $this->getDb()->lastInsertId();

            $movie->setId($id);

        }

    }

   
    protected function buildDomainObject($row) {
        $movie = new Movie();
        $movie->setId($row['mov_id']);
        $movie->setContent($row['mov_description_short']);

        if (array_key_exists('cat_id', $row)) {
            // Find and set the associated category
            $categoryId = $row['cat_id'];
            $category = $this->categoryDAO->find($categoryId);
            $movie->setcategory($category);
        }
        
        return $movie;
    }
}