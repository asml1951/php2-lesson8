<?php
/**
 * Created by PhpStorm.
 * User: smolin
 * Date: 11.09.2018
 * Time: 14:04
 */

namespace App\Admin;




use Sonata\AdminBundle\Admin\AbstractAdmin;
use App\Entity\Books;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class BooksAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('name', TextType::class)
            ->add('issue_date',DateType::class);

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name')
                   ->addIdentifier('issue_date');
    }

    public function toString($object)
    {
        return $object instanceof Books
            ? $object->getName()
            : 'Books'; // shown in the breadcrumb on the create view
    }

}