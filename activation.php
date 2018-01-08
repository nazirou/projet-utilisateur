<?php
namespace  location\dao;
 class utilisateur
 {
var $id;
 var $nomcomplet;
 var $login;
 var $password;
 var $etat;
 var $profil;

 private $bdd;

 /*****CONNECTION****/ 

 private function getConnexion(){
        try{
            if($this->bdd == null){
                $this->bdd = new PDO('mysql:host=;dbname=BD BDLOCATION;charset=utf8', 'root', '1327',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
            }       
        }
        catch(Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
    }
/*****ADD USER*****/ 
 public function addUser()
 {
    $this->getConnexion();
      $sql = "INSERT INTO utilisateur VALUES(null, :Nomcomplet, :login, :password, :etat ,:profil)";
      $req = $this->bdd->prepare($sql);
     $data = $req->execute(array(
                           'nomcomplet'=>$this->nomcomplet,
                            'login'=>$this->login,
                            'password'=>$this->password,
                            'etat'=>$this->etat,
                            'profil'=>$this->profil,
                            

                                ));
                     return $data;
                    }

/*****LIST USER*******/ 

public function listUser()
   {
   $this->getConnexion();
   $sql = "SELECT * FROM utilisateur";
   $donnees = $this->bdd->query($sql);
   return $donnees;
   }

   /*****ACTIVATE DESACTIVER USER********/ 

   public function activatedesactivateUser($id,$etat)
      {
   $this->getConnexion();

        if ($etat==1) {
        $sql = "UPDATE utilisateur SET etat = '1' WHERE utilisateur.id ='$id'"; 
            $donnees = $this->bdd->query($sql);
        return $donnes;

        }
        else if ($etat==0) {
        $sql = "UPDATE utilisateur SET etat = '0' WHERE utilisateur.id ='$id'"; 
            $donnees = $this->bdd->query($sql);
        return $donnees;

        }
            else {
        $sql = "UPDATE utilisateur SET etat = '-1' WHERE utilisateur.id ='$id'"; 
            $donnees = $this->bdd->query($sql);
        return $donnees;

        }
    }
/*****UPDATE PASSWORD*******/ 

     public function UpdatePassword($id,$password)
       {
   $this->getConnexion();
   $this->listUser();
        $sql = "UPDATE utilisateur SET password = '$password' WHERE utilisateur.id ='$id'"; 
            $donnees = $this->bdd->query($sql);
        return $donnees;

        
   }

   /*****LOGON*******/ 

    public function logON($login,$password)
       {
   $this->getConnexion();
   $this->listUser();
         while($reponse = $donnees->fetch()){
             if ($reponse['login']==$login && $reponse['password']== $password)  {
               return $user;
             }
             else {
                 return null;
             }  
        
   }

  }
 }
?>