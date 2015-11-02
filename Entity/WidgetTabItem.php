<?php

namespace Victoire\Widget\TabBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Victoire\Widget\ListingBundle\Entity\WidgetListingItem;

/**
 * WidgetTab.
 *
 * @ORM\Table("vic_widget_tab_item")
 * @ORM\Entity
 */
class WidgetTabItem extends WidgetListingItem
{
    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="WidgetTab", inversedBy="tabs")
     * @ORM\JoinColumn(name="listing_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $container;

    /**
     * Get container.
     *
     * @return string
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * Set container.
     *
     * @param string $container
     *
     * @return $this
     */
    public function setContainer($container)
    {
        $this->container = $container;

        return $this;
    }
}
