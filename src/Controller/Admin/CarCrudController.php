<?php

namespace App\Controller\Admin;

use App\Entity\Car;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;


class CarCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Car::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('registrationNumber'),
            TextField::new('imageFile')
            ->setFormType(VichImageType::class)
            ->hideOnIndex(),
            ImageField::new('image')
            ->setBasePath('/assets/img')
            ->onlyOnIndex(),
            NumberField::new('pricePerDay'),
            AssociationField::new('makes'),
            AssociationField::new('engines'),
            AssociationField::new('gears'),
            AssociationField::new('seats'),
            AssociationField::new('fleets'),
  
        ];
    }
    
}
