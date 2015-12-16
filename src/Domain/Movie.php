<?php

namespace MyMovies\Domain;

class Movie 
{
    /**
     * Article id.
     *
     * @var integer
     */
    private $id;

    /**
     * Article title.
     *
     * @var string
     */
    private $title;

    /**
     * Article content.
     *
     * @var string
     */
    private $descriptionS;
    
    private $descriptionL;
    
    private $director;
    
    private $year;
    
    private $image;
    
    private $category;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getDescriptionS() {
        return $this->descriptionS;
    }

    public function setDescriptionS($descriptionS) {
        $this->descriptionS = $descriptionS;
    }
    public function getDescriptionL() {
        return $this->descriptionL;
    }

    public function setDescriptionL($descriptionL) {
        $this->descriptionL = $descriptionL;
    }
    
    public function getDirector() {
        return $this->director;
    }

    public function setDirector($director) {
        $this->director = $director;
    }
    
    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }
    
    public function getYear() {
        return $this->year;
    }

    public function setYear($year) {
        $this->year = $year;
    }
    
    public function getCategorie() {
        return $this->categorie;
    }

    public function setCategorie(Category $category) {
        $this->category = $category;
    }
}