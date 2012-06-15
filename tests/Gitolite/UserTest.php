<?php

namespace Tests\Gitolite;

use Gitolite\User;

class UserTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider providerUsers
     */
    public function testUsersEntries($email, $username, $key, $filename)
    {
        $user = new User();
        $user
            ->setEmail($email)
            ->setUsername($username)
            ->addKey($key);
        $this->assertInternalType('string', $user->renderKeyFileName());
        $this->assertEquals($filename, $user->renderKeyFileName());
    }

    public function providerUsers()
    {
        return array(
            array(
                'bla@gmail.com',
                'bla',
                'ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABAQDV+ZM7O6hYUNmO+EieB4l2puC1cfICIOY8TQcz4r/XpIudefQYSlxLdYV1ZYIYUL/kmbX3QU0jI8s/sAXCMeBH56y0Kl2qhLCw1HZwsdd5nYyeb4aIdxqlnXds+3pQ+BOR1RV0bFA5TIwXiCA46efmb4H51GnqjYiMsvUMR/fs86F9lA/rAhTtBjcN+ALh+qKYKT1hOO6RzbEzM8wyOcxZf0XRz02usC+GGvVMGlVwzNk+csnDERmt5282LMfJ8ba3AUDEJuNGhq3XwAhgboamEcq7/2JAsKcWGgdtI/FwWSAOtRZfgxBWMuZCwyzZPdQgbImPf73wtnTid8dXasafl bla@gmail.com',
                'bla.pub'
                ),
            array(
                'bla@yahoo.com',
                'bla@yahoo.com',
                'ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABAQDV+ZM7O6hYUNmO+EieB4l2puC1cfICIOY8TQcz4r/XpIudefQYSlxLdYV1ZYIYUL/kmbX3QU0jI8s/sAXCMeBH56y0Kl2qhLCw1HZwsdd5nYyeb4aIdxqlnXds+3pQ+BOR1RV0bFA5TIwXiCA46efmb4H51GnqjYiMsvUMR/fs86F9lA/rAhTtBjcN+ALh+qKYKT1hOO6RzbEzM8wyOcxZf0XRz02usC+GGvVMGlVwzNk+csnDERmt5282LMfJ8ba3AUDEJuNGhq3XwAhgboamEcq7/2JAsKcWGgdtI/FwWSAOtRZfgxBWMuZCwyzZPdQgbImPf73wtnTid8dXasafl bla@yahoo.com',
                'bla@yahoo.com.pub',
                ),
        );
    }

}

/**
 * Gitolite Class
 *
 * @author Rafael Goulart <rafaelgou@gmail.com>
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
                throw new \Exception("Directory {$this->getGitLocalRepositoryPath()} already exists, impossible to create repository" );
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

    public function test()
    {
        $repo = $this->getGitoliteRepository();
    }

}