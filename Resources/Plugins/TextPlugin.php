<?php

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Easybook\Events\EasybookEvents as Events;
use Easybook\Events\ParseEvent;

class TextPlugin implements EventSubscriberInterface
{
    static public function getSubscribedEvents()
    {
        return array(
            Events::POST_PARSE => array('onItemPostParse', -500),
        );
    }

    public function onItemPostParse(ParseEvent $event)
    {
        // transform '*' into a centered image
        $item = $event->getItem();
        $item['content'] = str_replace(
            '<p>*</p>',
            '<img src="./images/separator.png" class="separator center" />',
            $item['content']

        );
        $event->setItem($item);

    }
}
