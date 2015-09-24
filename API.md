#API Docs

---
## Gitolite\Acl
Gitolite ACL Class
Project:   gitolite-php
File:      src/Gitolite/Acl.php

Copyright (C) 2012 Rafael Goulart

This program is free software; you can redistribute it and/or modify it
under the terms of the GNU General Public License as published by  the Free
Software Foundation; either version 2 of the License, or (at your option)
any later version.

##### ``public`` setPermission()
    Set Permission

Valids: R, RW, RW+, -, RWC, RW+C, RWD, RW+D, RWCD, RW+CD, RWDC, RW+DC
Argument   | Type          | Description
------------| :-------------| :-------------
        $permission | string | 
        
    
##### ``public`` getPermission()
    Get Permission

##### ``public`` setRefexes()
    Set Refexes

Argument   | Type          | Description
------------| :-------------| :-------------
        $refexes | string | 
        
    
##### ``public`` getRefexes()
    Get Refexes

##### ``public`` setUsers()
    Set Users

Argument   | Type          | Description
------------| :-------------| :-------------
        $users | array | 
        
    
##### ``public`` getUsers()
    Get Users

##### ``public`` addUser()
    Add user

Argument   | Type          | Description
------------| :-------------| :-------------
        $user | \Gitolite\User | 
        
    
##### ``public`` setTeams()
    Set Teams

Argument   | Type          | Description
------------| :-------------| :-------------
        $teams | array | 
        
    
##### ``public`` getTeams()
    Get Teams

##### ``public`` addTeam()
    Add Team

Argument   | Type          | Description
------------| :-------------| :-------------
        $team | \Gitolite\Team | 
        
    
##### ``public`` render()
    Returns acl line

Format: &lt;permission&gt; &lt;zero or more refexes&gt; = &lt;one or more users/user teams&gt;
Argument   | Type          | Description
------------| :-------------| :-------------
        $nl | string |
---
## Gitolite\Gitolite
Gitolite Class
Project:   gitolite-php
File:      src/Gitolite/Gitolite.php

Copyright (C) 2012 Rafael Goulart

This program is free software; you can redistribute it and/or modify it
under the terms of the GNU General Public License as published by  the Free
Software Foundation; either version 2 of the License, or (at your option)
any later version.

##### ``public`` setGitRemoteRepositoryURL()
    Set GitRemoteRepositoryURL

Argument   | Type          | Description
------------| :-------------| :-------------
        $gitRemoteRepositoryURL | string | 
        
    
##### ``public`` getGitRemoteRepositoryURL()
    Get GitRemoteRepositoryURL

##### ``public`` setGitLocalRepositoryPath()
    Set GitLocalRepositoryPath

Argument   | Type          | Description
------------| :-------------| :-------------
        $gitLocalRepositoryPath | string | 
        
    
##### ``public`` getGitLocalRepositoryPath()
    Get GitLocalRepositoryPath

##### ``public`` setGitEmail()
    Set GitEmail

Argument   | Type          | Description
------------| :-------------| :-------------
        $gitEmail | string | 
        
    
##### ``public`` getGitEmail()
    Get GitEmail

##### ``public`` setGitUsername()
    Set GitUsername

Argument   | Type          | Description
------------| :-------------| :-------------
        $gitUsername | string | 
        
    
##### ``public`` getGitUsername()
    Get GitUsername

##### ``public`` setGitServerName()
    Set GitServername

Argument   | Type          | Description
------------| :-------------| :-------------
        $gitServerName |  | 
        
    
##### ``public`` getGitServerName()
    Get GitServername

##### ``public`` setRepos()
    Set Repos

Argument   | Type          | Description
------------| :-------------| :-------------
        $repos | array | 
        
    
##### ``public`` getRepos()
    Get Repos

##### ``public`` getRepo()
    Get Repo

Argument   | Type          | Description
------------| :-------------| :-------------
        $name |  | 
        
    
##### ``public`` addRepo()
    Add repo

Argument   | Type          | Description
------------| :-------------| :-------------
        $repo | string | 
        
    
##### ``public`` delRepo()
    Delete repo

Argument   | Type          | Description
------------| :-------------| :-------------
        $name |  | 
        
    
##### ``public`` setUsers()
    Set Users

Argument   | Type          | Description
------------| :-------------| :-------------
        $users | array | 
        
    
##### ``public`` getUsers()
    Get Users

##### ``public`` getUser()
    Get User

Argument   | Type          | Description
------------| :-------------| :-------------
        $username |  | 
        
    
##### ``public`` addUser()
    Add user

Argument   | Type          | Description
------------| :-------------| :-------------
        $user | string | 
        
    
##### ``public`` setTeams()
    Set Teams

Argument   | Type          | Description
------------| :-------------| :-------------
        $teams | array | 
        
    
##### ``public`` getTeams()
    Get Teams

##### ``public`` getTeam()
    Get Team

Argument   | Type          | Description
------------| :-------------| :-------------
        $name |  | 
        
    
##### ``public`` addTeam()
    Add Team

Argument   | Type          | Description
------------| :-------------| :-------------
        $team | string | 
        
    
##### ``public`` import()
    Import gitolite.conf

##### ``protected`` getGitoliteRepository()
    Get PHPGit_Repository

##### ``protected`` writeFile()
    Write a File down to disk

Argument   | Type          | Description
------------| :-------------| :-------------
        $filename | string | 
        $data | string | 
        $checkChange | boolean | 
        
    
##### ``public`` pushConfig()
    Push configuration to Gitolite Server

##### ``public`` commitConfig()
    Commits changes in configuration

##### ``public`` writeFullConfFile()
    Write full conf file to disk

##### ``public`` writeUsers()
    Write users keys to disk

##### ``public`` writeAndPush()
    Write everything to the disk, commit and push

