<?php

namespace Tests\Gitolite;

use Gitolite\User;

/**
 * UserTest Class
 *
 * Project:   gitolite-php
 * File:      tests/Gitolite/UserTest.php
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
