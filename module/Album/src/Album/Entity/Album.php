<?php

namespace Album\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Album
 *
 * @ORM\Table(name="album")
 * @ORM\Entity
 */
class Album
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="artist", type="string", length=100, nullable=false)
     */
    private $artist;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
     */
    private $title;
    
    /**
     * Get Id method
     * @return number
     */
    public function getId(){
    	return $this->id;
    }
    
    /**
     * Setter method for Id
     * @param int $newId
     */
    public function setId($newId){
    	$this->id = $newId;
    }
	/**
	 * Get album method
	 * @return string
	 */
	public function getArtist(){
		return $this->artist;
	}
	
	/**
	 * Get title method
	 * @return string
	 */
	public function getTitle(){
		return $this->title;
	}
	
	/**
	 * Set artist method
	 * @param unknown $newArtist
	 */
	public function setArtist($newArtist){
		$this->artist = $newArtist;
	}
	
	/**
	 * Set title method
	 * @param unknown $newTitle
	 */
	public function setTitle($newTitle){
		$this->title = $newTitle;
	}
}