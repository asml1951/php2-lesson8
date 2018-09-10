<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 10.05.2018
 * Time: 13:12
 */

namespace App\Admin;


use App\Entity\Pages;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PagesAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('title', TextType::class)
            ->add('url',TextType::class)
            ->add('menutitle',TextType::class)
            ->add('content',TextareaType::class,
                  array('attr' => array('rows' => 25)));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('title');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('title');
    }

    public function toString($object)
    {
        return $object instanceof Pages
            ? $object->getTitle()
            : 'Pages'; // shown in the breadcrumb on the create view
    }


}