<?php


namespace App\DataFixtures;


use App\Entity\Program;

use Doctrine\Bundle\FixturesBundle\Fixture;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;

use Doctrine\Persistence\ObjectManager;


class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        foreach (CategoryFixtures::CATEGORIES as $key => $categoryName) {
            for ($i = 0; $i < 5; $i++) {
                $program = new Program();
                $program->setTitle('Serie ' . $categoryName . ' #' . $i);
                $program->setSynopsis('Lorem ipsum');
                $program->setCategory($this->getReference('category_' . $categoryName));
                $manager->persist($program);
            }
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
