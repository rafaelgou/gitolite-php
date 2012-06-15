gitolite-php
------------

A wrapper to admin a gitolite git server throught PHP.

The main use is to create an gitolite-admin repo from scratch, and create GUIs to manage it.

**Still Alpha!! Licence to be defined!!**

## Features

- Feed some objects and render gitolite.conf file
- Pull and Push to remote gitolite-admin repository (almost done)

## Limitations

- Not all features of gitolite are implemented yet
- Some features will be intentionally missed for better integration
- Full reading from an existing repository could no be possible
- Maybe will never be possible to import included files

## TODO

- Read from gitolite.conf

## Instalation

    git clone git://github.com/rafaelgou/gitolite-php.git
    cd gitolite-php
    git submodules update

You can install as submodule in your Git project, but don't forget
to run the git submodule update inside the gitolite-php directory.

## Use

    // Register Autoload
    include_once('PATH_TO/gitolite-php/src/GitoliteAutoload.php');
    \GitoliteAutoload::registerAutoload();

    // PHPGit_Repository
    require_once('PATH_TO/gitolite-php//vendor/php-git-repo/lib/PHPGit/Repository.php');

Sample use:

    <?php
    // Register Autoload
    include_once('src/GitoliteAutoload.php');
    \GitoliteAutoload::registerAutoload();

    // PHPGit_Repository
    require_once(dirname(__FILE__) . '/vendor/php-git-repo/lib/PHPGit/Repository.php');

    use Gitolite\Gitolite;
    use Gitolite\User;
    use Gitolite\Team;
    use Gitolite\Acl;
    use Gitolite\Repo;

    $gitolite = new \Gitolite\Gitolite;

    $gitolite
        ->setGitUsername('An User Name')
        ->setGitEmail('bla@blamail.com')
        ->setGitLocalRepositoryPath('/var/www/MeusProjetos/Gitolite/tmp/gitolite-admin')
    //    ->setGitRemoteRepositoryURL('/var/www/MeusProjetos/gitolite-tmp');
        ->setGitRemoteRepositoryURL('git@bladomain.com:gitolite-demo');

    $user1 = new User();
    $user1->setEmail('bla@blamail.com')
            ->setUsername('thebla')
            ->addKey('ssh-rsa AAAAB3NzaC1yc2EAAAADDDDDAABAQDV+ZM7O6hYUNmO+EieB4l2puC1cfICIOY8TQcz4r/XpIudefQYSlxLdYV1ZYIYUL/kmbX3QU0jI8s/sAXCMeBH56y0Kl2qhLCw1HZwsdd5nYyeb4aIdxqlnXds+3pQ+BOR1RV0bFA5TIwXiCA46efmb4H51GnqjYiMsvUMR/fs86F9lA/rAhTtBjcN+ALh+qKYKT1hOO6RzbEzM8wyOcxZf0XRz02usC+GGvVMGlVwzNk+csnDERmt5282LMfJ8ba3AUDEJuNGhq3XwAhgboamEcq7/2JAsKcWGgdtI/FwWSAOtRZfgxBWMuZCwyzZPdQgbImPf73wtnTid8dXCxXR bla@blamail.com');
    $user2 = new User();
    $user1->setEmail('ops@opsmail.com')
            ->setUsername('opsbla')
            ->addKey('ssh-rsa AAAAB3NzaC1yc2EAAAADDDDDAABAQDV+ZM7O6hYUNmO+EieB4l2puC1cfICIOY8TQcz4r/XpIudefQYSlxLdYV1ZYIYUL/kmbX3QU0jI8s/sAXCMeBH56y0Kl2qhLCw1HZwsdd5nYyeb4aIdxqlnXds+3pQ+BOR1RV0bFA5TIwXiCA46efmb4H51GnqjYiMsvUMR/fs86F9lA/rAhTtBjcN+ALh+qKYKT1hOO6RzbEzM8wyOcxZf0XRz02usC+GGvVMGlVwzNk+csnDERmt5282LMfJ8ba3AUDEJuNGhq3XwAhgboamEcq7/2JAsKcWGgdtI/FwWSAOtRZfgxBWMuZCwyzZPdQgbImPf73wtnTid8dXksk ops@opsmail.com');

    $team = new Team();
    $team->setName('MyTeam')
        ->addUser($user1)
        ->addUser($user2);

    $acl = new Acl();
    $acl->setPermission('RW+')
        ->setRefexes('')
        ->addUser($user1)
        ->addTeam($team);

    $repo1 = new Repo();
    $repo1->setName('gitolite-php')
        ->addAcl($acl);
    $gitolite
        ->addUser($user1)
        ->addUser($user2)
        ->addTeam($team)
        ->addRepo($repo1)
        ;

    $gitolite->writeAndPush();

    echo $gitolite->renderFullConfFile();