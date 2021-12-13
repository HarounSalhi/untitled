<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
class AddCondidatForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder,array $options){
        $builder
            ->add("login",TextType::class)
            ->add("password",PasswordType::class)
            ->add("nom",TextType::class)
            ->add("prenom",TextType::class)
            ->add("cin",IntegerType::class)
            ->add("mail",TextType::class)
            ->add("numt",IntegerType::class);
    }


}