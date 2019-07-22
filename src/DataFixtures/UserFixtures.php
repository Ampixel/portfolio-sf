<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

class UserFixtures extends Fixture
{
    private $passwordEncoder;
    private $user = [

            'nom'  => 'Monardo',
            'email'         => 'amandine.monardo@gmail.com',
            'password'      => '123456',
            'roles'         => ['ROLE_ADMIN'],

    ];

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        // On configure dans quelles langues nous voulons nos données
        //$faker = Faker\Factory::create('fr_FR');

        // On créé 1 user

        $newUser = new user();
        $newUser->setNom($this->user['nom']);
        $newUser->setEmail(sprintf($this->user['email']));
        $newUser->setPassword($this->passwordEncoder->encodePassword( $newUser, $this->user['password'] ) );
        $newUser->setRoles($this->user['roles']);

        $manager->persist($newUser);
//        $this->addReference( $user['email'], $newUser );

        $manager->flush();
    }
}
