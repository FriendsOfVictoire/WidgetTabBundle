<?php

namespace Victoire\Widget\TabBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Victoire\Bundle\CoreBundle\Form\WidgetType;

/**
 * WidgetTab form type.
 */
class WidgetTabType extends WidgetType
{
    /**
     * define form fields.
     *
     * @param FormBuilderInterface $builder
     *
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('tabItems', CollectionType::class, [
                'entry_type'    => WidgetTabItemType::class,
                'entry_options' => [
                    'businessEntityId' => $options['businessEntityId'],
                    'namespace'        => $options['namespace'],
                    'widget'           => $options['widget'],
                ],
                'allow_add'    => true,
                'allow_delete' => true,
                'by_reference' => false,
                'attr'         => ['id' => 'static'],
                'options'      => [
                    'namespace'        => $options['namespace'],
                    'businessEntityId' => $options['businessEntityId'],
                ],
            ]
        );
        parent::buildForm($builder, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'data_class'         => 'Victoire\Widget\TabBundle\Entity\WidgetTab',
            'widget'             => 'Tab',
            'translation_domain' => 'victoire',
        ]);
    }
}
