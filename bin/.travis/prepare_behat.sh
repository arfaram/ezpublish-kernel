#!/bin/sh

# File for setting up system for behat testing, just like done in DemoBundle's .travis.yml

# Change local git repo to be a full one as we will reuse it for composer install below
git fetch --unshallow && git checkout -b tmp_ci_branch
export BRANCH_BUILD_DIR=$TRAVIS_BUILD_DIR TRAVIS_BUILD_DIR="$HOME/build/ezplatform"

# Checkout meta repo, use the branch indicated in composer.json under extra._ezplatform_branch_for_behat_tests
EZPLATFORM_BRANCH=`php -r 'echo json_decode(file_get_contents("./composer.json"))->extra->_ezplatform_branch_for_behat_tests;'`

cd "$HOME/build"

git clone --depth 1 --single-branch --branch "$EZPLATFORM_BRANCH" https://github.com/ezsystems/ezplatform.git
cd ezplatform

#if [ "$REST_TEST_CONFIG" != "" ] ; then
#    echo "> Fixing security.yml for REST functional tests"
#    sed -i "s@#        ezpublish_rest:@        ezpublish_rest:@" app/config/security.yml
#    sed -i "s@#            pattern: ^/api/ezp/v2@            pattern: ^/api/ezp/v2@" app/config/security.yml
#    sed -i "s@#            stateless: true@            stateless: true@" app/config/security.yml
#    sed -i "s@#            ezpublish_http_basic:@            ezpublish_http_basic:@" app/config/security.yml
#    sed -i "s@#                realm: eZ Publish REST API@                realm: eZ Publish REST API@" app/config/security.yml
#fi

# Install everything needed for behat testing, using our local branch of this repo
./bin/.travis/trusty/setup_from_external_repo.sh $BRANCH_BUILD_DIR "ezsystems/ezpublish-kernel:dev-tmp_ci_branch"