##### ``public`` renderFullConfFile()
    Return full conf file

##### ``public`` renderUserAndTeams()
    Return user and teams for conf file

##### ``public`` renderRepos()
    Return repos for conf file

##### ``public`` gitConfig()
    Configure the repository

##### ``protected`` runGitCommand()
    Run git commands

Argument   | Type          | Description
------------| :-------------| :-------------
        $cmds | mixed | 
        
    
##### ``protected`` log()
    Log a message

Argument   | Type          | Description
------------| :-------------| :-------------
        $message | \Gitolite\type | 
        
    
##### ``protected`` log_error()
    Log a error message

Argument   | Type          | Description
------------| :-------------| :-------------
        $message | \Gitolite\type | 
        
    
##### ``public`` getLog()
    Get the log

##### ``public`` getLogAsString()
    Get the log as string

Argument   | Type          | Description
------------| :-------------| :-------------
        $type |  |
---
## Gitolite\Repo
Gitolite Repository Class
Project:   gitolite-php
File:      src/Gitolite/Repo.php

Copyright (C) 2012 Rafael Goulart

This program is free software; you can redistribute it and/or modify it
under the terms of the GNU General Public License as published by  the Free
Software Foundation; either version 2 of the License, or (at your option)
any later version.

##### ``public`` setName()
    Set Name

Argument   | Type          | Description
------------| :-------------| :-------------
        $name | string | 
        
    
##### ``public`` getName()
    Get Name

##### ``public`` setAcls()
    Set Acls

Argument   | Type          | Description
------------| :-------------| :-------------
        $acls | array | 
        
    
##### ``public`` getAcls()
    Get Acls

##### ``public`` addAcl()
    Add acl

Argument   | Type          | Description
------------| :-------------| :-------------
        $acl | \Gitolite\Acl | 
        
    
##### ``public`` render()
    Returns team group line

Format: @&lt;team_name&gt; = &lt;user 1&gt; &lt;user 2&gt; &lt;user 3&gt; &lt;user &#039;n&#039;&gt;
---
## Gitolite\Team
Gitolite Team Class
Project:   gitolite-php
File:      src/Gitolite/Team.php

Copyright (C) 2012 Rafael Goulart

This program is free software; you can redistribute it and/or modify it
under the terms of the GNU General Public License as published by  the Free
Software Foundation; either version 2 of the License, or (at your option)
any later version.

##### ``public`` setName()
    Set Name

Argument   | Type          | Description
------------| :-------------| :-------------
        $name | string | 
        
    
##### ``public`` getName()
    Get Name

##### ``public`` getFormatedName()
    Get Formated Name (as @team)

##### ``public`` setUsers()
    Set Users

Argument   | Type          | Description
------------| :-------------| :-------------
        $users | array | 
        
    
##### ``public`` getUsers()
    Get Users

##### ``public`` addUser()
    Add user

Argument   | Type          | Description
------------| :-------------| :-------------
        $user | \Gitolite\User | 
        
    
##### ``public`` setTeams()
    Set Teams

Argument   | Type          | Description
------------| :-------------| :-------------
        $teams | array | 
        
    
##### ``public`` getTeams()
    Get Teams

##### ``public`` addTeam()
    Add Team

Argument   | Type          | Description
------------| :-------------| :-------------
        $team | \Gitolite\Team | 
        
    
##### ``public`` render()
    Returns team group line

Format: @&lt;team_name&gt; = &lt;user 1&gt; &lt;user 2&gt; &lt;user 3&gt; &lt;user &#039;n&#039;&gt;
Argument   | Type          | Description
------------| :-------------| :-------------
        $nl | string |
---
## Gitolite\User
Gitolite User Class
Project:   gitolite-php
File:      src/Gitolite/User.php

Copyright (C) 2012 Rafael Goulart

This program is free software; you can redistribute it and/or modify it
under the terms of the GNU General Public License as published by  the Free
Software Foundation; either version 2 of the License, or (at your option)
any later version.

##### ``public`` setUsername()
    Set Username

Argument   | Type          | Description
------------| :-------------| :-------------
        $username | string | 
        
    
##### ``public`` getUsername()
    Get Username

##### ``public`` setKeys()
    Set Keys

Argument   | Type          | Description
------------| :-------------| :-------------
        $keys | array | 
        
    
##### ``public`` getKeys()
    Get Keys

##### ``public`` getFirstKey()
    Get First Key

##### ``public`` addKey()
    Add key

Argument   | Type          | Description
------------| :-------------| :-------------
        $key | string | 
        
    
##### ``public`` setEmail()
    Set Email

Argument   | Type          | Description
------------| :-------------| :-------------
        $email | string | 
        
    
##### ``public`` getEmail()
    Get Email

##### ``public`` renderKeyFileName()
    Returns key filename in form username.pub
---
## GitoliteAutoload
Gitolite Autoload Class
Project:   gitolite-php
File:      src/GitoliteAutoload.php

Copyright (C) 2012 Rafael Goulart

This program is free software; you can redistribute it and/or modify it
under the terms of the GNU General Public License as published by  the Free
Software Foundation; either version 2 of the License, or (at your option)
any later version.

##### ``private`` __construct()
    Constructor

set private to avoid directly instatiation to implement
but is not a Singleton Design Pattern
##### ``public`` registerAutoload()
    Configure autoloading using Gitolite.

This is designed to play nicely with other autoloaders.
Argument   | Type          | Description
------------| :-------------| :-------------
        $initPath | string | 
        
    
##### ``public`` autoload()
    Internal autoloader for spl_autoload_register().

Argument   | Type          | Description
------------| :-------------| :-------------
        $class | string |

---
 Documentation generated by [pipe2](http:www.g1mr.com/pipe2/)
