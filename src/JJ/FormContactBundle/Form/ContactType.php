<?php

namespace JJ\FormContactBundle\Form;

use JJ\FormContactBundle\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ContactType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) { {
            $builder
                    ->add('nom', TextType::class, array('required' => true))
                    ->add('mail', TextType::class, array('required' => true))
                    ->add('sujet', TextType::class, array('required' => true))
                    ->add('contenu', TextareaType::class, array('required' => true))
                    ->add('save', SubmitType::class);
        }
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
                'data_class' => Contact::class,
        ]);
    }

}
