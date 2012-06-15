<?php

namespace Tests\Gitolite;

use Gitolite\Gitolite;
use Gitolite\User;
use Gitolite\Team;
use Gitolite\Acl;
use Gitolite\Repo;

/**
 * GitoliteTest Class
 *
 * Project:   gitolite-php
 * File:      tests/Gitolite/GitoliteTest.php
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
        $this->assertInternalType('string', $gitolite->renderConfFile());
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
                'git@gitolite.loc:gitolite-admin',
                ),
        );
    }

}
