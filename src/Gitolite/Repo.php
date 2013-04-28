<?php

namespace Gitolite;

/**
 * Gitolite Repository Class
 *
 * Project:   gitolite-php
 * File:      src/Gitolite/Repo.php
 *
 * Copyright (C) 2012 Rafael Goulart
 *
 * This program is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by  the Free
 * Software Foundation; either version 2 of the License, or (at your option)
 * any later version.
 *
 * @author  Rafael Goulart <rafaelgou@gmail.com>
 * @license GNU Lesser General Public License
 * @link    https://github.com/rafaelgou/gitolite-php
 * see CHANGELOG
 */
class Repo
{
    protected $name = null;
    protected $acls = array();

    /**
     * Set Name
     *
     * @param string $name The repository name
     *
     * @return Gitolite\Team
     */
    public function setName($name)
    {
        $this->name = (string) $name;
        return $this;
    }

    /**
     * Get Name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set Acls
     *
     * @param array $acls An array of acl objects
     *
     * @return Gitolite\Team
     */
    public function setAcls(array $acls)
    {
        $this->$acls = $acls;
        return $this;
    }

    /**
     * Get Acls
     *
     * @return array of Acls
     */
    public function getAcls()
    {
        return $this->acls;
    }

    /**
     * Add acl
     *
     * @param Acl $acl An acl object
     *
     * @return Gitolite\Team
     */
    public function addAcl(Acl $acl)
    {
        $this->acls[] = $acl;
        return $this;
    }

    /**
     * Returns team group line
     *
     * Format: @<team_name> = <user 1> <user 2> <user 3> <user 'n'>
     *
     * @return string
     */
    public function render()
    {
        if (count($this->acls) == 0) {
            throw new \Exception("No acls for repo {$this->getName()}");
        }

        $return = 'repo ' . $this->getName() . PHP_EOL;

        foreach ($this->getAcls() as $acl) {
            $return .= '    ' . $acl->render();
        }

        return $return . PHP_EOL;
    }


}