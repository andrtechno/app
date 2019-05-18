<?php

namespace tests\unit\models;

use panix\mod\user\models\User;

class UserTest extends \Codeception\Test\Unit
{
    public function testFindUserById()
    {
        expect_that($user = User::findIdentity(100));
        expect($user->username)->equals('admin');

        expect_not(User::findIdentity(999));
    }

    public function testFindUserByAccessToken()
    {
        expect_that($user = User::findIdentityByAccessToken('100-token'));
        expect($user->username)->equals('admin');

        expect_not(User::findIdentityByAccessToken('non-existing'));        
    }

    public function testFindUserByUsername()
    {
        expect_that($user = User::findOne(1));//admin
        expect_not(User::findOne(2)); //non-admin
    }

    /**
     * @depends testFindUserByUsername
     */
    public function testValidateUser($user)
    {
        $user = User::findOne(1);
        expect_that($user->validateAuthKey('test100key'));
        expect_not($user->validateAuthKey('test102key'));

        expect_that($user->validatePassword('admin'));
        expect_not($user->validatePassword('123456'));        
    }

}
