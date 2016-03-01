<?php

namespace Victoire\Widget\TabBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Victoire\Bundle\WidgetBundle\Entity\WidgetSlotInterface;
use Victoire\Widget\ListingBundle\Entity\WidgetListing;

/**
 * WidgetTab.
 *
 * @ORM\Table("vic_widget_tab")
 * @ORM\Entity
 */
class WidgetTab extends WidgetListing implements WidgetSlotInterface
{
    /**
     * @var string
     * @ORM\OneToMany(targetEntity="WidgetTabItem", mappedBy="container", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $tabItems;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->tabItems = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set tabItems.
     *
     * @param array $tabItems
     *
     * @return WidgetListing
     */
    public function setTabItems($tabItems)
    {
        foreach ($tabItems as $tabItem) {
            $tabItem->setContainer($this);
        }
        $this->tabItems = $tabItems;

        return $this;
    }

    /**
     * Add tabItems.
     *
     * @param \Victoire\Widget\ListingBundle\Entity\WidgetListingItem $tabItems
     *
     * @return WidgetListing
     */
    public function addTabItem(\Victoire\Widget\ListingBundle\Entity\WidgetListingItem $tabItem)
    {
        $tabItem->setContainer($this);
        $this->tabItems[] = $tabItem;

        return $this;
    }

    /**
     * Remove tabItems.
     *
     * @param \Victoire\Widget\ListingBundle\Entity\WidgetListingItem $tabItems
     */
    public function removeTabItem(\Victoire\Widget\ListingBundle\Entity\WidgetListingItem $tabItems)
    {
        $this->tabItems->removeElement($tabItems);
    }

    /**
     * Get tabItems.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTabItems()
    {
        return $this->tabItems;
    }

    /**
     * To String function
     * Used in render choices type (Especially in VictoireWidgetRenderBundle)
     * //TODO Check the generated value and make it more consistent.
     *
     * @return string
     */
    public function __toString()
    {
        return '#'.$this->id;
    }
}
