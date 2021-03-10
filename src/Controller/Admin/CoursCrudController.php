<?php

namespace App\Controller\Admin;

use App\Entity\Cours;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
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
            'type',
            'couleur',
            AssociationField::new('salle')->setFormTypeOptions(['by_reference' => false]),
            AssociationField::new('professeur')->setFormTypeOptions(['by_reference' => false]),
            AssociationField::new('matiere')->setFormTypeOptions(['by_reference' => false]),
        ];
    }
}
