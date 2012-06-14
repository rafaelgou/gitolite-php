<?php

namespace Gitolite;

/**
 * Gitolite Repository Class
 *
 * @author Rafael Goulart <rafaelgou@gmail.com>
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
            $return .= '    ' . $acl->render() . PHP_EOL;
        }

        return $return . PHP_EOL;
    }


}