<?php

namespace App\Controller\Admin;

use App\Entity\Car;
use App\Entity\Fleet;
use App\Entity\Gear;
use App\Entity\Make;
use App\Entity\Rental;
use App\Entity\Seat;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;


class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $userRepository = $em->getRepository(User::class);
        $carRepository = $em->getRepository(Car::class);
        $rentalRepository = $em->getRepository(Rental::class);
        // return parent::index();
        return $this->render('admin/dashboard.html.twig',['users' => $userRepository->userCount(),
                                                        'cars' => $carRepository->carCount(),
                                                        'rentals' => $rentalRepository->rentalCount()]);
    }


    public function configureUserMenu(UserInterface $user): UserMenu
    {
        return parent::configureUserMenu($user)
            ->setName($user->getFullname());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Loca-Auto');
    }

    public function configureMenuItems(): iterable
    {
        //Navigation 

        yield MenuItem::section('');
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-tachometer-alt');
        yield MenuItem::linkToUrl('Accueil', 'fa fa-home', '/');
        yield MenuItem::linkToLogout('Déconnexion', 'fa fa-sign-out-alt');

        // Utilisateurs

        yield MenuItem::section('Utilisateurs');
        yield MenuItem::linkToCrud('Liste', 'fas fa-users', User::class);
        yield MenuItem::linkToCrud('Ajout', 'fas fa-user-plus', User::class)->setAction('new');

        // Voitures

        yield MenuItem::section('Voitures');
        yield MenuItem::linkToCrud('Liste', 'fas fa-car', Car::class);
        yield MenuItem::linkToCrud('Ajout', 'fas fa-user-plus', Car::class)->setAction('new');
        yield MenuItem::section();

        // Fleet

        yield MenuItem::section('Status');
        yield MenuItem::linkToCrud('Liste', 'fas fa-warehouse', Fleet::class);
        yield MenuItem::linkToCrud('Ajout', 'fas fa-user-plus', Fleet::class)->setAction('new');
        yield MenuItem::section();

        // Location

        yield MenuItem::section('Location');
        yield MenuItem::linkToCrud('Liste', 'fas fa-folder-open', Rental::class);
        yield MenuItem::linkToCrud('Ajout', 'fas fa-user-plus', Rental::class)->setAction('new');
        yield MenuItem::section();

        // Makes

        yield MenuItem::section('Marques');
        yield MenuItem::linkToCrud('Liste', 'fas fa-copyright', Make::class);
        yield MenuItem::linkToCrud('Ajout', 'fas fa-user-plus', Make::class)->setAction('new');
        yield MenuItem::section();

        // Seats

        yield MenuItem::section('Sièges');
        yield MenuItem::linkToCrud('Liste', 'fas fa-chair', Seat::class);
        yield MenuItem::linkToCrud('Ajout', 'fas fa-user-plus', Seat::class)->setAction('new');
        yield MenuItem::section();
        
        // Gears

        yield MenuItem::section('Boîte de vitesse');
        yield MenuItem::linkToCrud('Liste', 'fas fa-cogs', Gear::class);
        yield MenuItem::linkToCrud('Ajout', 'fas fa-user-plus', Seat::class)->setAction('new');
        yield MenuItem::section();

    }
}
