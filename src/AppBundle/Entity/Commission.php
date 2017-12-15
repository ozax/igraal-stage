<?php
/**
 * Created by PhpStorm.
 * User: Reda
 * Date: 15/12/2017
 * Time: 14:03
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Merchant;
use AppBundle\Entity\User;

/**
 * @ORM\Entity()
 * @ORM\Table(name="commission")
 */

class Commission
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $date;

    /**
     * @ORM\Column(type="decimal")
     */
protected $cashback;




    public function getId()
    {
        return $this->id;
    }
    

    public function getDate()
    {
        return $this->date;
    }

    public  function getCashBack()
    {
        return $this->cashback;

    }

}