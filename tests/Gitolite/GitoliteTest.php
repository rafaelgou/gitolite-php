<?php

namespace Tests\Gitolite;

use Gitolite\Gitolite;
use Gitolite\User;
use Gitolite\Team;
use Gitolite\Acl;
use Gitolite\Repo;

class GitoliteTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider providerGitolite
     */
    public function testGitoliteEntry($username, $email, $local, $remote)
    {
        $gitolite = new Gitolite();

        $gitolite
            ->setGitUsername($username)
            ->setGitEmail($email)
            ->setGitLocalRepositoryPath($local)
            ->setGitRemoteRepositoryURL($remote);

        $gitolite->test();
        $this->assertInternalType('string', $gitolite->render());
        //$this->assertEquals($filename, $user->renderKeyFileName());
    }

    public function providerGitolite()
    {
        return array(
            array(
                'Rafael Goulart',
                'rafaelgou@gmailcom',
                '/var/www/MeusProjetos/Gitolite/tmp/gitolite-admin',
                '/var/www/MeusProjetos/gitolite-tmp'
                ),
            array(
                'Rafael Goulart',
                'rafaelgou@gmailcom',
                '/var/www/MeusProjetos/Gitolite/tmp/gitolite-admin',
                'git@git.rgou.net:gitolite-admin',
                ),
        );
    }

}
