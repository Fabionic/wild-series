<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public const SERIES = [
        ['id'=> 0, 'title' => 'Sons of Anarchy', 'synopsis' => 'En 1983, à Hawkins dans l\'Indiana, Will Byers disparaît de son domicile. Ses amis se lancent alors dans une recherche semée d\'embûches pour le retrouver. Pendant leur quête de réponses, les garçons rencontrent une étrange jeune fille en fuite.', 'category' => 'Horreur'],
        ['id'=> 1, 'title' => 'Outlander', 'synopsis' => 'Transformé en loup-garou après avoir été mordu par un animal, un lycéen devient un sportif adulé et un bourreau des coeurs qui doit faire face à de nouveaux problèmes.', 'category' => 'Action'],
        ['id'=> 2, 'title' => 'Riverdale', 'synopsis' => 'test', 'category' => 'Animation'],
        ['id'=> 3, 'title' => 'The Witcher', 'synopsis' => 'test', 'category' => 'Fantastique'],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::SERIES as $i => $serie) {
            $program = new Program();
            $program->setTitle($serie['title']);
            $program->setSynopsis($serie['synopsis']);
            $program->setCategory($this->getReference('category_' . $serie['category']));
            $this->addReference('program_' . $serie['id'], $program);
            $manager->persist($program);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
            CategoryFixtures::class,
            
        ];
    }
}