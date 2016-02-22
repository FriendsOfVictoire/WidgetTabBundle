<?php

namespace Victoire\Widget\TabBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Victoire\Widget\ListingBundle\Form\WidgetListingItemType;

class WidgetTabItemType extends WidgetListingItemType
{
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'data_class'         => 'Victoire\Widget\TabBundle\Entity\WidgetTabItem',
            'translation_domain' => 'victoire',
        ]);
    }
}
