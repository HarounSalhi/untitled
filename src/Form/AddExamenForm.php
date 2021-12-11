<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class AddExamenForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder,array $options){
        $builder->add("titre",TextType::class)
            ->add("date",DateType::class)
            ->add("condidat_id",IntegerType::class);
    }


}