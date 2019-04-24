<?php

namespace App\Form;

use App\Entity\Societe;
use App\Entity\Groupe;
use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;


class SocieteForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
            ->add('nomSociete', TextType::class, array('label' => 'Nom' ,'attr' => array('class' => 'textforms')))
            ->add('villeSociete', TextType::class, ['label' => 'Ville','required' => false, 'attr' => array('class' => 'textforms')] )
            ->add('cpSociete', TextType::class, ['label' => 'CP','required' => false,'attr' => array('class' => 'textforms')])
            ->add('adresseSociete', TextType::class, ['label' => 'Adresse','required' => false,'attr' => array('class' => 'textforms')])
            ->add('complementAdresseSociete', TextType::class, ['required' => false,'attr' => array('class' => 'textforms')])
            ->add('paysSociete', TextType::class, ['label' => 'Pays','required' => false,'attr' => array('class' => 'textforms')])
            ->add('telephoneSociete', TextType::class, ['label' => 'Telephone','required' => false,'attr' => array('class' => 'textforms')])
            ->add('faxSociete', TextType::class, ['label' => 'Fax','required' => false,'attr' => array('class' => 'textforms')])
            ->add('dateCreationFicheSociete', DateType::class, array('label' => 'Création','attr' => array('class' => 'textforms')))
            ->add('activiteSociete', TextType::class, ['label' => 'Activite','required' => false,'attr' => array('class' => 'textforms')])
            ->add('typeClient', TextType::class, ['label' => 'Type','required' => false,'attr' => array('class' => 'textforms')])
            ->add('privePublic', ChoiceType::class, [
                'choices' => [
                    'prive' => "prive",
                    'public' => "public",
                ],
                'attr' => array('class' => 'textforms')
                ,'label' => 'Secteur'
            ])
            ->add('commentaire', TextareaType::class, ['required' => false])
            ->add('numeroSiret', TextType::class, ['label' => 'Siret','required' => false,'attr' => array('class' => 'textforms')])
            ->add('internet', TextType::class, ['label' => 'Site','required' => false,'attr' => array('class' => 'textforms')])
            ->add('emailSociete', EmailType::class, ['label' => 'Email','required' => false,'attr' => array('class' => 'textforms')])
            ->add('tailleSociete', ChoiceType::class, [
                'choices' => [
                    'Particulier' => "Particulier",
                    'Moins de 10' => Societe::MOINS_DE_10_SALARIES,
                    'Entre 10 et 49' => "Entre 10 et 49",
                    'Entre 50 et 249' => "Entre 50 et 249",
                    'Entre 250 et 5000' => "Entre 250 et 5000",
                    'Plus de 5000' => "Plus de 5000",
                ],
                'attr' => array('class' => 'textforms')
                ,'label' => 'Taille'
            ])
            ->add('statutSociete', TextType::class, ['label' => 'Statut','required' => false,'attr' => array('class' => 'textforms')])
            ->add('numTvaSociete', TextType::class, ['label' => 'Num TVA','required' => false,'attr' => array('class' => 'textforms')])

            ->add('groupe',EntityType::class, array(
                // looks for choices from this entity
                'class' => 'App:Groupe',

                'choice_label' => function (Groupe $groupe) {
                    return (string)$groupe->getId() . ' ' . $groupe->getNomGroupe();
                },

                'multiple' => false,
                'expanded' => false,
                'attr' => array('class' => 'textforms')
            ))

            ->add('contact',EntityType::class, array(

                'class' => Contact::class,

                'choice_label' => function (Contact $contact) {
                    return (string)$contact->getId() . ' ' . $contact->getPrenomContact();
                },

                'multiple' => true,
                'expanded' => false,
                'attr' => ['data-select' => 'true'],
                'required' => false,
            ))

            ->add('save', SubmitType::class, ['label' => 'Validez']);

        ;
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Societe::class,
        ]);
    }

}
