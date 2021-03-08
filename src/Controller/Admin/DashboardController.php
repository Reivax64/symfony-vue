<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Professeur;
use App\Entity\Matiere;
use App\Entity\Avis;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Emploi du temps');
    }

    public function configureMenuItems(): iterable
    {
        return[
            MenuItem::linktoDashboard('Deshboard','fa fa-home'),
            MenuItem::linkToCrud('Professeur','fas fa-chalkboard-teacher',Professeur::class),
            MenuItem::linkToCrud('Matiere','fas fa-book-open',Matiere::class),
            MenuItem::linkToCrud('Avis','fas fa-star',Avis::class),
        ];
    }
}
