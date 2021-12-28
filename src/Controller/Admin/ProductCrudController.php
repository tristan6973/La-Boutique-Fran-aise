<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    //Hadi c'est la fonction qui affiche propriété d'un produit qui seront afficher à l'utilisateur
    public function configureFields(string $pageName): iterable
    {
            return [
                TextField::new('name'),
                SlugField::new('slug')->setTargetFieldName('name'),
                ImageField::new('illustration')
                    ->setBasePath('uploads/')
                    ->setUploadedFileNamePattern('[randomhash].[extension]')
                    ->setUploadDir('public/uploads')
                    ->setRequired(false),
                TextField::new('subtitle'),
                TextareaField::new('description'),
                MoneyField::new('price')->setCurrency('EUR'),
                AssociationField::new('category')
            ];
    }

}
