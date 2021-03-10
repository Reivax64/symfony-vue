<?php

namespace App\Controller\Admin;

use App\Entity\Cours;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ColorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
class CoursCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cours::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */

    public function configureFields(string $pageName): iterable
    {
        return [
            'dateHeureDebut',
            'dateHeureFin',
            ChoiceField::new('type')->setChoices(["COURS"=> "COURS", "TP" => "TP", "TD" => "TD"])->renderAsNativeWidget(),
            ColorField::new('couleur'),
            AssociationField::new('salle')->setFormTypeOptions(['by_reference' => false]),
            AssociationField::new('classe')->setFormTypeOptions(['by_reference' => false]),
            AssociationField::new('professeur')->setFormTypeOptions(['by_reference' => false]),
            AssociationField::new('matiere')->setFormTypeOptions(['by_reference' => false]),
        ];
    }
}
