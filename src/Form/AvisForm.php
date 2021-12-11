<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;

class AvisForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder,array $options){
        $builder->add("condidat_id",IntegerType::class)
            ->add("formation_id",IntegerType::class)
            ->add("avis",IntegerType::class);
    }


}