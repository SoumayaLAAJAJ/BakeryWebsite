<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class CategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Category::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            ImageField::new('photo')
                ->setBasePath('uploads/')
                ->setUploadDir('public/images/uploads')
                ->setUploadedFileNamePattern("[slug]-[timestamp].[extension]")
                ->setRequired('false'),
            TextEditorField::new('description'),
        ];
    }
    
}
