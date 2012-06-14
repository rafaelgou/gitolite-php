<?php

namespace Gitolite;

/**
 * Gitolite Class
 *
 * @author Rafael Goulart <rafaelgou@gmail.com>
 */
class Gitolite
{
    protected $localRepository;
    protected $remoteRepositoryURL;
    protected $gitUsername;
    protected $gitEmail;

    protected $confFile;
    protected $users = array();
    protected $teams = array();
    protected $repos = array();


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

}