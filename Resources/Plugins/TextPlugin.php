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
            '<p style="text-align: center;">*</p>',
            $item['content']

        );
        $event->setItem($item);

    }
}
