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


