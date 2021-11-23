<?php

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace Dan\Jobfair\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * The model for Contact
 *
 * @author Dan <typo3dev@outlook.com>
 */
class Contact extends AbstractEntity
{

    /**
     * name
     *
     * @var string
     */
    protected $name = '';

    /**
     * address
     *
     * @var string
     */
    protected $address = '';

    /**
     * phone
     *
     * @var string
     */
    protected $phone = '';

    /**
     * email
     *
     * @var string
     */
    protected $email = '';

    /**
     * email
     *
     * @var string
     */
    protected $www = '';

    /**
     * contactImage
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $contactImage;

    /**
     * nameCc
     *
     * @var string
     */
    protected $nameCc = '';

    /**
     * emailCc
     *
     * @var string
     */
    protected $emailCc = '';

    /**
     * nameBcc
     *
     * @var string
     */
    protected $nameBcc = '';

    /**
     * emailBcc
     *
     * @var string
     */
    protected $emailBcc = '';

    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the address
     *
     * @return string $address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Sets the address
     *
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * Returns the phone
     *
     * @return string $phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Sets the phone
     *
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * Returns the email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Returns the www
     *
     * @return string $www
     */
    public function getWww()
    {
        return $this->www;
    }

    /**
     * Sets the www
     *
     * @param string $www
     */
    public function setWww($www)
    {
        $this->www = $www;
    }

    /**
     * Returns the contactImage
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $contactImage
     */
    public function getContactImage()
    {
        return $this->contactImage;
    }

    /**
     * Sets the contactImage
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $contactImage
     */
    public function setContactImage($contactImage)
    {
        $this->contactImage = $contactImage;
    }

    /**
     * Returns the nameCc
     *
     * @return string $nameCc
     */
    public function getNameCc()
    {
        return $this->nameCc;
    }

    /**
     * Sets the nameCc
     *
     * @param string $nameCc
     */
    public function setNameCc($nameCc)
    {
        $this->nameCc = $nameCc;
    }

    /**
     * Returns the emailCc
     *
     * @return string $emailCc
     */
    public function getEmailCc()
    {
        return $this->emailCc;
    }

    /**
     * Sets the emailCc
     *
     * @param string $emailCc
     */
    public function setEmailCc($emailCc)
    {
        $this->emailCc = $emailCc;
    }

    /**
     * Returns the nameBcc
     *
     * @return string $nameBcc
     */
    public function getNameBcc()
    {
        return $this->nameBcc;
    }

    /**
     * Sets the nameBcc
     *
     * @param string $nameBcc
     */
    public function setNameBcc($nameBcc)
    {
        $this->nameBcc = $nameBcc;
    }

    /**
     * Returns the emailBcc
     *
     * @return string $emailBcc
     */
    public function getEmailBcc()
    {
        return $this->emailBcc;
    }

    /**
     * Sets the emailBcc
     *
     * @param string $emailBcc
     */
    public function setEmailBcc($emailBcc)
    {
        $this->emailBcc = $emailBcc;
    }
}
