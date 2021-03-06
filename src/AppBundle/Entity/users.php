<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * users
 *
 * @ORM\Table()
 * @ORM\Entity
 * @UniqueEntity(
 *      fields={"username"},
 *      message="Existing username! Please, choose another!"
 * )
 */
class users implements UserInterface, \Serializable {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     * @Assert\NotBlank(
     *      message = "Please, enter a username!"
     * )
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="roles", type="string", length=255)
     */
    private $roles;

    /**
    * @var datetime
    *
    * @ORM\Column(name="lastlogin", type="datetime")
    */
    private $lastlogin;
      
    /**
     * @var integer
     *
     * @ORM\Column(name="loginattempts", type="integer", nullable=false, options={"unsigned":true, "default":0})
     */
    private $loginAttempts;
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return users
     */
    public function setUsername($username) {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return users
     */
    public function setPassword($password) {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Set roles
     *
     * @param string $roles
     * @return users
     */
    public function setRoles($roles) {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Get roles
     *
     * @return [string] 
     */
    public function getRoles() {
        //Ha esetleg szóközök is vannak a , után, az bezavarhat
        //Ezért azokat először kivesszük
        return explode(',', str_replace(" ", "", $this->roles));
    }
  
    /**
     * Set last login time
     *
     * @param datetime $lastlogin
     * @return users
     */
    public function setLastlogin($lastlogin){
        $this->lastlogin = $lastlogin;
        
        return $this;
    }
    
    /**
     * Get last login time
     *
     * @return datetime
     */
    public function getLastlogin(){
        return $this->lastlogin;
    }
    
    /**
     * Get login attempts
     *
     * @return integer 
     */
    public function getLoginAttempts() {
        return $this->loginAttempts;
    }
    
    /**
     * Get login attempts
     * @param integer $loginAttemps
     * @return users 
     */
    public function setLoginAttempts($loginAttemps) {
        $this->loginAttempts = $loginAttemps;
        
        return $this;
    }
    
    public function eraseCredentials() {
        return;
    }

    public function getSalt() {
        return null;
    }

    public function serialize() {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password
        ));
    }

    public function unserialize($serialized) {
        list (
            $this->id,
            $this->username,
            $this->password
        ) = unserialize($serialized);
    }

}
