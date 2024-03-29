<?php

namespace lostBook\lostBookBundle\Repository;

use Doctrine\ORM\EntityRepository;
use lostBook\lostBookBundle\Entity\RechercheAnnonces;

/**
 * AnnonceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AnnonceRepository extends EntityRepository
{
    public function getAllAnnonces() {
              
        $em = $this->getEntityManager();
        $query = $em->createQuery("SELECT a,m,"
                                  . " FROM lostBookBundle:Annonce a "
                                  . "JOIN a.medias");
        $annonces = $query->getResult();  
        
        return $annonces;
    }
    
    public function getAnnonceById($id)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery("SELECT a,m,u FROM lostBookBundle:Annonce a "
                                  . "JOIN a.medias m JOIN a.utilisateur u "
                                  . "WHERE a.id = :id");
        $query->setParameter('id', $id);
        
        try
        {
            return $query->getSingleResult();
        } catch (\Doctrine\ORM\NoResultException $ex) {
            
            return null;
        }
        
    }
    
    public function getResultatRecherche(RechercheAnnonces $recherche)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery("SELECT a"
                                  . " FROM lostBookBundle:Annonce a ");
        $annonces = $query->getResult();  
        
        $annoncesNature = $this->getAnnoncesForNature($annonces, $recherche->getNature());
        $annoncesVilles = $this->getAnnoncesForVille($annoncesNature, $recherche->getVille());
        $annoncesEspace = $this->getAnnoncesForEspace($annoncesVilles, $recherche->getEspace());
        $annoncesCategorie = $this->getAnnoncesForCategory($annoncesEspace, $recherche->getCategorie());
        $annoncesDateDebut = $this->getAnnoncesForDateDebut($annoncesCategorie, $recherche->getDebut());
        $annoncesDateFin = $this->getAnnoncesForDateFin($annoncesDateDebut, $recherche->getFin());
        
        return $annoncesDateFin;
        
    }
    
    
    public function getAnnoncesForCategory($annonces,$category)
    {
       if($category != null)
       {
       $resultat = array();
       
       foreach($annonces as $next)
       {
           if($next->getCategorie() == $category)
           {
               $resultat[] = $next;
           }
       }
       
       return $resultat;
       }
       else
       {
           return $annonces;
       }
    }
    
    public function getAnnoncesForNature($annonces,$nature)
    {
        if($nature != null)
        {
        $resultat = array();
        
        foreach($annonces as $next)
        {
            if($next->getPerdu() == $nature)
            {
                $resultat[] = $next;
            }
        }
        
        return $resultat;
        }
        else
        {
            return $annonces;
        }
    }
    
    public function getAnnoncesForVille($annonces,$ville)
    {
        if($ville != null)
        {
        $resultat = array();
        
        foreach($annonces as $next)
        {
            if($next->getVille() == $ville)
            {
                $resultat[] = $next;
            }
        }
        
        return $resultat;
        }
        else
        {
            return $annonces;
        }
    }
    
    public function getAnnoncesForEspace($annonces,$espace)
    {
        if($espace != null)
        {
        $resultat = array();
        
     
        foreach($annonces as $next)
        {
            
            if($next->getEspace() == $espace)
            {
               
                $resultat[] = $next;
            }
        }
        
        return $resultat;
        }
        else
        {
            return $annonces;
        }
    }
    
    public function getAnnoncesForDateDebut($annonces,$date)
    {
        if($date != null)
        {
        $resultat = array();
        
        foreach($annonces as $next)
        {   
            
            $debut = \DateTime::createFromFormat('d/m/Y',$date);
            
            $debutFormated = \DateTime::createFromFormat('Y-m-d H:i:s',$debut->format('Y-m-d H:i:s'));
            
            if($next->getDateCreation() >= $debutFormated)
            {
                $resultat[] = $next;
            }
        }
        return $resultat;
        }
        else
        {
            return $annonces;
        }
    }
    
    public function getAnnoncesForDateFin($annonces,$date)
    {
        if($date != null)
        {
        $resultat = array();
        
        foreach($annonces as $next)
        {   
            
            $debut = \DateTime::createFromFormat('d/m/Y',$date);
            
            $debutFormated = \DateTime::createFromFormat('Y-m-d H:i:s',$debut->format('Y-m-d H:i:s'));
            
            if($next->getDateCreation() <= $debutFormated)
            {
                $resultat[] = $next;
            }
        }
        return $resultat;
        }
        else
        {
            return $annonces;
        }
    }
    
    
}
