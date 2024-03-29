<?php

namespace lostBook\lostBookUserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use lostBook\lostBookBundle\Entity\Annonce;
use \Doctrine\Common\Collections\ArrayCollection;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="lostBook\lostBookUserBundle\Repository\UtilisateurRepository")
 */
class Utilisateur extends BaseUser
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @var string
     * @ORM\Column(name="photo",type="string",nullable=TRUE)
     */
    protected $photo;
            
    public function __construct() 
    {
        parent::__construct();
        $this->annonces = new ArrayCollection();
        $this->espaces = new ArrayCollection();
        $this->commentairesAnnonce = new ArrayCollection();
        $this->commentairesEspace = new ArrayCollection();
    }

    /**
     * @ORM\OneToMany(targetEntity="lostBook\lostBookBundle\Entity\Annonce", mappedBy="utilisateur")  
     */
    protected $annonces;
    
    /**
     * @ORM\OneToMany(targetEntity="lostBook\lostBookBundle\Entity\Espace", mappedBy="administrateur")
     */
    private $espaces;
    
    /**
     * @ORM\OneToMany(targetEntity="lostBook\lostBookBundle\Entity\CommentaireAnnonce", mappedBy="utilisateur")
     */
    private $commentairesAnnonce;
    
     /**
     * @ORM\OneToMany(targetEntity="lostBook\lostBookBundle\Entity\CommentaireEspace", mappedBy="utilisateur")
     */
    private $commentairesEspace;
    
    /**
     * @ORM\OneToMany(targetEntity="lostBook\lostBookUserBundle\Entity\MediaUtilisateur", mappedBy="utilisateur")
     */
    private $media;
    
    
    
    
    /**
     * @var string
     * @ORM\Column(name="telephone1",type="string",nullable=TRUE)
     */
    protected $telephone1;
    
    /**
     *
     * @var string
     * @ORM\Column(name="telephone2",type="string",nullable=TRUE)
     */
    protected $telephone2;  

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set isAdmin
     *
     * @param boolean $isAdmin
     * @return Utilisateur
     */
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }

    /**
     * Get isAdmin
     *
     * @return boolean 
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Utilisateur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Utilisateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set dateNaissance
     *
     * @param string $dateNaissance
     * @return Utilisateur
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return string 
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Utilisateur
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set region
     *
     * @param string $region
     * @return Utilisateur
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return string 
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return Utilisateur
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Utilisateur
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Add annonces
     *
     * @param \lostBook\lostBookBundle\Entity\Annonce $annonces
     * @return Utilisateur
     */
    public function addAnnonce(\lostBook\lostBookBundle\Entity\Annonce $annonces)
    {
        $this->annonces[] = $annonces;

        return $this;
    }

    /**
     * Remove annonces
     *
     * @param \lostBook\lostBookBundle\Entity\Annonce $annonces
     */
    public function removeAnnonce(\lostBook\lostBookBundle\Entity\Annonce $annonces)
    {
        $this->annonces->removeElement($annonces);
    }

    /**
     * Get annonces
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAnnonces()
    {
        return $this->annonces;
    }

    /**
     * Add espaces
     *
     * @param \lostBook\lostBookBundle\Entity\Espace $espaces
     * @return Utilisateur
     */
    public function addEspace(\lostBook\lostBookBundle\Entity\Espace $espaces)
    {
        $this->espaces[] = $espaces;

        return $this;
    }

    /**
     * Remove espaces
     *
     * @param \lostBook\lostBookBundle\Entity\Espace $espaces
     */
    public function removeEspace(\lostBook\lostBookBundle\Entity\Espace $espaces)
    {
        $this->espaces->removeElement($espaces);
    }

    /**
     * Get espaces
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEspaces()
    {
        return $this->espaces;
    }
    
    function getCommentairesAnnonce() {
        return $this->commentairesAnnonce;
    }

    function setCommentairesAnnonce($commentairesAnnonce) {
        $this->commentairesAnnonce = $commentairesAnnonce;
    }



    /**
     * Add commentairesAnnonce
     *
     * @param \lostBook\lostBookBundle\Entity\CommentaireAnnonce $commentairesAnnonce
     * @return Utilisateur
     */
    public function addCommentairesAnnonce(\lostBook\lostBookBundle\Entity\CommentaireAnnonce $commentairesAnnonce)
    {
        $this->commentairesAnnonce[] = $commentairesAnnonce;

        return $this;
    }

    /**
     * Remove commentairesAnnonce
     *
     * @param \lostBook\lostBookBundle\Entity\CommentaireAnnonce $commentairesAnnonce
     */
    public function removeCommentairesAnnonce(\lostBook\lostBookBundle\Entity\CommentaireAnnonce $commentairesAnnonce)
    {
        $this->commentairesAnnonce->removeElement($commentairesAnnonce);
    }

    /**
     * Add commentairesEspace
     *
     * @param \lostBook\lostBookBundle\Entity\CommentaireEspace $commentairesEspace
     * @return Utilisateur
     */
    public function addCommentairesEspace(\lostBook\lostBookBundle\Entity\CommentaireEspace $commentairesEspace)
    {
        $this->commentairesEspace[] = $commentairesEspace;

        return $this;
    }

    /**
     * Remove commentairesEspace
     *
     * @param \lostBook\lostBookBundle\Entity\CommentaireEspace $commentairesEspace
     */
    public function removeCommentairesEspace(\lostBook\lostBookBundle\Entity\CommentaireEspace $commentairesEspace)
    {
        $this->commentairesEspace->removeElement($commentairesEspace);
    }

    /**
     * Get commentairesEspace
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommentairesEspace()
    {
        return $this->commentairesEspace;
    }

    /**
     * Set telephone1
     *
     * @param string $telephone1
     * @return Utilisateur
     */
    public function setTelephone1($telephone1)
    {
        $this->telephone1 = $telephone1;

        return $this;
    }

    /**
     * Get telephone1
     *
     * @return string 
     */
    public function getTelephone1()
    {
        return $this->telephone1;
    }

    /**
     * Set telephone2
     *
     * @param string $telephone2
     * @return Utilisateur
     */
    public function setTelephone2($telephone2)
    {
        $this->telephone2 = $telephone2;

        return $this;
    }

    /**
     * Get telephone2
     *
     * @return string 
     */
    public function getTelephone2()
    {
        return $this->telephone2;
    }
    
    function getPhoto() {
        return $this->photo;
    }

    function setPhoto($photo) {
        $this->photo = $photo;
    }

    /**
     * Add media
     *
     * @param \lostBook\lostBookUserBundle\Entity\MediaUtilisateur $media
     * @return Utilisateur
     */
    public function addMedia(\lostBook\lostBookUserBundle\Entity\MediaUtilisateur $media)
    {
        $this->media[] = $media;

        return $this;
    }

    /**
     * Remove media
     *
     * @param \lostBook\lostBookUserBundle\Entity\MediaUtilisateur $media
     */
    public function removeMedia(\lostBook\lostBookUserBundle\Entity\MediaUtilisateur $media)
    {
        $this->media->removeElement($media);
    }

    /**
     * Get media
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMedia()
    {
        return $this->media;
    }
}
