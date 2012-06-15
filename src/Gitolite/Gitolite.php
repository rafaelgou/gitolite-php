<?php

namespace Gitolite;

/**
 * Gitolite Class
 *
 * Project:   gitolite-php
 * File:      src/Gitolite/Gitolite.php
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
class Gitolite
{
    protected $gitRemoteRepositoryURL = null;
    protected $gitLocalRepositoryPath = null;
    protected $gitEmail = null;
    protected $gitUsername = null;
    /**
     * @var PHPGit_Repository
     */
    protected $gitoliteRepository = null;

    protected $users = array();
    protected $teams = array();
    protected $repos = array();


    /**
     * Set GitRemoteRepositoryURL
     *
     * @param string $gitRemoteRepositoryURL The remote repository URL
     *
     * @return Gitolite\Gitolite
     */
    public function setGitRemoteRepositoryURL($gitRemoteRepositoryURL)
    {
        $this->gitRemoteRepositoryURL = (string) $gitRemoteRepositoryURL;
        return $this;
    }

    /**
     * Get GitRemoteRepositoryURL
     *
     * @return string
     */
    public function getGitRemoteRepositoryURL()
    {
        return $this->gitRemoteRepositoryURL;
    }

    /**
     * Set GitLocalRepositoryPath
     *
     * @param string $gitLocalRepositoryPath The git local repository Path
     *
     * @return Gitolite\Gitolite
     */
    public function setGitLocalRepositoryPath($gitLocalRepositoryPath)
    {
        $this->gitLocalRepositoryPath = (string) $gitLocalRepositoryPath;
        return $this;
    }

    /**
     * Get GitLocalRepositoryPath
     *
     * @return string
     */
    public function getGitLocalRepositoryPath()
    {
        return $this->gitLocalRepositoryPath;
    }

    /**
     * Set GitEmail
     *
     * @param string $gitEmail The git user email
     *
     * @return Gitolite\Gitolite
     */
    public function setGitEmail($gitEmail)
    {
        $this->gitEmail = (string) $gitEmail;
        return $this;
    }

    /**
     * Get GitEmail
     *
     * @return string
     */
    public function getGitEmail()
    {
        return $this->gitEmail;
    }

    /**
     * Set GitUsername
     *
     * @param string $gitUsername The git user name
     *
     * @return Gitolite\User
     */
    public function setGitUsername($gitUsername)
    {
        $this->gitUsername = (string) $gitUsername;
        return $this;
    }

    /**
     * Get GitUsername
     *
     * @return string
     */
    public function getGitUsername()
    {
        return $this->gitUsername;
    }

    /**
     * Set Repos
     *
     * @param array $repos An array of repositories
     *
     * @return Gitolite\Acl
     */
    public function setRepos(array $repos)
    {
        $this->$repos = $repos;
        return $this;
    }

    /**
     * Get Repos
     *
     * @return array of Repos
     */
    public function getRepos()
    {
        return $this->repos;
    }

    /**
     * Add repo
     *
     * @param string $repo A repository object
     *
     * @return Gitolite\Acl
     */
    public function addRepo(Repo $repo)
    {
        $this->repos[] = $repo;
        return $this;
    }

    /**
     * Set Users
     *
     * @param array $users An array of user objects
     *
     * @return Gitolite\Acl
     */
    public function setUsers(array $users)
    {
        $this->users = array();
        foreach ($users as $user) {
            $this->addUser($user);
        }
        return $this;
    }

    /**
     * Get Users
     *
     * @return array of Users
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add user
     *
     * @param string $user A user object
     *
     * @return Gitolite\Acl
     */
    public function addUser(User $user)
    {
        $this->user[] = $user;
        return $this;
    }

    /**
     * Set Teams
     *
     * @param array $teams An array of team objects
     *
     * @return Gitolite\Acl
     */
    public function setTeams(array $teams)
    {
        $this->teams = array();
        foreach ($teams as $team) {
            $this->addTeam($team);
        }
        return $this;
    }

    /**
     * Get Teams
     *
     * @return array of Teams
     */
    public function getTeams()
    {
        return $this->teams;
    }

    /**
     * Add Team
     *
     * @param string $team A team object
     *
     * @return Gitolite\Acl
     */
    public function addTeam(Team $team)
    {
        $this->teams[] = $team;
        return $this;
    }

    /**
     * Returns acl
     *
     * Format: <permission> <zero or more refexes> = <one or more users/user teams>
     *
     * @return string
     */
    public function renderConfFile()
    {
        $return = '';

        foreach ($this->getTeams() as $team) {
            $return .= $team->render() . PHP_EOL;
        }

        foreach ($this->getRepos() as $repo) {
            $return .= $repo->render();
        }

        return $return;
    }

    /**
     * Get PHPGit_Repository
     *
     * @return PHPGit_Repository
     */
    protected function getGitoliteRepository()
    {
        if (null === $this->getGitLocalRepositoryPath()) {
            throw new \Exception('Git local repository path not defined');
        }
        try {
            $this->gitoliteRepository = new \PHPGit_Repository($this->getGitLocalRepositoryPath());
        } catch (\Exception $exc) {

            if (file_exists($this->getGitLocalRepositoryPath())) {
                throw new \Exception("Directory {$this->getGitLocalRepositoryPath()} already exists, impossible to create repository");
            } else {
                if (mkdir($this->getGitLocalRepositoryPath(), 0770)) {
                    $this->gitoliteRepository = \PHPGit_Repository::create($this->getGitLocalRepositoryPath());
                } else {
                    throw new \Exception('Impossible to create Directory informed in Git local repository (possibly.');
                }
            }
        }
        return $this->gitoliteRepository;
    }

    /**
     * Simple test function
     *
     * @deprecated
     *
     * @return void
     */
    public function test()
    {
        $repo = $this->getGitoliteRepository();
    }

}