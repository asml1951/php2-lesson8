<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 10.05.2018
 * Time: 9:01
 */

namespace App\Admin;


use App\Entity\Work;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class WorkAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('name', TextType::class)
                    ->add('sort',TextType::class)
                    ->add('year',TextType::class)
                    ->add('text',TextareaType::class,
                        array('attr' => array('rows' => 25)));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name');
    }

    public function toString($object)
    {
        return $object instanceof Work
            ? $object->getName()
            : 'Works'; // shown in the breadcrumb on the create view
    }


}