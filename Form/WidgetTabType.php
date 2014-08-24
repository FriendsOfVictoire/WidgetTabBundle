<?php

namespace Victoire\Widget\TabBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Victoire\Bundle\CoreBundle\Form\WidgetType;

/**
 * WidgetTab form type
 */
class WidgetTabType extends WidgetType
{
    /**
     * define form fields
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $entityName = $options['entityName'];
        $namespace = $options['namespace'];
        $mode = $options['mode'];

        $builder->add('tabItems', 'collection', array(
                'type'         => new WidgetTabItemType($entityName, $namespace, $options['widget']),
                'allow_add'    => true,
                'allow_delete' => true,
                'by_reference' => false,
                "attr"         => array('id' => 'static'),
                'options' => array(
                    'namespace'  => $namespace,
                    'entityName' => $entityName
                ),
            )
        );
        parent::buildForm($builder, $options);
    }

    /**
     * bind form to WidgetTab entity
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults(array(
            'data_class'         => 'Victoire\Widget\TabBundle\Entity\WidgetTab',
            'widget'             => 'Tab',
            'translation_domain' => 'victoire'
        ));
    }

    /**
     * get form name
     *
     * @return string The form name
     */
    public function getName()
    {
        return 'victoire_widget_form_tab';
    }
}
