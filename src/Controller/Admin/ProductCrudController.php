<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            yield TextField::new('name'),
            yield SlugField::new('slug')->setTargetFieldName('name'),
            yield ImageField::new('illustration')
                ->setBasePath('uploads/')
                ->setUploadDir('public/images/uploads')
                ->setUploadedFileNamePattern("[slug]-[timestamp].[extension]")
                ->setRequired('false')
                ,
            yield TextEditorField::new('description'),
            yield AssociationField::new('category')
        ];
    }
    
}
